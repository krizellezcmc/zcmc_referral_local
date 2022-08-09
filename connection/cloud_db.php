<?php

$cloud_db = mysqli_connect("127.0.0.1", "root", "", "zcmc_referral");

if($cloud_db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

?>