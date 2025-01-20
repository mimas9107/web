<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!isset($_FILES['file']) || !isset($_POST['filename'])) {
            echo json_encode(['success' => false, 'error' => '缺少檔案或檔名']);
            exit;
        }

        $file = $_FILES['file'];
        $targetFilename = basename($_POST['filename']);
        $uploadDir = 'uploads/'; // 上傳目錄
        $targetPath = $uploadDir . $targetFilename;

        // 確保上傳目錄存在
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            $downloadUrl = $targetPath; // 假設伺服器根目錄是可公開訪問的
            echo json_encode(['success' => true, 'download_url' => $downloadUrl]);
        } else {
            echo json_encode(['success' => false, 'error' => '檔案上傳失敗']);
        }
    }
?>
