<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Order confirmation</title>
    <link rel="stylesheet" href="rush.css">
</head>
<body>
<ul>
	<li><a class="active"  href="#droids">Droids</a></li>
	<li><a href="#search">Search</a></li>
	<li><a href="#cart">Cart</a></li>
	<li style="float:right"><a href="#logout">LogOut</a></li>
</ul>	
<h1>Order confirmation</h1><br />

<form action="delete_from_basket.php" method="POST">
<?php
session_start();
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
$order_user = $_SESSION["username"];
$sql = "INSERT INTO orders (username, contents) VALUES ('$order_user', '$implosion')";
if (mysqli_query($conn, $sql))
{
	echo "<p>Order completed successfully!</p>";
}
else
{
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
echo "<p>Order summary!</p>";
$basket = $_SESSION['basket'];
$total = 0;
$conn = mysqli_connect('127.0.0.1:3306', $username, $password, "droids");
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
		{
			echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Price: " . $row["price"]. " credits <br />";
			$total += $row["price"];
		}
	}
	}
	echo "<p>Total order amount: $total credits</p>";
}
mysqli_close($conn);
?>

<input type="submit" value="Delete from basket">
</form>
<form action="order_done.php" method="POST">
<input type="submit" value="OK">
</form>

</body></html>

