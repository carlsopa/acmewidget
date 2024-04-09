<?php
header("Access-Control-Allow-Origin: *"); 
header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); 
header("Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization"); 

$formData = json_decode(file_get_contents('php://input'),true);
$deptId=$formData['dept'];
$empId=$formData['preparer'];
$location=$formData['location'];
$activity=$formData['activity'];
$formId=rand(000000000,999999999);
$date=$formData['createdDate'];


$serverName = "again-db-1";
$userName = "root";
$password = "password";
$database = "acme_widget";
// session_start();
$conn = new mysqli($serverName, $userName, $password, $database);
$stmt = $conn->prepare("INSERT INTO jsa_data (associateId,departmentId,formId,formDate,formLocation,activity) VALUES (?,?,?,?,?,?)");
$stmt->bind_param("isssss",$empId,$deptId,$formId,$date,$location,$activity);
$stmt->execute();

// $conn->commit();

// if(!isset($_SESSION['transaction_id'])) {
// 	$conn = new mysqli($serverName, $userName, $password, $database);
// 	if($conn->connect_error) {
// 		die("connection failed: " . $conn->connect_error);
// 	}
// 	if(!$conn->begin_transaction()) {
// 		die("failed to start transaction");
// 	}
// 	$transactionId = uniqid();
// 	$_SESSION['transaction_id'] = $transactionId;
// }







	$responseData = [
		'message'=>'This actually freaken worked!',
		'department'=>$deptId,
		'employee'=>$empId,
		'location'=>$location,
		'activity'=>$activity
	];
	$response = ['message' => 'Form received successfully'];
	echo json_encode($responseData);
?>