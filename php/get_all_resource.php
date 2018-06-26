<?php

require_once('db_connect.php');

if (isset($_GET["resource"])) {

	$table = $_GET["resource"];

	//get results from database
	$query = "SELECT * FROM " . $table . ";";
	$result = mysqli_query($connection,$query);
	$all_elements = array(); // declare array for saving property

	while ($db_field = mysqli_fetch_assoc($result)) {
		$all_elements[] = $db_field;
	}
	echo json_encode($all_elements);
} else {
	echo "no resource specified";
}

?>