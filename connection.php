<?php
function connect(){
$host="localhost";
$username="root";
$password="";
$database="users";
$con=mysqli_connect($host, $username, $password, $database);
return $con;
}
?>
