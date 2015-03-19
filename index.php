<?php
session_start();

$page_title = "Index";

include "extraphpfunctions.php";
include "connect_db.php";
include "frontPage.php";

$action = isset($_GET['action']) ? $_GET['action'] : "";
$id = isset($_GET['id']) ? $_GET['id'] : "";
$product_id = isset($_GET['product_id']) ? $_GET['product_id'] : "1";

if($action == "added") {
    $_SESSION["added_item_id"] = $id;
    $_SESSION["addedMessage"] = "was added to your cart!";
}

if($action == "exists") {
    $_SESSION["added_item_id"] = $id;
    $_SESSION["addedMessage"] = "already exists in your cart!";
}


$qr = "SELECT id, name, price, qty, descrip FROM ItemList";
$itemDB = $conn->query($qr);

$numRows = $itemDB->num_rows;
$listItemID = array();
$listItemName = array();
$listItemPrice = array();
$listItemQty = array();
$listItemDescrip = array();

$testnum = 1.0;
// echo("<script>console.log('testnum:'".$testnum.");</script>");
// echo("<script>console.log('numRows:'".$numRows.");</script>");
if($itemDB->num_rows > 0) {
    $counter = 1;
    while($row = $itemDB->fetch_assoc()) {

        array_push($listItemID, $row["id"]);
        array_push($listItemName, $row["name"]);
        array_push($listItemPrice, $row["price"]);
        array_push($listItemQty, $row["qty"]);
        array_push($listItemQty, $row["descrip"]);

        $counter += 1;
    }
}

for($i = 0; $i < $numRows; $i++) {
    // echo("<script>console.log('ID:".$listItemID[$i].", Name:".$listItemName[$i].", Price:".$listItemPrice[$i].", Qty:".$listItemQty[$i]."');</script>");
}

echo("<script>console.log('Rows: ".$numRows."');</script>");
$_SESSION['numItems'] = $numRows;
$_SESSION['listItemID'] = $listItemID;
$_SESSION['listItemName'] = $listItemName;
$_SESSION['listItemPrice'] = $listItemPrice;
$_SESSION['listItemQty'] = $listItemQty;
$_SESSION['listItemDescrip'] = $listItemDescrip;

?>

