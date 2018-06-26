<?php

require_once('db_connect.php');

$table = $_GET["resource"];

//get results from database
$query = "SELECT * FROM MUSICIAN ORDER BY firstName, lastName;";
$result = mysqli_query($connection,$query);
$all_elements = array(); // declare array for saving property

while ($db_field = mysqli_fetch_assoc($result)) {
	$all_elements[] = $db_field;
}
echo json_encode($all_elements);

?>