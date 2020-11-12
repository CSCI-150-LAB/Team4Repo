<?php
	include 'header.php';
?>
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
