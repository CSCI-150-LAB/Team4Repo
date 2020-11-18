<?php
    include 'header.php';
	require("./db_conn.php");
?>
<body>
	<div class="mainHolder">
		<!-- createDonationInsertData.php is what php file you want to send the login into to -->
        <!-- method="post" hides the sensitive data in th HTTP transaction -->
		<?php
			//check for admin before display content
			if ($_SESSION['role'] == 'admin') {
				
					//get info from report db
                    $sql = "SELECT * FROM userbase";
					$result = mysqli_query($conn, $sql);
					if(mysqli_num_rows($result)>0){
						while($row = mysqli_fetch_assoc($result)){

							
							//dynamic echo forms with result from report db
							echo '<div>';
							echo '<form action="pageManageUserAction.php" method="get">';
							echo 'First Name - '.$row['user_first'].'<br>';
							echo ' Last Name - '.$row['user_last'].'<br>';
							echo ' Email - '.$row['user_email'].'<br>';
							echo ' User Status - '.$row['user_role'].'<br>';
							echo ' Ban Status - '.$row['user_ban'].'<br>';
							echo '<input type="hidden" name="userID" value="'.htmlspecialchars($row['user_ID']).'"/>';
							echo '<input type="submit" name="ban" value="Ban User"/>';
							echo '<br>';
							echo '<input type="submit" name="unban" value="Unban User"/>';
							echo '<br>';
							echo '<input type="submit" name="adm" value="Make User Admin"/>';
							echo '<br>';
							echo '<input type="submit" name="unadm" value="Undo User Admin"/>';
							echo '</form>';
							echo '</div>';
							echo '<br>';
						}
					}else{
						//if there is nothing to display
						echo '<p align="center">There is no report.</p>';
					}
                }
		?>
	</div>
</body>
