<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user_id = $_POST['user_id'] ?? 11;
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $age = $_POST['age'] ?? 0;

        // 資料庫連線
        $conn = new mysqli('myMariaDB', 'my_user', 'my_password', 'my_database');
        if ($conn->connect_error) {
            die('連線失敗: ' . $conn->connect_error);
        }

        // 插入資料
        $stmt = $conn->prepare("INSERT INTO users (id, name, email, age) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("issi", $user_id, $name, $email, $age);
        if ($stmt->execute()) {
            echo "新增成功";
        } else {
            echo "新增失敗: " . $conn->error;
        }

        $stmt->close();
        $conn->close();
    }
?>