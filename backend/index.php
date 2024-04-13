<?php
header("Access-Control-Allow-Origin: *"); 
header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); 
header("Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization"); 


$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['REQUEST_URI'];
if($method === 'POST'){
	switch($path) {
	case '/api/data':
		require 'endpoint/put/metadata.php';
		break;
	case '/api/steps':
		require 'endpoint/put/stepdata.php';
	case '/api/hazards':
		require 'endpoint/get/hazards.php';
		break;
	} 
}
if($method === 'PUT'){

}
if($method === 'GET'){
	switch($path) {
	case '/api/data':
		require 'endpoint/get/creation.php';
		break;
	case '/api/steps':
		require 'endpoint/get/departments.php';
	case '/api/hazards':
		require 'endpoint/get/forms.php';
		break;
	case '/api/hazards':
		require 'endpoint/get/hazards.php';
		break;
	} 
}


?>