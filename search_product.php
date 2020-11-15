<html><head>
    <meta charset="UTF-8">
    <title>Search results</title>
    <link rel="stylesheet" href="rush.css">
</head>
<body><ul>
	<li><a class="active"  href="#droids">Droids</a></li>
	<li><a href="#search">Search</a></li>
	<li><a href="#cart">Cart</a></li>
	<li style="float:right"><a href="#logout">LogOut</a></li>
</ul>
<h1>Search results</h1><br />


<form action="add_to_basket.php" method="POST">
<?php

echo "<h2>You searched for:</h2>Search terms: \"".$_POST['search_terms'] ."\" by: ". $_POST["search-by"]."</p><br />";

if ($_POST["submit"] === 'Search' && $_POST['search_terms'] && $_POST['search-by'])
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
}
?>

<input type="submit" value="Add to basket">
</form>
</body></html>