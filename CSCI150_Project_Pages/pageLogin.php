<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon-32x32.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./mainStyleSheet.css">
</head>
<body>
    <div class="mainHolder">
        <img class="logoLogin" src="./images/logoText.png" alt="Website Text Logo">
        <div class="pageContent">
            <!-- sessionLogin.php is what php file you want to send the login into to -->
            <!-- method="post" hides the sensitive data in th HTTP transaction -->
            <form action="./sessionLogin.php" method="post">
                <div class="loginBox">
                    <!-- Login can be just the first part of the student/faculty email -->
                    <label for="email">E-Mail:</label>
                    <input type="text" id="email" name="email" required>
                
                    <label for="pwd">Password:</label>
                    <input type="password" id="pwd" name="pwd" required>
                    
                    <input type="submit" name="login" value="LOGIN">
                    <div class="forgotPass">
                        <a href ="#forgotPassPage">Forgot password?</a>
                    </div>
                </div>
            </form>
            <div class="newUser">
                New User? <a href="./pageSignup.php">Create an account.</a>
            </div>
        </div>
    </div>
</body>
