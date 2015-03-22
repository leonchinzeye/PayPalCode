<?php
session_start();
include "extraphpfunctions.php";

$id = isset($_GET["id"]) ? $_GET["id"] : "";

$rowOfItem = getRowOfValue($_SESSION["cart"], "id", $id);

$_SESSION["cart"][$rowOfItem]["qty"]++;
$_SESSION["cartcounter"]++;
header("Location: cart.php");

?>