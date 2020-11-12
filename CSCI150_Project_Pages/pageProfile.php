<?php
	include 'header.php';   
	require ("./db_conn.php");
	if(isset($_GET['userID'])){
		// if a userID is present in url generate based on that
		$user = $_GET['userID'];
		$sql = "SELECT * FROM userbase WHERE $user=user_ID";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		$userF = $row['user_first'];
		$userL = $row['user_last'];
		$userU = $row['user_name'];
		$userE = $row['user_email'];
		$flagOwnPage = "var flagOwnPage = false;";
	}
	else {
		// otherwise fille template on logged in info
		$user = $_SESSION['user_ID'];
		$sql = "SELECT * FROM userbase WHERE $user=user_ID";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		$userF = $row['user_first'];
		$userL = $row['user_last'];
		$userU = $row['user_name'];
		$userE = $row['user_email'];
		$flagOwnPage = "var flagOwnPage = true;";
	}
?>
<body>
    <div class="mainHolder">
        <div class="profilePage">
			<div>
				<div id="userInfo">
					<h1 style="text-align:center">User Profile</h1>
					<labeL>First name:</label>
					<input type="text" value="<?php echo $userF; ?>" readonly></input>
					<labeL>Last name:</label>
					<input type="text" value="<?php echo $userL; ?>" readonly></input>
					<labeL>User name:</label>
					<input type="text" value="<?php echo $userU; ?>" readonly></input>
					<label>Email:</label>
					<input type="text" value="<?php echo $userE; ?>" readonly></input>
					<script type="text/javascript">
						<?php
							echo $flagOwnPage;
						?>
						if(flagOwnPage){
							var changePass = document.createElement("a");
							changePass.setAttribute("href", "pageChangePWD.php");
							changePass.innerHTML = "Change Password";
							document.getElementById("userInfo").appendChild(changePass);
						}
					</script>
				</div>
				<label>Donated History:</label>
				<div>
					<?php
						$sql2 = "SELECT listing_ID, listing_title, listing_body FROM listingbase WHERE user_ID=$user";
						$result2 = mysqli_query($conn, $sql2);
						if(mysqli_num_rows($result2)>0){
							while($row = mysqli_fetch_assoc($result2)){
								echo "<a href='./exListing1.php?listID=" . $row['listing_ID'] . "'>";
								echo $row['listing_title'];
								echo "</a>";
								echo "<input type='text' id='shortEntry' value=" . $row['listing_body'] . " readonly>";
								echo "</input>";
							}
						}
						else{
							echo 'Nothing';
						}
					?>
				</div>
			</div>
        </div>
    </div>
</body>
</html>