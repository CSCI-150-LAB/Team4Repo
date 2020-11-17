<?php
    include 'header.php';
	require("./db_conn.php");
?>
<body>
	<div class="mainHolder">
		<!-- createDonationInsertData.php is what php file you want to send the login into to -->
        <!-- method="post" hides the sensitive data in th HTTP transaction -->
		<?php
			if ($_SESSION['role'] == 'admin') {
                    $sql = "SELECT * FROM reports_base LIMIT 3";
					$result = mysqli_query($conn, $sql);
					if(mysqli_num_rows($result)>0){
						while($row = mysqli_fetch_assoc($result)){
							
							$posterID = $row['report_PosterID'];
							$fetchUser = "SELECT * FROM userbase WHERE $posterID = user_ID";
							$fectchUserResult = mysqli_query($conn, $fetchUser);
							$fectchUserRow = mysqli_fetch_assoc($fectchUserResult);
							
							echo '<div>';
							echo '<form action="pageReportsAction.php" method="get">';
							echo 'Posted by: '.$fectchUserRow['user_name'];
							echo '<br>';
							echo 'Post ID: '.$row['report_PostID'];
							echo '<br>';
							echo '<textarea rows="10" cols="50" readonly>';
							echo $row['report_Reasons'];
							echo '</textarea>';
							echo '<input type="submit" name="deletePost" value="Delete Post"/>';
							echo '</form>';
							echo '</div>';
							echo '<br>';
						}
					}
                }
		?>
	</div>
</body>
