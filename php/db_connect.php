<?php

$host = 'localhost'; //host address
$user = 'root'; //change to user name for database
$pass = 'root'; //change to password for database
$dbName = 'mytunes2'; // change to database name

//create connection
$connection = mysqli_connect($host, $user, $pass, $dbName);

//test for failure
if(mysqli_connect_errno()) {
  die("connection failed: "
    . mysqli_connect_error()
    . " (" . mysqli_connect_errno()
    . ")");
}
?>
