<?php
session_start();

$cart = $_SESSION["cart"];
$itemArray = $_SESSION["itemArray"];
$sum = 0;

for($i = 0; $i < count($cart); $i++) {
	$itemID = $cart[$i]["id"];
	$itemQty = $cart[$i]["qty"];
	$itemPrice = $itemArray[$itemID - 1]["price"];

	$sum += $itemPrice * $itemQty;
}

$_POST["PAYMENTREQUEST_0_AMT"] = $sum;
$_POST["currencyCodeType"] = "SGD";
$_POST["paymentType"] = "Sale";

header("Location: Checkout/paypal_ec_redirect.php");
?>