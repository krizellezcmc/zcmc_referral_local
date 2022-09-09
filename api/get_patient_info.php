<?php

include '../connection/local_db.php';

// $regNo = $_GET['patRegisterNo'];
$regNo =  $_GET['id'];

$query = "SELECT 
            prof.PatientFullName as patientName, 
            prof.age2 as age,
            prof.FK_psRooms as ward,  
            prof.patid as hrn,
            prof.registrydate as admissionDate,
            prof.gender as gender,
            prof.address as address,
            reg.dischdiagnosis,
            reg.finaldiagnosis,
            reg.dischdate
            FROM 
            vwReportPatientProfile prof
            LEFT JOIN psPatRegisters reg ON
            prof.PK_psPatRegisters = reg.PK_psPatRegisters
            WHERE prof.PK_psPatRegisters = $regNo";
                
    $getPatient = sqlsrv_query($bb_db, $query);

   $patientInfo = SQLSRV_FETCH_ARRAY($getPatient, SQLSRV_FETCH_ASSOC);
     
    echo json_encode($patientInfo);
?>