<?php

    // Checks for user to hit login button on LoginPage.html
    if(isset($_POST['login'])){
        // connection to database
        require ("./db_conn.php");
        $email = $_POST['email'];
        $pass = $_POST['pwd'];

        // $conn->query($sql) SELECT query in database to check user info
        $sql = "SELECT * FROM userbase WHERE user_email ='$email'";// AND user_pwd='$hashedPass' LIMIT 1";
        $result = $conn->query($sql);
        $row = mysqli_fetch_assoc($result);

        //uses fetch_assoc and if $row returns an array then continue because there is data
        if (is_array($row)){
            //decrypts password hash and checks it according Bcrypt used in Signup.php
            if(password_verify($pass, $row['user_pwd'])){
                session_start();
                $_SESSION['user_ID'] = $row['ID'];
                header('Location: ./HomePage.php?Login=Success');
                // add if statement here to check if user is admin or just a user
                // echo "Login Successful";
            } 
            else {
            header('Location: ./LoginPage.php?Login=Failed');
            echo '<script type ="text/javascript"> 
                alert("Email or Password incorrect!");
                window.location.href = "./LoginPage.php";
                </script>';
            }
        }
        // close out connection to database
        $conn->close();

    }
    //sends user back to Homepage after login is complete 
    //header('Location: ./HomePage.html');

?>