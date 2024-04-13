<?php
$data = json_decode(file_get_contents('php://input'),true);

	$serverName = "again-db-1";
	$userName = "root";
	$password = "password";
	$database = "acme_widget";

$formId=rand(000000000,999999999);
$conn = new mysqli($serverName, $userName, $password, $database);
$formData = $data['formData'];


$deptId=$formData['dept'];
$empId=$formData['preparer'];
$location=$formData['location'];
$activity=$formData['activity'];	
$date=$formData['createdDate'];

$stmt = $conn->prepare("INSERT INTO jsa_data (associateId,departmentId,formId,formDate,formLocation,activity) VALUES (?,?,?,?,?,?)");
$stmt->bind_param("isssss",$empId,$deptId,$formId,$date,$location,$activity);

 if(!$stmt->execute()){
	echo json_encode(['success'=>false,'message'=>'something bad']);
	return false;
 } else{
	echo json_encode(['success'=>true,'formId'=>$formId]);
 }
$conn->commit();
?>