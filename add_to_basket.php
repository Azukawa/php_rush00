<?php
session_start();
//echo "<p>You added: ".$_POST['droid'][0].$_POST['droid'][1] ." to your cart.</p><br />";

if (!$_SESSION['basket'])
	$_SESSION['basket'] = array()

foreach ($droid as $elem)
{
	array($_SESSION['basket'], $elem);
}
echo "<p>Product(s) added to cart:</p><br />";
foreach ($_SESSION['basket'] as $elem)
{
	echo "$elem<br />";
}

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