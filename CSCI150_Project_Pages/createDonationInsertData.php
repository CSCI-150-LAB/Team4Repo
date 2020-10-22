<?php
  
	//connecting db through db_conn.php
	require ("./db_conn.php");
	include session_start();
	
	//assign result from createDonation.php to new variables
	//using $_POST[''] because of method="post"
	if(isset($_POST['submit'])){
		
		$itemselection = $_POST['itemselection'];
		$title = $_POST['title'];
		$myTextArea = $_POST['myTextArea'];
		$image = $_FILES['image']; //temp_name from image array
		$user = $_SESSION['user_ID'];
		
		//get the name of $image
		$imageName = $_FILES['image']['name'];
		
		//get file tmp location
		$imageTempLocation = $_FILES['image']['tmp_name'];
		
		//get date
		$date = getdate();
		
		//parse date into day.month.year
		$today = $date[mday].".".$date[month].".".$date[year];
		
		//split name and extension
		$imageExt = explode('.', $imageName);
		
		//get the extenion
		$extenion = end($imageExt);
		
		//new name for image
		$uniquePic = $user.".".$today.".".$extenion;
		
		//image destination
		$imageDest = 'upload_images/'.$uniquePic;
		
		move_uploaded_file($imageTempLocation, $imageDest);
		
		//insert to db
		$sql = "INSERT into listingbase (listing_itemtype, listing_title, listing_body, listing_imgname, listing_poster, listing_date)
					values ('$itemselection', '$title', '$myTextArea', '$uniquePic', '$user', '$today')"; 
					
		$send = mysqli_query($conn, $sql) or die (mysqli_error($conn)); 
		
	
		
		//check for success, if true return client to listDonationDir.php
		if($send){
			echo "Success";
			header('Location: ./listDonationDir.php');
		}
		
		//echo error and return to createDonationInsertData.php
		else{
			echo "Submit Error";
			header('Location: ./createDonationInsertData.php');
		}
		
	} 

?>