<?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $search = $_GET['search'] ?? '';

        // 資料庫連線
        $conn = new mysqli('myMariaDB', 'my_user', 'my_password', 'my_database');
        if ($conn->connect_error) {
            die('連線失敗: ' . $conn->connect_error);
        }

        // 查詢資料
        $stmt = $conn->prepare("SELECT * FROM users WHERE name LIKE ?");
        $searchTerm = '%' . $search . '%';
        $stmt->bind_param("s", $searchTerm);
        $stmt->execute();
        $result = $stmt->get_result();

        // 顯示資料
        if ($result->num_rows > 0) {
            echo "<h1>查詢結果</h1>";
            echo "<table border='1'><tr><th>ID</th><th>姓名</th><th>電子郵件</th><th>年齡</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['email']}</td><td>{$row['age']}</td></tr>";
            }
            echo "</table>";
        } else {
            echo "未找到結果";
        }

        $stmt->close();
        $conn->close();
    }
?>
