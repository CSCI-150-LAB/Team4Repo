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
<body>
    <div class="mainHolder">
        <div class="homePageContent">
            <div class="leftSide">
                <div class="forumPreview">
                    This is where the forumPreview will be.
                    <div class="forumItem">
                        <a href="#">SQL query to fetch the first 3 forum elements.</a>
                    </div>
                </div>
                <div class="listingMenu">
                    <a href="listBooks.php">Books</a>
                    <a href="listFurniture.php">Furniture</a>
                    <a href="listElectronics.php">Electronics</a>
                    <a href="listClothes.php">Clothes</a>
                    <a href="listOther.php">Other</a>
                </div>
            </div>

            <div class="rightSide">
                <div class="newsFeed" id="newsFeed">
                    <script type="text/javascript" src="rssExport.js"></script>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 