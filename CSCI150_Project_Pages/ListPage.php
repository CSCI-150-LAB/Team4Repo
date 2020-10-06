<?php
   require ("./Session.php");
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
		<img class="logoText" src="./images/logoText.png" alt="Website Text Logo">
        <div class="navBar-container">
            <div class="navBar">
                <a href="HomePage.php">Home</a>
                <a href="ForumPage.php">Forums</a>
                <a href="ListPage.php">Donation Listings</a>
                <a href="AboutPage.php">About</a>
                <a href="Logout.php">Logout</a>
            </div>
        </div>
	</div>
	<div>
		<a href="CreateDonationPage.html">
			<p style="text-align:center"> Click here to donate</p>
		</a>
	</div>
	<div class="interactionMenu">
		<h1 style="text-align:center">Categories</h1>
		<table class="center">
			<tr>
				<th>Books</th> <!--Columns -->
				<th>Furnitures</th>
				<th>Electronics</th>
				<th>Clothes</th>
				<th>Other</th>
			</tr>
			<tr>
				<td> <!--Rows -->
					<a href="BooksList.html">  <!-- Clickable link -->
						<img src="./images/book.png" width="200" height="200"> <!-- Loads image -->
					</a>
				</td>
				<td>
					<a href="FurnituresList.html">
						<img src="./images/furniture.png" width="200" height="200">
					</a>
				</td>
				<td>
					<a href="ElectronicsList.html">
						<img src="./images/electronics.png" width="200" height="200">
					</a>
				</td>
				<td>
					<a href="ClothesList.html">
						<img src="./images/clothes.jpg" width="200" height="200">
					</a>
				</td>
				<td>
					<a href="OtherList.html">
						<img src="./images/other.png" width="200" height="200">
					</a>
				</td>
			</tr>
		</table>
	</div>
</body>

</html>