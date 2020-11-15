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
	<li><a href="login.php">Login</a></li>
	<li><a class="active" href="landing_page.php">Shop</a></li>
	<li><a href="register.php">Register</a></li>
	<li><a href="view_basket.php">Basket</a></li>
	
	<li style="float:right"><a href="logout.php">LogOut</a></li>

	<li style="float:right"><a href="admin.php">Admin</a></li>
</ul>
<div>
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to the Jawa Junkyard. These ARE the droids you're looking for!</h1>
	</div>
	<form action="search_product.php" method="POST">
			Search products: <input type="text" name="search_terms" value="" />
			Search by: <select name="search-by" id="search-by">
				<option value="name">Name</option>
				<option value="id">ID</option>
				<option value="year">Year</option>
				<option value="price">Price</option>
			  </select>
			  <input type="submit" name="submit" value="Search" />
		</form>
    <p>
        <a href="reset-password.php">Reset Your Password</a>
        <a href="logout.php">Sign Out of Your Account</a>
	</p>
	<span>Cart===>	 <a href="view_basket.php">View your cart</a>.</span><br/><br/>
<form action="add_to_basket.php" method="POST">
<?php
//////////////////////
////////////////////
$username = "root";
$password = "mampba";


$conn = mysqli_connect('127.0.0.1:3306', $username, $password, "droids");
if (!$conn)
{
  die ("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM droids";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_assoc($result))
		echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Price: " . $row["price"]. " credits <input type=\"checkbox\" id=\"selection\" name=\"droid[]\" value=\"".$row["id"]."\"> <br />";
}
mysqli_close($conn);
//////////////////////////
////////////////////////
?>
<input type="submit" value="Add to basket">
<div class="row">
  <div class="column">
    <img src="droid_pics/BB-8.jpg" alt="BB-8" style="width:20%">
  	<img src="droid_pics/droideka.jpg" alt="droideka" style="width:20%">
</div>
  <div class="column">
    <img src="droid_pics/and_droid.jpg" alt="and droid" style="width:20%">
  </div>
</div>
</body>
</html>


    
