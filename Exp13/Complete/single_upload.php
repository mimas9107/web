<?php
    $uploadDir = 'uploads/'; // 上傳目錄
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
        $file = $_FILES['file'];
        $uploadFilePath = $uploadDir . basename($file['name']);

        // 檢查檔案是否成功上傳
        if (move_uploaded_file($file['tmp_name'], $uploadFilePath)) {
            echo "檔案 " . htmlspecialchars($file['name']) . " 上傳成功！";
        } else {
            echo "檔案上傳失敗。";
        }
    } else {
        echo "未選擇任何檔案。";
    }
?>
