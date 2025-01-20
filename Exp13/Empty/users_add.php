<?php
    if () {

        // 資料庫連線

        // 插入資料

        if () {
            echo "新增成功";
        } else {
            echo "新增失敗: " . $conn->error;
        }

        $stmt->close();
        $conn->close();
    }
?>