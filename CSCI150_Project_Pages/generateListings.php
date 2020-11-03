<?php
	require ("./db_conn.php");
	// every id element is going to need to be changed to include id
	// maybe the onclick functions too
	$startList = 0; // this should update on page change (next and prev clicks)
	$listEntries = 10; // possible to add a function to change number of listings to display
	$template = "listEntryTemplate.html";

function changeDisplayCount($displayCount) {
	$listEntries = $displayCount;
	// do this to reset the the results so things arent messed up on prev/next
	$startList = 0; // this should update on page change (next and prev clicks)
	$fetchEntries = "SELECT * FROM listingbase WHERE listing_id >= $startList AND listing_id < ($startList + $listEntries)";
	$entries = $conn->query($fetchEntries);
	while($row = mysqli_fetch_array($entries)) {
		array_push($outputArr, $row);
	}
}
/*
// on page open call loadEntries("initial");

	// change should be "add" or "sub"
	// add or subtract by list entries
	if ($change = "add"){
		$startList = $startList + $listEntries;
	}
	else if ($change = "sub") {
		if ($startList > ($startList - $listEntries)) {
			$startList = 0; // so start list doesnt end up as a neg number
		}
		else {
			$startList = $startList - $listEntries;
		}
	}
	else if ($change = "initial") {
		$startList = 0;
	}
	else {
		//output error
	}
	*/
	$outputArr = array();
	$fetchEntries = "SELECT * FROM listingbase WHERE listing_id >= $startList AND listing_id < ($startList + $listEntries)";
	$entries = $conn->query($fetchEntries);
	// creates a 2d array with the queries results
	while($row = mysqli_fetch_array($entries)) {
		$idToUsername = "SELECT username FROM userbase WHERE user_ID = $row[5]";
		$row[5] = $conn->query($idToUsername);
		array_push($outputArr, $row);
	}
	// return the 2d array to parse it in the js
	return $outputArr;
//}
?>