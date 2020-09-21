<!DOCTYPE HTML>
<html lang = "en">
<head>
    <link rel="stylesheet" href="./LoginPage.css">
    
</head>
<body>
<div>
    <div class="mainHolder">
        <img id="logoText" src="./images/logoText.png" alt="Website Text Logo">
        <img id="logoImage" src="./images/logoImage.png" alt="Website Image Logo">
        <div class="foreground">
            <div class="topBar">
                <a href="#home">Home</a>
                <a href="#forums">Forums</a>
                <a href="#listings">Donation Listings</a>
                <a href="#About">About</a>
                <a href="#Login">Login</a>
            </div>
            <div class="pageContent">
            <!-- action_page.php is what php file you want to send the login into to -->
            <!-- method="post" hides the sensitive data in th HTTP transaction -->
            <form action="./Signup.php" method="post">
                <div id="loginBox">
                    <!-- Login can be just the first part of the student/faculty email -->
                    <label for="firstName">First Name:</label>
                    <input type="text" id="firstName" name="first" required>
                    
                    <label for="lastName">Last Name:</label>
                    <input type="text" id="lastName" name="last" required>

                    <label for="userEmail">E-Mail:</label>
                    <input type="text" id="userEmail" name="email" required>
                    
                    <label for="pass">Password:</label>
                    <input type="password" id="pass" name="pwd" required>
                    
                    <input type="submit" name="register" value="REGISTER">
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>