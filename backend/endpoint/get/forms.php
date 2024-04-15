<?php

$serverName = "again-db-1";
	$userName = "root";
	$password = "password";
	$database = "acme_widget";

	$conn = new mysqli($serverName, $userName, $password, $database);

	if($conn->connect_error){
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT m.activity, m.formDate, m.formId, d.departmentName FROM jsa_data as m, acme_departments as d WHERE m.departmentId = d.departmentID";
$result = $conn->query($sql);

if($result->num_rows > 0){
	$rows = array();
	while($row = $result->fetch_assoc()){
		$rows[] = $row;
	}
	echo json_encode($rows);
} else {
	echo "0 results";
}
$conn->close();
	
?>