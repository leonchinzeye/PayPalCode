<?php
session_start();

$page_title = "Index";

// include "connect_db";
include "frontPage.php";

$host = "localhost";
$dbname = "ShopDB";
$username = "root";
$password = "";
// echo("<script>console.log('I here: ');</script>");

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    echo("<script>console.log('I failed: ');</script>");

    die("Connection failed: " . $conn->connect_error);
}

$qr = "SELECT id, name, price FROM ItemList";
$itemDB = $conn->query($qr);

$numRows = $itemDB->num_rows;
$listItemID = array();
$listItemName = array();
$listItemPrice = array();
$testnum = 1.0;
// echo("<script>console.log('testnum:'".$testnum.");</script>");
// echo("<script>console.log('numRows:'".$numRows.");</script>");
if($itemDB->num_rows > 0) {
    $counter = 1;
    while($row = $itemDB->fetch_assoc()) {
        $itemId = $row["id"];
        $itemId = (string)$itemId;
        // echo("<script>console.log('Query: ".$itemId."');</script>");

        array_push($listItemID, $row["id"]);
        array_push($listItemName, $row["name"]);
        array_push($listItemPrice, $row["price"]);
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

?>

