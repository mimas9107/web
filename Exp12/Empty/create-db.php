<?php
    // Object 寫法
    // $servername = "myMariaDB"; // 通常都是使用"localhost"，若使用Docker環境，這裡要填MariaDB Container的Name
    $servername = "localhost";
    $username = "root";
    $password = "test123";

    // 產生 MySQLi 連線
    $conn = new mysqli($servername, $username, $password);

    // 確認 MySQLi 連線狀態
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";

    // // 產生 Database
    $sql = "CREATE DATABASE my_database2;";
    if ($conn->query($sql) === TRUE) {
        echo "Database created successfully";
    } 
    else {
        echo "Error creating database: " . $conn->error;
    }
    
    // // 產生 User
    // // 講義是: 'my_user2'@'%' , 因為我用 LAMP的 docker image所以 都在 localhost
    $sql = "CREATE USER 'my_user2'@'%' IDENTIFIED BY 'my_password2';";
    if ($conn->query($sql) === TRUE) {
        echo "User created successfully";
    } 
    else {
        echo "Error creating user: " . $conn->error;
    } 


    // 將資料庫權限給使用者
    // 講義是: 'my_user2'@'%' , 因為我用 LAMP的 docker image所以 都在 localhost

    $sql = "GRANT ALL PRIVILEGES ON my_database2.* TO 'my_user2'@'%';";
    if ($conn->query($sql) === TRUE) {
        echo "Privileges granted successfully";
    } 
    else {
        echo "Error granting privileges: " . $conn->error;
    }
    
    // 更新權限
    $sql = "FLUSH PRIVILEGES;";
    if ($conn->query($sql) === TRUE) {
        echo "Privileges flushed successfully";
    } 
    else {
        echo "Error flushing privileges: " . $conn->error;
    }

    // 關閉連線
    $conn->close();
?>