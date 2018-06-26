<?php

require_once('db_connect.php');

//get results from database
$query = "	SELECT T.trackName, T.length, A.albumName, B.bandName 
			FROM TRACK AS T, HAS_TRACK AS H, ALBUM AS A, RELEASES as R, BAND as B 
			WHERE R.BandID = B.BandID AND R.AlbumID = A.AlbumID AND H.AlbumID = A.AlbumID AND H.TrackID = T.TrackID;";
$result = mysqli_query($connection,$query);
$all_elements = array(); // declare array for saving property

while ($db_field = mysqli_fetch_assoc($result)) {
	$all_elements[] = $db_field;
}
echo json_encode($all_elements);

 ?>