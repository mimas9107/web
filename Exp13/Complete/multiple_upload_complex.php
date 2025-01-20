<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!isset($_FILES['files']) || !isset($_POST['custom_names'])) {
            echo json_encode(['success' => false, 'error' => '缺少檔案或檔名']);
            exit;
        }

        $files = $_FILES['files'];
        $customNames = $_POST['custom_names'];
        $uploadDir = 'uploads/';
        $downloadUrls = [];

        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        for ($i = 0; $i < count($files['name']); $i++) {
            $targetFilename = basename($customNames[$i]);
            $targetPath = $uploadDir . $targetFilename;

            if (move_uploaded_file($files['tmp_name'][$i], $targetPath)) {
                $downloadUrls[] = $targetPath;
            } else {
                echo json_encode(['success' => false, 'error' => '檔案上傳失敗']);
                exit;
            }
        }

        echo json_encode(['success' => true, 'download_urls' => $downloadUrls]);
    }
?>
