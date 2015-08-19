<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
	<title>Customer Info</title>
</head>
<body>

<h1>Customer Info</h1>
<select name="customer" id="customer">
	<option>Select a Customer...</option>
<?php

	$dbc = new mysqli('localhost','root','','ajax_customers');

	// prepare the sql
	$sql = "SELECT ID, CONCAT(first_name, ' ', last_name) AS Customer FROM customers";

	// capture the result
	$result = $dbc->query($sql);

	// Loop over each result
	while ($customer = $result->fetch_assoc() ) {
		echo '<option value="'.$customer['ID'].'">';
		echo $customer['Customer'];
		echo "</option>";
	}

?>

</select>
<div id="customer-info"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

</body>
</html>