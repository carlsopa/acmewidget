<?php
header("Access-Control-Allow-Origin: *"); 
header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); 
header("Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization"); 


$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['REQUEST_URI'];
switch($method){
	case'POST':
		switch($path) {
			case '/api/data':
				require 'endpoint/put/metadata.php';
				break;
			case '/api/steps':
				require 'endpoint/put/stepdata.php';
			} 
	case'GET':
		switch($path) {
			case '/api/create':
				require 'endpoint/get/creation.php';
				break;
			case '/api/departments':
				require 'endpoint/get/departments.php';
				break;
			case '/api/forms':
				require 'endpoint/get/forms.php';
				break;
			case '/api/hazards':
				require 'endpoint/get/hazards.php';
				break;
			} 

	}
?>