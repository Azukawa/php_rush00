<?php
session_start();

$username = "root";
$password = "mampba";
$dbname = "droids";

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
{
    header("location: login.php");
    exit;
}
$conn = mysqli_connect('127.0.0.1:3306', $username, $password, $dbname);
if (!$conn)
{
  die ("Connection failed: " . mysqli_connect_error());
}
$user = $_SESSION["username"];
$admin = FALSE;
// Prepare a select statement
$sql = "SELECT username, adm FROM users WHERE username = '$user'";
echo $sql."<br />";
$result = mysqli_query($conn, $sql);
//print_r ($result);
echo "<br />";
if (mysqli_num_rows($result) > 0)
{
  // output data of each row
	while($row = mysqli_fetch_assoc($result))
	{
		echo "username: " . $row["username"]. " - Admin: " . $row["adm"]. " <br />";
		if ($row["adm"] === "yes")
		{
			$admin = TRUE;
			echo "User is admin.<br />";
		}
		else
			echo "User is NOT admin.<br />";
		//echo "Rows are more than zero.<br />";
		/*if($row["username"] === $user) /// here you can determine what you are searching for
			echo "username: " . $row["username"]. " - Admin: " . $row["adm"]. " <br />";*/
//	echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Category: " . $row["cat"]. " - Price: " . $row["price"]. " credits\n";
		//print_r($row["admin"]);
		//echo "admin access: " . $row["admin"]." <br />";
	}
}
if ($admin !== TRUE)
{
	header("location: welcome.php");
	exit;
}
/*if ($row["admin"] !== 1)
{
	header("location: welcome.php");
	exit;
}*/
//echo $sql."\n";

/**/


/*

$conn = mysqli_connect('127.0.0.1:3306', $username, $password, $dbname);

if (!$conn)
{
  die ("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT id, name, cat, price FROM droids";
$result = mysqli_query($conn, $sql);
//$opt = "cat";
//$optarg = "Tall";
if (mysqli_num_rows($result) > 0)
{
  // output data of each row
  $i = 0;
	while($row = mysqli_fetch_assoc($result))
	{
//	echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Category: " . $row["cat"]. " - Price: " . $row["price"]. " credits\n";
		if($row[$_POST['search-by']] === $_POST['search_terms']) /// here you can determine what you are searching for
			echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Category: " . $row["cat"]. " - Price: " . $row["price"]. " credits <input type=\"checkbox\" id=\"selection\" name=\"droid[]\" value=\"".$row["id"]."\"> <br />";
	}
}
else
{
  echo "0 results\n";
}
//print_r($result);
mysqli_close($conn); // close connection.

*/

/*Admin section: On this section, users with enough privileges
will be able to manage the content of the website, for example
view the orders - add, modify and remove articles - organize
categories - manage the users, etc. You will have to think of a
way to give this exclusive access to some users.*/

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

<p><a href="manage_users.php">Add users</a></p>
<p><a href="manage_products.php">Add products</a></p>

</body></html>

