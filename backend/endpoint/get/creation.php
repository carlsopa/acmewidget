<?php
// This file does a query and selection to populate the final form view.
header("Access-Control-Allow-Origin: *"); 
header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); 
header("Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization"); 


$serverName = "again-db-1";
	$userName = "root";
	$password = "password";
	$database = "acme_widget";

	$formId = $_GET['id'];
	$conn = new mysqli($serverName, $userName, $password, $database);
	if($conn->connect_error){
		die("Connection failed: " . $conn->connect_error);
	}

	//sql statement to combine all the tables and return the data
	$sql = 	"SELECT f.formId, f.formLocation, f.activity, f.formDate, a1.associateName as associate_name1, a1.associateTitle as associate_title1, d.departmentName, a2.associateName as associate_name2, a2.associateTitle as associate_title2, s.step_description, h.hazards, h.controls FROM jsa_data f JOIN acme_associates a1 on f.associateId = a1.associateId JOIN acme_departments d ON f.departmentId = d.departmentID JOIN acme_associates a2 ON d.associateId = a2.associateId LEFT JOIN steps s on f.formId = s.form_id LEFT JOIN step_hazard sh on s.step_id = sh.step_id LEFT JOIN hazards_controls h on sh.hazard_id = h.hazardsId WHERE f.formId = $formId;";
$data = $conn->query($sql);


$common_data = array();
$unique_data = array();


foreach ($data as $row) {
	//this pulls out the standard information only from the first row. This is creating our metadata
    if (empty($common_data)) {
        $common_data = array_intersect_key($row, array_flip(['formId','formLocation','activity','departmentName','formDate','associate_name1','associate_title1','associate_name2','associate_title2']));
    }

		//within each row we start getting the steps and hazards.
    $step_description = $row['step_description'];
    $hazard = $row['hazards'];
    $control = $row['controls'];

    //since each step can only exist once in each form we look to see if it already exists. If it does not exist we create a new entry.
    if (!isset($unique_data[$step_description])) {
        $unique_data[$step_description] = array(
            'step_description' => $step_description,
            'hazard_controls' => array()
        );
    }

    //we create a new array with just the hazards and controls which is a child of the steps.
    $unique_data[$step_description]['hazard_controls'][] = array(
        'hazard' => $hazard,
        'control' => $control
    );
}


$output_data = array(
	'id'=>$formId,
    'commonData' => $common_data,
    'uniqueData' => array_values($unique_data)
);


$output_json = json_encode($output_data);
echo $output_json;

$conn->close();
	
?>