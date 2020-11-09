<?php
   include 'header.php'; // adds the logo and the nav bar to the top of the page
   $postingID = 123;
   $test12 = "You can use php in quotes!";
   $listingText = "this is the body of the listing";
?>
<script>
    function copyLink(id) {
        copyText to clipboard = "websiteurl.com/pageBook.php?postId=123"
    }
</script>
<body>
	<div class="mainHolder">
	    <div class="backToListings">
            <a href="listFurniture.php">Back to Listings</a>
        </div>

        <div class="listingContainer">
            <div class="listingImage">
                <img id="listingImage" class="listingImage" src="<?php echo $test12 ?>" alt=""> <!--Change Source -->
            </div>
            <div class="listingBody">
                <p id="listingBody"><?php echo $listingText ?></p>
            </div>
            <div class="listingPoster">
                <a href="userprofile/username.php" class="poster"> <!-- Change href and innerHTML -->
                    [ProfileName]
                </a>
            </div>
            <button onclick="copyLink(<?php echo $postingID ?>)" id="copyLink"/>
        </div>
	</div>
</body>
 