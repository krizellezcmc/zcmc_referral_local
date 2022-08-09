<?php

include './compare.php';



    if(count($result) > 0) { 
        
            // Clear table
            $delete = $cloud_db->prepare("DELETE from patient");
                        
            if ($delete->execute()) {
                echo json_encode('Success clearing patient data');
            } else {
                echo json_encode('Failed to delete data');
            }
            
        foreach($result as $key => $value){

            $patId = $value['patid'];
            $patientName = $value['patientname'];
            $referredFrom = $value['referredfrom'];
            $dischDiagnosis = $value['dischdiagnosis'];
            $finalDiagnosis = $value['finaldiagnosis'];
            
            if($value['referreddate'] === NULL) {
                $referredDate = NULL;
            } else {
                $referredDate = $value['referreddate']->format("Y/m/d h:i:s");        
            }

            if($value['registrydate'] === NULL) {
                $registryDate = NULL;
            } else {
                $registryDate = $value['registrydate']->format("Y/m/d h:i:s");  
            }

            if($value['dischdate'] === NULL) {
                $dischDate = NULL;
            } else {
                $dischDate = $value['dischdate']->format("Y/m/d h:i:s");
            }
            
            // Insert to cloud db
            $insert = $cloud_db->prepare(
                        "INSERT INTO patient( 
                        patId,
                        patientName,
                        referredDate,
                        referredFrom,
                        registryDate,
                        dischDiagnosis,
                        finalDiagnosis,
                        dischDate) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");

        $insert->bind_param("isssssss", $patId, $patientName, $referredDate, $referredFrom, $registryDate, $dischDiagnosis, $finalDiagnosis, $dischDate);

        if ($insert->execute()) {
            echo json_encode('New data inserted');
        } else {
            echo json_encode('Insertion Failed');
        }

        }
        
    } else {
        // Insert to cloud db
        foreach($result as $key => $value){

            $patId = $value['patid'];
            $patientName = $value['patientname'];
            $referredFrom = $value['referredfrom'];
            $dischDiagnosis = $value['dischdiagnosis'];
            $finalDiagnosis = $value['finaldiagnosis'];
            
            if($value['referreddate'] === NULL) {
                $referredDate = NULL;
            } else {
                $referredDate = $value['referreddate']->format("Y/m/d h:i:s");        
            }

            if($value['registrydate'] === NULL) {
                $registryDate = NULL;
            } else {
                $registryDate = $value['registrydate']->format("Y/m/d h:i:s");  
            }

            if($value['dischdate'] === NULL) {
                $dischDate = NULL;
            } else {
                $dischDate = $value['dischdate']->format("Y/m/d h:i:s");
            }
                // Insert to cloud db
                 $insert = $cloud_db->prepare(
                        "INSERT INTO patient( 
                        patId,
                        patientName,
                        referredDate,
                        referredFrom,
                        registryDate,
                        dischDiagnosis,
                        finalDiagnosis,
                        dischDate) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");

            $insert->bind_param("isssssss", $patId, $patientName, $referredDate, $referredFrom, $registryDate, $dischDiagnosis, $finalDiagnosis, $dischDate);

            if ($insert->execute()) {
                echo json_encode('New data inserted');
            } else {
                echo json_encode('Insertion Failed');
            }
        } 
    }
?>