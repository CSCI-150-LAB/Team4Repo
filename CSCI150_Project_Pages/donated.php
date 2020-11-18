<?php
    include 'header.php';
	require("./db_conn.php");
	
	if(isset($_GET['submit'])){
		$postID = $_GET['postID'];
		
		$sql = "UPDATE listingbase SET listing_status = 'unavailable'  WHERE listing_ID = $postID";
		
		$send = mysqli_query($conn, $sql) or die(mysqli_error($conn));
		
		if($send){
			echo '<script type="text/javascript"> 
					alert("Changing post status to donated successed."); 
					window.location.href = "./listDonationDir.php";
				</script>';
		}
		else{
			echo '<script type="text/javascript"> 
					alert("Changing post status to donated failed."); 
					window.location.href = "./listDonationDir.php";
				</script>';
		}
	}
?>