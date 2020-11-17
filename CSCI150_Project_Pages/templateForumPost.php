<?php
    include 'header.php'; // adds the logo and the nav bar to the top of the page
    require("./db_conn.php");
    $imageLink = "./upload_images/errorImage.png";
    $description = "No Data Loaded";
    $poster = "No Data Loaded";

    if(isset($_GET['postID'])){
        GLOBAL $imageLink, $description, $poster, $conn;
        $postID = $_GET['postID'];
        $fetchEntries = "SELECT * FROM post_base WHERE post_ID = $postID";
        $result = mysqli_fetch_array($conn->query($fetchEntries));
        $userID = $result['user_ID'];

        $idToUsername = "SELECT user_name FROM userbase WHERE user_ID = $userID";
		$userbaseResult = mysqli_fetch_array($conn->query($idToUsername));

        $imageLink = "./upload_images/" . $result['post_imgname'];
        $description = $result['post_body'];
        $poster = $userbaseResult['user_name'];
    }
?>
<script>
    function copyLink() {
        var tempTextbox = document.createElement("textarea");
        document.body.appendChild(tempTextbox);
        tempTextbox.value = "https://fresnostateboard.azurewebsites.net/templateForumPost.php?postID=" + "<?php echo $postID; ?>";
        tempTextbox.select();
        document.execCommand("copy");
        document.body.removeChild(tempTextbox);
    }
</script>
<body>
	<div class="mainHolder">
	    <div class="backToListings">
            <a href="listFurniture.php">Back to Listings</a>
            <button onclick="copyLink()">Copy Link</button>
        </div>

        <div class="listingContainer">
            <div class="listingImage">
                <img id="listingImage" class="listingImage" src="<?php echo $imageLink; ?>" alt=""> <!--Change Source -->
            </div>
            <div class="listingBody">
                <p id="listingBody"><?php echo $description; ?></p>
            </div>
            <div class="listingPoster">
                <a href="userprofile/username.php" class="poster"> <!-- Change href and innerHTML -->
                    <?php echo $poster ?>
                </a>
            </div>
        </div>
        <div class="commentContainer">
        </div>
	</div>
</body>
 