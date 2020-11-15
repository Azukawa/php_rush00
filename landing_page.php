<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
{
    header("location: welcome.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Jawa Junkyard & Droids</title>
			<link rel="stylesheet" href="rush.css">
	</head>
	<body>
	<ul>
	<li><a href="login.php">Login</a></li>
	<li><a class="active "href="landing_page.php">Shop</a></li>
	<li><a href="register.php">Register</a></li>
	<li><a href="view_basket.php">Basket</a></li>
	<li style="float:right"><a href="logout.php">LogOut</a></li>
	</ul>
		<span>Already have an account? <a href="login.php">Login here</a>.</span>
		<span>Don't have an account? <a href="register.php">Sign up now</a>.</span>
		<form action="search_product.php" method="POST">
			Search products: <input type="text" name="search_terms" value="" />
			Search by: <select name="search-by" id="search-by">
				<option value="name">Name</option>
				<option value="id">ID</option>
				<option value="price">Price</option>
			  </select>
			  <input type="submit" name="submit" value="Search" />
<form action="add_to_basket.php" method="POST">
<br/><br/>
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
<div class="row">
  <div class="column">
    <img src="droid_pics/BB-8.jpg" alt="BB-8" style="width:20%">
  	<img src="droid_pics/droideka.jpg" alt="droideka" style="width:20%">
</div>
  <div class="column">
    <img src="droid_pics/and_droid.jpg" alt="and droid" style="width:20%">
  </div>
<input type="submit" value="Add to basket">
		</form>
</body></html>


