<?php
    $uploadDir = 'uploads/'; // 上傳目錄
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    if () {

        // 檢查檔案是否成功上傳
        if () {
            echo "檔案 " . htmlspecialchars($file['name']) . " 上傳成功！";
        } else {
            echo "檔案上傳失敗。";
        }
    } else {
        echo "未選擇任何檔案。";
    }
?>
