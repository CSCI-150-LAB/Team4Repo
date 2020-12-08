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
					echo '<h1>Manage all users</h1>';
					//get info from report db
                    $sql = "SELECT * FROM userbase";
					$result = mysqli_query($conn, $sql);
					if(mysqli_num_rows($result)>0){
						echo '<div width:100%;>';
						while($row = mysqli_fetch_assoc($result)){

							//dynamic echo forms with result from report db
							echo '<div class="adminDiv">';
							echo '<form action="pageManageUserAction.php" method="get" class="adminManageUserForm">';
							echo 'First Name - '.$row['user_first'].'<br>';
							echo ' Last Name - '.$row['user_last'].'<br>';
							echo ' Email - '.$row['user_email'].'<br>';
							echo ' User Status - '.$row['user_role'].'<br>';
							echo ' Ban Status - '.$row['user_ban'].'<br>';
							echo '<input type="hidden" name="userID" value="'.htmlspecialchars($row['user_ID']).'"/>';
							echo '<input type="submit" name="ban" class="adminButton" value="Ban User" style="height:2em;"/>';
							echo '<input type="submit" name="unban" class="adminButton" value="Unban User" style="height:2em;"/>';
							echo '<input type="submit" name="adm" class="adminButton" value="Make User Admin" style="height:2em;"/>';
							echo '<input type="submit" name="unadm" class="adminButton" value="Undo User Admin" style="height:2em;"/>';
							echo '</form>';
							echo '</div>';
						}
						echo '</div>';
					}else{
						//if there is nothing to display
						echo '<p align="center">There is no report.</p>';
					}
                }
		?>
	</div>
</body>
