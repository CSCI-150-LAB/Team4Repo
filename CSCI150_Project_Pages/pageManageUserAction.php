<?php
    include 'header.php';
	require("./db_conn.php");
	
	$user;
	
	if(isset($_GET['ban'])){
		$user = $_GET['userID'];
		
		$sql = "UPDATE userbase SET user_ban = '1'  WHERE user_ID = $user";
		
		$send = mysqli_query($conn, $sql) or die(mysqli_error($conn));
		
		if($send){
			echo '<script type="text/javascript"> 
					alert("Ban user successed."); 
					window.location.href = "./pageManageUser.php";
				</script>';
		}
		else{
			echo '<script type="text/javascript"> 
					alert("Failed banning user."); 
					window.location.href = "./pageManageUser.php";
				</script>';
		}
	}
	
	if(isset($_GET['unban'])){
		$user = $_GET['userID'];
		
		$sql = "UPDATE userbase SET user_ban = '0'  WHERE user_ID = $user";
		
		$send = mysqli_query($conn, $sql) or die(mysqli_error($conn));
		
		if($send){
			echo '<script type="text/javascript"> 
					alert("Unban user successed."); 
					window.location.href = "./pageManageUser.php";
				</script>';
		}
		else{
			echo '<script type="text/javascript"> 
					alert("Failed unbanning user."); 
					window.location.href = "./pageManageUser.php";
				</script>';
		}
	}
	
	if(isset($_GET['adm'])){
		$user = $_GET['userID'];
		
		$sql = "UPDATE userbase SET user_role = 'admin'  WHERE user_ID = $user";
		
		$send = mysqli_query($conn, $sql) or die(mysqli_error($conn));
		
		if($send){
			echo '<script type="text/javascript"> 
					alert("Make user admin successed."); 
					window.location.href = "./pageManageUser.php";
				</script>';
		}
		else{
			echo '<script type="text/javascript"> 
					alert("Failed making user admin."); 
					window.location.href = "./pageManageUser.php";
				</script>';
		}
	}
	
	if(isset($_GET['unadm'])){
		$user = $_GET['userID'];
		
		$sql = "UPDATE userbase SET user_role = 'user'  WHERE user_ID = $user";
		
		$send = mysqli_query($conn, $sql) or die(mysqli_error($conn));
		
		if($send){
			echo '<script type="text/javascript"> 
					alert("Undo user admin successed."); 
					window.location.href = "./pageManageUser.php";
				</script>';
		}
		else{
			echo '<script type="text/javascript"> 
					alert("Failed undoing user admin."); 
					window.location.href = "./pageManageUser.php";
				</script>';
		}
	}
?>