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

$sql = "INSERT INTO ALBUM (AlbumID, albumName, genre, Price)
        VALUES (null,'$album_name','$genre','$price')";
if(mysqli_query($connection,$sql)){
  echo "Records added Successfully.";
  echo "<br />";
  echo "<a class='btn btn-success' href='index.php'>Return Home</a>";
} else {
  echo "ERROR: Cound not execute sql." . mysqli_error($connection);
}
mysqli_close($connection);

 ?>
</body>
</html>
