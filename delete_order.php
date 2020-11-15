<html><head>
    <meta charset="UTF-8">
    <title>Order(s) deleted!</title>
    <link rel="stylesheet" href="rush.css">
</head>
<body><ul>
	<li><a class="active"  href="#droids">Droids</a></li>
	<li><a href="#search">Search</a></li>
	<li><a href="#cart">Cart</a></li>
	<li style="float:right"><a href="#logout">LogOut</a></li>
</ul>
<h1>Order(s) deleted!</h1><br />



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
$del_order = $_POST['del_order'];
print_r($del_order);


foreach($del_order as $elem) 
{
	$sql="DELETE FROM orders WHERE id = '$elem'";
	if (mysqli_query($conn, $sql))
	{
		echo "<p>Record deleted successfully!</p>";
	}
	else
	{
		echo "Error deleting record: " . mysqli_error($conn);
	}
}


mysqli_close($conn);

?>

</form>
</body></html>
