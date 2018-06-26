<?php

require_once('db_connect.php');

$table = $_GET["resource"];

//get results from database
$query = "	SELECT * FROM TRACK
			WHERE NOT EXISTS 
				(SELECT * FROM HAS_TRACK
				WHERE TRACK.TrackID = HAS_TRACK.TrackID) 
			ORDER BY trackName ASC;";
$result = mysqli_query($connection,$query);
$all_elements = array(); // declare array for saving property

while ($db_field = mysqli_fetch_assoc($result)) {
	$all_elements[] = $db_field;
}
echo json_encode($all_elements);

?>