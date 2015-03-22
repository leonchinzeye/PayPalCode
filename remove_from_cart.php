<?php
session_start();
include "extraphpfunctions.php";

$id = isset($_GET["id"]) ? $_GET["id"] : "";
// debugPrintVar("ID", $id);

$rowOfItem = getRowOfValue($_SESSION["cart"], "id", $id);
$qty = $_SESSION["cart"][$rowOfItem]["qty"];

unset($_SESSION["cart"][$rowOfItem]);								//delete the row belonging to the item that has to be removed
$_SESSION["cart"] = array_values($_SESSION["cart"]);				//re-index the array
$_SESSION["cartcounter"] -= $qty;

header("Location: cart.php");
?>