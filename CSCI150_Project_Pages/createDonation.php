<?php
    include 'header.php';
?>
<body>
	<h1>Create a donation list</h1>
	<div class="mainHolder">
		<!-- createDonationInsertData.php is what php file you want to send the login into to -->
        <!-- method="post" hides the sensitive data in th HTTP transaction -->
		<form action="./createDonationInsertData.php" method="post" enctype="multipart/form-data"> <!--send to database-->
			<div>
				<label>Select item type</label>
				<select name="itemselection" required>
					<option value="">-</option>
					<option value="Book">Book</option>
					<option value="Furniture">Furniture</option>
					<option value="Electronic">Electronic</option>
					<option value="Clothes">Clothes</option>
					<option value="Other">Other</option>
				</select>
			</div>
			<div>
				<input type="text" name="title" maxlength="100" placeholder="Title" required></input>
			</div>
			<div>
				<textarea name="myTextArea" maxlength="1000" rows="30" cols="49" placeholder="Description" style="border:4px solid #1E9AFF;" required></textarea>
			</div>
			<div>
				<label>Select image file:</label>
				<input type="file" name="image" accept="image/*" required>
				<input type="submit" name="submit">
			</div>
		</form>
	</div>
</body>
