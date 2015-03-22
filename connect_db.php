<?php
$host = "leonchinzeye.ipagemysql.com";
$dbname = "item_list";
$username = "leonchin";
$password = "password1";

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    echo("<script>console.log('I failed: ');</script>");

    die("Connection failed: " . $conn->connect_error);
}
?>