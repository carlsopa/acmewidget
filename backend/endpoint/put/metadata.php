<?php
$data = json_decode(file_get_contents('php://input'),true);

	$serverName = "again-db-1";
	$userName = "root";
	$password = "password";
	$database = "acme_widget";

$formId=rand(000000000,999999999);
$conn = new mysqli($serverName, $userName, $password, $database);
$formData = $data['formData'];


$deptId=$conn->real_string_escape($formData['dept']);
$empId=$conn->real_string_escape($formData['preparer']);
$location=$conn->real_string_escape($formData['location']);
$activity=$conn->real_string_escape($formData['activity']);	
$date=$conn->real_string_escape($formData['createdDate']);

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