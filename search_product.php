<html><body>Search function.</body></html><br />

<?php

echo "<p>You searched for:<br />Search terms: \"".$_POST['search_terms'] ."\" by: ". $_POST["search-by"]."</p><br />";

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
$sql = "SELECT id, name, cat, price FROM droids";
$result = mysqli_query($conn, $sql);
//$opt = "cat";
//$optarg = "Tall";
if (mysqli_num_rows($result) > 0)
{
  // output data of each row
	while($row = mysqli_fetch_assoc($result))
	{
//	echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Category: " . $row["cat"]. " - Price: " . $row["price"]. " credits\n";
		if($row[$_POST['search-by']] === $_POST['search_terms']) /// here you can determine what you are searching for
			echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Category: " . $row["cat"]. " - Price: " . $row["price"]. " credits <br />";
	}
}
else
{
  echo "0 results\n";
}
//print_r($result);
mysqli_close($conn); // close connection.
}
else
	echo "POST if no workey <br />";
?>

