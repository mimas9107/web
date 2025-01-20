<?php
    $uploadDir = 'uploads/'; // 上傳目錄
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    if () {

        echo "成功上傳了 $uploadedCount/$totalFiles 個檔案。";
    } else {
        echo "未選擇任何檔案。";
    }
?>
