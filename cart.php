<!DOCTYPE html>
<?php
session_start();

include "extraphpfunctions.php";

$cart_counter = $_SESSION["cartcounter"];
$cart = $_SESSION["cart"];
$itemArray = $_SESSION["itemArray"];
$sum = 0;

?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Homepage - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a href="index.php" type="button" class="btn btn-default navbar-btn">
                    <span class="glyphicon glyphicon-home"></span>Home
                </a>
            </div>
            
           <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <a href="cart.php" type="button" class="btn second-button btn-default navbar-btn">
                    <span class="glyphicon glyphicon-shopping-cart"></span> Cart <span class="badge"><?php echo $cart_counter?></span></a>        
               </ul>
            </div><!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <?php
        if(count($cart) == 0) {
            echo "<div class = 'alert alert-info'>";
                echo "<strong>There's nothing in your cart!</strong>";
            echo "</div>";
        } 

        else {
            echo "<div class='container'>";
                echo "<div class='row'>";
                    echo "<div class='col-sm-12 col-md-10 col-md-offset-1'>";
                        echo "<table class='table table-hover'>";
                            echo "<thead>";
                                echo "<tr>";
                                    echo "<th>Product</th>";
                                    echo "<th>Quantity</th>";
                                    echo "<th class='text-center'>Price</th>";
                                    echo "<th class='text-center'>Total</th>";
                                    echo "<th> </th>";
                                echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";

                                debugPrintVar("Cart Objects", count($_SESSION["cart"]));
                                var_dump($_SESSION["cart"]);
                                for($i = 0; $i < count($_SESSION["cart"]); $i++) {
                                    debugPrintVar("i", $i);

                                    $itemID = $cart[$i]["id"];
                                    debugPrintVar("Cart ID", $itemID);

                                    $rowID = $itemID - 1;
                                    debugPrintVar("Row ID", $itemID);

                                    $itemName = $itemArray[$rowID]["name"];
                                    $itemPrice = $itemArray[$rowID]["price"];
                                    $itemTotal = $itemPrice * $cart[$i]["qty"];
                                    $sum += $itemTotal;
                                    echo "<tr>";
                                        echo "<td class = 'col-sm-8 col-md-6'>";
                                        echo "<div class = 'media'>";
                                            echo "<a class = 'thumbnail pull-left' href = '#'> <img class = 'media-object' src = 'http://icons.iconarchive.com/icons/custom-icon-design/flatastic-2/72/product-icon.png' style = 'width: 72px; height: 72px'></a>";
                                            echo "<div class = 'media-body'>";
                                                echo "<h4 class='media-heading'><a href='#'>".$itemName."</a></h4>";
                                                // echo "<h5 class='media-heading'> by <a href='#'>Brand name</a></h5>";
                                                echo "<span>Status: </span><span class='text-success'><strong>In Stock</strong></span>";
                                            echo "</div>";
                                        echo "</div></td>";
                                        echo "<td class='col-sm-1 col-md-1' style='text-align: center'>";
                                        echo "<input type='email' class='form-control' id='exampleInputEmail1' value='".$cart[$i]["qty"]."'>";
                                        echo "</td>";
                                        echo "<td class='col-sm-1 col-md-1 text-center'><strong>S$".number_format($itemPrice, 2, ".", ",")."</strong></td>";
                                        echo "<td class='col-sm-1 col-md-1 text-center'><strong>S$".number_format($itemTotal, 2, ".", ",")."</strong></td>";
                                        echo "<td class='col-sm-1 col-md-1'>";
                                        echo "<a href = 'remove_from_cart.php?id={$itemID}' type = 'button' class = 'btn btn-danger'>";
                                            echo "<span class = 'glyphicon glyphicon-remove'></span> Remove";
                                        echo "</a></td>";
                                    echo "</tr>";
                                }
                            
                                echo "<tr>";
                                    echo "<td>   </td>";
                                    echo "<td>   </td>";
                                    echo "<td>   </td>";
                                    echo "<td><h5>Subtotal</h5></td>";
                                    echo "<td class='text-right'><h5><strong>S$".number_format($sum, 2, ".", ",")."</strong></h5></td>";
                                echo "</tr>";
                                
                                echo "<tr>";
                                    echo "<td>   </td>";
                                    echo "<td>   </td>";
                                    echo "<td>   </td>";
                                    echo "<td><h5>Estimated shipping</h5></td>";
                                    echo "<td class='text-right'><h5><strong>$6.94</strong></h5></td>";
                                echo "</tr>";
                                echo "<tr>";
                                    echo "<td>   </td>";
                                    echo "<td>   </td>";
                                    echo "<td>   </td>";
                                    echo "<td><h3>Total</h3></td>";
                                    echo "<td class='text-right'><h3><strong>S$".number_format($sum, 2, ".", ",")."</strong></h3></td>";
                                echo "</tr>";
                                echo "<tr>";
                                    echo "<td>   </td>";
                                    echo "<td>";
                                    echo "<a href='emptycart.php' type = 'button' class = 'btn btn-default'>";
                                        echo "Empty Cart";
                                    echo "</a></td>";

                                    echo "<td>";
                                    echo "<a href='index.php' type='button' class='btn btn-default'>";
                                        echo "<span class='glyphicon glyphicon-shopping-cart'></span> Continue Shopping";
                                    echo "</a></td>";
                                    echo "<td>";
                                        
                                    // echo "<form action='process_cart.php'>";
                                    //       //<!--Pass additional input parameters based on your shopping cart. For complete list of all the parameters click here -->
                                    //       echo "<input type='image' src='https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-medium.png' alt='Check out with PayPal'></input>";
                                    // echo "</form>";
                                        
                                    echo "<form action='Checkout/paypal_ec_redirect.php' method='POST'>";
                                          echo "<input type='hidden' name='PAYMENTREQUEST_0_AMT' value='".$sum."'></input>";
                                          echo "<input type='hidden' name='currencyCodeType' value='SGD'></input>";
                                          echo "<input type='hidden' name='paymentType' value='Sale'></input>";
                                          //<!--Pass additional input parameters based on your shopping cart. For complete list of all the parameters click here -->
                                          echo "<input type='image' src='https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-medium.png' alt='Check out with PayPal'></input>";
                                    echo "</form>";
                                    echo "</td>";
                                    echo "<td>";
                                    echo "<button type='button' class='btn btn-success'>";
                                        echo "Checkout <span class='glyphicon glyphicon-play'></span>";
                                    echo "</button></td>";
                                echo "</tr>";
                            echo "</tbody>";
                        echo "</table>";
                    echo "</div>";
                echo "</div>";
            echo "</div>";
        }
    ?>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Leon Chin's website</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
