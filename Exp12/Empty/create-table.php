<?php
    // Object 寫法
    // $servername = "myMariaDB"; // 通常都是使用"localhost"，若使用Docker環境，這裡要填MariaDB Container的Name
    $servername ="localhost";
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

    // 產生 Table
    $sql="CREATE TABLE users (id INT PRIMARY KEY, name VARCHAR(100), email VARCHAR(100), age INT);";
    if($conn->query($sql) === TRUE){
        echo "Table users created successfully";
    }else{
        echo "Error creating table: ".$conn->error;
    }
    $sql="CREATE TABLE projects (id INT PRIMARY KEY, name VARCHAR(100), start_date DATE);";
    if($conn->query($sql) === TRUE){
        echo "Table projects created successfully";
    }else{
        echo "Error creating table: ".$conn->error;
    }
    $sql="CREATE TABLE assignments (user_id INT, project_id INT, role VARCHAR(50), FOREIGN KEY (user_id) REFERENCES users(id), FOREIGN KEY (project_id) REFERENCES projects(id))";
    if($conn->query($sql) === TRUE){
        echo "Table assignments created successfully";
    }else{
        echo "Error creating table: ".$conn->error;
    }
  

    // 關閉連線
    $conn->close();
?>