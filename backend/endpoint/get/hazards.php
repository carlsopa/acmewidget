<?php

header("Access-Control-Allow-Origin: *"); 
header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); 
header("Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization"); 
// require_once '../../functions.php';
$serverName = "again-db-1";
$userName = "root";
$password = "password";
$database = "acme_widget";

$conn = new mysqli($serverName, $userName, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// $conn = $databaseConnection();
$sql = "SELECT * FROM hazards_controls;";

$result = $conn->query($sql);

if($result->num_rows > 0){
	$rows = array();
	while($row = $result->fetch_assoc()){
		$rows[] = $row;
	}
	echo json_encode($rows);
} else {
	echo "0 results";
}
$conn->close();


?>