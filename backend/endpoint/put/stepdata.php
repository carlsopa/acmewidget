<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization");

$data = json_decode(file_get_contents('php://input'), true);

$serverName = "again-db-1";
$userName = "root";
$password = "password";
$database = "acme_widget";
$stepId = rand(000000000, 999999999);

$conn = new mysqli($serverName, $userName, $password, $database);
$formData = $data['formData'];
$formId = $data['formId'];

$stepDescription = $conn->real_string_escape($formData['stepDescription']);
$hazardId = $conn->real_string_escape($formData['hazardId']);
$hazardList = $conn->real_string_escape($formData['hazardList']);

$conn->begin_transaction();

try {
    foreach ($hazardList as $hazard) {
        $hazardDesc = $conn->real_string_escape($hazard);
        $stmt = $conn->prepare("INSERT INTO step_hazard (step_id,hazard_id) VALUES(?,?);");
        $stmt->bind_param("ii", $stepId, $hazardDesc);
        $stmt->execute();
    }

    $stmt2 = $conn->prepare("INSERT INTO steps (step_id,step_description,form_id) values (?,?,?)");
    $stmt2->bind_param("isi", $stepId, $stepDescription, $formId);
    // Check the success of the second statement
    if (!$stmt2->execute()) {
        echo json_encode(['success' => false, 'message' => 'something went wrong with the step push']);
    } else {
        echo json_encode(['success' => true, 'message' => 'this was a good step record']);
    }

    $conn->commit();
} catch (Exception $e) {
    $conn->rollback();
    echo "Error: " . $e->getMessage();
}

$conn->close();
?>
