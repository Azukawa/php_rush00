<html><head>
    <meta charset="UTF-8">
    <title>Product deleted!</title>
    <link rel="stylesheet" href="rush.css">
</head>
<body><ul>
	<li><a class="active"  href="#droids">Droids</a></li>
	<li><a href="#search">Search</a></li>
	<li><a href="#cart">Cart</a></li>
	<li style="float:right"><a href="#logout">LogOut</a></li>
</ul>
<h1>Product deleted!</h1><br />



<?php
session_start();
//if ($_POST["submit"] === 'OK')
$_SESSION['basket'] = array();
unset($_SESSION['basket']);
/*$var = $_SESSION['basket'];
unset($var);*/
header("location: login.php");
exit;
/*echo "<p>You want to remove: ".$_POST['basket_item']." from your basket.</p><br />";

echo "Attempting to remove ".print_r($_POST['basket_item'])."<br />";
$_SESSION['basket'] = array_diff($_SESSION['basket'],$_POST['basket_item']);

echo "<p>Product(s) in basket after removing items:</p><br />";
foreach ($_SESSION['basket'] as $elem)
{
	echo "$elem<br />";
}
$view_basket = "<span>Cart===>	 <a href=\"view_basket.php\">View your cart</a>.</span>";
echo $view_basket;*/
?>

</form>
</body></html>