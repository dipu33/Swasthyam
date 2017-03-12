<?php
session_start();
$username=$_GET['username'];
$password=$_GET["password"];
if($username && $password=="makvana"){
    $_SESSION["admin"]=$username;
    header("Location:http://localhost/health1/admin_home.php");
}
else{
    header("Location:http://localhost/health1/admin.php");
}




?>

