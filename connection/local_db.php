
<?php

$host ="ZCMCHISSERVER\ZCMCSQL"; 

$options = [
  "Database" => "TrainingDB_HS8",
  "UID" => "referral",
  "PWD" => "ZCMCref_2022",
  "CharacterSet" => "UTF-8"
];

$bb_db =  sqlsrv_connect($host, $options);

if(!$bb_db) {
  die (print_r(sqlsrv_errors(), true));
}

?>
