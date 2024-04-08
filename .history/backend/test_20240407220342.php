<?php
header('Access-Control-Allow-Origin: *')
header('Content-Type: application/json');

$response = array(
	'message'=>'Hello Dave, would you like to play a game?'
);
$jsonResponse = json_encode($response);

echo $jsonResponse;
?>