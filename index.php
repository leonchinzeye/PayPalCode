<?php

session_start();


$page_title = "Index";

include "extraphpfunctions.php";
include "connect_db.php";


$qr = "SELECT id, name, price, descrip, shortdescrip FROM ItemList";
$itemDB = $conn->query($qr);

//initialise cart

if(!isset($_SESSION["cartcounter"])) {
    $_SESSION["cartcounter"] = 0;
}

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
        $temp["descrip"] = $row["descrip"];
        $temp["shortdescrip"] = $row["shortdescrip"];

        array_push($itemArray, $temp);

        $counter += 1;
    }
}

$_SESSION["itemArray"] = $itemArray;
$_SESSION['numItems'] = $numRows;

include "frontPage.php";
?>

