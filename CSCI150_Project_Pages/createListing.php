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
    <h1>Create A Listing</h1>
    <form action="/action_page.php" method="get" target="_blank">
          <label for="Pname">Donation Name</label>
          <input type="text" id="Pname" name="Pname"><br><br>
          <input type="submit" value="Submit">
    </form>

    <p>Click on the submit button.</p>

</body>
</html>