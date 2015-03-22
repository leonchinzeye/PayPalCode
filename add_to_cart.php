<?php
session_start();


include "extraphpfunctions.php";

$cart = $_SESSION["cart"];
$items = $_SESSION["itemArray"];

$id = isset($_GET["id"]) ? $_GET["id"] : "";

// if the object doesn't exist in the cart
if(!checkCartHasKey($cart, "id", $id)) {
	$temp = array();
	$temp["id"] = $id;
	$temp["qty"] = 1;

	array_push($cart, $temp);
	$_SESSION["cart"] = $cart;
	header("Location: index.php?action=added&id=".$id);
} 

// if the object exists in the cart
else {
	$rowOfObject = getRowOfValue($cart, "id", $id);
	if($rowOfObject != -1) {
		$cart[$rowOfObject]["qty"]++;
	}

	$_SESSION["cart"] = $cart;
	header("Location: index.php?action=increaseqty&id=".$id);
}

$_SESSION["cartcounter"]++;
?>