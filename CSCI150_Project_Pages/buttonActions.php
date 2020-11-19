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
        $query="SELECT * FROM message_base WHERE imageLink='$image' ORDER BY message_ID desc";    
        $result = $conn->query($query);
        $messages = mysqli_fetch_assoc($result);
        $_SESSION['poster'] = $receiver;
        $_SESSION['imageLink'] = $image;
        $_SESSION['title'] = $title;
            //checks if there are messages
            if(is_array($messages)) {
                if($id=== $_POST['ID']){
                    
                    echo '<div class="bubble bubble-left">';
                    echo '<p id="messageText">Requester Message: '. $messages['message'].' </p>';
                    echo '</div>';
                    }
                    else{
                    echo '<div class="bubble bubble-right">';
                    echo '<p id="messageText">Donor Message: '. $messages['message'].' </p>';
                    echo '</div>';
                    }
                while($messages=mysqli_fetch_assoc($result)){
                    if($id=== $_POST['ID']){
                    
                    echo '<div class="bubble bubble-left">';
                    echo '<p id="messageText">Requester Message: '. $messages['message'].' </p>';
                    echo '</div>';
                    }
                    else{
                    echo '<div class="bubble bubble-right">';
                    echo '<p id="messageText">Donor Message: '. $messages['message'].' </p>';
                    echo '</div>';
                    }
                }
            }
        ?>
            
        <form class= "formBox2" action="./messageSend.php" method="POST">
            <input type="text" id="message" name="message" placeholder="Enter Message Here... "required>
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
    </html>;         


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