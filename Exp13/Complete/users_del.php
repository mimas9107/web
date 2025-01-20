<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user_id = $_POST['user_id'] ?? 0;

        // 資料庫連線
        $conn = new mysqli('myMariaDB', 'my_user', 'my_password', 'my_database');
        if ($conn->connect_error) {
            die('連線失敗: ' . $conn->connect_error);
        }

        // 刪除資料
        $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $user_id);
        if ($stmt->execute()) {
            echo "刪除成功";
        } else {
            echo "刪除失敗: " . $conn->error;
        }

        $stmt->close();
        $conn->close();
    }
?>