<?php
$host = "localhost";
$dbname = "shop_test";
$username = "root";
$password = "";
// echo("<script>console.log('I here: ');</script>");

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    echo("<script>console.log('I failed: ');</script>");

    die("Connection failed: " . $conn->connect_error);
}
?>