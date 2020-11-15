<?php
session_start();
////print_r($_POST['basket_item']);
/*if ($_POST["submit"] === 'Delete from basket' && $_POST['basket_item'])
	{
	echo "Basket item sent: <br />";
	foreach ($_POST['basket_item'] as $elem)
	{
		echo "$elem<br />";
	}
}*/
echo "<p>You want to remove: ".$_POST['basket_item']." from your basket.</p><br />";
/*foreach ($droid as $elem)
{
	echo "$elem<br />";
}*/
//echo " from your basket.</p><br />";

/*if (!$_SESSION['basket'])
	$_SESSION['basket'] = array();*/

//$remove = $_POST['basket_item'];

echo "Attempting to remove ".print_r($_POST['basket_item'])."<br />";
//unset($_SESSION['basket'][$_POST['basket_item']]);
$_SESSION['basket'] = array_diff($_SESSION['basket'],$_POST['basket_item']);

echo "<p>Product(s) in basket after removing items:</p><br />";
foreach ($_SESSION['basket'] as $elem)
{
	echo "$elem<br />";
}
$view_basket = "<span>Cart===>	 <a href=\"view_basket.php\">View your cart</a>.</span>";
echo $view_basket;

/*

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

*/










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