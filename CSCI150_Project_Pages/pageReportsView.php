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
                    $sql = "SELECT * FROM reports_base WHERE reports_Delete = '0'";
					$result = mysqli_query($conn, $sql);
					if(mysqli_num_rows($result)>0){
						while($row = mysqli_fetch_assoc($result)){
							
							//get user infor from user db
							$posterID = $row['report_PosterID'];
							$fetchUser = "SELECT * FROM userbase WHERE $posterID = user_ID";
							$fectchUserResult = mysqli_query($conn, $fetchUser);
							$fectchUserRow = mysqli_fetch_assoc($fectchUserResult);
							
							//dynamic echo forms with result from report db
							echo '<div>';
							echo '<form action="pageReportsAction.php" method="get">';
							echo 'Posted by: '.$fectchUserRow['user_name'];
							echo '<input type="hidden" name="reportID" value="'.htmlspecialchars($row['report_ID']).'"/>';
							echo '<br>';
							echo 'Poster ID: '.$fectchUserRow['user_ID'];
							echo '<input type="hidden" name="posterId" value="'.htmlspecialchars($fectchUserRow['user_ID']).'"/>';
							echo '<br>';
							echo 'Post ID: '.$row['report_PostID'];
							echo '<input type="hidden" name="postId" value="'.htmlspecialchars($row['report_PostID']).'"/>';
							echo '<br>';
							echo '<textarea rows="10" cols="50" readonly>';
							echo $row['report_Reasons'];
							echo '</textarea>';
							echo '<input type="submit" name="hidePost" value="Hide Post"/>';
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
