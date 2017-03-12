<?php
include_once('config1.php');
if(array_key_exists('logout',$_GET))
{
    session_start();
    $_SESSION["username"]='';

    unset($_SESSION['token']);
    unset($_SESSION['google_data']); //Google session data unset
    $gClient->revokeToken();
    session_destroy();
    header("Location:http://localhost/health1/index.php");
}

?>