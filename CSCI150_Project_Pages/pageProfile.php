<?php
    include 'header.php';
   // adds the logo and the nav bar to the top of the page
   
	require ("./db_conn.php");
	
	$user = $_SESSION['user_ID'];
	$sql = "SELECT * FROM userbase WHERE $user=user_ID";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$userF = $row['user_first'];
	$userL = $row['user_last'];
	$userU = $row['user_name'];
	$userE = $row['user_email'];
?>

<!DOCTYPE HTML>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon-32x32.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./mainStyleSheet.css">
</head>
<body>
    <div class="mainHolder">
        <div class="profilePage">
			<div>
				<h1 style="text-align:center">User Profile</h1>
				<form>
					<fieldset disabled="disabled">
						<labeL>First name:</label>
						<input type="text" value="<?php echo $userF; ?>"></input>
						<labeL>Last name:</label>
						<input type="text" value="<?php echo $userL; ?>"></input>
						<labeL>User name:</label>
						<input type="text" value="<?php echo $userU; ?>"></input>
						<label>Email:</label>
						<input type="text" value="<?php echo $userE; ?>"></input>
						<button type="button">
							<a href="pageChangePWD.php">Change Password</a>
						</button>
					</fieldset>
						<label>Donated History:</label>
						<div>
							<?php
								$sql2 = "SELECT listing_title FROM listingbase WHERE user_ID=$user";
								$result2 = mysqli_query($conn, $sql2);
								if(mysqli_num_rows($result2)>0){
									while($row = mysqli_fetch_assoc($result2)){
										echo "<p>";
										echo $row['listing_title'];
										echo "</p>";
									}
								}else{
									echo 'Nothing';
								}
							?>
						</div>
				<form>
			</div>
        </div>
    </div>
</body>
</html>