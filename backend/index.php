<?php
header("Access-Control-Allow-Origin: *"); 
header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); 
header("Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization"); 


$method = $_SERVER['REQUEST_METHOD'];
$path = $_SEVER['REQUEST_URI'];

switch($path) {
	case '/api/metadata':
		require 'endpoint/metadata.php';
		break;
	case '/api/hazards':
		require 'endpoint/get/hazards.php';
		break;
	default:
		http_response_code(404);
		echo json_encode(['error'=>'Not Found']);
} 

?>