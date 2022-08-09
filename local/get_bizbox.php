<?php

    include '../connection/local_db.php';
    
    // Read data from Bizbox
    $query = "SELECT                                                                                  
                pat.patid, 
                dbo.udf_GetFullName (pat.PK_emdPatients) as patientname,
                reg.referredDate as referreddate, 
                reg.referredfrom as referredfrom,
                reg.registrydate,
                reg.dischdiagnosis,
                reg.finaldiagnosis,
                reg.dischdate
            FROM psPatRegisters reg
            LEFT JOIN emdPatients pat
            ON reg.FK_emdPatients = pat.PK_emdPatients
			WHERE reg.registrydate between '2022/08/01' and GETDATE()
            ORDER BY reg.registrydate desc";
                
    $getData = sqlsrv_query($bb_db, $query);

    while($row = sqlsrv_fetch_array($getData, SQLSRV_FETCH_ASSOC)){
        $bb_array[] = $row;
    }   



   
  
?>