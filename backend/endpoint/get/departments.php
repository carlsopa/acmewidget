<?php


$serverName = "again-db-1";
$userName = "root";
$password = "password";
$database = "acme_widget";

$conn = new mysqli($serverName, $userName, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT a.associateId, a.associateName, a.associateTitle, d.departmentID, d.departmentName FROM acme_associates a, acme_departments d WHERE a.associateId = d.associateId;";
$sql .= "SELECT associateName, associateTitle, associateId FROM acme_associates;";

if ($conn->multi_query($sql)) {
    $data = array();
    do {
        if ($result = $conn->store_result()) {
            $tableData = array();
            while ($row = $result->fetch_assoc()) {
                $tableData[] = $row;
            }
            $result->free();
            $data[] = $tableData;
        }
    } while ($conn->more_results() && $conn->next_result());
} else {
    echo "Multi query failed: (" . $conn->errno . ") " . $conn->error;
}

// Close database connection
$conn->close();

// Echo the JSON response
echo json_encode($data);
?>
