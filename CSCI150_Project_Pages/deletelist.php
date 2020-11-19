<?php
require("db_conn.php");
include 'header.php';

if(isset($_POST['delete'])){
	if($conn->connect_error){
		echo "<tr align='center'> <td colspan='2'> Failed to connect to MySQL </td> </tr>";
	}
	if($id=$_SESSION["user_ID"]{
		$listing_ID =$_GET['listing_ID']
	// sql to delete a record
	$sql = "DELETE FROM listingbase WHERE listing_ID";
	}

	if ($conn->query($sql) === TRUE) {
	echo "Record deleted successfully";
	} 
	else {
	echo "Error deleting record: " . $conn->error;
	}
}

$conn->close();
?>