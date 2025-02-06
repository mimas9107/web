<?php
/**
 * 資料庫連線檔案
 */
include 'db_config.php';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_error) {
    die("資料庫連線失敗：" . $conn->connect_error);
}
?>