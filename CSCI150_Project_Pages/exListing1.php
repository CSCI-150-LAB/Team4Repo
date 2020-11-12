<?php
    include 'header.php'; // adds the logo and the nav bar to the top of the page
    require("./db_conn.php");
    $imageLink = "./upload_images/errorImage.png";
    $description = "No Data Loaded";
    $poster = "No Data Loaded";
    $title = "No Data Loaded";

    if(isset($_GET['listID'])){
        GLOBAL $imageLink, $description, $poster, $conn, $title;
        $listID = $_GET['listID'];

        $fetchEntries = "SELECT * FROM listingbase WHERE listing_id = $listID";
        $result = mysqli_fetch_array($conn->query($fetchEntries));
        $userID = $result['user_ID'];

        $idToUsername = "SELECT user_name FROM userbase WHERE user_ID = $userID";
		$userbaseResult = mysqli_fetch_array($conn->query($idToUsername));

        $imageLink = "./upload_images/" . $result['listing_imgname'];
        $description = $result['listing_body'];
        $poster = $userbaseResult['user_name'];

        $title = $result['listing_title'];

        $_SESSION['title'] = $title;
        $_SESSION['imageLink'] = $imageLink;
        $_SESSION['poster'] = $poster;
    }
?>
<script>
    function copyLink() {
        var tempTextbox = document.createElement("textarea");
        document.body.appendChild(tempTextbox);
        tempTextbox.value = "https://fresnostateboard.azurewebsites.net/exListing1.php?listID=" + "<?php echo $listID; ?>";
        tempTextbox.select();
        document.execCommand("copy");
        document.body.removeChild(tempTextbox);
    }

    function backPage(){
        window.history.back();
    }
    //sets innerHTML to hidden value we can grab in PHP
    function setName(){
        document.getElementById("hiddenVal").value = document.getElementById("a").innerHTML;
    }

    function openMessage() {
    document.getElementById("messageBox").style.display = "block";
    }

    function closeMessage() {
    document.getElementById("messageBox").style.display = "none";
    }
</script>
<body>
	<div class="mainHolder">
	    <div class="backToListings">
            <a href="javascript: history.go(-1)">Back to Listings</a>
            <button onclick="copyLink()">Copy Link</button>
        </div>

        <div class="listingTitle">
            <h1 id="listingBody"><?php echo $title; ?></h1>
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
    </div>

    <button class="button1 messageButton" onclick="openMessage()">Message</button>
    <div class="messageBox" id= "messageBox" name="messageBox">
        <form action="./messageSend.php" method="POST">
            <label for="message">Message:</label>
            <input type="text" id="message" name="message" required>
            <input type="submit" id="send" name="send" value="SEND">
            <!-- Will cancel message pop up -->
            <button class="button2 cancelButton" onclick="closeMessage()">Cancel Message</button>
        </form>
    </div>
</body>
 
