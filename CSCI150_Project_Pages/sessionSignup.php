<?php
    require ("./db_conn.php");

    // Check file db_conn.php for database details

    // Checks for user to hit register button on pageSignup.php
    if(isset($_POST['register'])){
        $first = $_POST['first'];
        $last = $_POST['last'];
        $email = $_POST['email'];
        $tempArray = explode('@', $email);
        $username = $tempArray[0];
        $pass = $_POST['pwd'];
        //hash passwords using default php method --> Bcrypt
        $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

        // check if user email is already in database
        $checkemail = "SELECT user_ID FROM userbase WHERE user_email ='$email' LIMIT 1";
        $result = $conn->query($checkemail);
        $count = mysqli_num_rows($result);

        // insert user information into database using sql statement
        // $conn->query($sql) SELECT query in database to check if user is registered
        // if statement to check any errors for testing purposes
        $sql = "INSERT INTO userbase (user_first, user_last, user_email, user_name, user_pwd)
        VALUES ('$first', '$last', '$email', '$username', '$hashedPass')";
        $insert = $conn->query($sql);

        //grabs user info to be able to user user_ID that was just generated
        $userInfo = "SELECT user_ID FROM userbase WHERE user_email ='$email' LIMIT 1";// AND user_pwd='$hashedPass' LIMIT 1";
        $userResult = $conn->query($userInfo);
        $userRows = mysqli_fetch_assoc($userResult);

        //SQL statements need prepared statement variables already created to function properly
        $user_ID = $userRows['user_ID'];

        // create user verfication key based on time of registration and user email
        $regKey = password_hash(time() . $email, PASSWORD_DEFAULT);
        $KeyInsert = "INSERT INTO register_base (register_key,user_ID)
        VALUES ('$regKey','$user_ID')";
        //$resultKey = $conn->query($KeyInsert);


        //if email is registered tell user that
        if ($count == 1) {
            //echo "Email already registerd!";
            echo '<script type ="text/javascript">
                alert("Email is already registered!");
                window.location.href = "./pageLogin.php";
                </script>';
            //header('Location: ./pageLogin.php');
        // add if statement here to check if user is admin or just a user
        }

        // $conn->query($sql) completes insert query into database
        // if statement to check any errors for testing purposes
        elseif ($conn->query($KeyInsert))
        {
            //
            $body = "Click the link below to activate your account! <br><br><a href='https://donatr.live/verify.php?regKey=$regKey'>Activate my Donatr Account</a>";
            $subject = "Donatr Account Activation";

            $headers = array(
                'Authorization: Bearer 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',
                'Content-Type: application/json'
            );

            $data = array(
                "personalizations" => array(
                    array(
                        "to" => array(
                            array(
                                "email" => "$email",
                                "name" => $first
                            )
                        )
                    )
                ),
                "from" => array(
                    "email" => "admin@donatr.live"
                ),
                "subject" => $subject,
                "content" => array(
                    array(
                        "type" => "text/html",
                        "value" => $body
                    )
                )
            );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://api.sendgrid.com/v3/mail/send");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $response = curl_exec($ch);
            curl_close($ch);

            echo "Please Check Email for Verification Code";
            //sends user back to LoginPage after registration is complete and data is stored in Azure
            header('Location: ./confirmationSent.php');
        }

        else {
        echo "Error";
        }
        // close out connection to database
        $conn->close();
    }
?>