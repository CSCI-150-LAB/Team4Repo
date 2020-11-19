<?php
   include 'header.php';
?>

<body onload="initialListings()">
	<div class="mainHolder">
        <div class="tagSearch">
            <select class="tagList" name="tagList" id="tagList">
                    <option selected="" value="null">Search by tag:</option>
                    <option value="ACCT">Accountancy (ACCT)</option>
                    <option value="AFRS">Africana Studies Program (AFRS)</option>
                    <option value="AGBS">Agricultural Business (AGBS)</option>
                    <option value="AGED">Agricultural Education (AGED)</option>
                    <option value="AGRI">Agriculture-Graduate or Interdisciplinary (AGRI)</option>
                    <option value="AH">Arts &amp; Humanities - Interdisciplinary (AH)</option>
                    <option value="AIS">American Indian Studies (AIS)</option>
                    <option value="ANTH">Anthropology (ANTH)</option>
                    <option value="ARAB">Arabic (ARAB)</option>
                    <option value="ARM">Armenian (ARM)</option>
                    <option value="ARMS">Armenian Studies (ARMS)</option>
                    <option value="ART">Art (ART)</option>
                    <option value="ARTDS">Art and Design (ARTDS)</option>
                    <option value="ARTH">Art History (ARTH)</option>
                    <option value="ASAM">Asian American Studies (ASAM)</option>
                    <option value="ASCI">Animal Sciences (ASCI)</option>
                    <option value="ASP">Aerospace Studies (ASP)</option>
                    <option value="AT">Athletic Training (AT)</option>
                    <option value="ATHL">Athletics (ATHL)</option>
                    <option value="BA">Business Administration (BA)</option>
                    <option value="BIOL">Biology (BIOL)</option>
                    <option value="BIOTC">Biotechnology (BIOTC)</option>
                    <option value="CE">Civil Engineering (CE)</option>
                    <option value="CFS">Child and Family Science (CFS)</option>
                    <option value="CGSCI">Cognitive Science (CGSCI)</option>
                    <option value="CHEM">Chemistry (CHEM)</option>
                    <option value="CHIN">Chinese (CHIN)</option>
                    <option value="CI">Curriculum and Instruction (CI)</option>
                    <option value="CLAS">Chicano and Latin American Studies (CLAS)</option>
                    <option value="CM">Construction Management (CM)</option>
                    <option value="COMM">Communication (COMM)</option>
                    <option value="COMS">Community Service (COMS)</option>
                    <option value="COUN">Counselor Education (COUN)</option>
                    <option value="CRIM">Criminology (CRIM)</option>
                    <option value="CRP">City and Regional Planning (CRP)</option>
                    <option value="CSB">Craig School of Business - Business Administration (CSB)</option>
                    <option value="CSCI">Computer Science (CSCI)</option>
                    <option value="CSDS">Communicative Sciences and Deaf Studies (CSDS)</option>
                    <option value="CSM">College of Science and Mathematics (CSM)</option>
                    <option value="CST">CalState TEACH (CST)</option>
                    <option value="CULG">Food Culinary Science (CULG)</option>
                    <option value="DANCE">Dance-Theatre Arts (DANCE)</option>
                    <option value="DRAMA">Drama-Theatre Arts (DRAMA)</option>
                    <option value="DS">Decision Sciences (DS)</option>
                    <option value="EAD">Educational Administration (EAD)</option>
                    <option value="ECE">Electrical and Computer Engineering (ECE)</option>
                    <option value="ECON">Economics (ECON)</option>
                    <option value="EDL">Educational Leadership (EDL)</option>
                    <option value="EES">Earth &amp; Environmental Sciences (EES)</option>
                    <option value="EHD">Education and Human Development (EHD)</option>
                    <option value="ENGL">English (ENGL)</option>
                    <option value="ENGR">Engineering (ENGR)</option>
                    <option value="ENOL">Enology (ENOL)</option>
                    <option value="ENTR">Entrepreneurship (ENTR)</option>
                    <option value="ERE">Educational Research &amp; Evaluation (ERE)</option>
                    <option value="ESE">Early Start English (ESE)</option>
                    <option value="ESL">English as a Second Language (ESL)</option>
                    <option value="ESM">Early Start Mathematics (ESM)</option>
                    <option value="FBS">Forensic Behavioral Sciences (FBS)</option>
                    <option value="FCS">Family and Consumer Sciences (FCS)</option>
                    <option value="FIN">Finance (FIN)</option>
                    <option value="FL">Foreign Language (FL)</option>
                    <option value="FM">Fashion Merchandising (FM)</option>
                    <option value="FN">Food and Nutrition (FN)</option>
                    <option value="FREN">French (FREN)</option>
                    <option value="FSC">Food Science (FSC)</option>
                    <option value="FSM">Food Systems Management (FSM)</option>
                    <option value="GD">Graphic Design (GD)</option>
                    <option value="GEOG">Geography (GEOG)</option>
                    <option value="GERM">German (GERM)</option>
                    <option value="GERON">Gerontology (GERON)</option>
                    <option value="GME">Geomatics Engineering (GME)</option>
                    <option value="GRK">Greek (GRK)</option>
                    <option value="HEAL">Higher Education Administration and Leadership (HEAL)</option>
                    <option value="HEBR">Hebrew (HEBR)</option>
                    <option value="HEC">Home Economics Education (HEC)</option>
                    <option value="HHS">Health and Human Services (HHS)</option>
                    <option value="HIST">History (HIST)</option>
                    <option value="HMONG">Hmong (HMONG)</option>
                    <option value="HONOR">Smittcamp Honors College (HONOR)</option>
                    <option value="HRM">Human Resource Management (HRM)</option>
                    <option value="HUM">Humanities (HUM)</option>
                    <option value="IAS">Interdisciplinary Arts Studies (IAS)</option>
                    <option value="ID">Interior Design (ID)</option>
                    <option value="INTD">Interdisciplinary Capstone (INTD)</option>
                    <option value="IS">Information Systems (IS)</option>
                    <option value="ISA">International Studies Abroad (ISA)</option>
                    <option value="IT">Industrial Technology (IT)</option>
                    <option value="ITAL">Italian (ITAL)</option>
                    <option value="JAPN">Japanese (JAPN)</option>
                    <option value="JS">Jewish Studies (JS)</option>
                    <option value="KAC">Kinesiology Activity (KAC)</option>
                    <option value="KINES">Kinesiology (KINES)</option>
                    <option value="LATIN">Latin (LATIN)</option>
                    <option value="LEE">Literacy and Early Education (LEE)</option>
                    <option value="LING">Linguistics (LING)</option>
                    <option value="LS">Liberal Studies (LS)</option>
                    <option value="MATH">Mathematics (MATH)</option>
                    <option value="MBA">Master of Business Administration (MBA)</option>
                    <option value="MCJ">Media, Communications and Journalism (MCJ)</option>
                    <option value="ME">Mechanical Engineering (ME)</option>
                    <option value="MEAG">Mechanized Agriculture (MEAG)</option>
                    <option value="MES">Middle East Studies (MES)</option>
                    <option value="MGT">Management (MGT)</option>
                    <option value="MKTG">Marketing (MKTG)</option>
                    <option value="MPA">Master of Public Administration (MPA)</option>
                    <option value="MS">Military Science (MS)</option>
                    <option value="MSA">Master of Science in Accountancy (MSA)</option>
                    <option value="MUSIC">Music (MUSIC)</option>
                    <option value="NSCI">Natural Science (NSCI)</option>
                    <option value="NURS">Nursing (NURS)</option>
                    <option value="NUTR">Nutrition (NUTR)</option>
                    <option value="PAX">Peace and Conflict Studies (PAX)</option>
                    <option value="PERS">Persian (PERS)</option>
                    <option value="PH">Public Health (PH)</option>
                    <option value="PHIL">Philosophy (PHIL)</option>
                    <option value="PHTH">Physical Therapy (PHTH)</option>
                    <option value="PHYS">Physics (PHYS)</option>
                    <option value="PLANT">Plant Science (PLANT)</option>
                    <option value="PLSI">Political Science (PLSI)</option>
                    <option value="PORT">Portuguese (PORT)</option>
                    <option value="PSCI">Physical Science (PSCI)</option>
                    <option value="PSYCH">Psychology (PSYCH)</option>
                    <option value="RA">Recreation Administration (RA)</option>
                    <option value="REC">Recreation Administration (REC)</option>
                    <option value="REHAB">Rehabilitation Counseling (REHAB)</option>
                    <option value="SOC">Sociology (SOC)</option>
                    <option value="SPAN">Spanish (SPAN)</option>
                    <option value="SPED">Special Education (SPED)</option>
                    <option value="SSCI">Social Science (SSCI)</option>
                    <option value="SWRK">Social Work (SWRK)</option>
                    <option value="UNIV">University (UNIV)</option>
                    <option value="VEN">Viticulture and Enology (VEN)</option>
                    <option value="VIT">Viticulture (VIT)</option>
                    <option value="WS">Women's Studies (WS)</option>
            </select>
            <button type"button" onclick="applyFilter()">Submit</button>
        </div>
        <div class="forumPosts">
            <div class="posting">
			    <a href="createForum.php"><p style="text-align:center">Click here to post</p></a>
                <img class="postImage" src="" alt="">
            </div>
        </div>
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
            if(isset($_GET['classTag']) && $_GET['classTag'] != 'null'){
                $classTag = $_GET['classTag'];
                $fetchEntries = "SELECT * FROM post_base WHERE post_class = '$classTag' ORDER BY post_ID DESC LIMIT $startList, $listEntries";
            }
            else {
                $fetchEntries = "SELECT * FROM post_base ORDER BY post_ID DESC LIMIT $startList, $listEntries";
            }
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
	    }
	?>

    function applyFilter() {
        location.replace("./pageForum.php?classTag=" + document.getElementById("tagList").value);
    }

	function initialListings() {
        <?php 
            echo json_encode(callEntries('initial')); //fetches the array and stores it out in jsArr
        ?>
        
        document.getElementById("listingHolder").innerHTML = "";
        for (var i = 0; i < jsArr.length; i++) {
            // going through the holder of the Listings
            var pageLink = "forumEntry.php?postID=" + jsArr[i][0]; // this is temp until directories are stored in db
            var imgLink = "./forum_images/" + jsArr[i][6];
            var postTitle = jsArr[i][1] + " - " + jsArr[i][2];
            var postBody = jsArr[i][3];
            var profileName = jsArr[i][7];
            var profileLink = "pageProfile.php?userID=" + jsArr[i][5]; // sends the user id to be accessed by get
            var postTime = jsArr[i][4].replace(/\./gi, "/");
            var fullPageLink = "https://fresnostateboard.azurewebsites.net/" + pageLink;

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
            button1.setAttribute("value", fullPageLink);
            //button1.setAttribute("onclick", "");
            button1.innerHTML = "share";
            li_1.appendChild(button1);

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

            var li_3 = document.createElement("li");
            li_3.classList.add("reportButton");
            ulList.appendChild(li_3);

            var button3 = document.createElement("a");
            button3.id = "report";
            button3.classList.add("reportBtn");
            button3.setAttribute("value", fullPageLink);
            //button3.setAttribute("onclick", "");
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
            var pageLink = "forumEntry.php?postID=" + jsArr[i][0]; // this is temp until directories are stored in db
            var imgLink = "./forum_images/" + jsArr[i][6];
            var postTitle = jsArr[i][2];
            var postBody = jsArr[i][3];
            var profileName = jsArr[i][9];
            var profileLink = "pageProfile.php?userID=" + jsArr[i][5]; // sends the user id to be accessed by get
            var postTime = jsArr[i][4].replace(/\./gi, "/");
            var fullPageLink = "https://fresnostateboard.azurewebsites.net/" + pageLink;

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
            button1.setAttribute("value", fullPageLink);
            //button1.setAttribute("onclick", "");
            button1.innerHTML = "share";
            li_1.appendChild(button1);

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

            var li_3 = document.createElement("li");
            li_3.classList.add("reportButton");
            ulList.appendChild(li_3);

            var button3 = document.createElement("a");
            button3.id = "report";
            button3.classList.add("reportBtn");
            button3.setAttribute("value", fullPageLink);
            //button3.setAttribute("onclick", "");
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
            var pageLink = "forumEntry.php?postID=" + jsArr[i][0]; // this is temp until directories are stored in db
            var imgLink = "./forum_images/" + jsArr[i][6];
            var postTitle = jsArr[i][2];
            var postBody = jsArr[i][3];
            var profileName = jsArr[i][9];
            var profileLink = "pageProfile.php?userID=" + jsArr[i][5]; // sends the user id to be accessed by get
            var postTime = jsArr[i][4].replace(/\./gi, "/");
            var fullPageLink = "https://fresnostateboard.azurewebsites.net/" + pageLink;

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
            button1.setAttribute("value", fullPageLink);
            //button1.setAttribute("onclick", "");
            button1.innerHTML = "share";
            li_1.appendChild(button1);

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

            var li_3 = document.createElement("li");
            li_3.classList.add("reportButton");
            ulList.appendChild(li_3);

            var button3 = document.createElement("a");
            button3.id = "report";
            button3.classList.add("reportBtn");
            button3.setAttribute("value", fullPageLink);
            //button3.setAttribute("onclick", "");
            button3.innerHTML = "report";
            li_3.appendChild(button3);

            // report div
            var report = document.createElement("div");
            report.classList.add("reportForm");
            divE.appendChild(report);

            document.getElementById("listingHolder").appendChild(le);
        }
    }
</script>
