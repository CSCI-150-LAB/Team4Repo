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
            <!-- sessionSignup.php is what php file you want to send the login into to -->
            <!-- method="post" hides the sensitive data in th HTTP transaction -->
            <form id="form" action="./sessionSignup.php" method="post">
                <div class="loginBox">
                    <label for="first">First Name:</label>
                    <input type="text" id="first" name="first" required>

                    <label for="last">Last Name:</label>
                    <input type="text" id="last" name="last" required>

                    <label for="email">E-Mail:</label>
                    <input type="text" id="email" name="email" placeholder="@mail.fresnostate.edu or @csufresno.edu" required>

                    <label for="pwd">Password:</label>
                    <input type="password" id="pwd" name="pwd" required>

                    <input type="submit" name="register" value="REGISTER">
                </div>
            </form>
        </div>
    </div>
</body>
