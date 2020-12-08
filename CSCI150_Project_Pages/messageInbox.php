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
            if($conn->connect_error) {
                echo "<tr align='center'> <td colspan='2'> Failed to connect to MySQL </td> </tr>";
            }
            else {
                $id=$_SESSION["user_ID"];
                // query will return latest message between two users for an item they were discussing
                $query="SELECT * FROM message_base WHERE message_ID IN (SELECT max(message_ID) FROM message_base WHERE ((receiver_ID= '$id' OR sender_ID='$id') AND receiver_delete='0') GROUP BY imageLink  ) ORDER BY message_ID desc;";
                $result = $conn->query($query);
                $receiver=mysqli_fetch_assoc($result);
                //if there are any messages
                if(is_array($receiver)) {
                    //select all information about who sent the message
                    $query2="SELECT * FROM userbase WHERE user_ID =".$receiver['sender_ID']."";
                    $senderResults = $conn->query($query2);
                    $sender=mysqli_fetch_assoc($senderResults);
                    //if there are any messages
                    if(mysqli_num_rows($result) >= 0){
                        echo' <div class="messageContainer">';
                        echo' <div class="messageImage">';
                        echo'       <img id="messageImage" class="messageImage" src=" '. $receiver['imageLink'].'">';
                        echo'    </div>
                                <div class="messageSubject">';
                        echo'        <h3 id="messageSubject">Item: '.$receiver['subject'].' </h3>';
                        echo'        <h4 id="messageSender">From: '.$sender['user_first'].' </h4>';
                        echo'        <p id="messageText">Latest Message: '. $receiver['message'].' </p>';
                        echo'        <div class="inboxButtons1">
                                <p>
                                <form class="inboxButtons" action="./buttonActions.php" method="POST">
                                    <input type="hidden" name="imageLink" value='.$receiver['imageLink'].'>
                                    <input type="hidden" name="ID" value='.$sender['user_ID'].'>
                                    <input type="hidden" name="title" value="'.$receiver["subject"].'">
                                    <input type="hidden" name="receiver" value="'.$receiver["receiver_ID"].'">
                                    <input id="button3" type="submit" name="view" value="View Messages">
                                    <input id="button3" type="submit" name="delete" value="Delete Conversation">
                                  
                                </form>
                                </p>
                                    </div>
                                </div>
                         </div>';
                        while($receiver=mysqli_fetch_assoc($result))
                        { 
                            echo' <div class="messageContainer">';
                            echo' <div class="messageImage">';
                            echo'       <img id="messageImage" class="messageImage" src=" '. $receiver['imageLink'].'">';
                            echo'    </div>
                                    <div class="messageSubject">';
                            echo'        <h3 id="messageSubject">Item: '.$receiver['subject'].' </h3>';
                            echo'        <h4 id="messageSender">From: '.$sender['user_first'].' </h4>';
                            echo'        <p id="messageText">Latest Message: '. $receiver['message'].' </p>';
                            echo'        <div class="inboxButtons1">
                                    <p>
                                    <form class="inboxButtons" action="./buttonActions.php" method="POST">
                                        <input type="hidden" name="imageLink" value='.$receiver['imageLink'].'>
                                        <input type="hidden" name="ID" value='.$sender['user_ID'].'>
                                        <input type="hidden" name="title" value="'.$receiver["subject"].'">
                                        <input type="hidden" name="receiver" value="'.$receiver["receiver_ID"].'">
                                        <input id="button3" type="submit" name="view" value="View Messages">
                                        <input id="button3" type="submit" name="delete" value="Delete Conversation">
                                      
                                    </form>
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