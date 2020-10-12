<?php
    include 'header.php';
    // adds the logo and the nav bar to the top of the page
?>

<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
    <title></title>
    <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon-32x32.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./mainStyleSheet.css">
</head>

<body>
	<div class="mainHolder">
        <div>
		    <h1 style="text-align:center">Furniture Listings:</h1>
            <div class="listingEntry" id="listing_1" onclick="">
                <a class="listingThumbnail" href="exListing1.php">
                    <img src="./images/table.png" width="70" height="52" alt="">
                </a>
                <div class="entry">
                    <p class="title">
                        <a class="title" href="exListing1.php">Table looking for a new home!</a>
                    </p>
                    <p class="postInfo">
                        posted [1 hour ago(Time since posted)] by
                        <a href="userprofile/username.php" class="poster">
                            [ProfileName]
                        </a>
                    </p>
                    <ul class="interactionButtons">
                        <li class="shareButton">
                            <a class="shareBtn" href="#">share</a>
                        </li>
                        <li class="saveButton">
                            <a class="saveBtn" href="#">save</a>
                        </li>
                        <li class="reportButton">
                            <a class="reportBtn" href="#">report</a>
                        </li>
                    </ul>
                    <div class="reportForm"></div>
                </div>
            </div>

            <div class="listingEntry" id="listing_2" onclick="">
                <!-- This a class is used to make the image a hyperlink to the page too -->
                <a class="listingThumbnail" href="exListing2.php">
                    <img src="./images/dresser.png" width="70" height="52" alt="">
                </a>
                <div class="entry">
                    <p class="title">
                        <a class="title" href="exListing2.php">Table looking for a new home!</a>
                    </p>
                    <p class="postInfo">
                    <!-- Information about the post -->
                        posted 6 hours ago by
                        <a href="userprofile/username.php" class="poster">
                            Fake User
                        </a>
                    </p>
                    <ul class="interactionButtons">
                    <!-- Share, save, report buttons -->
                        <li class="shareButton">
                            <a class="shareBtn" href="shareClick()" id="listing2">share</a>
                        </li>
                        <li class="saveButton">
                            <a class="saveBtn" href="#">save</a>
                        </li>
                        <li class="reportButton">
                        <!-- js function to report a listing -->
                            <a class="reportBtn" href="#">report</a>
                        </li>
                    </ul>
                    <div class="reportForm"></div>
                </div>
            </div>

            <div class="listingEntry" id="listing_3" onclick="">
                <!-- This a class is used to make the image a hyperlink to the page too -->
                <a class="listingThumbnail" href="exListing3.php">
                    <img src="./images/bedFrame.jpg" width="70" height="52" alt="">
                </a>
                <div class="entry">
                    <p class="title">
                        <a class="title" href="exListing3.php">Table looking for a new home!</a>
                    </p>
                    <p class="postInfo">
                    <!-- Information about the post -->
                        posted 1 week ago by
                        <a href="userprofile/username.php" class="poster">
                            John Smith
                        </a>
                    </p>
                    <ul class="interactionButtons">
                    <!-- Share, save, report buttons -->
                        <li class="shareButton">
                            <a class="shareBtn" href="#">share</a>
                        </li>
                        <li class="saveButton">
                            <a class="saveBtn" href="#">save</a>
                        </li>
                        <li class="reportButton">
                        <!-- js function to report a listing -->
                            <a class="reportBtn" href="#">report</a>
                        </li>
                    </ul>
                    <div class="reportForm"></div>
                </div>
            </div>

            <!-- START REPEATED LISTINGS -->

            <div class="listingEntry" id="listing_1" onclick="">
                <a class="listingThumbnail" href="exListing1.php">
                    <img src="./images/table.png" width="70" height="52" alt="">
                </a>
                <div class="entry">
                    <p class="title">
                        <a class="title" href="exListing1.php">Table looking for a new home!</a>
                    </p>
                    <p class="postInfo">
                        posted [1hour ago(Time since posted)] by
                        <a href="userprofile/username.php" class="poster">
                            [ProfileName]
                        </a>
                    </p>
                    <ul class="interactionButtons">
                        <li class="shareButton">
                            <a class="shareBtn" href="#">share</a>
                        </li>
                        <li class="saveButton">
                            <a class="saveBtn" href="#">save</a>
                        </li>
                        <li class="reportButton">
                            <a class="reportBtn" href="#">report</a>
                        </li>
                    </ul>
                    <div class="reportForm"></div>
                </div>
            </div>

            <div class="listingEntry" id="listing_2" onclick="">
                <!-- This a class is used to make the image a hyperlink to the page too -->
                <a class="listingThumbnail" href="exListing2.php">
                    <img src="./images/dresser.png" width="70" height="52" alt="">
                </a>
                <div class="entry">
                    <p class="title">
                        <a class="title" href="exListing2.php">Table looking for a new home!</a>
                    </p>
                    <p class="postInfo">
                    <!-- Information about the post -->
                        posted 6 hours ago by
                        <a href="userprofile/username.php" class="poster">
                            Fake User
                        </a>
                    </p>
                    <ul class="interactionButtons">
                    <!-- Share, save, report buttons -->
                        <li class="shareButton">
                            <a class="shareBtn" href="shareClick()" id="listing2">share</a>
                        </li>
                        <li class="saveButton">
                            <a class="saveBtn" href="#">save</a>
                        </li>
                        <li class="reportButton">
                        <!-- js function to report a listing -->
                            <a class="reportBtn" href="#">report</a>
                        </li>
                    </ul>
                    <div class="reportForm"></div>
                </div>
            </div>

            <div class="listingEntry" id="listing_3" onclick="">
                <!-- This a class is used to make the image a hyperlink to the page too -->
                <a class="listingThumbnail" href="exListing3.php">
                    <img src="./images/bedFrame.jpg" width="70" height="52" alt="">
                </a>
                <div class="entry">
                    <p class="title">
                        <a class="title" href="exListing3.php">Table looking for a new home!</a>
                    </p>
                    <p class="postInfo">
                    <!-- Information about the post -->
                        posted 1 week ago by
                        <a href="userprofile/username.php" class="poster">
                            John Smith
                        </a>
                    </p>
                    <ul class="interactionButtons">
                    <!-- Share, save, report buttons -->
                        <li class="shareButton">
                            <a class="shareBtn" href="#">share</a>
                        </li>
                        <li class="saveButton">
                            <a class="saveBtn" href="#">save</a>
                        </li>
                        <li class="reportButton">
                        <!-- js function to report a listing -->
                            <a class="reportBtn" href="#">report</a>
                        </li>
                    </ul>
                    <div class="reportForm"></div>
                </div>
            </div>

            <div class="listingEntry" id="listing_1" onclick="">
                <a class="listingThumbnail" href="exListing1.php">
                    <img src="./images/table.png" width="70" height="52" alt="">
                </a>
                <div class="entry">
                    <p class="title">
                        <a class="title" href="exListing1.php">Table looking for a new home!</a>
                    </p>
                    <p class="postInfo">
                        posted [1hour ago(Time since posted)] by
                        <a href="userprofile/username.php" class="poster">
                            [ProfileName]
                        </a>
                    </p>
                    <ul class="interactionButtons">
                        <li class="shareButton">
                            <a class="shareBtn" href="#">share</a>
                        </li>
                        <li class="saveButton">
                            <a class="saveBtn" href="#">save</a>
                        </li>
                        <li class="reportButton">
                            <a class="reportBtn" href="#">report</a>
                        </li>
                    </ul>
                    <div class="reportForm"></div>
                </div>
            </div>

            <div class="listingEntry" id="listing_2" onclick="">
                <!-- This a class is used to make the image a hyperlink to the page too -->
                <a class="listingThumbnail" href="exListing2.php">
                    <img src="./images/dresser.png" width="70" height="52" alt="">
                </a>
                <div class="entry">
                    <p class="title">
                        <a class="title" href="exListing2.php">Table looking for a new home!</a>
                    </p>
                    <p class="postInfo">
                    <!-- Information about the post -->
                        posted 6 hours ago by
                        <a href="userprofile/username.php" class="poster">
                            Fake User
                        </a>
                    </p>
                    <ul class="interactionButtons">
                    <!-- Share, save, report buttons -->
                        <li class="shareButton">
                            <a class="shareBtn" href="shareClick()" id="listing2">share</a>
                        </li>
                        <li class="saveButton">
                            <a class="saveBtn" href="#">save</a>
                        </li>
                        <li class="reportButton">
                        <!-- js function to report a listing -->
                            <a class="reportBtn" href="#">report</a>
                        </li>
                    </ul>
                    <div class="reportForm"></div>
                </div>
            </div>

            <div class="listingEntry" id="listing_3" onclick="">
                <!-- This a class is used to make the image a hyperlink to the page too -->
                <a class="listingThumbnail" href="exListing3.php">
                    <img src="./images/bedFrame.jpg" width="70" height="52" alt="">
                </a>
                <div class="entry">
                    <p class="title">
                        <a class="title" href="exListing3.php">Table looking for a new home!</a>
                    </p>
                    <p class="postInfo">
                    <!-- Information about the post -->
                        posted 1 week ago by
                        <a href="userprofile/username.php" class="poster">
                            John Smith
                        </a>
                    </p>
                    <ul class="interactionButtons">
                    <!-- Share, save, report buttons -->
                        <li class="shareButton">
                            <a class="shareBtn" href="#">share</a>
                        </li>
                        <li class="saveButton">
                            <a class="saveBtn" href="#">save</a>
                        </li>
                        <li class="reportButton">
                        <!-- js function to report a listing -->
                            <a class="reportBtn" href="#">report</a>
                        </li>
                    </ul>
                    <div class="reportForm"></div>
                </div>
            </div>

            <div class="listingEntry" id="listing_1" onclick="">
                <a class="listingThumbnail" href="exListing1.php">
                    <img src="./images/table.png" width="70" height="52" alt="">
                </a>
                <div class="entry">
                    <p class="title">
                        <a class="title" href="exListing1.php">Table looking for a new home!</a>
                    </p>
                    <p class="postInfo">
                        posted [1hour ago(Time since posted)] by
                        <a href="userprofile/username.php" class="poster">
                            [ProfileName]
                        </a>
                    </p>
                    <ul class="interactionButtons">
                        <li class="shareButton">
                            <a class="shareBtn" href="#">share</a>
                        </li>
                        <li class="saveButton">
                            <a class="saveBtn" href="#">save</a>
                        </li>
                        <li class="reportButton">
                            <a class="reportBtn" href="#">report</a>
                        </li>
                    </ul>
                    <div class="reportForm"></div>
                </div>
            </div>

            <!--END REPEATED LISTINGS -->

            <div class="pageSwap">
                <div class="prevPage">
                    <a href="#">&lt;&lt;</a>
                </div>
                <div class="pageNumbers"></div>
                <div class="nextPage">
                    <a href="#">&gt;&gt;</a>
                </div>
            </div>
	    </div>
	</div>
</body>
</html>