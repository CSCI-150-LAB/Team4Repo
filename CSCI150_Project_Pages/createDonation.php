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
		<form action="action.php"> <!--send to database-->
			<div>
				<p>Select item type</p>
				<label for="itemselection"> </label>
				<select id="itemselection" name="itemselection" required>
					<option value="Books">Books</option>
					<option value="Furnitures">Furnitures</option>
					<option value="Electronic">Electronic</option>
					<option value="Clothes">Clothes</option>
					<option value="Other">Other</option>
				</select>
			</div>
			<div>
				<label for="title"> </label>
				<input type="text" id="title" name="title" placeholder="Title" required/>
			</div>
			<div>
				<label> </label>
				<textarea id="myTextArea" maxlength="500" rows="30" cols="50" placeholder="Description"></textarea>
			</div>
			<div>
				<label for="img">Select image 1:</label>
				<input type="file" id="img" accept="image/*">

				<label for="img2">Select image 2:</label>
				<input type="file" id="img2" accept="image/*">

				<label for="img3">Select image 3:</label>
				<input type="file" id="img3" accept="image/*">

				<input type="submit">
			</div>
		</form>
	</div>
</body>
</html>