<?php
include "extraphpfunctions.php";

$id = isset($_GET['id']) ? $_GET['id'] : "";

/*
 * Check if the 'cart' session array has been created.
 * If it hasn't been created, create the cart
 */
if(!isset($_SESSION['cart_items'])) {
	$_SESSION['cart_items'] = array();
}

if(array_key_exists($id, $_SESSION['cart_items'])) {
	header("Location: index.php?action=exists&id".$id);
} else {
	array_push($id, $_SESSION['cart_items']);
	header("Location: index.php?action=added&id".$id);
}
?>