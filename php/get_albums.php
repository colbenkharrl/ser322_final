<?php

require_once('db_connect.php');

//get results from database
$query = "	SELECT A.albumName, B.bandName, A.genre, A.price, R.releaseDate
			FROM ALBUM AS A, BAND AS B, RELEASES AS R
			WHERE R.BandID = B.BandID AND R.AlbumID = A.AlbumID;";
$result = mysqli_query($connection,$query);
$all_elements = array(); // declare array for saving property

while ($db_field = mysqli_fetch_assoc($result)) {
	$all_elements[] = $db_field;
}
echo json_encode($all_elements);

?>