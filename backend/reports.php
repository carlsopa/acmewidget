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

// SELECT f.formLocation, f.activity, f.formDate, a1.associateName as associateName1, a1.associateTitle as associateTitle1, d.departmentName, a2.associateName as assoicateName2, a2.associateTitle as associateTitle2 FROM jsa_data f JOIN acme_associates a1 ON f.associateId = a1.associateId JOIN acme_departments d ON f.departmentId = d.departmentID JOIN acme_associates a2 on d.associateId = a2.associateId; 
?>