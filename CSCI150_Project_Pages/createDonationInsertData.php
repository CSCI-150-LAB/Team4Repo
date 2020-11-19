<?php
  
	//connecting db through db_conn.php
	require ("./db_conn.php");
	session_start();
	
	//assign result from createDonation.php to new variables
	//using $_POST[''] because of method="post"
	if(isset($_POST['submit'])){
		
		$itemselection = mysqli_real_escape_string($conn, $_POST['itemselection']);
		$title = mysqli_real_escape_string($conn, $_POST['title']);
		$myTextArea = mysqli_real_escape_string($conn, $_POST['myTextArea']);
		$image = $_FILES['image']; //temp_name from image array
		$imageErro = $_FILES['image']['error'];
		$user = $_SESSION['user_ID'];
		$status = "available";
		
		if(empty($itemselection) || empty($title) || empty($myTextArea) || $imageErro===1){
			echo '<script type="text/javascript"> 
				alert("Please fill in every fields."); 
				window.location.href = "./listDonationDir.php";
				</script>';
		
		}
		else{
			
			//get the name of $image
			$imageName = $_FILES['image']['name'];
			
			//get file tmp location
			$imageTempLocation = $_FILES['image']['tmp_name'];
			
			//get date
			$date = date("m.d.y");
			
			//split name and extension
			$imageExt = explode('.', $imageName);
			
			//get the extenion
			$extenion = end($imageExt);
			
			//new name for image using uniqid; e.g. user.uniqid.extenion
			$uniquePic = $user.".".uniqid("",true).".".$extenion;
			
			//image destination
			$imageDest = 'upload_images/'.$uniquePic;
			
			move_uploaded_file($imageTempLocation, $imageDest);
			
			//insert to db stmt
			$sql = "INSERT INTO listingbase (listing_itemtype, listing_title, listing_body, listing_imgname, user_ID, listing_date, listing_status)
						VALUES ('$itemselection', '$title', '$myTextArea', '$uniquePic', '$user', '$date', '$status')"; 
			
			//inserted to db
			$send = mysqli_query($conn, $sql) or die (mysqli_error($conn)); 
			
			echo '<script type="text/javascript"> 
					alert("Sumited successfully.");
					window.location.href = "./listDonationDir.php";
					</script>';
		}
	} 

?>