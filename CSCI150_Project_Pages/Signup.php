<?php
    include ("./db_conn.php");

    // Check connection with database, returns error if can not connect
    // Check file db_conn.php for database details
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    // Checks for user to hit register button on RegisterPage.php
    if(isset($_POST['register'])){
        $first = $_POST['first'];
        $last = $_POST['last'];
        $email = $_POST['email'];
        $pass = $_POST['pwd'];

        // check if user email is already in database
        $checkemail = "SELECT ID FROM userbase WHERE user_email ='$email' LIMIT 1";
        $result = $conn->query($checkemail);
        $count = mysqli_num_rows($result);

        // insert user information into database using sql statement
        // $conn->query($sql) SELECT query in database to check if user is registered
        // if statement to check any errors for testing purposes 
        $sql = "INSERT INTO userbase (user_first, user_last, user_email, user_pwd)
        VALUES ('$first', '$last', '$email', '$pass')";

        //if email is registered tell user that
        if ($count == 1) {
            //echo "Email already registerd!";
            echo '<script type ="text/javascript"> 
                alert("Email is already registered!");
                window.location.href = "./LoginPage.html";
                </script>';
            //header('Location: ./LoginPage.html');
        // add if statement here to check if user is admin or just a user
        }

        // $conn->query($sql) completes insert query into database
        // if statement to check any errors for testing purposes 
        elseif ($conn->query($sql) === TRUE) 
        {
        echo "New record created successfully";
        }
        else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // close out connection to database
        $conn->close();

    }
    //sends user back to LoginPage after registration is complete and data is stored in Azure
    //header('Location: ./LoginPage.html');

?>