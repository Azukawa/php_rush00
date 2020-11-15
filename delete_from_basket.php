<html><head>
    <meta charset="UTF-8">
    <title>Product deleted!</title>
    <link rel="stylesheet" href="rush.css">
</head>
<body><ul>
	<li><a href="login.php">Login</a></li>
	<li><a href="landing_page.php">Shop</a></li>
	<li><a href="register.php">Register</a></li>
	<li><a class="active" href="view_basket.php">Basket</a></li>
	<li style="float:right"><a href="logout.php">LogOut</a></li>
</ul>
<h1>Product deleted!</h1><br />



<?php
session_start();
echo "<p>You want to remove: ".$_POST['basket_item']." from your basket.</p><br />";

echo "Attempting to remove ".print_r($_POST['basket_item'])."<br />";
$_SESSION['basket'] = array_diff($_SESSION['basket'],$_POST['basket_item']);

echo "<p>Product(s) in basket after removing items:</p><br />";
foreach ($_SESSION['basket'] as $elem)
{
	echo "$elem<br />";
}
$view_basket = "<span>Cart===>	 <a href=\"view_basket.php\">View your cart</a>.</span>";
echo $view_basket;

?>

</form>
</body></html>
