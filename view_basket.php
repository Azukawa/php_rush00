<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Basket</title>
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
<h1>Basket</h1><br />

<form action="delete_from_basket.php" method="POST">
<?php
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
    //$query=mysql_query($sql); 
	//echo "$sql<br />";
	$result = mysqli_query($conn, $sql);
	//print_r ($result);
	//echo "<br />";
	if (mysqli_num_rows($result) > 0)
	{
			
	  // output data of each row
	  			//echo "Matchin row for $elem.<br />";
				while($row = mysqli_fetch_assoc($result))
				{
					foreach ($basket as $elem)
					{
						//echo "Trying to match ".$row["id"]." with ".$elem."<br />";
	//	echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Category: " . $row["cat"]. " - Price: " . $row["price"]. " credits\n";
						if($row["id"] === $elem) /// here you can determine what you are searching for
							echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Price: " . $row["price"]. " credits <input type=\"checkbox\" id=\"selection\" name=\"basket_item[]\" value=\"".$row["id"]."\"> <br />";
						//break ;
					}
				}
	}
	//print_r($_SESSION['basket']);
	/*foreach ($_SESSION['basket'] as $elem)
	{
		echo "$elem<input type=\"checkbox\" id=\"selection\" name=\"basket_item[]\" value=\"".$elem."\"> <br /><br />";
	}*/
	echo "<p>Good shopping!</p><br />";
}
else
	echo "No basket found! Get shopping, friend!<br />";

/*

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
//	echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Category: " . $row["cat"]. " - Price: " . $row["price"]. " credits\n";
		if($row[$_POST['search-by']] === $_POST['search_terms']) /// here you can determine what you are searching for
			echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Price: " . $row["price"]. " credits <input type=\"checkbox\" id=\"selection\" name=\"droid[]\" value=\"".$row["id"]."\"> <br />";
	}
}
else
{
  echo "0 results\n";
}
//print_r($result);
mysqli_close($conn); // close connection.


*/



?>

<input type="submit" value="Delete from basket">
</form>
<form action="validate_basket.php" method="POST">
<input type="submit" value="Validate basket">
</form>

</body></html>

