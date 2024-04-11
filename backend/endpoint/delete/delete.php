<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization");

$serverName = "again-db-1";
$userName = "root";
$password = "password";
$database = "acme_widget";
$formId = $_GET['id'];

$conn = new mysqli($serverName, $userName, $password, $database);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE j, st, sh
FROM jsa_data j
LEFT JOIN steps st ON j.formId = st.form_id
LEFT JOIN step_hazard sh ON st.step_id = sh.step_id
WHERE j.formId = $formId";

$result=$conn->query($sql);

if($result == TRUE){
	echo"deletion successful";
} else {
	echo "Error: " . $conn->error;
}

$conn->close();
?>