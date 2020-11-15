<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Basket</title>
    <link rel="stylesheet" href="rush.css">
</head>
<body>
<ul>
	<li><a class="active"  href="#droids">Droids</a></li>
	<li><a href="#search">Search</a></li>
	<li><a href="#cart">Cart</a></li>
	<li style="float:right"><a href="#logout">LogOut</a></li>
</ul>	
<h1>Basket</h1><br />

<form action="delete_from_basket.php" method="POST">
<?php
session_start();
echo "<p>Product(s) in to cart:</p>";
if (isset($_SESSION['basket'])) //check session var
{
	//print_r($_SESSION['basket']);
	foreach ($_SESSION['basket'] as $elem)
	{
		echo "$elem<input type=\"checkbox\" id=\"selection\" name=\"basket_item[]\" value=\"".$elem."\"> <br /><br />";
	}
	echo "<p>Good shopping!</p><br />";
}
else
	echo "No basket found! Get shopping, friend!<br />";

?>
<input type="submit" value="Delete from basket">
</form>
</body></html>