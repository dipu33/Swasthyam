<?php
require_once './connection.php';
    $con=  connect();
$tbl_name=$_REQUEST['tbl'];
    $user_input=$_REQUEST['usr_inp'];
    
    $query_get_result="select effect from ".$tbl_name." where min<=".$user_input." AND max>=".$user_input;
   // echo $query_get_result;
    $res=mysqli_query($con,$query_get_result);
    while ($row=mysqli_fetch_row($res))
    {
   //$data2=array("data1"=>$data);
    echo $row[0];
    }
?>