<?php
header("Access-Control-Allow-Origin: *"); 
header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); 
header("Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization"); 

$formData = json_decode(file_get_contents('php://input'),true);

	$deptId=$formData['dept'];
	$empId=$formData['preparer'];
	$location=$formData['location'];
	$activity=$formData['activity'];

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