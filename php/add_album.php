<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-eqiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width-device-width, initial-scale=1">
  <title>Successful Add</title>
  <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="margin:16px;padding:16px">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

<?php

//Connect to database
require_once('db_connect.php');

$album_name = mysqli_real_escape_string($connection,$_POST['album_name']);
$genre = mysqli_real_escape_string($connection,$_POST['genre']);
$price = $_POST['album_price'];
$band_id = mysqli_real_escape_string($connection,$_POST['band']);
$release_date = date('Y-m-d', strtotime($_POST['release_date']));

$sql = "INSERT INTO ALBUM (AlbumID, albumName, genre, price)
        VALUES (null,'$album_name','$genre','$price')";
if(mysqli_query($connection,$sql)){
  	echo "Album added Successfully.";
  	echo "<br />";
	$album_id = mysqli_insert_id($connection);
  	$sql2 = "INSERT INTO RELEASES (AlbumID, BandID, releaseDate)
			VALUES ('$album_id','$band_id','$release_date')";
	if(mysqli_query($connection,$sql2)){
	echo "Release added Successfully.";
	echo "<br />";
	} else {
	echo "ERROR: Cound not execute sql." . mysqli_error($connection);
	}

	$tracks = array();
	foreach( $_POST['tracks'] as $trackID ) {
		$tracks[] = '('.$album_id.', '.$trackID.')';
	}

	$tracks_query = 'INSERT INTO HAS_TRACK (AlbumID, TrackID) VALUES '.implode(',', $tracks).';';

	if(mysqli_query($connection,$tracks_query)){
	echo "Tracks added Successfully.";
	echo "<br />";
	} else {
	echo "ERROR: Cound not execute sql." . mysqli_error($connection);
	}
} else {
  echo "ERROR: Cound not execute sql." . mysqli_error($connection);
}

echo "<a class='btn btn-success' href='../list-albums.html'>Return Home</a>";

mysqli_close($connection);

 ?>
</body>
</html>
