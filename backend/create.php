<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

header("Access-Control-Allow-Origin: *"); 
header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); 
header("Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization"); 

$formData = json_decode(file_get_contents('php://input'),true);





session_start();
$serverName = "again-db-1";
$userName = "root";
$password = "password";
$database = "acme_widget";

$formId=rand(000000000,999999999);
if(!isset($_SESSION['transaction_id'])) {
	$conn = new mysqli($serverName, $userName, $password, $database);
	if($conn->connect_error) {
		die("connection failed: " . $conn->connect_error);
	}
	echo "Connection successful";
	if(!$conn->begin_transaction()) {
		die("failed to start transaction");
	}
	echo"Transaction started";
	$transactionId = uniqid();
	$_SESSION['transaction_id'] = $transactionId;
	echo "Transaction ID set";
	echo $transactionId;
}

function createMetaRecord($data,$tableId) {
	global $conn;

	$deptId=$data['dept'];
	$empId=$data['preparer'];
	$location=$data['location'];
	$activity=$data['activity'];	
	$date=$data['createdDate'];

	$stmt = $conn->prepare("INSERT INTO jsa_data (associateId,departmentId,formId,formDate,formLocation,activity) VALUES (?,?,?,?,?,?)");
 $stmt->bind_param("isssss",$empId,$deptId,$tableId,$date,$location,$activity);

 if(!$stmt->execute()){
	echo json_encode(['success'=>false,'message'=>'something bad']);
	return false;
 }else {
	echo json_encode(['success'=>true,'message'=>'this was a good meta record','id'=>$tableId]);
	return true;
}

}

function createStepRecord($data,$tableId){
	global $conn;


	$stepDescription = "PAULI IS HERE";
	$hazardId = "MICHELLE IS GETAT";

	$idf = 4541;

	$stmt = $conn->prepare("INSERT INTO steps (hazardId,stepDescription,dataId) VALUES(?,?,?);");
	$stmt->bind_param("ssi",$hazardId,$stepDescription,$idf);

	if(!$stmt->execute()){
		echo json_encode(['success'=>false,'message'=>'something happened during second setting']);
		return false;
	} else {
		echo json_encode(['success'=>true,'message'=>'this was a good step record']);
		return true;
	}
 	

//  $stmt->execute();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$formData = json_decode(file_get_contents('php://input'),true);

	$buttonClicked = $formData['buttonClick'];

	switch($buttonClicked) {
		case 'ADD':
			// $fromData = $_POST['formData'];
			createMetaRecord($formData['formData'], $formId);
			

			break;
		case 'INCLUDE':
			
				createStepRecord($formData['formData'], $formId);
				unset($_SESSION['transaction_id']);

			break;
		case 'CANCEL':
			$conn->rollback();
			unset($_SESSION['transaction_id']);
			echo json_encode(['success'=>true,'message'=>'Transaction canceled']);
			break;
		case 'CREATEJSA':
			insertIntoTableC($formData);
			unset($_SESSION['transaction_id']);
			echo json_encode(['success'=>true,'message'=>'this worked']);
			break;

		
	}
}




// $conn = new mysqli($serverName, $userName, $password, $database);
// $stmt = $conn->prepare("INSERT INTO jsa_data (associateId,departmentId,formId,formDate,formLocation,activity) VALUES (?,?,?,?,?,?)");
// $stmt->bind_param("isssss",$empId,$deptId,$formId,$date,$location,$activity);
// $stmt->execute();

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







	// $responseData = [
	// 	'message'=>'This actually freaken worked!',
	// ];
	// $response = ['message' => 'Form received successfully'];
	// echo json_encode($responseData);
?>