#!/usr/bin/php
<?php
$servername = "localhost";
$username = "root";
$password = "mampba";
$dbname = "droids";

// Create connection
$conn = mysqli_connect('127.0.0.1:3306', $username, $password, $dbname);
// Check connection
if (!$conn)
{
  die ("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id, name, cat, price FROM droids";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0)
{
  // output data of each row
  while($row = mysqli_fetch_assoc($result))
  {
    echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Category: " . $row["cat"]. " - Price: " . $row["price"]. " credits\n";
  }
}
else
{
  echo "0 results\n";
}

mysqli_close($conn); // close connection.
?>