<?php
    
	require("./db_conn.php");
	session_start();
	
	if(isset($_GET['hidePost'])){
		$posterID = $_GET['posterId'];
		$postID = $_GET['postId'];
		$reportID = $_GET['reportID'];
		
		//stm for listing db update
		$sql = "UPDATE listingbase SET listing_delete = '1' WHERE $posterID = user_ID AND $postID = listing_ID";
		
		//stm for reports_base update 
		$sql2 = "UPDATE reports_base SET reports_Delete = '1' WHERE $reportID = report_ID";
		
		//send update stm to listing db
		$send = mysqli_query($conn, $sql) or die(mysqli_error($conn));
		
		//send update stm to report db
		$send2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
		
		//check for success and failure
		if($send and $send2){
			echo '<script type="text/javascript"> 
					alert("Hide post successed."); 
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

