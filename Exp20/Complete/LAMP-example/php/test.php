<?php
$servername = "mariadb";
$username = "leech";
$password = "test123";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "TEST !!! Connected successfully";
?>