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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./mainStyleSheet.css">
</head>

<body>
	<div class="mainHolder">
		<!-- createDonationInsertData.php is what php file you want to send the login into to -->
        <!-- method="post" hides the sensitive data in th HTTP transaction -->
		<form action="./createDonationInsertData.php" method="post" enctype="multipart/form-data"> <!--send to database-->
			<div>
				<label>Select item type</label>
				<select name="itemselection">
					<option value="">-</option>
					<option value="Books">Books</option>
					<option value="Furnitures">Furnitures</option>
					<option value="Electronic">Electronic</option>
					<option value="Clothes">Clothes</option>
					<option value="Other">Other</option>
				</select>
			</div>
			<div>
				<input type="text" name="title" maxlength="100" placeholder="Title"></input>
			</div>
			<div>
				<textarea name="myTextArea" maxlength="500" rows="30" cols="50" placeholder="Description"></textarea>
			</div>
			<div>
				<label>Select image file:</label>
				<input type="file" name="image" accept="image/*">
				<input type="submit" name="submit">
			</div>
		</form>
	</div>
</body>
</html>