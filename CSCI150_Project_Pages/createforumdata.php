<?php
  
	//connecting db through db_conn.php
	require ("./db_conn.php");
	session_start();
	
	//assign result from createDonation.php to new variables
	//using $_POST[''] because of method="post"
	if(isset($_POST['submit'])){
		
		$itemselection = $_POST['itemselection'];
		$sub = htmlspecialchars($_POST['sub'], ENT_QUOTES);
		$myTextArea = htmlspecialchars($_POST['myTextArea'], ENT_QUOTES);
		$user = $_SESSION['user_ID'];
		//get the name of $image
		//$imageName = $_FILES['image']['name'];
			
		//get file tmp location
		//$imageTempLocation = $_FILES['image']['tmp_name'];
			
		//get date
		$date = date("m.d.y");
			
		//split name and extension
		//$imageExt = explode('.', $imageName);
			
		//get the extenion
		//$extenion = end($imageExt);
			
		//new name for image using uniqid; e.g. user.uniqid.extenion
		//$uniquePic = $user.".".uniqid("",true).".".$extenion;

		//image destination
		//$imageDest = 'images/'.$uniquePic;

		//move_uploaded_file($imageTempLocation, $imageDest);

		//insert to db
		$sql = "INSERT into post_base (user_ID, post_class, post_sub, post_body, post_date)
					values ('$user', '$itemselection', '$sub', '$myTextArea','$date')"; 
					
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