<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Order management</title>
    <link rel="stylesheet" href="rush.css">
</head>
<body>
<ul>
	<li><a class="active"  href="#droids">Droids</a></li>
	<li><a href="#search">Search</a></li>
	<li><a href="#cart">Cart</a></li>
	<li style="float:right"><a href="#logout">LogOut</a></li>
</ul>	
<h1>Order Management</h1><br />

<form action="delete_order.php" method="POST">
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
$sql = "SELECT username, adm FROM users WHERE username = '$user'";

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0)
{
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
	}
}
mysqli_close($conn);
if ($admin !== TRUE)
{
	header("location: welcome.php");
	exit;
}
$servername = "127.0.0.1:3306";
$username = "root";
$password = "mampba";
$dbname = "droids";
// Create connection
$conn = mysqli_connect('127.0.0.1:3306', $username, $password, "droids");
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$implosion = implode(":", $_SESSION["basket"]);
if (!mysqli_query($conn, $sql))
{
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
$conn = mysqli_connect('127.0.0.1:3306', $username, $password, "droids");
if (!$conn)
{
  die ("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM orders";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_assoc($result))
	{
		echo "Customer: " . $row["username"]. " - Contents: " . $row["contents"]. " <input type=\"checkbox\" id=\"selection\" name=\"del_order[]\" value=\"".$row["id"]."\"> <br /><br />";
		/*$products = explode($row["contents"]);
		$sql2="SELECT * FROM droids WHERE id IN (";
		foreach($products as $id => $value) 
		{ 
			$sql2.=$id.",";
		}
		$sql2 = substr($sql2, 0, -1).") ORDER BY name ASC"; 
		//echo "$sql<br />";
		$result = mysqli_query($conn, $sql2);
		//print_r ($result);
		//echo "<br />";
		if (mysqli_num_rows($result) > 0)
		{

	  // output data of each row
		  			//echo "Matchin row for $elem.<br />";
					while($row2 = mysqli_fetch_assoc($result))
					{
						foreach ($basket as $elem)
						{
						//echo "Trying to match ".$row["id"]." with ".$elem."<br />";
	//	echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Category: " . $row["cat"]. " - Price: " . $row["price"]. " credits\n";
							if($row["id"] === $elem) /// here you can determine what you are searching for
								echo "id: " . $row2["id"]. " - Name: " . $row2["name"]. " - Price: " . $row2["price"]. " credits <input type=\"checkbox\" id=\"selection\" name=\"basket_item[]\" value=\"".$row2["id"]."\"> <br />";
						//break ;
						}
					}
		}*/
	}
}
mysqli_close($conn);
?>

<input type="submit" value="Delete order">
</form>

</body></html>

