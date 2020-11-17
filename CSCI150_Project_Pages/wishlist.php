<?php    
    require("db_conn.php");
    include 'header.php';


    // Checks for user to hit login button on pageLogin.php
    if(isset($_POST['wishlist'])){
        // connection to database
        require ("./db_conn.php");
        $wishlist = $_POST['wishlist'];
        $user = $_SESSION['user_ID'];

        // $conn->query($sql) SELECT query in database to check user info
        $sql = "INSERT INTO wishlist_base (user_ID, wishlist_items)
        VALUES ('$user', '$wishlist')";
        $result = $conn->query($sql);
        $row = mysqli_fetch_assoc($result);

        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }   
        
        // close out connection to database
        $conn->close();

    }

?>

