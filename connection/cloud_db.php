<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: *");

$cloud_db = mysqli_connect("localhost", "root", "", "zcmc_referral");

if($cloud_db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

?>