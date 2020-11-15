
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="rush.css">
</head>
<body>
<ul>
	<li><a class="active"  href="#droids">Droids</a></li>
	<li><a href="#search">Search</a></li>
	<li><a href="#cart">Cart</a></li>
	<li style="float:right"><a href="#logout">LogOut</a></li>
</ul>
<?php
session_start();
echo "<p>You added: ";

if (!$_SESSION['basket'])
	$_SESSION['basket'] = array();

$droid = $_POST['droid'];
foreach ($droid as $elem)
{
	array_push($_SESSION['basket'], $elem);
	echo "$elem<br />";
}
echo " to your cart.</p><br />";

echo "<p>Product(s) added to cart:</p><br />";
foreach ($_SESSION['basket'] as $elem)
{
	echo "$elem<br />";
}
$view_basket = "<span>Cart===>	 <a href=\"view_basket.php\">View your cart</a>.</span>";
echo $view_basket;

/*if ($_POST["submit"] === 'Add to cart' && $_POST['droid'])
{
	$checkbox1=$_POST['droid'];
	print_r($checkbox1);
	echo "Product added to cart.<br />";
	echo $prod_id."\n";
	$_SESSION[$basket] = $prod_id;
	echo $_SESSION[$basket];
}*/
?>


</body>
</html>
