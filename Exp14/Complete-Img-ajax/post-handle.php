<?php
session_start();

header('Content-Type: application/json; charset=UTF-8');
// 預設回傳結構
$response = array(
    'status'  => 'error',
    'message' => ''
);

if (!isset($_SESSION['user_id'])) {
    $response['message'] = '您尚未登入或登入已逾時，請重新登入。';
    echo json_encode($response);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title   = trim($_POST['title']);
    $content = $_POST['content'];
    
    // 預設不帶圖
    $imagePath = null;

    // 1. 檔案上傳檢查
    if (!empty($_FILES['image']['name'])) {
        $fileName    = $_FILES['image']['name'];
        $fileTmpName = $_FILES['image']['tmp_name'];
        $fileError   = $_FILES['image']['error'];

        // 取得副檔名 (小寫)
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        // 僅允許png/jpg
        $allowedExts = array('png','jpg','jpeg');

        if ($fileError === UPLOAD_ERR_OK) {
            if (in_array($fileExt, $allowedExts)) {
                $usernameDir = 'uploads/' . $_SESSION['username'] . '/';
                if (!is_dir($usernameDir)) {
                    mkdir($usernameDir, 0777, true);
                }

                // 避免檔名衝突，以時間戳+亂數
                $newFileName = time() . '_' . rand(100,999) . '.' . $fileExt;
                $destPath    = $usernameDir . $newFileName;

                if (move_uploaded_file($fileTmpName, $destPath)) {
                    $imagePath = $destPath;
                } else {
                    $response['message'] = "上傳檔案時發生錯誤。";
                    echo json_encode($response);
                    exit;
                }
            } else {
                $response['message'] = "僅允許上傳PNG或JPG檔案。";
                echo json_encode($response);
                exit;
            }
        } else {
            $response['message'] = "檔案上傳失敗，錯誤碼：" . $fileError;
            echo json_encode($response);
            exit;
        }
    }

    // 2. 基本檢查：標題與內容
    if (empty($title) || empty($content)) {
        $response['message'] = "請輸入標題與內容。";
        echo json_encode($response);
        exit;
    }

    // 3. 若無錯誤則寫入資料庫
    if (empty($error)) {
        include 'db_connect.php';
        $user_id = $_SESSION['user_id'];
        $title = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
        $content = htmlspecialchars($content, ENT_QUOTES, 'UTF-8');
        $stmt    = $conn->prepare("INSERT INTO articles (user_id, title, content, image_path) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss", $user_id, $title, $content, $imagePath);

        if ($stmt->execute()) {
            $response['status']  = 'ok';
            $response['message'] = "文章刊登成功！";

        } else {
            $response['message'] = "刊登失敗，請稍後再試。";
            // 若已成功上傳圖片但DB寫入失敗，視需要考慮 unlink($imagePath)
        }
        $stmt->close();

        echo json_encode($response);
    }
}
?>