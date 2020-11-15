<!DOCTYPE html>

<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<html>
<head>
<meta charset="UTF-8">
    <title>Welcome</title>
<link rel="stylesheet" href="rush.css">
</head>
<body>
<ul>
	<li><a class="active"  href="#droids">Droids</a></li>
	<li><a href="#search">Search</a></li>
	<li><a href="#cart">Cart</a></li>
	<li style="float:right"><a href="#logout">LogOut</a></li>
</ul>
<div>
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to the Jawa Junkyard. These ARE the droids you're looking for!</h1>
	</div>
	<form action="search_product.php" method="POST">
			Search products: <input type="text" name="search_terms" value="" />
			Search by: <select name="search-by" id="search-by">
				<option value="name">Name</option>
				<option value="id">ID</option>
				<option value="cat">Category</option>
				<option value="price">Price</option>
			  </select>
			  <input type="submit" name="submit" value="Search" />
		</form>
    <p>
        <a href="reset-password.php">Reset Your Password</a>
        <a href="logout.php">Sign Out of Your Account</a>
	</p>
	<span>Cart===>	 <a href="view_basket.php">View your cart</a>.</span>
</body>
</html>


    