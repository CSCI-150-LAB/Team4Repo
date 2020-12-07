<?php
    //to be able to connect to db
    require ("./db_conn.php");
    
    // if no regKey then give error
    if(isset($_GET['regKey'])){

        //grab key from URL
        $regKey = $_GET['regKey'];

        //MySQL query to check user URL
        $sql = "SELECT * FROM register_base WHERE register_verified = 0 and register_key='$regKey' LIMIT 1";

        $results = $conn->query($sql);

        $count = mysqli_num_rows($results);
        
        //validate email
        if ($count == 1) {
            //mark user as Registered
            $updateKey = "UPDATE register_base SET register_verified = 1 WHERE register_key='$regKey' LIMIT 1";
            
            if($conn->query($updateKey)){
                echo "Account verification Successful! You may now <a href='./pageLogin.php'>Login</a>.";
                header( "refresh:5;url=./pageLogin.php" );
            }
            else{
                header('Location: ./pageSignup.php?Registration=Failed');
            }
        }
        //email regkey error
        else{
            header('Location: ./pageSignup.php?Registration=Failed');
        }
    }
    else{
        header('Location: ./pageSignup.php?Registration=Failed');
    }
?>

