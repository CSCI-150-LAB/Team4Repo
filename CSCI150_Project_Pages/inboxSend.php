<?php

    // Checks for user to hit login button on pageLogin.php
    if(isset($_POST['send'])){
        // connection to database
        require ("./db_conn.php");
        session_start();
        //$subject = $_POST['subject'];
        $message = $_POST['message'];
        $senderID = $_SESSION['user_ID'];

        //change to hidden value
        //grabs receiver ID from inbox message form 
        //$receiverID = $_SESSION['poster'];
        $receiverID = $_POST['receiver'];

        //save image link to show in message
        $imageLink = $_SESSION['imageLink'];

        //save image title to use as Message Subject
        $title = $_SESSION['title'];

        //check if user exists by grabbing user_ID from userbase
        $userSQL = "SELECT user_ID FROM userbase WHERE user_ID ='$receiverID'";

        //queries to find user_ID from userbase table
        $results = $conn->query($userSQL);
        //create array holding user_ID
        $row = mysqli_fetch_assoc($results);
        //set userID = user_ID from userbase 
        $userID = $row['user_ID'];
        //userID = person receiving message

        //checks if person we are sending to message has made donation post
        $postSQL = "SELECT user_ID FROM post_base WHERE user_ID ='$userID'";
        //checks if person we are sending to message has made forum post
        $listingSQL = "SELECT user_ID FROM listingbase WHERE user_ID ='$userID'";

        //insert message to database
        $sql = "INSERT INTO message_base (sender_ID, receiver_ID, message, imageLink, subject)
        VALUES ('$senderID','$userID','$message', '$imageLink', '$title')";

        //checks SQL statements above to 
        if($senderID != $userID){
            if (($conn->query($userSQL) == 1 and $conn->query($postSQL) == 1) or 
                ($conn->query($userSQL) == 1 and $conn->query($listingSQL) == 1)){

                //header("Location: " . $_SERVER["HTTP_REFERER"]);
                header("Location: ./messageInbox.php");
                if ($conn->query($sql) === TRUE){
                    echo "Inserted";
                }
                else {
                    echo "Error";
                }
            }
            else {
                echo "User does not exist";
            }
        }
        else{
            echo "You can not message yourself!";
        }
        
        // close out connection to database
        $conn->close();
    }
?>