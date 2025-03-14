<?php
$mysqli = new mysqli("mariadb-container", "project_user", "projectpassword", "project_db");
if ($mysqli->connect_error) {
   die("連接失敗：" . $mysqli->connect_error);
}
echo "成功連接到 MySQL！<br />";

$sql = "SELECT * FROM users;";
$result = $mysqli->query($sql);
while ($row = $result->fetch_assoc()) {
   echo "id:".$row["id"]." username:".$row["username"]." email:".$row["email"]." password:".$row["password"]."<br />";
}
$result->free();
$mysqli->close();
?>
