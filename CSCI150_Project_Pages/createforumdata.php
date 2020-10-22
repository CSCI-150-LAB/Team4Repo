<?php
  
	//connecting db through db_conn.php
	require ("./db_conn.php");
	include session_start();
	
	//assign result from createDonation.php to new variables
	//using $_POST[''] because of method="post"
	if(isset($_POST['post'])){
		
		$itemselection = $_POST['itemselection'];
		$sub = $_POST['sub'];
		$myTextArea = $_POST['myTextArea'];
		$user = $_SESSION['user_ID'];
		
		//get date
		$date = getdate();
		
		
		$today = $date[month]."/".$date[mday]."/".$date[year];
		
		//insert to db
		$sql = "INSERT into post_base (post_class, post_sub, post_body, post_date)
					values ('$itemselection', '$sub', '$myTextArea','$user', '$today')"; 
					
		$send = mysqli_query($conn, $sql) or die (mysqli_error($conn)); 
		
		//check for success, if true return client to pageForum.php
		if($send){
			echo "Success";
			header('Location: ./pageForum.php');
		}
		
		//echo error and return to createDonationInsertData.php
		else{
			echo "Submit Error";
			header('Location: ./Create Forum.php');
		}
	}
?>