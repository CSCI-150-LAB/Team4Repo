<?php
// This file is used for the connection with the database on Azure

$servername = "donationboardmysql.mysql.database.azure.com";
$username = "user@donationboardmysql";

// replace with db password
$password = "!";

// name of database we created using MySQL
$db_name = "mydb";

// Create connection with database
$conn = new mysqli($servername, $username, $password, $db_name);

// Check connection, will return blank page with error code if any
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>