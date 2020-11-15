<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Purchase confirmation</title>
    <link rel="stylesheet" href="rush.css">
</head>
<body>
<ul>
	<li><a href="login.php">Login</a></li>
	<li><a href="landing_page.php">Shop</a></li>
	<li><a href="register.php">Register</a></li>
	<li><a class="active" href="view_basket.php">Basket</a></li>
	<li style="float:right"><a href="logout.php">LogOut</a></li>
</ul>	
<h1>Purchase confirmation</h1><br />
IS ANYTHING HAPPENING in the HTML?!

<form action="delete_from_basket.php" method="POST">
<?php
session_start();
echo "IS ANYTHING HAPPENING?!<br />";
print_r($_SESSION["basket"]);
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
else
	echo("Connection worked.<br />");

$implosion = implode(":", $_SESSION["basket"]);
echo "implosion = ".$implosion."<br />";
$order_user = $_SESSION["username"];
$sql = "INSERT INTO orders (username, contents) VALUES ('$order_user', '$implosion')";

echo "Preparing to <br />";
if (mysqli_query($conn, $sql))
{
	echo "<p>Order completed successfully!</p>";
}
else
{
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
$conn = mysqli_connect('127.0.0.1:3306', $username, $password, $dbname);
if (!$conn)
{
  die ("Connection failed: " . mysqli_connect_error());
}
$sql="SELECT * FROM droids WHERE id IN ("; 
foreach($_SESSION['basket'] as $id => $value) 
{ 
	$sql.=$id.",";
}
$sql = substr($sql, 0, -1).") ORDER BY name ASC"; 
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0)
{
  // output data of each row
	while($row = mysqli_fetch_assoc($result))
	{
	foreach ($basket as $elem)
	{
//	echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Category: " . $row["cat"]. " - Price: " . $row["price"]. " credits\n";
		if($row["id"] === $elem) /// here you can determine what you are searching for
			echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Price: " . $row["price"]. " credits <input type=\"checkbox\" id=\"selection\" name=\"basket_item[]\" value=\"".$row["id"]."\"> <br />";
	}
	}
}
mysqli_close($conn);
/*

INSERT INTO orders (username, contents, email)
VALUES ($_SESSION["username"], implode(":", $_SESSION["basket"]))


session_start();
echo "<p>Product(s) in to cart:</p>";
//print_r($_SESSION['basket']);
if (isset($_SESSION['basket'])) //check session var
{
	$basket = $_SESSION['basket'];
	$username = "root";
	$password = "mampba";
	$dbname = "droids";
	$conn = mysqli_connect('127.0.0.1:3306', $username, $password, $dbname);

	if (!$conn)
	{
	  die ("Connection failed: " . mysqli_connect_error());
	}
	$sql="SELECT * FROM droids WHERE id IN ("; 
	foreach($_SESSION['basket'] as $id => $value) 
	{ 
		$sql.=$id.",";
	}
	$sql = substr($sql, 0, -1).") ORDER BY name ASC"; 
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0)
	{
			
	  // output data of each row
				while($row = mysqli_fetch_assoc($result))
				{
					foreach ($basket as $elem)
					{
	//	echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Category: " . $row["cat"]. " - Price: " . $row["price"]. " credits\n";
						if($row["id"] === $elem) /// here you can determine what you are searching for
							echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Price: " . $row["price"]. " credits <input type=\"checkbox\" id=\"selection\" name=\"basket_item[]\" value=\"".$row["id"]."\"> <br />";
						//break ;
					}
				}
	}
	echo "<p>Good shopping!</p><br />";
}
else
	echo "No basket found! Get shopping, friend!<br />";
*/
?>

<input type="submit" value="Delete from basket">
</form>
<form action="validate_basket.php" method="POST">
<input type="submit" value="Validate basket">
</form>

</body></html>

