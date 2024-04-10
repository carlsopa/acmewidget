<?php
header("Access-Control-Allow-Origin: *"); 
header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); 
header("Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization"); 
echo"PAUL C";
$data = json_decode(file_get_contents('php://input'),true);

	$serverName = "again-db-1";
	$userName = "root";
	$password = "password";
	$database = "acme_widget";

$formId=rand(000000000,999999999);
$conn = new mysqli($serverName, $userName, $password, $database);
$formData = $data['formData'];
$formId = $data['formId'];

$stepDescription = $formData['stepDescription'];
	$hazardId = $formData['hazardId'];

	$idf = 4541;

	$stmt = $conn->prepare("INSERT INTO steps (hazardId,stepDescription,dataId) VALUES(?,?,?);");
	$stmt->bind_param("ssi",$hazardId,$stepDescription,$formId);

	if(!$stmt->execute()){
		echo json_encode(['success'=>false,'message'=>'something happened during second setting']);
		return false;
	} else {
		echo json_encode(['success'=>true,'message'=>'this was a good step record']);
		return true;
	}
$conn->commit();
?>