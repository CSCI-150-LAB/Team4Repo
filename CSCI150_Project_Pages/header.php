<?php
    require('./sessionCheck.php');
?>
<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon-32x32.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./mainStyleSheet.css">
</head>
<img class="logoText" src="./images/logoText.png" alt="Website Text Logo">
<div class="navbar">
    <a href="pageHome.php">Home</a>
    <a href="pageForum.php">Forums</a>
    <a href="listDonationDir.php">Donation Listings</a>
    <div class="dropdownContainer">
        <button class="ddButton" id="userButton">Profile</button>
        <div class="dropdownContent" id="myDropdown">
            <a id="userProfile" href="pageProfile.php">Profile</a>
            <a href="messageInbox.php">My Messages</a>
			<?php
				if ($_SESSION['role'] == 'admin') {
                    echo '<a href="pageReportsView.php">View Donation Listings Reports</a>';
                }
			?>
            <a href="sessionLogout.php">Logout</a>
        </div>
    </div>
</div>
<script type="text/javascript">
    userFirst = "<?php echo $_SESSION['firstName']; ?>";
    userEmail = "<?php echo $_SESSION['email']; ?>";
    userProfilePage = userEmail.substr(0, userEmail.indexOf("@")) + ".php";
    document.getElementById("userButton").innerHTML = userFirst + '&#9662';
    //document.getElementById("userProfile").setAttribute("href", userProfilePage);
</script>
