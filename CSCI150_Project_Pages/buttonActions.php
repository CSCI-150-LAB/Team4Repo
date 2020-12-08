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
    
    


    <div class = "chatHolder">
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

        $_SESSION['imageLink'] = $image;
        $_SESSION['title'] = $title;
            //checks if there are messages
            if(is_array($messages)) {
                if($listingOutput['user_ID']!== $messages['sender_ID']){
                    
                    echo '<div class="bubble bubble-left">';
                    echo '<p id="messageText2">Requester Message: '. $messages['message'].' </p>';
                    echo '</div>';
                    }
                    else{
                    echo '<div class="bubble bubble-right">';
                    echo '<p id="messageText2">Donor Message: '. $messages['message'].' </p>';
                    echo '</div>';
                    }
                while($messages=mysqli_fetch_assoc($result)){
                    if($listingOutput['user_ID']!== $messages['sender_ID']){
                    
                    echo '<div class="bubble bubble-left">';
                    echo '<p id="messageText2">Requester Message: '. $messages['message'].' </p>';
                    echo '</div>';
                    }
                    else{
                    echo '<div class="bubble bubble-right">';
                    echo '<p id="messageText2">Donor Message: '. $messages['message'].' </p>';
                    echo '</div>';
                    }
                }
            }
        ?>
            
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
                <input type="submit" id="button2" name="send" value="Send Message">
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