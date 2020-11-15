<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
else
	echo "";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="rush.css">
</head>
<body>
<ul>
	<li><a class="active"  href="welcome.php">Droids</a></li>
	<li><a href="#search">Search</a></li>
	<li><a href="#cart">Cart</a></li>
	<li style="float:right"><a href="#logout">LogOut</a></li>
</ul>	
<h1>Admin</h1><br />
<p>Welcome to the Admin page, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>!</p>

<p><a href="add_users.php">Add users</a></p>
<p><a href="manage_products.php">Add products</a></p>

</body></html>

