<?php
header("Access-Control-Allow-Origin: *"); 
header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); 
header("Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization"); 

$serverName = "again-db-1";
	$userName = "root";
	$password = "password";
	$database = "acme_widget";

	$conn = new mysqli($serverName, $userName, $password, $database);

	if($conn->connect_error){
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = 	"SELECT f.formId, f.formLocation, f.activity, f.formDate, a1.associateName as associate_name1, a1.associateTitle as associate_title1, d.departmentName, a2.associateName as associate_name2, a2.associateTitle as associate_title2, s.step_description, h.hazards, h.controls FROM jsa_data f JOIN acme_associates a1 on f.associateId = a1.associateId JOIN acme_departments d ON f.departmentId = d.departmentID JOIN acme_associates a2 ON d.associateId = a2.associateId LEFT JOIN steps s on f.formId = s.form_id LEFT JOIN step_hazard sh on s.step_id = sh.step_id LEFT JOIN hazards_controls h on sh.hazard_id = h.hazardsId;";
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