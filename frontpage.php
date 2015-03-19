<!DOCTYPE html>

<?php

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
                    <span class="glyphicon glyphicon-home"></span>Leon
                </a>
            </div>
            
           <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <a href="cart.php" type="button" class="btn second-button btn-default navbar-btn">
                    <span class="glyphicon glyphicon-shopping-cart"></span> Cart <span class="badge">0</span></a>        
               </ul>
            </div><!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div>
                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="row">

                <?php

                $numItems = $_SESSION["numItems"];

                if($numItems > 0) {
                    $listItemID = $_SESSION["listItemID"];
                    $listItemName = $_SESSION["listItemName"];
                    $listItemPrice = $_SESSION["listItemPrice"];
                    $listItemQty = $_SESSION["listItemQty"];

                    for($i = 0; $i < $numItems; $i++) {
                        $itemID = $listItemID[$i];
                        $itemName = $listItemName[$i];
                        $itemPrice = $listItemPrice[$i];
                        $itemQty = $listItemPrice[$i];

                        // debugPrintVar("ItemPrice", $itemPrice);
                        // echo("<script>console.log('ID:".$itemID.", Name:".$itemName.", Price:".$itemPrice.", Qty:".$itemQty."');</script>");
                        echo "<div class='col-sm-4 col-lg-4 col-md-4'>";
                            echo "<div class = 'thumbnail'>";
                                echo "<a href = '#'><img src = 'http://placehold.it/320x150' data-toggle = 'modal' data-target ='#item".$itemID."-modal'></a>";
                                echo "<div class='caption'>";
                                    echo "<h4 class='pull-right'>S$".number_format($itemPrice, 2, '.', ',')."</h4>";
                                    echo "<h4><a href='#' data-toggle='modal' data-target='#item".$itemID."-modal'>{$itemName}</a></h4>";
                                    echo "<p>Testing</p>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";

                        echo "<div class = 'modal fade' id = 'item".$itemID."-modal' tabindex = '-1' role = 'dialog' aria-labelledby = 'myModalLabel' aria-hidden = 'true'>";
                            echo "<div class='modal-dialog'>";
                                echo "<div class='modal-content'>";

                                    echo "<div class = 'modal-header'>";
                                        echo "<button type = 'button' class = 'close' data-dismiss = 'modal' aria-hidden = 'true'>&times;</button>";
                                        echo "<h4 class = 'modal-title' id = 'myModalLabel'>".$itemName."</h4>";
                                    echo "</div>";

                                    echo "<div class = 'modal-body'>";
                                        echo "bla bla";
                                    echo "</div>";

                                    echo "<div class = 'modal-footer'>";
                                        echo "<a href = 'add_to_cart.php?id={$itemID}' type = 'button' class = 'btn btn-primary'>Add To Cart</a>";
                                    echo "</div>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";

                    }
                }
                ?>
                </div>

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
