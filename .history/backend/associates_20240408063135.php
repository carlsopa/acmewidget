<?php
$serverName = "localhost";
$userName = "root";
$password = "password";
$database = "acme_widget";

$conn = new mysqli($serverName, $userName, $password, $database);

if($conn->connect_error){
	die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM acme_associates";
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

// $conn = mysql_connect($serverName, $userName, $password);

// if(!$conn){
// 	die("connection failed: " . mysql_error());
// }
// $db_selected = mysql_select_db($database, $conn);
// if(!$db_selected){
// 	die("Could not select Database: " . mysql_error());
// }

// $sql = "SELECT * FROM acme_associates";
// $result = mysql_query($sql);

// if(!result){
// 	die("Query failed: " . mysql_error());
// }
// $associates = array();
// while($row = mysql_fetch_assoc($result)){
// 	$associates[] = $row;
// }
// echo json_encode($associates);
// mysql_close();
?>