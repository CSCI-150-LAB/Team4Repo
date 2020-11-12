<?php    
    require("db_conn.php");
    include 'header.php';
?>

<!doctype html>
<html>
<body>
        <div class="inboxHeader">
            <h2>Inbox</h2>
        </div>

        <?php
        if(isset($_SESSION["user_ID"])) {
            $id=$_SESSION["user_ID"];
            $query="SELECT * FROM message_base WHERE receiver_ID= '$id' ORDER BY message_ID desc";
            
            if($conn->connect_error) {
                echo "<tr align='center'> <td colspan='2'> Failed to connect to MySQL </td> </tr>";
            }
            
            else {
                $result = $conn->query($query);
                $receiver=mysqli_fetch_assoc($result);
                if(is_array($receiver)) {
                    //select all information about who sent the message
                    $query2="SELECT * FROM userbase WHERE user_ID =".$receiver['sender_ID']."";
                    $senderResults = $conn->query($query2);
                    //$sender=mysqli_fetch_assoc($senderResults);
                    
                    if(mysqli_num_rows($senderResults) > 0){
                        while($sender = mysqli_fetch_assoc($senderResults))
                        { 

                           echo' <div class="messageContainer">';
                           echo' <div class="messageImage">';
                           echo'       <img id="messageImage" class="messageImage" src=" '. $receiver['imageLink'].'">';
                           echo'    </div>
                                <div class="messageSubject">';
                           echo'        <h3 id="messageSubject">Item: '.$receiver['subject'].' </h3>';
                           echo'        <h4 id="messageSender">From: '.$sender['user_first'].' </h4>';
                           echo'        <p id="messageText">Message: '. $receiver['message'].' </p>';
                           echo'        <div class="inboxButtons">
                                    <p>
                                        <a class="button3" href="#">Quick Reply</a>
                                        <a class="button3" href="#">View Messages</a>
                                        <a class="button3" href="#">Delete</a>
                                        <a class="button3" href="#">Report</a>
                                    </p>
                                    </div>
                                </div>

                            </div>';
                         

                        }
                    }
            
                }
                else {
                    echo "<tr align='center'> <td colspan='5'> <font color='blue'> No Messages! </font> </td> </tr>";
                }
                $conn->close();
                }
            }
        else {
            echo "<tr align='center'> <td colspan='2'> <font color='red'> Sorry, You not Logged in! </font> Login again:- <a href='pageLogin.php'>Login</a> </td> </tr>";

        }
        
        ?>
</body>
</html>