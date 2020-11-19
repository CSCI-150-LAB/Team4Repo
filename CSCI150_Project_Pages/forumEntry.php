<?php
    include 'header.php'; // adds the logo and the nav bar to the top of the page
    require("./db_conn.php");
    $imageLink = "./upload_images/errorImage.png";
    $description = "No Data Loaded";
    $poster = "No Data Loaded";
    $title = "No Data Loaded";
    $posterLink = "pageProfile.php";
    $postID;

    if(isset($_GET['postID'])){
        GLOBAL $imageLink, $description, $poster, $conn, $title, $posterLink, $postID;
        $postID = $_GET['postID'];

        $fetchEntries = "SELECT * FROM post_base WHERE post_ID = $postID";
        $result = mysqli_fetch_array($conn->query($fetchEntries));
        $userID = $result['user_ID'];

        $idToUsername = "SELECT user_name, user_email FROM userbase WHERE user_ID = $userID";
		$userbaseResult = mysqli_fetch_array($conn->query($idToUsername));

        $imageLink = "./forum_images/" . $result['post_imgname'];
        $description = $result['post_body'];
        $poster = $userbaseResult['user_name'];
        $posterEmail = $userbaseResult['user_email'];

        $title = $result['post_sub'];

        $_SESSION['title'] = $title;
        $_SESSION['imageLink'] = $imageLink;
        $_SESSION['poster'] = $poster;
        $posterLink = "pageProfile.php?userID=" . $userID;
    }

    function callComments(){
        GLOBAL $postID, $conn;
        $outputArr = array();

        $fetchEntries = "SELECT * FROM forum_comments_base WHERE $postID=post_ID ORDER BY post_ID DESC";
		$entries = $conn->query($fetchEntries);
		// creates a 2d array with the queries results
		while($row = mysqli_fetch_array($entries)) {
			$idToUsername = "SELECT user_name FROM userbase WHERE user_ID = $row[1]";
			$userbaseRow = $conn->query($idToUsername);
            $username = mysqli_fetch_array($userbaseRow)['user_name'];
			array_push($row, $username); // makes it so the 7th array element is username
			array_push($outputArr, $row);
		}
		// return the 2d array to parse it in the js
		$realOutput = json_encode($outputArr);
		echo "var commentArr = " . json_encode($outputArr) . ";";
        $conn->close();
    }
?>
<script type="text/javascript">
    function copyLink() {
        var tempTextbox = document.createElement("textarea");
        document.body.appendChild(tempTextbox);
        tempTextbox.value = "https://fresnostateboard.azurewebsites.net/forumEntry.php?postID=" + "<?php echo $postID; ?>";
        tempTextbox.select();
        document.execCommand("copy");
        document.body.removeChild(tempTextbox);
    }

    function loadComments() {
        <?php
            echo json_encode(callComments()); //fetches the array and stores it out in commentArr
        ?>

        document.getElementById("commentContainer").innerHTML = "";
        for (var i = 0; i < commentArr.length; i++) {
            // going through the holder of the Listings
            var senderID = commentArr[i][1];
            var senderName = commentArr[i][4];
            var profileLink = "pageProfile.php?userID=" + commentArr[i][1]; // sends the user id to be accessed by get
            var commentBody = commentArr[i][3];

            // listing entry div
            var commentDiv = document.createElement("div");
            commentDiv.classList.add("commentEntry");
            commentDiv.id = "comment_" + i;
            
            var commentSender = document.createElement("a");
            commentSender.classList.add("commentSenderName");
            commentSender.setAttribute("href", profileLink);
            commentSender.innerHTML = senderName;
            commentDiv.appendChild(commentSender);

            var commentText = document.createElement("p");
            commentText.innerHTML = commentBody;
            commentText.classList.add("commentText");
            commentDiv.appendChild(commentText);
            /*
            // interaction buttions creation
            var ulList = document.createElement("ul");
            ulList.classList.add("interactionButtons");
            commentDiv.appendChild(ulList);

            var li_3 = document.createElement("li");
            li_3.classList.add("reportButton");
            ulList.appendChild(li_3);

            var button3 = document.createElement("a");
            button3.id = "report";
            button3.classList.add("reportBtn");
			button3.setAttribute("href", reportLink);
            button3.innerHTML = "report";
            li_3.appendChild(button3);
            */
            document.getElementById("commentContainer").appendChild(commentDiv);
        }
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
<body onload="loadComments()">
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
                <a id="posterLink" href="<?php echo $posterLink; ?>" class="poster"> <!-- Change href and innerHTML --><?php echo $poster; ?></a>
                <br>
                <p><?php echo $posterEmail; ?></p>
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
    <div class="wishlistHolder">
		<form class= "commentForm" action="<?php echo './comment.php?postID=' . $_GET['postID'] ?>" method="POST">
			<input type="text" id="comment" name="comment" placeholder="Type your comment here."required>
			<div class="messageButtons">
				<input type="submit" id="button2" value="Post Comment">
			</div>
		</form>
    </div>
    <div class="commentContainer" id="commentContainer">
    </div>
</body>
 
