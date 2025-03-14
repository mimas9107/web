<?php
    // Object 寫法
    $servername = "myMariaDB"; // 通常都是使用"localhost"，若使用Docker環境，這裡要填MariaDB Container的Name
    $username = "my_user";
    $password = "my_password";

    // 產生 MySQLi 連線
    $conn = new mysqli($servername, $username, $password);

    // 確認 MySQLi 連線狀態
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";

    // 選擇 資料庫
    // 執行 查詢/新增/更新/刪除

    // 關閉連線
    $conn->close();
?>

<?php
    // Procedure 寫法
    $servername = "myMariaDB"; // 通常都是使用"localhost"，若使用Docker環境，這裡要填MariaDB Container的Name
    $username = "my_user";
    $password = "my_password";

    // 產生 MySQLi 連線
    $conn = mysqli_connect($servername, $username, $password);

    // 確認 MySQLi 連線狀態
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";

    // 選擇 資料庫
    // 執行 查詢/新增/更新/刪除

    // 關閉連線
    mysqli_close($conn);
?>