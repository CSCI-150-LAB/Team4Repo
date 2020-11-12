<?php
    include 'header.php';
?>

<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon-32x32.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./mainStyleSheet.css">
</head>
<body>

</body>
	<div>
		<form action="./pageChangePWDInsertData.php" method="post">
			<label>Older password</label>
			<input type="password" name="oldpwd" required></input>
			<label>New password</label>
			<input type="password" name="newpwd" required></input>
			<label>Comfirm new password</label>
			<input type="password" name="compwd" required></input>
			<input type="submit" name="changepwd" value="Submit"></input>
		</form>
	</div>
</html>