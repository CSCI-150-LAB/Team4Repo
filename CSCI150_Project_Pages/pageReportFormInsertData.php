<?php
    include 'header.php';
	
	//require connection for this php file
	require("./db_conn.php");
	
	//check for submition using isset
	if(isset($_GET['submit'])){
		
		//check for empty field
		if(!empty($_GET['myTextArea'])){
	
			//using "get" method and assign result to new variables
			$reasons = $_GET['myTextArea'];
			$userID = $_GET['userID'];
			$listID = $_GET['listID'];
			
			//stm for database mysql
			$sql = "INSERT INTO reports_base (report_PosterID, report_PostID, report_Reasons)
						VALUES ('$userID','$listID','$reasons')";
			
			//query the stm with $conn(connection to db) or failed msg 
			$send = mysqli_query($conn, $sql) or die(mysqli_error($conn));
			
			//echo javascript alert of success submition
			echo '<script type="text/javascript"> 
				alert("Submited report.");
				window.location.href = "./listDonationDir.php";
				</script>';
		}
		else{
			//echo back using javascript alert
			echo '<script type="text/javascript"> 
				alert("Please fill in the reason."); 
				window.location.href = "./listDonationDir.php";
				</script>';
		}
		
	}
?>
