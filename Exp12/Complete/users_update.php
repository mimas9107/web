<?php
    // Object 寫法
    $servername = "myMariaDB"; // 通常都是使用"localhost"，若使用Docker環境，這裡要填MariaDB Container的Name
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

    // 執行 更新
    $id = 11;
    $email = "chlee@mail.ntut.edu.tw"; 

    $sql = "UPDATE users SET email = ? WHERE id = ?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $email, $id);
    if ($stmt->execute()) {
        echo "更新成功";
    } else {
        echo "更新失敗: " . $conn->error;
    } 


    // 關閉連線
    $conn->close();
?>