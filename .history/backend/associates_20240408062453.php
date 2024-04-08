<?php
$serverName = "localhost";
$userName = "root";
$password = "password";
$database = "acme_widget";

$conn = mysql_connect($serverName, $userName, $password);

if(!$conn){
	die("connection failed: " . mysql_error());
}
$db_selected = mysql_select_db($database, $conn);
if(!$db_selected){
	die("Could not select Database: " . mysql_error());
}

$sql = "SELECT * FROM acme_associates";
$result = mysql_query($sql);

if(!result){
	die("Query failed: " . mysql_error());
}
$associates = array();
while($row = mysql_fetch_assoc($result)){
	$associates[] = $row;
}
echo json_encode($associates);
mysql_close();
?>