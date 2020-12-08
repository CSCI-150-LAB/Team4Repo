<?php
    include 'header.php'; // adds the logo and the nav bar to the top of the page
    require("./db_conn.php");
    $imageLink = "./upload_images/errorImage.png";
    $description = "No Data Loaded";
    $poster = "No Data Loaded";
    $title = "No Data Loaded";
    $posterLink = "pageProfile.php";
    $listID;

    if(isset($_GET['listID'])){
        GLOBAL $imageLink, $description, $poster, $conn, $title, $posterLink;
        $listID = $_GET['listID'];

        $fetchEntries = "SELECT * FROM listingbase WHERE listing_id = $listID";
        $result = mysqli_fetch_array($conn->query($fetchEntries));
        $userID = $result['user_ID'];

        $idToUsername = "SELECT user_name, user_email FROM userbase WHERE user_ID = $userID";
		$userbaseResult = mysqli_fetch_array($conn->query($idToUsername));

        $imageLink = "./upload_images/" . $result['listing_imgname'];
        $description = $result['listing_body'];
        $poster = $userbaseResult['user_name'];
        $posterEmail = $userbaseResult['user_email'];

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
            <button onclick="backPage()">Back to Listings</button>
            <button onclick="copyLink()">Copy Link</button>
        </div>
		<?php
		echo '<div>';
			if($_SESSION['role'] == 'admin'){
				echo '<form action="pageAdminhide.php" method="get">';
				echo '<input type="hidden" name="postID" value="'.htmlspecialchars($listID).'"/>';
				echo '<input type="submit" name="submit" value="Hide post (Admin ONLY)"/>';
				echo '</form>';
			}
		echo '</div>';
		?>
        <div class="listingTitle">
            <h1 id="listingBody"><?php echo $title; ?></h1>
			<?php
				if($userID == $_SESSION['user_ID']){
					echo '<form action="donated.php" method="get">';
					echo '<input type="hidden" name="postID" value="'.htmlspecialchars($listID).'"/>';
					echo '<input type="submit" name="submit" value="Click here if item was donated."/>';
					echo '</form>';
				}
			?>
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
                <br>
                <p><?php echo $posterEmail; ?></p>
            </div>
        </div>
    </div>

    <button class="button1" onclick="openMessage()">Message</button>

    <div class="messageBox" id= "messageBox" name="messageBox">

        <form class = "formBox" action="./messageSend.php" method="POST">
            <label for="message">Message:</label>
            <input type="text" id="message" name="message" required>

            <div class="submitButton">
                <input type="submit" id="send" name="send" value="Send Message">
            </div>
            <!-- Will cancel message pop up -->
            <div class="cancelButton">
                <button class="button2" onclick="closeMessage()">Cancel Message</button>
            </div>

        </form>
        
    </div>

</body>
