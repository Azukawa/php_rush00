<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>User management</title>
    <link rel="stylesheet" href="rush.css">
</head>
<body>
<ul>
	<li><a class="active"  href="#droids">Droids</a></li>
	<li><a href="#search">Search</a></li>
	<li><a href="#cart">Cart</a></li>
	<li style="float:right"><a href="#logout">LogOut</a></li>
</ul>	
<h1>User Management</h1><br />

<form action="delete_user.php" method="POST">
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
$sql = "SELECT * FROM users";

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_assoc($result))
		echo "username: " . $row["username"]. " - Admin: " . $row["adm"]. " <input type=\"checkbox\" id=\"selection\" name=\"del_user[]\" value=\"".$row["username"]."\"> <br /><br />";
}
mysqli_close($conn);
?>

<input type="submit" value="Delete user">
</form>

</body></html>

