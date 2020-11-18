<?php    
    require("db_conn.php");
    include 'header.php';

    if(isset($_POST['comment']) && isset($_GET['postID'])){
        GLOBAL $conn;
        $sender_ID = $_SESSION['user_ID'];
        $post_ID = $_GET['postID'];
        $comment_body = $_POST['comment'];
        

        $sql = "INSERT INTO forum_comments_base (sender_ID, post_ID, comment_body)
        VALUES ('$sender_ID', '$post_ID', '$comment_body')";
        $result = $conn->query($sql);
        $row = mysqli_fetch_assoc($result);

        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }   
        
        // close out connection to database
        $conn->close();
    }
?>
