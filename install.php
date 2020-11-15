<?php
$conn = mysqli_connect('127.0.0.1:3306', 'root', '' , 'dump');
 
$query = '';
$sqlScript = file('droids_all.sql');
foreach ($sqlScript as $line) {
  
  $startWith = substr(trim($line), 0 ,2);
  $endWith = substr(trim($line), -1 ,1);
  
  if (empty($line) || $startWith == '--' || $startWith == '/*' || $startWith == '//') {
    continue;
  }
    $query = $query . $line;
  if ($endWith == ';') {
    mysqli_query($conn,$query);
  }
}
echo '<div>SQL file imported successfully</div>';
?>