<?php
header('Content-Type: application/json');

$response = array(
	'message'=>'Hello Dave, would you like to play a game?'
);
$jsonResponse = json_encode($response);

echo $jsonResponse;
?>