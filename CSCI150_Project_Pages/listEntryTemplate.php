<?php 
    require ('generateListings.php');
?>
<body>
    <div class="listingEntry" id="listing_1" onclick="">
        <a class="listingThumbnail" href="./errorListing.php">
            <!-- Change href link to listing page -->
            <!--<img src="./errorImage.png" width="70" height="52" alt=""> <!-- change img src. errorImage should be a question mark or along those lines-->
        </a>
        <div class="entry">
            <p class="title">
                <a class="title" href="./errorListing.php">Table looking for a new home!</a> <!-- Change href (link to listing page) and innerHTML (title)-->
            </p>
            <p class="postInfo">
                posted <span id="postTime">[FAILED TO SET]</span> by <!-- Change postTime -->
                <a href="userprofile/errorUser.php" class="poster">
                    <!-- Change href (Link to user profile) and innerHTML to user's name -->
                    errorUsername
                </a>
            </p>
            <ul class="interactionButtons">
                <li class="shareButton">
                    <button id="shareBtn" class="shareBtn" value="./errorSharePage" onclick="shareClick()">share</button> <!-- Make click copy link to keyboard -->
                </li>
                <li class="saveButton">
                    <button id="saveBtn" class="saveBtn" value="./errorSavePage" onclick="saveClick()">save</button> <!-- Not sure how to implement this. TBD or removed -->
                </li>
                <li class="reportButton">
                    <button id="reportBtn" class="reportBtn" value="./errorReportPage" onclick="reportClick()">report</button> <!-- Should open a popup window to fill out a report-->
                </li>
            </ul>
            <div class="reportForm"></div>
        </div>
    </div>
    <p id="arrPrint">
        <br /><br /><br /><br />test
    </p>
    <script type="text/javascript">
        var arrPrint = document.getElementById("arrPrint");
        arrPrint.innerHTML = "123";
        var arr = "<?php echo json_encode(callEntries('initial')); ?>";

        arrPrint.innerHTML = arr;
        function initialListings() {
            var arr = "<?php echo json_encode(loadEntries('initial')); ?>"

            for (var i = 0; i < arr.length; i++) {
                // going through the holder of the Listings
                var pageLink = "errorLink" + ".php"; // this is temp until images are stored in db
                var imgLink = "errorImg";
                var profileName = "";
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
                imgImg.setAttribute("src", "");
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
                aTitle.innerHTML = "Replace this with the listing title";
                pTitle.appendChild(aTitle);

                // post info
                var pInfo = document.createElement("p");
                pInfo.classList.add("postInfo");
                pInfo.innerHTML = "posted " + postTime + " by ";
                divE.appendChild("pInfo");

                var aInfo = document.createElement("a");
                aInfo.classList.add("poster");
                aInfo.setAttribute("href", profileLink);
                aInfo.innerHTML = profileName;
                pInfo.appendChild(aInfo);

                // interaction buttions creation
                var ulList = document.createElement("ul");
                ul.classList.add("interactionButtons");
                divE.appendChild(ulList);

                var li_1 = document.createElement("li");
                li_1.classList.add("shareButton");
                ulList.appendChild(li_1);

                var button1 = document.createElement("button");
                button1.id = "shareBtn";
                button1.classList.add("shareBtn");
                button1.setAttribute("value", fullPageLink);
                button1.setAttribute("onclick", shareClick());
                button1.innerHTML = "share";
                li_1.appendChild(button1);

                var li_2 = document.createElement("li");
                li_2.classList.add("shareButton");
                ulList.appendChild(li_2);

                var button2 = document.createElement("button");
                button2.id = "saveBtn";
                button2.classList.add("saveBtn");
                button2.setAttribute("value", fullPageLink);
                button2.setAttribute("onclick", shareClick());
                button2.innerHTML = "share";
                li_2.appendChild(button2);

                var li_3 = document.createElement("li");
                li_3.classList.add("shareButton");
                ulList.appendChild(li_3);

                var button3 = document.createElement("button");
                button3.id = "report";
                button3.classList.add("reportBtn");
                button3.setAttribute("value", fullPageLink);
                button3.setAttribute("onclick", shareClick());
                button3.innerHTML = "report";
                li_3.appendChild(button3);

                // report div
                var report = document.createElement("div");
                report.classList.add("reportForm");
                divE.appendChild(report);
            }
        }
    </script>
</body>



        <!--
<script type="text/javascript">
            function shareClick() {
        // Obtains the href value. Not sure if it will be a ./listing1 link or the full website
        var copyText = document.getElementById("shareBtn");
        // If its just ./listing1 link include the block of code below

        //var baseURL = "https://fresnostateboard.azurewebsites.net/";
        //copyText = copyText.substr(2); // ./listing1 -> listing1
        //copyText = baseURL + copyText; // https://fresnostateboard.azurewebsites.net/ + listing1

        document.execCommand("copy");
        // testing alert remove later
        alert("Copied: " + copyText);
    }
</script>
-->
