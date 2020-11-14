<?php

echo "<p>You added: ".$_POST['droid'][0].$_POST['droid'][1] ." to your cart.</p><br />";

if ($_POST["submit"] === 'Add to cart' && $_POST['droid'])
{
	$checkbox1=$_POST['droid'];
	print_r($checkbox1);
	echo "Product added to cart.<br />";
	echo $prod_id."\n";
	$_SESSION[$basket] = $prod_id;
	echo $_SESSION[$basket];
}
?>