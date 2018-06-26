<?php

require_once('db_connect.php');

//get results from database
$query = "	SELECT A.albumName, B.bandName, A.genre, A.price, P.producerName
			FROM ALBUM AS A, BAND AS B, PRODUCER AS P, RELEASES AS R, PRODUCES AS PRO
			WHERE PRO.ProducerID = P.ProducerID AND PRO.AlbumID = A.AlbumID AND R.BandID = B.BandID AND R.AlbumID = A.AlbumID;";
$result = mysqli_query($connection,$query);
$all_elements = array(); // declare array for saving property

while ($db_field = mysqli_fetch_assoc($result)) {
	$all_elements[] = $db_field;
}
echo json_encode($all_elements);

?>