<?php
    include ("./db_conn.php");

    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    // Checks for user to hit login button on LoginPage.html
    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];

        $sql = "SELECT ID FROM userbase WHERE user_email ='$email' AND user_pwd='$pwd' LIMIT 1";
        $result = $conn->query($sql);
        $count = mysqli_num_rows($result);
        // $conn->query($sql) SELECT query in database to check if user is registered
        // if statement to check any errors for testing purposes 
        if ($count == 1) {
            header('Location: ./HomePage.html');
        // add if statement here to check if user is admin or just a user
        // echo "Login Successful";
        } 
        else {
            header('Location: ./LoginPage.html?Login=Failed');
            echo '<script type ="text/javascript"> 
                alert("Email or Password incorrect!");
                window.location.href = "./LoginPage.html";
                </script>';
        }

        // close out connection to database
        $conn->close();

    }
    //sends user back to Homepage after login is complete 
    //header('Location: ./HomePage.html');

?>