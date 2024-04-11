<?php
require_once 'config.php';

function databaseConnection(){
$mysqli = new mysqli(serverName, userName, password, database);
if($mysqli->connect_errno) {
	die("failed to make connection to database: " . $mysqli->connect_error);
}
return $mysqli;
}
?>