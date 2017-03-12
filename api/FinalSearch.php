<?php


session_start();
require_once '../connection.php';
$con = connect();
$url="http://localhost/health1/api/InitialDiseases.php";
$subids = Array
    (
        0=>"Fever",
        1=>"headache",
        2=>"Common cold"
    );
$final = $url . "?" . http_build_query($subids)."&counter=3";
echo $final;
header('Location: '.$final);
?>
