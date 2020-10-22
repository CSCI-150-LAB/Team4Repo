<?php
  
	//connecting db through db_conn.php
	require ("./db_conn.php");
	session_start();
	
	//assign result from createDonation.php to new variables
	//using $_POST[''] because of method="post"
	if(isset($_POST['submit'])){
		
		$itemselection = $_POST['itemselection'];
		$sub = $_POST['sub'];
		$myTextArea = $_POST['myTextArea'];
		$user = $_SESSION['user_ID'];
		
		//get date
		$date = getdate();
		
		
		$today = $date[month]."/".$date[mday]."/".$date[year];
		

		//insert to db
		$sql = "INSERT into post_base (post_ID, post_class, post_sub, post_body, post_date, user_ID)
					values ('$user', '$itemselection', '$sub', '$myTextArea','$today')"; 
					
		$send = mysqli_query($conn, $sql) or die (mysqli_error($conn)); 
		
		//check for success, if true return client to pageForum.php
		if($send){
			echo "Success";
			header('Location: ./pageForum.php');
		}
		
		//echo error and return to createForum.php
		else{
			echo "Submit Error";
			header('Location: ./createForum.php');
		}
	}
?>