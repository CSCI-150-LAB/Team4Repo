<?php
    require ("./db_conn.php");

    // Check file db_conn.php for database details

    // Checks for user to hit register button on pageSignup.php
    if(isset($_POST['register'])){
        $first = $_POST['first'];
        $last = $_POST['last'];
        $email = $_POST['email'];
        $pass = $_POST['pwd'];
        //hash passwords using default php method --> Bcrypt
        $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

        // check if user email is already in database
        $checkemail = "SELECT ID FROM userbase WHERE user_email ='$email' LIMIT 1";
        $result = $conn->query($checkemail);
        $count = mysqli_num_rows($result);

        // insert user information into database using sql statement
        // $conn->query($sql) SELECT query in database to check if user is registered
        // if statement to check any errors for testing purposes
        $sql = "INSERT INTO userbase (user_first, user_last, user_email, user_pwd)
        VALUES ('$first', '$last', '$email', '$hashedPass')";

        //if email is registered tell user that
        if ($count == 1) {
            //echo "Email already registerd!";
            echo '<script type ="text/javascript">
                alert("Email is already registered!");
                window.location.href = "./pageLogin.php";
                </script>';
            //header('Location: ./pageLogin.php');
        // add if statement here to check if user is admin or just a user
        }

        // $conn->query($sql) completes insert query into database
        // if statement to check any errors for testing purposes
        elseif ($conn->query($sql) === TRUE)
        {
        //echo "New record created successfully";
        //sends user back to LoginPage after registration is complete and data is stored in Azure
        header('Location: ./pageLogin.php');
        }
        else {
        echo "Error";
        }

        // close out connection to database
        $conn->close();

    }
?>