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
                $query="SELECT * FROM message_base WHERE (receiver_ID= '$id' OR sender_ID='$id') AND receiver_delete='0' ORDER BY message_ID desc";    
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
                        //$num_rows = mysqli_num_rows($result);
                        //echo "$num_rows Rows\n";
                        echo' <div class="messageContainer">';
                        echo' <div class="messageImage">';
                        echo'       <img id="messageImage" class="messageImage" src=" '. $receiver['imageLink'].'">';
                        echo'    </div>
                            <div class="messageSubject">';
                        echo'        <h3 id="messageSubject">Item: '.$receiver['subject'].' </h3>';
                        echo'        <h4 id="messageSender">From: '.$sender['user_first'].' </h4>';
                        echo'        <p id="messageText">Latest Message: '. $receiver['message'].' </p>';
                        echo'        <div class="inboxButtons">
                                <p>
                                <form class="inboxButtons" action="./buttonActions.php" method="POST">
                                    <input type="hidden" name="imageLink" value='.$receiver[imageLink].'>
                                    <input id="button3" type="submit" name="view" value="View Messages">
                                    <input id="button3" type="submit" name="delete" value="Delete Conversation">
                                    <input id="button3" type="submit" name="report" value="Report User">
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
                           echo'        <div class="inboxButtons">
                                        <p>
                                        <form class="inboxButtons" action="./buttonActions.php" method="POST">
                                            <input type="hidden" name="imageLink" value='.$receiver[imageLink].'>
                                            <input id="button3" type="submit" name="view" value="View Messages">
                                            <input id="button3" type="submit" name="delete" value="Delete Conversation">
                                            <input id="button3" type="submit" name="report" value="Report User">
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