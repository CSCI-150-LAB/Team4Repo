<?php
   require ("./sessionCheck.php");
   include 'header.php'; // adds the logo and the nav bar to the top of the page
?>

<!DOCTYPE HTML>
<html>

<head>
	<meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./mainStyleSheet.css">
</head>

<body>
	<div class="mainHolder">
	    <div class="backToListings">
             <a href="listFurniture.php">Back to Listings</a>
        </div>

        <div class="listingContainer">
            <div class="listingImage">
            <!-- figure out how to take a make the source pull from database -->
                <img class="listingImage" src="./images/dresser.png" alt="">
            </div>
            <div class="listingBody">
                Description about the item.
            </div>
            <div class="listingPoster">
            <!-- make this display a link to the poster's profile -->
                <a href="userprofile/username.php" class="poster">
                    Fake User
                </a>
            </div>
        </div>
	</div>
</body>
</html>