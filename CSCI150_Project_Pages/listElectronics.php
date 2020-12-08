<?php
	include 'header.php';
?>
<script type="text/javascript">
    function backToDirectory(){
        window.location.href = "./listDonationDir.php";
    }
</script>
<body onload="initialListings()">
	<div class="mainHolder">
		<div class="formHolder">
			<form class="donationForm" method="post" action=./createDonation.php> 
				<input id="donationButton" type="submit" value="Create a Donation!"/> 
			</form>
		</div>
        <div>
		    <h1 style="text-align:center">Electronic Listings:</h1>

            <button style="margin-bottom: 10px;" onclick="backToDirectory()">Back to Directory</button>
            <!-- leave listingHolder empty it gets wiped when loading entries -->
            <div id="listingHolder">
            
            </div>
            <div class="pageSwap">
                <div class="prevPage">
                    <button type="button" onclick="prevListings()">&lt;&lt;Prev</button>
                </div>
                <div class="pageNumbers"></div>
                <div class="nextPage">
                    <button type="button" onclick="nextListings()">Next&gt;&gt;</button>
                </div>
            </div>
	    </div>
	</div>
</body>
<script type="text/javascript">
	<?php
		require ("./db_conn.php");
		// every id element is going to need to be changed to include id
		// maybe the onclick functions too
		$startList = 0; // this should update on page change (next and prev clicks)
		$listEntries = 10; // possible to add a function to change number of listings to display
		$outputArr = array();

	    // on page open call loadEntries("initial");
	    function callEntries($myAction) {
		    // change should be "add" or "sub"
		    // add or subtract by list entries
		    global $startList, $listEntries, $conn, $outputArr;
		    $outputArr = array();
		    if ($myAction == "next"){
			    $startList = $startList + $listEntries;
		    }
		    else if ($myAction == "prev") {
			    if ($startList > ($startList - $listEntries)) {
				    $startList = 0; // so start list doesnt end up as a negative number
			    }
			    else {
				    $startList = $startList - $listEntries;
			    }
		    }
		    else {
                // should be either 'initial' or invalid string result
			    $startList = 0;
		    }
	
		    $fetchEntries = "SELECT * FROM listingbase WHERE listing_itemtype='Electronic' AND listing_delete = '0' AND listing_status = 'available' ORDER BY listing_ID DESC LIMIT $startList, $listEntries";
		    $entries = $conn->query($fetchEntries);
            // If you hit the end of the list it means you are at the oldest entries so you display the first 10 results from table ordered ASC
            if ($myAction == "next" && mysqli_num_rows($entries) < 10){
                $fetchEntries = "SELECT * FROM (SELECT * FROM listingbase WHERE listing_itemtype='Electronic' AND listing_delete = '0' AND listing_status = 'available' ORDER BY listing_ID ASC LIMIT 0, 10) AS Tempdb ORDER BY listing_ID DESC";
                $entries = $conn->query($fetchEntries);
            }
            // If you hit prev on the first page you should want the first 10 results
            else if ($myAction == "prev" && mysqli_num_rows($entries) < 10){
                $fetchEntries = "SELECT * FROM listingbase WHERE listing_itemtype='Electronic' AND listing_delete = '0' AND listing_status = 'available' ORDER BY listing_ID DESC LIMIT 0, 10";
                $entries = $conn->query($fetchEntries);
            }
		    // creates a 2d array with the queries results
		    while($row = mysqli_fetch_array($entries)) {
			    $idToUsername = "SELECT user_name FROM userbase WHERE user_ID = $row[5]";
			    $userbaseRow = $conn->query($idToUsername);
			    array_push($row, mysqli_fetch_array($userbaseRow)[0]); // makes it so the 7th array element is username
			    array_push($outputArr, $row);
		    }
		    // return the 2d array to parse it in the js
		    $realOutput = json_encode($outputArr);
		    echo "var jsArr = " . json_encode($outputArr) . ";";
	    }
	?>

	function initialListings() {
        <?php 
            echo json_encode(callEntries('initial')); //fetches the array and stores it out in jsArr
        ?>
        
        document.getElementById("listingHolder").innerHTML = "";
        for (var i = 0; i < jsArr.length; i++) {
            // going through the holder of the Listings
            var pageLink = "listEntry.php?listID=" + jsArr[i][0]; // this is temp until directories are stored in db
            var imgLink = "./upload_images/" + jsArr[i][4];
            var listingTitle = jsArr[i][2];
            var listingBody = jsArr[i][3];
            var profileName = jsArr[i][9];
			var listStatus = jsArr[i][7];
            var profileLink = "pageProfile.php?userID=" + jsArr[i][5]; // sends the user id to be accessed by get
            var postTime = jsArr[i][6].replace(/\./gi, "/");
            var fullPageLink = "https://fresnostateboard.azurewebsites.net/" + pageLink;
			
			//report form
			var reportLink = "pageReportForm.php?listID=" + jsArr[i][0];

            // listing entry div
            var le = document.createElement("div");
            le.classList.add("listingEntry");
            le.id = "listing_" + i;
            /*
            // image stuff
            var imgA = document.createElement("a");
            imgA.classList.add("listingThumbnail");
            imgA.setAttribute("href", pageLink);
            le.appendChild(imgA);

            var imgImg = document.createElement("img");
            imgImg.setAttribute("src", imgLink);
            imgImg.setAttribute("width", "70");
            imgImg.setAttribute("height", "52");
            imgImg.setAttribute("alt", "");
            imgA.appendChild(imgImg);
            */
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
            aTitle.innerHTML = listingTitle;
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
            button1.setAttribute("value", fullPageLink);
            //button1.setAttribute("onclick", "");
            button1.innerHTML = listStatus;
            li_1.appendChild(button1);
/*
            var li_2 = document.createElement("li");
            li_2.classList.add("saveButton");
            ulList.appendChild(li_2);

            var button2 = document.createElement("a");
            button2.id = "saveBtn";
            button2.classList.add("saveBtn");
            button2.setAttribute("value", fullPageLink);
            //button2.setAttribute("onclick", "");
            button2.innerHTML = "save";
            li_2.appendChild(button2);
*/
            var li_3 = document.createElement("li");
            li_3.classList.add("reportButton");
            ulList.appendChild(li_3);

            var button3 = document.createElement("a");
            button3.id = "report";
            button3.classList.add("reportBtn");
            button3.setAttribute("value", fullPageLink);
			button3.setAttribute("href", reportLink);
            button3.innerHTML = "report";
            li_3.appendChild(button3);

            // report div
            var report = document.createElement("div");
            report.classList.add("reportForm");
            divE.appendChild(report);

            document.getElementById("listingHolder").appendChild(le);
        }
    }
    function prevListings() {
        <?php 
            echo json_encode(callEntries('prev')); //fetches the array and stores it out in jsArr
        ?>
        
        document.getElementById("listingHolder").innerHTML = "";
        for (var i = 0; i < jsArr.length; i++) {
            // going through the holder of the Listings
            var pageLink = "listEntry.php?listID=" + jsArr[i][0]; // this is temp until directories are stored in db
            var imgLink = "./upload_images/" + jsArr[i][4];
            var listingTitle = jsArr[i][2];
            var listingBody = jsArr[i][3];
            var profileName = jsArr[i][9];
			var listStatus = jsArr[i][7];
            var profileLink = "pageProfile.php?userID=" + jsArr[i][5]; // sends the user id to be accessed by get
            var postTime = jsArr[i][6].replace(/\./gi, "/");
            var fullPageLink = "https://fresnostateboard.azurewebsites.net/" + pageLink;
			
			//report form
			var reportLink = "pageReportForm.php?listID=" + jsArr[i][0];

            // listing entry div
            var le = document.createElement("div");
            le.classList.add("listingEntry");
            le.id = "listing_" + i;

            // image stuff
            var imgA = document.createElement("a");
            imgA.classList.add("listingThumbnail");
            imgA.setAttribute("href", pageLink);
            le.appendChild(imgA);

            var imgImg = document.createElement("img");
            imgImg.setAttribute("src", imgLink);
            imgImg.setAttribute("width", "70");
            imgImg.setAttribute("height", "52");
            imgImg.setAttribute("alt", "");
            imgA.appendChild(imgImg);

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
            aTitle.innerHTML = listingTitle;
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
            button1.setAttribute("value", fullPageLink);
            //button1.setAttribute("onclick", "");
            button1.innerHTML = listStatus;
            li_1.appendChild(button1);
/*
            var li_2 = document.createElement("li");
            li_2.classList.add("saveButton");
            ulList.appendChild(li_2);

            var button2 = document.createElement("a");
            button2.id = "saveBtn";
            button2.classList.add("saveBtn");
            button2.setAttribute("value", fullPageLink);
            //button2.setAttribute("onclick", "");
            button2.innerHTML = "save";
            li_2.appendChild(button2);
*/
            var li_3 = document.createElement("li");
            li_3.classList.add("reportButton");
            ulList.appendChild(li_3);

            var button3 = document.createElement("a");
            button3.id = "report";
            button3.classList.add("reportBtn");
            button3.setAttribute("value", fullPageLink);
            //button3.setAttribute("onclick", "");
			button3.setAttribute("href", reportLink);
            button3.innerHTML = "report";
            li_3.appendChild(button3);

            // report div
            var report = document.createElement("div");
            report.classList.add("reportForm");
            divE.appendChild(report);

            document.getElementById("listingHolder").appendChild(le);
        }
    }
    function nextListings() {
        <?php 
            echo json_encode(callEntries('next')); //fetches the array and stores it out in jsArr
        ?>

        document.getElementById("listingHolder").innerHTML = "";
        for (var i = 0; i < jsArr.length; i++) {
            // going through the holder of the Listings
            var pageLink = "listEntry.php?listID=" + jsArr[i][0]; // this is temp until directories are stored in db
            var imgLink = "./upload_images/" + jsArr[i][4];
            var listingTitle = jsArr[i][2];
            var listingBody = jsArr[i][3];
            var profileName = jsArr[i][9];
			var listStatus = jsArr[i][7];
            var profileLink = "pageProfile.php?userID=" + jsArr[i][5]; // sends the user id to be accessed by get
            var postTime = jsArr[i][6].replace(/\./gi, "/");
            var fullPageLink = "https://fresnostateboard.azurewebsites.net/" + pageLink;
			
			//report form
			var reportLink = "pageReportForm.php?listID=" + jsArr[i][0];

            // listing entry div
            var le = document.createElement("div");
            le.classList.add("listingEntry");
            le.id = "listing_" + i;

            // image stuff
            var imgA = document.createElement("a");
            imgA.classList.add("listingThumbnail");
            imgA.setAttribute("href", pageLink);
            le.appendChild(imgA);

            var imgImg = document.createElement("img");
            imgImg.setAttribute("src", imgLink);
            imgImg.setAttribute("width", "70");
            imgImg.setAttribute("height", "52");
            imgImg.setAttribute("alt", "");
            imgA.appendChild(imgImg);

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
            aTitle.innerHTML = listingTitle;
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
            button1.setAttribute("value", fullPageLink);
            //button1.setAttribute("onclick", "");
            button1.innerHTML = listStatus;
            li_1.appendChild(button1);
/*
            var li_2 = document.createElement("li");
            li_2.classList.add("saveButton");
            ulList.appendChild(li_2);

            var button2 = document.createElement("a");
            button2.id = "saveBtn";
            button2.classList.add("saveBtn");
            button2.setAttribute("value", fullPageLink);
            //button2.setAttribute("onclick", "");
            button2.innerHTML = "save";
            li_2.appendChild(button2);
*/
            var li_3 = document.createElement("li");
            li_3.classList.add("reportButton");
            ulList.appendChild(li_3);

            var button3 = document.createElement("a");
            button3.id = "report";
            button3.classList.add("reportBtn");
            button3.setAttribute("value", fullPageLink);
            //button3.setAttribute("onclick", "");
			button3.setAttribute("href", reportLink);
            button3.innerHTML = "report";
            li_3.appendChild(button3);

            // report div
            var report = document.createElement("div");
            report.classList.add("reportForm");
            divE.appendChild(report);

            //while(document.getElementById("listing"))
            document.getElementById("listingHolder").appendChild(le);
        }
    }
</script>