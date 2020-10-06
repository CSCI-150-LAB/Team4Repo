<!DOCTYPE HTML>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <title>Test</title>
    <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon-32x32.png">
    <link rel="stylesheet" href="./mainStyleSheet.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script defer src="./EmailVerification.js"></script>
</head>
<body>
    <div class="mainHolder">
        <img class="logoText" src="./images/logoText.png" alt="Website Text Logo">
        <div class="navBar-container">
            <div class="navBar">
                <a href="HomePage.php">Home</a>
                <a href="ForumPage.php">Forums</a>
                <a href="ListPage.php">Donation Listings</a>
                <a href="AboutPage.php">About</a>
                <a href="LoginPage.php">Login</a>
            </div>
        </div>
            <div class="pageContent">
            <!-- Signup.php is what php file you want to send the login into to -->
            <!-- method="post" hides the sensitive data in th HTTP transaction -->
            <form id="form" action="./Signup.php" method="post">
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
</html>