<?php
	
	//connecting db through db_conn.php
	require ("./db_conn.php");
	session_start();
	
	if(isset($_POST['changepwd'])){
		
		$oldpwd = $_POST['oldpwd'];
		$newpwd = $_POST['newpwd'];
		$compwd = $_POST['compwd'];
		$user = $_SESSION['user_ID'];
		
		//check for empty fields
		if(!empty($oldpwd) || !empty($newpwd) || !empty($compwd)){
			
			//check if new password and comfirm password match
			if($newpwd === $compwd){
				
				//get password from db
				$sql = "SELECT * FROM userbase WHERE user_ID = $user";
				$result = $conn->query($sql);
				$row2 = mysqli_fetch_assoc($result);
				
				//compare old password with db password
				if(password_verify($oldpwd, $row2['user_pwd'])){
					
					//hasing new pwd
					$hasnewpwd = password_hash($newpwd, PASSWORD_DEFAULT);
					
					//updates statement
					$sql2 = "UPDATE userbase SET user_pwd = '$hasnewpwd' WHERE $user = user_ID";
					
					//updates to db
					$send = mysqli_query($conn, $sql2) or die (mysqli_error($conn));
					
					if($send){
						echo '<script type="text/javascript"> 
								alert("Updated success."); 
								window.location.href = "./pageProfile.php";
							</script>';
					}
					else{
						echo '<script type="text/javascript"> 
								alert("Old password does not match."); 
								window.location.href = "./pageChangePWD.php";
							</script>';
					}
				}
				else{
					echo '<script type="text/javascript"> 
							alert("Old password does not match."); 
							window.location.href = "./pageChangePWD.php";
						</script>';
				}
			}
			else{
				echo '<script type="text/javascript"> 
						alert("New password and comfirm password does not match."); 
						window.location.href = "./pageChangePWD.php";
					</script>';
			}
		}
		else{
			echo '<script type="text/javascript"> 
					alert("Please fill in every fields."); 
					window.location.href = "./pageChangePWD.php";
				</script>';
		}
	}
?>