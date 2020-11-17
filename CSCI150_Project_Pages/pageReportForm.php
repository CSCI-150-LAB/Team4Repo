<?php
    include 'header.php';
	
	//require connection to database for this php file
	require("./db_conn.php");
	
	//check for submition using isset
	if(isset($_GET['listID'])){
		
		//result from "get" method and assigned to a new variable
		$listID = $_GET['listID'];
		
		//stm for listing db
		$sql = "SELECT * FROM listingbase WHERE listing_id = $listID";
		
		//assign $result to the return result from query stm($sql) with $conn(connection)
		$result = mysqli_fetch_assoc(mysqli_query($conn, $sql));
		
		//assign new variables to assoc query result
		$userID = $result['user_ID'];
		$title = $result['listing_title'];
		
		//stm for userbase db
		$sql2 = "SELECT user_name FROM userbase WHERE user_ID = $userID";
		
		//assign $result2 to the return result from query stm($sql2)
		$result2 = mysqli_fetch_assoc(mysqli_query($conn, $sql2));
		
		//assign new variable to assoc $result2
		$poster = $result2['user_name'];
	}
?>
<body>
	<div class="mainHolder">
		<!-- createDonationInsertData.php is what php file you want to send the login into to -->
        <!-- method="post" hides the sensitive data in th HTTP transaction -->
		<form action="./pageReportFormInsertData.php" method="get"> <!--send to database-->
			<div>
				<input type="hidden" name="listID" value="<?php echo $listID; ?>" readonly></input>
				<input type="hidden" name="userID" value="<?php echo $userID; ?>" readonly></input>
			</div>
			<div>
				<label>Reporting User:</label>
				<input type="text" name="poster" value="<?php echo $poster; ?>" readonly></input>
			</div>
			<div>
				<label>Post title:</label>
				<input type="text" name="posttitle" value="<?php echo $title; ?>" readonly></input>
			</div>
			<div>
				<textarea name="myTextArea" maxlength="300" rows="30" cols="50" placeholder="Please explain the reason and give as much details as possible." required></textarea>
			</div>
			<div>
				<input type="submit" name="submit" value="Submit report">
			</div>
		</form>
	</div>
</body>
