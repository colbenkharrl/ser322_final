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

require_once('db_connect.php');

$band_name = mysqli_real_escape_string($connection,$_POST['band_name']);
$genre = mysqli_real_escape_string($connection,$_POST['genre']);
$start_date = date('Y-m-d', strtotime($_POST['start_date']));
$end_date = date('Y-m-d', strtotime($_POST['end_date']));


$sql = "INSERT INTO BAND (BandID, bandName, genre, startDate, endDate) VALUES (null,'$band_name', '$genre', '$start_date','$end_date')";
if(mysqli_query($connection,$sql)){
  echo "Band added Successfully.";
  echo "<br />";

  $band_id = mysqli_insert_id($connection);

  $members = array();
  foreach( $_POST['members'] as $musician_id ) {
	  $members[] = '('.$musician_id.', '.$band_id.', "unimplemented", "2018-06-26", "2018-06-26")';
  }

  $members_query = 'INSERT INTO MEMBER_OF (MusicianID, BandID, role, startDate, endDate) VALUES '.implode(',', $members).';';

  if(mysqli_query($connection,$members_query)){
  echo "Tracklist added Successfully.";
  echo "<br />";
  } else {
  echo "ERROR: Cound not execute sql." . mysqli_error($connection);
  }
} else {
  echo "ERROR: Cound not execute sql." . mysqli_error($connection);
}

echo "<a class='btn btn-success' href='../list-bands.html'>Return Home</a>";

mysqli_close($connection);

 ?>
</body>
</html>
