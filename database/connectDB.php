<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "anna_shop";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối đến CSDL thất bại: " . $conn->connect_error);
}
?>