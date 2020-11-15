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
	<li><a href="landing_page.php">Shop</a></li>
	<li><a href="register.php">Register</a></li>
	<li><a href="view_basket.php">Basket</a></li>
	<li style="float:right"><a href="logout.php">LogOut</a></li>
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

<?php
//////////////////////
////////////////////
echo "XXXXX";
print_r($row['name']);
//echo "<h2>You searched for:</h2>Search terms: \"".$_POST['search_terms'] ."\" by: ". $_POST["search-by"]."</p><br />";

//if ($_POST["submit"] === 'Search' && $_POST['search_terms'] && $_POST['search-by'])
{
	//$_POST['search terms'] = string searched for
//$servername = "localhost"; useless crap.
//echo "In search function if <br />";
$username = "root";
$password = "mampba";
$dbname = "droids";

// Create connection
$conn = mysqli_connect('127.0.0.1:3306', $username, $password, $dbname);

if (!$conn)
{
  die ("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT id, name, year, price FROM droids";
//echo $sql."<br />";
$result = mysqli_query($conn, $sql);
//print_r ($result);
//$opt = "cat";
//$optarg = "Tall";
if (mysqli_num_rows($result) > 0)
{
  // output data of each row
  $i = 0;
	while($row = mysqli_fetch_assoc($result))
	{
	print_r($result[$row]);
//	echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Category: " . $row["cat"]. " - Price: " . $row["price"]. " credits\n";
	//	if($row[$_POST['search-by']] === $_POST['search_terms']) /// here you can determine what you are searching for
	//	echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Price: " . $row["price"]. " credits <input type=\"checkbox\" id=\"selection\" name=\"droid[]\" value=\"".$row["id"]."\"> <br />";
	}
}
else
{
  echo "0 results\n";
}
//print_r($result);
mysqli_close($conn); // close connection.
}
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
</div>
</body>
</html>


    
