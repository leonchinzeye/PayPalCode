<?php
$host = "mysql12.000webhost.com";
$dbname = "a8479141_shop";
$username = "a8479141_leon";
$password = "password1";

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    echo("<script>console.log('I failed: ');</script>");

    die("Connection failed: " . $conn->connect_error);
}
?>