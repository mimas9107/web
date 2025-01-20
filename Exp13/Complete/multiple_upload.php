<?php
    $uploadDir = 'uploads/'; // 上傳目錄
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['files'])) {
        $files = $_FILES['files'];
        $totalFiles = count($files['name']);
        $uploadedCount = 0;

        for ($i = 0; $i < $totalFiles; $i++) {
            $fileName = $files['name'][$i];
            $tmpName = $files['tmp_name'][$i];
            $uploadFilePath = $uploadDir . basename($fileName);

            if (move_uploaded_file($tmpName, $uploadFilePath)) {
                echo "檔案 " . htmlspecialchars($fileName) . " 上傳成功！<br>";
                $uploadedCount++;
            } else {
                echo "檔案 " . htmlspecialchars($fileName) . " 上傳失敗。<br>";
            }
        }

        echo "成功上傳了 $uploadedCount/$totalFiles 個檔案。";
    } else {
        echo "未選擇任何檔案。";
    }
?>
