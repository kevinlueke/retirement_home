<?php
$dbServerName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "retirement";

// Create Connection
$conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);

// Check Connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected Succesfully";
?>
