<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: nologin.php");
    exit;
}

$error = "";
$success = "";

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
                    $error = "上傳檔案時發生錯誤。";
                }
            } else {
                $error = "僅允許上傳PNG或JPG檔案。";
            }
        } else {
            $error = "檔案上傳失敗，錯誤碼：" . $fileError;
        }
    }

    // 2. 基本檢查：標題與內容
    if (empty($title) || empty($content)) {
        $error = "請輸入標題與內容。";
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
            $success = "文章刊登成功！";
        } else {
            $error = "刊登失敗，請稍後再試。";
            // 若已成功上傳圖片但DB寫入失敗，視需要考慮 unlink($imagePath)
        }
        $stmt->close();
    }
}
/**
 * 主程式 index.php
 * 本檔案依序載入各 HTML 部件，並組合成完整 HTML 頁面回傳給使用者
 */

// 載入配置設定檔與自訂載入函式
include 'config.php';
include 'loadHTML.php';

// 將 $config 變數傳遞至各部件檔案中
$data = array('config' => $config, 'target' => 'post-img-article.php', 'error' => $error, 'success' => $success);

// 組合 HTML 頁面
$html  = loadHTML('head.php', $data);
$html .= loadHTML('header.php', $data);
$html .= loadHTML('nav.php', $data);
$html .= loadHTML('section.php', $data);
$html .= loadHTML('footer.php', $data);

// 輸出完整 HTML 頁面
echo $html;
