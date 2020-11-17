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
            $id=$_SESSION["user_ID"]; 
            header('Location: ./messages.php');         
            }
    }

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