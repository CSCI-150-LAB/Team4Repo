<?php    
    require("db_conn.php");
    include 'header.php';
    if(isset($_POST['delete'])){
            if($conn->connect_error) {
                echo "<tr align='center'> <td colspan='2'> Failed to connect to MySQL </td> </tr>";
            }
            else {
                //deletes message for both sender and receiver
                $id=$_SESSION["user_ID"];
                $imageLink = $_POST['imageLink'];
                $query="UPDATE message_base SET receiver_delete='1', sender_delete='1' WHERE (receiver_ID='$id' and imageLink='$imageLink') OR (sender_ID='$id' and imageLink='$imageLink')";
                $result = $conn->query($query);
                $receiver=mysqli_fetch_assoc($result);

                if (isset($_SERVER["HTTP_REFERER"])) {
                    header("Location: " . $_SERVER["HTTP_REFERER"]);
                }            
                $conn->close();
                }
    }

    if(isset($_POST['view'])){
        if($conn->connect_error) {
            echo "<tr align='center'> <td colspan='2'> Failed to connect to MySQL </td> </tr>";
        }

        else {
            ?>
    <!doctype html>
    <html>
    <body>
        <?php
        $image = $_POST['imageLink'];
        $title = $_POST['title'];
        $id = $_SESSION['user_ID'];
        $receiver = $_POST['receiver'];
        $query="SELECT * FROM message_base WHERE imageLink='$image' AND ((receiver_ID= '$id' OR sender_ID='$id')AND receiver_delete='0' OR sender_delete='0')  ORDER BY message_ID asc";    
        $result = $conn->query($query);
        $messages = mysqli_fetch_assoc($result);
        $messageReceiver = $messages['receiver_ID'];
        $messageSender = $messages['sender_ID'];

        //queries to grab User_ID of user that posted Donation Listing
        $listingQuery="SELECT * FROM listingbase WHERE (listing_title='$title')";    
        $listingResults = $conn->query($listingQuery);
        $listingOutput = mysqli_fetch_assoc($listingResults);


        //query to grab user info of donor
        $donorID = $listingOutput['user_ID'];
        $donorSQL = "SELECT * FROM userbase WHERE user_ID ='$donorID'";    
        $donorResults = $conn->query($donorSQL);
        $donorOutput = mysqli_fetch_assoc($donorResults);
        $poster = $donorOutput['user_first'];

        //query to grab requester info
        $requesterID = $messages['sender_ID'];
        $requesterSQL = "SELECT * FROM userbase WHERE user_ID ='$requesterID'";    
        $requesterResults = $conn->query($requesterSQL);
        $requesterOutput = mysqli_fetch_assoc($requesterResults);
        $requester = $requesterOutput['user_first'];
        
        $_SESSION['imageLink'] = $image;
        $_SESSION['title'] = $title;

        echo' <div class="messageContainer">';
        echo' <div class="messageImage">';
        echo'       <img id="messageImage" class="messageImage" src=" '. $image.'">';
        echo'    </div>
            <div class="messageSubject">';
        echo'       ';
        echo'        <h3 id="messageSubject">Item: <a href="./listEntry.php?listID='.$listingOutput['listing_ID'].'"> '.$title.' </h3></a>';
        //if statements redirects user to their own profile or to donor based on who is checking message
                if($_SESSION['user_ID'] != $listingOutput['user_ID']){
        echo'        <h4 id="messageSender">Donor: <a href="./pageProfile.php?userID='.$listingOutput['user_ID'].'">'.$poster.' </h4></a>';
                }
                else{
        echo'        <h4 id="messageSender">Donor: <a href="./pageProfile.php">'.$poster.' </h4></a>';
                }
        echo'       </div>
                </div>
            <div class = "chatHolder">';
            //checks if there are messages
            //$listingOutput['user_ID'] ==== poster
            //$messages['sender_ID'] ==== id of who sent
            if(is_array($messages)) {
                //if($listingOutput['user_ID']!== $messages['sender_ID']){
                    if(($_SESSION['user_ID'] !== $messages['sender_ID'])){ 
                        echo '<div class="bubble bubble-left">';
                        if(($_SESSION['user_ID'] !== $listingOutput['user_ID'])){ 
                            echo '<p id="messageText2">'.$poster.': '. $messages['message'].' </p>';
                        }
                        else{
                            echo '<p id="messageText2">'.$requester.': '. $messages['message'].' </p>';
                        }
                        echo '</div>';
                    }
                    elseif (($_SESSION['user_ID'] === $messages['sender_ID'])){
                        echo '<div class="bubble bubble-right">';
                        echo '<p id="messageText2">You: '. $messages['message'].' </p>';
                        echo '</div>';
                    }
                while($messages=mysqli_fetch_assoc($result)){
                    if(($_SESSION['user_ID'] !== $messages['sender_ID'])){ 
                        echo '<div class="bubble bubble-left">';
                        if(($_SESSION['user_ID'] !== $listingOutput['user_ID'])){ 
                            echo '<p id="messageText2">'.$poster.': '. $messages['message'].' </p>';
                        }
                        else{
                            echo '<p id="messageText2">'.$requester.': '. $messages['message'].' </p>';
                        }
                        echo '</div>';
                    }
                    elseif (($_SESSION['user_ID'] === $messages['sender_ID'])){
                        echo '<div class="bubble bubble-right">';
                        echo '<p id="messageText2">You: '. $messages['message'].' </p>';
                        echo '</div>';
                    }
                }
            }
        ?>
        
            
            </div>
        <div class = "messageFormBox">
            <form class= "formBox2" action="./inboxSend.php" method="POST">
                <input type="text" id="message" name="message" placeholder="Enter Message Here... "required>
                <input type="hidden" name="donor" value="<?php echo $listingOutput['user_ID'] ?>">
                <?php 
                    //if the User in the inbox is not the donor 
                    //if($id === $listingOutput['user_ID']){
                    if($id === $listingOutput['user_ID']){
                        echo '<input type="hidden" name="receiver" value="'.$messageSender.'">';
                    }
                    else{
                        echo '<input type="hidden" name="receiver" value="'.$messageReceiver.'">';
                    }
                
                ?>
                <div class="messageButtons">
                    <input type="submit" class="button2" name="send" value="Send Message">
                </div>
            </form>
        </div>
        <?php
        }
    }

        ?>
    </div>


    </body>
    </html>      


<?php
    if(isset($_POST['report'])){
        if($conn->connect_error) {
            echo "<tr align='center'> <td colspan='2'> Failed to connect to MySQL </td> </tr>";
        }
        else {
            //deletes message for both sender and receiver
            $id=$_SESSION["user_ID"];
            $imageLink = $_POST['imageLink'];
            $query="UPDATE message_base SET receiver_delete='1', sender_delete='1' WHERE (receiver_ID='$id' and imageLink='$imageLink') OR (sender_ID='$id' and imageLink='$imageLink')";
            $result = $conn->query($query);
            $receiver=mysqli_fetch_assoc($result);

            if (isset($_SERVER["HTTP_REFERER"])) {
                header("Location: " . $_SERVER["HTTP_REFERER"]);
            }            
            $conn->close();
            }
    }
?>