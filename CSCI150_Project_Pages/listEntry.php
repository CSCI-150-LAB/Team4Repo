<?php
    include 'header.php'; // adds the logo and the nav bar to the top of the page
    require("./db_conn.php");
    $imageLink = "./upload_images/errorImage.png";
    $description = "No Data Loaded";
    $poster = "No Data Loaded";
    $title = "No Data Loaded";
    $posterLink = "pageProfile.php";

    if(isset($_GET['listID'])){
        GLOBAL $imageLink, $description, $poster, $conn, $title, $posterLink;
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
        $posterLink = "pageProfile.php?userID=" . $userID;
    }
?>
<script>
    function copyLink() {
        var tempTextbox = document.createElement("textarea");
        document.body.appendChild(tempTextbox);
        tempTextbox.value = "https://fresnostateboard.azurewebsites.net/listEntry.php?listID=" + "<?php echo $listID; ?>";
        tempTextbox.select();
        document.execCommand("copy");
        document.body.removeChild(tempTextbox);
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
                <a id="posterLink" href="<?php echo $posterLink; ?>" class="poster"> <!-- Change href and innerHTML -->
                    <?php echo $poster ?>
                </a>
            </div>
        </div>
    </div>

    <button class="button1" onclick="openMessage()">Message</button>
    <div class="messageBox" id= "messageBox" > 
            <form class= "formBox" action="./messageSend.php" method="POST">
                <input type="text" id="message" name="message" placeholder="Enter Message Here... "required>
                <div class="messageButtons">
                    <input type="submit" id="button2" name="send" value="Send Message">
                    <!-- Will cancel message pop up -->
                    <input type="submit" id="button2" onclick="closeMessage()" value="Cancel Message"/>
                </div>
            </form>
    </div>
</body>
