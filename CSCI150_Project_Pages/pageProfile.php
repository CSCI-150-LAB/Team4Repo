<?php
    include 'header.php';
   // adds the logo and the nav bar to the top of the page
?>

<!DOCTYPE HTML>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon-32x32.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./mainStyleSheet.css">
</head>
<body>
    <div class="mainHolder">
        <div class="profilePage">
            <img class ="profileImg" src="./images/pfp.png" alt="ProfilePicture">

            <div class="userName">
            <?php
                echo $_SESSION['firstName']. ' ' . $_SESSION['lastName'];
            ?>

            </div>

            <div class="userListings">
                <a href="#GrabsUserListings">Your Listings</a>
            </div>

            <div class="userPosts">
                <a href="#UserPosts">Your Forum Posts</a>
            </div>

        </div>
    </div>
</body>
</html>