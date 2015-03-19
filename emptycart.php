<?php
session_start();

$_SESSION["cart"] = array();
$_SESSION["cartcounter"] = 0;

header("Location: cart.php");

?>