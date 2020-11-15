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
<li><a href="login.php">Login</a></li>
	<li><a href="landing_page.php">Shop</a></li>
	<li><a href="register.php">Register</a></li>
	<li><a href="view_basket.php">Basket</a></li>
	<li style="float:right"><a href="logout.php">LogOut</a></li>
	<li class="active" style="float:right"><a href="admin.php">Admin</a></li>
</ul>	
<h1>Admin</h1><br />
<p>Welcome to the Admin page, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>!</p>

<p><a href="manage_users.php">Delete users</a></p>
<p><a href="registration.php">Add users (registers new user)</a></p>
<p><a href="view_orders.php">View orders</a></p>

</body></html>

