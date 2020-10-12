<?php
	require ("./sessionCheck.php");
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
		<a href="createDonation.php"><p style="text-align:center">Click here to donate</p></a>
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
						<a href="listBooks.php">  <!-- Clickable link -->
							<img src="./images/book.png" width="200" height="200"> <!-- Loads image -->
						</a>
					</td>
					<td>
						<a href="listFurniture.php">
							<img src="./images/furniture.png" width="200" height="200">
						</a>
					</td>
					<td>
						<a href="listElectronics.php">
							<img src="./images/electronics.png" width="200" height="200">
						</a>
					</td>
					<td>
						<a href="listClothes.php">
							<img src="./images/clothes.jpg" width="200" height="200">
						</a>
					</td>
					<td>
						<a href="listOther.php">
							<img src="./images/other.png" width="200" height="200">
						</a>
					</td>
				</tr>
			</table>
		</div>
	</div>
</body>
</html>