<?php

// Capture the data 
// echo 'Hello from PHP'.$_GET['customerID'];

// Connect the the database
$dbc = new mysqli('localhost','root','','ajax_customers');

// filter the ID
$customerID = $dbc->real_escape_string( $_GET['customerID']);

// Prepare the SQL
$sql = "SELECT phone, email 
		FROM customers 
		WHERE id = $customerID";

// run the SQL
$resultDB = $dbc->query($sql);

// if there was no result
if ( $resultDB->num_rows == 1 ) {
	
	// convert the result into an associative array
	$resultASSOC = $resultDB->fetch_assoc();

	// Convert the result into JSON
	$resultJSON = json_encode($resultASSOC);

	// Set up a header so Javascript knows that we are sending JSON
	header('Content-Type: application/json');

	// Send the data back to Javascript
	echo $resultJSON;

} else ( $result->num_rows == 0) {
	
}