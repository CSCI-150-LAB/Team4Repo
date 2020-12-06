<?php
   include 'header.php'; // adds the logo and the nav bar to the top of the page
?>
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon-32x32.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./mainStyleSheet.css">
</head>
<body onload="initialListings()">
    <div class="mainHolder">
        <div class="homePageContent">
            <div class="leftSide">
                <div id="forumPreview" class="forumPreview">
                </div>
                <div class="listingMenu">
                    <p class="menuTitle">Donation Listing Quick Access</p>
                    <a href="listBooks.php">Books</a>
                    <a href="listFurniture.php">Furniture</a>
                    <a href="listElectronics.php">Electronics</a>
                    <a href="listClothes.php">Clothes</a>
                    <a href="listOther.php">Other</a>
                </div>
            </div>
            <div class="rightSide">
                <div class="newsFeed" id="newsFeed">
                    <p class="menuTitle">Fresno State News</p>
                    <script type="text/javascript" src="rssExport.js"></script>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script type="text/javascript">
	<?php
		require ("./db_conn.php");
		$outputArr = array();

	    function callThreeEntries() {
		    global $startList, $listEntries, $conn, $outputArr;
		    $outputArr = array();

            $fetchEntries = "SELECT * FROM post_base ORDER BY post_ID DESC LIMIT 0, 3";
		    $entries = $conn->query($fetchEntries);
		    // creates a 2d array with the queries results
		    while($row = mysqli_fetch_array($entries)) {
			    $idToUsername = "SELECT user_name FROM userbase WHERE user_ID = $row[5]";
			    $userbaseRow = $conn->query($idToUsername);
                $username = mysqli_fetch_array($userbaseRow)['user_name'];
			    array_push($row, $username); // makes it so the 7th array element is username
			    array_push($outputArr, $row);
		    }
		    // return the 2d array to parse it in the js
		    $realOutput = json_encode($outputArr);
		    echo "var jsArr = " . json_encode($outputArr) . ";";
            $conn->close();
	    }
	?>

	function initialListings() {
        <?php 
            echo json_encode(callThreeEntries()); //fetches the array and stores it out in jsArr
        ?>
        
        document.getElementById("forumPreview").innerHTML = "";
        var pTag = document.createElement("p");
        pTag.innerHTML = "Recent Forum Posts";
        pTag.classList.add("menuTitle");
        document.getElementById("forumPreview").appendChild(pTag);
        for (var i = 0; i < jsArr.length; i++) {
            // going through the holder of the Listings
            var pageLink = "forumEntry.php?postID=" + jsArr[i][0]; // this is temp until directories are stored in db
            var postTitle = jsArr[i][2];
            var postBody = jsArr[i][3];
            var profileName = jsArr[i][7];
            var profileLink = "pageProfile.php?userID=" + jsArr[i][5]; // sends the user id to be accessed by get
            var postTime = jsArr[i][4].replace(/\./gi, "/");

            // report form
            var reportLink = "./pageReportForm.php?postID=" + jsArr[i][0];
            // listing entry div
            var le = document.createElement("div");
            le.classList.add("listingEntry");
            le.id = "listing_" + i;

            // entry div
            var divE = document.createElement("div");
            divE.classList.add("entry");
            le.appendChild(divE);

            // post info
            var pTitle = document.createElement("p");
            pTitle.classList.add("title");
            divE.appendChild(pTitle);

            var aTitle = document.createElement("a");
            aTitle.classList.add("title");
            aTitle.setAttribute("href", pageLink);
            aTitle.innerHTML = postTitle;
            pTitle.appendChild(aTitle);

            // post info
            var pInfo = document.createElement("p");
            pInfo.classList.add("postInfo");
            pInfo.innerHTML = "posted on " + postTime + " by ";
            divE.appendChild(pInfo);

            var aInfo = document.createElement("a");
            aInfo.classList.add("poster");
            aInfo.setAttribute("href", profileLink);
            aInfo.innerHTML = profileName;
            pInfo.appendChild(aInfo);

            // interaction buttions creation
            var ulList = document.createElement("ul");
            ulList.classList.add("interactionButtons");
            divE.appendChild(ulList);
            // share button is named copyBtn as shareBtn was not displaying for some reason
            var li_1 = document.createElement("li");
            li_1.classList.add("copyButton");
            ulList.appendChild(li_1);

            var button1 = document.createElement("a");
            button1.id = "copyBtn";
            button1.classList.add("copyBtn");
            button1.innerHTML = "share";
            li_1.appendChild(button1);

            var li_3 = document.createElement("li");
            li_3.classList.add("reportButton");
            ulList.appendChild(li_3);

            var button3 = document.createElement("a");
            button3.id = "report";
            button3.classList.add("reportBtn");
            button3.setAttribute("href", reportLink);
            button3.innerHTML = "report";
            li_3.appendChild(button3);

            // report div
            var report = document.createElement("div");
            report.classList.add("reportForm");
            divE.appendChild(report);

            document.getElementById("forumPreview").appendChild(le);
        }
    }
</script>