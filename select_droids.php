#!/usr/bin/php
<?php
function search($opt, $optarg)
{



$servername = "localhost";
$username = "root";
$password = "meitsirox";
$dbname = "droids";

// Create connection
$conn = mysqli_connect('127.0.0.1:3306', $username, $password, $dbname);
// Check connection


//echo "choose option category: id, name, cat, price";
//	while($bool == 0)
//	{
//		$arg = fgets(stdin);
//		if ($arg == "id" || $arg == "name" || $arg == "cat" || $arg == "price")
//		{	
//			$bool++;
//			$arg1 = fgets(stdin);
//		}
//		else
//			echo "we dont have these categories available.";
//	}
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
	  if($row[$arg] >= $arg1) /// here you can determine what you are searching for
		  print_r($row);
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
