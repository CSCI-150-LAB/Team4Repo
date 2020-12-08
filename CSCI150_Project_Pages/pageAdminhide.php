<?php
    include 'header.php';
	require("./db_conn.php");
	
	if(isset($_GET['submit'])){
		$postID = $_GET['postID'];
		
		$sql = "UPDATE listingbase SET listing_status = 'unavailable', listing_delete = '1'  WHERE listing_ID = $postID";
		
		$send = mysqli_query($conn, $sql) or die(mysqli_error($conn));
		
		$sql2 = "UPDATE reports_base SET reports_Delete = '1' WHERE report_PostID = $postID";
		
		$send2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
		
		if($send and $send2){
			echo '<script type="text/javascript"> 
					alert("Hide successed."); 
					window.location.href = "./pageReportsView.php";
				</script>';
		}
		else{
			echo '<script type="text/javascript"> 
					alert("Hide post failed."); 
					window.location.href = "./pageReportsView.php";
				</script>';
		}
	}
?>