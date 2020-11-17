<?php

    // Checks for user to hit login button on pageLogin.php
    if(isset($_POST['login'])){
        // connection to database
        require ("./db_conn.php");
        $email = $_POST['email'];
        $pass = $_POST['pwd'];

        // $conn->query($sql) SELECT query in database to check user info
        $sql = "SELECT * FROM userbase WHERE user_email ='$email' AND user_ban = '0'";// AND user_pwd='$hashedPass' LIMIT 1";
        $result = $conn->query($sql);
		
		//check if query return any results, if not user was banned
		if(mysqli_num_rows($result)==0){	
			echo '<script type ="text/javascript">
				alert("Your account is banned.");
				window.location.href = "./pageLogin.php";
				</script>';
		}
		
		//assign $row return values from $result into associate array
        $row = mysqli_fetch_assoc($result);
		
		
        //uses fetch_assoc and if $row returns an array then continue because there is data
        if (is_array($row)){
			
            //decrypts password hash and checks it according Bcrypt used in sessionSignup.php
            if(password_verify($pass, $row['user_pwd'])){
                session_start();
                $_SESSION['user_ID'] = $row['user_ID'];
                $_SESSION['firstName'] = $row['user_first'];
                $_SESSION['lastName'] = $row['user_last'];
                $_SESSION['email'] = $row['user_email'];
                $_SESSION['username'] = $row['user_name'];
                $_SESSION['role'] = $row['user_role'];
                header('Location: ./pageHome.php?Login=Success');
                // add if statement here to check if user is admin or just a user
                // echo "Login Successful";
            }
            else {
            //header('Location: ./pageLogin.php?Login=FailedPassword'); //this will bypass the echo javascript
            echo '<script type ="text/javascript">
                alert("Email or Password incorrect!");
                window.location.href = "./pageLogin.php";
                </script>';
            }
        }
        else {
            //header('Location: ./pageLogin.php?Login=FailedInfo'); //this will bypass the echo javascript
            echo '<script type ="text/javascript">
                alert("Email or Password incorrect!");
                window.location.href = "./pageLogin.php";
                </script>';
        }

        // close out connection to database
        $conn->close();

    }
    //sends user back to Homepage after login is complete
    //header('Location: ./pageHome.php');
?>