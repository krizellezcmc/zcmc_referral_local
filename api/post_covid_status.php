<?php

include '../connection/cloud_db.php';

$method = $_SERVER['REQUEST_METHOD'];

    switch($method) {
        case 'POST':
            
            $data = json_decode(file_get_contents('php://input'));

            $status = $data->status;
            $swabDate = $data->swabDate;
            $resultDate = $data->resultDate;
            $patId = $data->patId;
            
           
            $stmt = $cloud_db->prepare("INSERT INTO covid_status(patientId, result, swab_date, result_date) VALUES (?, ?, ?, ?);");
            $stmt->bind_param("ssss", $patId,  $status, $swabDate, $resultDate);
                
            if($stmt->execute()){
                $data = ['status' => 1, 'message' => "Record successfully created"];
            } else {
                $data = ['status' => 0, 'message' => "Failed to create record."];
            }
            
            echo json_encode($data);
            break;
}

?>