<?php
// This file is used for the connection with the database on Azure

$servername = "donationboardmysql.mysql.database.azure.com";
$username = "user@donationboardmysql";

// replace with db password
$password = "!";
$db_name = "mydb";

// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>