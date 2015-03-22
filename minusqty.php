<?php
session_start();
include "extraphpfunctions.php";

$id = isset($_GET["id"]) ? $_GET["id"] : "";

$rowOfItem = getRowOfValue($_SESSION["cart"], "id", $id);

if($_SESSION["cart"][$rowOfItem]["qty"] == 1) {
	header("Location: remove_from_cart.php?id={$id}");
} else {
	$_SESSION["cart"][$rowOfItem]["qty"]--;
	$_SESSION["cartcounter"]--;
	header("Location: cart.php");
}

?>