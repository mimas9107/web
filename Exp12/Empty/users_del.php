<?php
    // Object 寫法
    $servername = "localhost"; // 通常都是使用"localhost"，若使用Docker環境，這裡要填MariaDB Container的Name
    $username = "my_user2";
    $password = "my_password2";

    // 產生 MySQLi 連線
    $conn = new mysqli($servername, $username, $password);

    // 確認 MySQLi 連線狀態
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";

    // 選擇 資料庫
    $conn->select_db("my_database2");

    // 執行 刪除
    $sql = "DELETE FROM users WHERE age < 50;";
    $stmt = $conn->prepare($sql);
    if ($stmt->execute()) {
        echo "刪除成功";
    } else {
        echo "刪除失敗: " . $conn->error;
    }


    // 關閉連線
    $conn->close();
?>