<?php
	include 'header.php';
?>
<body>
	<div class="mainHolder">
		<div class="formHolder">
			<form class="donationForm" method="post" action=./createDonation.php> 
				<input id="donationButton" type="submit" value="Create a Donation!"/> 
			</form>
		</div>

		<div class="interactionMenu">
			<h1 style="text-align:center">View Listings</h1>
			<table class="center">
				<tr>
					<th>Books</th> <!--Columns <a href="createDonation.php"><p style="text-align:center">Click here to donate</p></a>-->
					<th>Furniture</th>
					<th>Electronics</th>
					<th>Clothes</th>
					<th>Other</th>
				</tr>
				<tr>
					<td> <!--Rows -->
						<a href="listBooks.php">  <!-- Clickable link -->
							<img class="imageDir" src="./images/book.png" width="200" height="200"> <!-- Loads image -->
						</a>
					</td>
					<td>
						<a href="listFurniture.php">
							<img class="imageDir" src="./images/furniture.png" width="200" height="200">
						</a>
					</td>
					<td>
						<a href="listElectronics.php">
							<img class="imageDir" src="./images/electronics.png" width="200" height="200">
						</a>
					</td>
					<td>
						<a href="listClothes.php">
							<img class="imageDir" src="./images/clothes.png" width="200" height="200">
						</a>
					</td>
					<td>
						<a href="listOther.php">
							<img class="imageDir" src="./images/other.png" width="200" height="200">
						</a>
					</td>
				</tr>
			</table>
		</div>
	</div>
</body>
