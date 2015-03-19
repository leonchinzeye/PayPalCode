<?php
session_start();

$page_title = "Index";

include "extraphpfunctions.php";
include "connect_db.php";
include "frontPage.php";

$qr = "SELECT id, name, price, qty, descrip FROM ItemList";
$itemDB = $conn->query($qr);

//initialist cart

if(!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = array();
}

$numRows = $itemDB->num_rows;
$itemArray = array();

if($itemDB->num_rows > 0) {
    $counter = 1;
    while($row = $itemDB->fetch_assoc()) {
        $temp = array();
        $temp["id"] = $row["id"];
        $temp["name"] = $row["name"];
        $temp["price"] = $row["price"];
        $temp["qty"] = $row["qty"];
        $temp["descrip"] = $row["descrip"];

        array_push($itemArray, $temp);

        $counter += 1;
    }
}

for($i = 0; $i < $numRows; $i++) {
    // echo("<script>console.log('ID:".$listItemID[$i].", Name:".$listItemName[$i].", Price:".$listItemPrice[$i].", Qty:".$listItemQty[$i]."');</script>");
}

$_SESSION["itemArray"] = $itemArray;
$_SESSION['numItems'] = $numRows;
?>

