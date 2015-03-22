# PayPalCode
There are several components involved.

Firstly, the information regarding the items are stored in a SQL database. When the user first connects
to index.php, information regarding items to be sold are pulled out from the database through a query
command. This information is then stored in a session variable, which can be used throughout the session.

The main driver page is "index.php". Here, session variables are initialised. For eg. "cart" is initialised for the session, in which the user can store items to the cart.

As the user browses through the inventory, he can add items to the cart, which would then be updated each time he clicks the "Add to cart" button. The file "add_to_cart.php" specifically handles this action.

Files "emptycart.php", "remove_from_cart.php", "plusqty.php" and "minusqty.php" are meant for handling events where the users decide to decrease/increase the quantity of the ordered item, or simply to remove or empty the cart.

The express paypal checkout code is store in Checkout folder. The code snippet required to called the express checkout function is included in "cart.php". Here, a html form is posted with the amount to be paid to the paypal server.

As all this is in testing, the implementation environment is in the sandbox environment.