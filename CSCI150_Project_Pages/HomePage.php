<?php
   require ("./Session.php");
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
        <img class="logoText" src="./images/logoText.png" alt="Website Text Logo">
        <img class="logoImage" src="./images/logoImage.png" alt="Website Image Logo">
        <div class="navBar-container">
            <div class="navBar">
                <a href="HomePage.php">Home</a>
                <a href="ForumPage.php">Forums</a>
                <a href="ListPage.php">Donation Listings</a>
                <a href="AboutPage.php">About</a>
                <a href="Logout.php">Logout</a>
            </div>
        </div>
        <div class="homePageContent">
            <div class="leftSide">
                <div class="forumPreview">
                    This is where the forumPreview will be.
                    <div class="forumItem">
                        <a href="#">SQL query to fetch the first 3 forum elements.</a>
                    </div>
                </div>
                <div class="listingMenu">
                    <a href="BooksList.html">Books</a>
                    <a href="FurnituresList.html">Furniture</a>
                    <a href="ElectronicsList.html">Electronics</a>
                    <a href="CLothesList.html">Clothes</a>
                    <a href="OtherList.html">Other</a>
                </div>
            </div>
            
            <div class="rightSide">
                <div class="newsFeed">
                    Import a news feed from here. This paragraph is just to fill space.
                    <br><br><br>
                    Henry Madden Library’s Tech Lending service now has 100 Logitech headsets ready for student use. The headsets are part of Logitech’s recent donation of 2,300 headsets to the California State University system to support the virtual learning experience of CSU students.
                    <br><br>
                    The headsets include over-ear headphones and an extended mic, which enhances students’ ability to hear and be heard in the virtual classroom. These enhancements are intended to aid student focus and increase engagement in virtual presentations and discussions.
                    <br><br>
                    As Fresno State and other CSU campuses have moved to primarily virtual instruction, increasing investments into technology is a central focus. Access to the technology devices students need is vital to their success. The Madden Library’s Tech Lending has supported those needs for three years, offering a wide variety of technology for students, faculty and staff alike.
                    <br><br>
                    Over the summer, Tech Lending also added several new items to its lending roster, including noise-canceling headphones, Apple pens, surface pens, Go-pros that double as webcams, and projectors to increase monitor visibility. Fresno State Technology Services also placed 70 new webcams with Tech Lending for distribution to both students and faculty. Thanks to CARES Act funding, Tech Lending also refreshed and updated its stock of laptops, Chromebooks, tablets, cables, chargers and other items to support student and faculty technology needs this academic year.
                </div>
            </div>
        </div>
    </div>
</body>
</html>