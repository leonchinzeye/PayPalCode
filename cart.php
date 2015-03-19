<!DOCTYPE html>
<?php
session_start();

$cart_counter = $_SESSION["cartcounter"];
$cart = $_SESSION["cart"];
$itemArray = $_SESSION["itemArray"];

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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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

    <div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>

                <?php
                for($i = 0; $i < count($_SESSION["cart"]); $i++) {
                    $itemID = $cart[$i]["id"];
                    $rowID = $itemID - 1;
                    $itemName = $itemArray[$rowID]["name"];
                    $itemPrice = $itemArray[$rowID]["price"];
                    $itemTotal = $itemPrice * $cart[$i]["qty"];
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
                        echo "<td class='col-sm-1 col-md-1 text-center'><strong>S$".$itemPrice."</strong></td>";
                        echo "<td class='col-sm-1 col-md-1 text-center'><strong>S$".$itemTotal."</strong></td>";
                        echo "<td class='col-sm-1 col-md-1'>";
                        echo "<button type='button' class='btn btn-danger'>";
                            echo "<span class='glyphicon glyphicon-remove'></span> Remove";
                        echo "</button></td>";
                    echo "</tr>";
                }

                ?>
                    
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Subtotal</h5></td>
                        <td class="text-right"><h5><strong>$24.59</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Estimated shipping</h5></td>
                        <td class="text-right"><h5><strong>$6.94</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong>$31.53</strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td> 
                        <a href="emptycart.php" type = "button" class = "btn btn-default">
                            Empty Cart
                        </a></td>

                        <td>
                        <a href="index.php" type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                        </a></td>
                        <td>
                            
                        
                            
                        <form action="Checkout/paypal_ec_redirect.php" method="POST">
                              <input type="hidden" name="PAYMENTREQUEST_0_AMT" value="10.0"></input>
                              <input type="hidden" name="currencyCodeType" value="SGD"></input>
                              <input type="hidden" name="paymentType" value="Sale"></input>
                              <!--Pass additional input parameters based on your shopping cart. For complete list of all the parameters click here -->
                              <input type="image" src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-medium.png" alt="Check out with PayPal"></input>
                        </form>
                        </td>
                        <td>
                        <button type="button" class="btn btn-success">
                            Checkout <span class="glyphicon glyphicon-play"></span>
                        </button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
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
