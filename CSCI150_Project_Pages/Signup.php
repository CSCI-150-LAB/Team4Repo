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

        $sql = "INSERT INTO userbase (user_first, user_last, user_email, user_pwd)
        VALUES ('$first', '$last', '$email', '$pass')";

        // $conn->query($sql) completes insert query into database
        // if statement to check any errors for testing purposes 
        if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // close out connection to database
        $conn->close();

    }
    //sends user back to LoginPage after registration is complete and data is stored in Azure
    header('Location: ./LoginPage.html');

?>