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
                <img class="listingImage" src="./images/table.png" alt="">
            </div>
            <div class="listingBody">
                Looking to give away this table! Lightly used. 50in/50in/40in (L/D/H)
            </div>
            <div class="listingPoster">
                <a href="userprofile/username.php" class="poster">
                    [ProfileName]
                </a>
            </div>
        </div>
	</div>
</body>
</html>