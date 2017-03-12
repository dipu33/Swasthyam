<?php
require_once './connection.php';
    $con=  connect();
$tbl_name=$_REQUEST['tbl'];
    $user_input=$_REQUEST['usr_inp'];
    
    $query_get_result="select effect from ".$tbl_name." where min<=".$user_input." AND max>=".$user_input;
    $res=mysqli_query($con,$query_get_result);
    while ($row=mysqli_fetch_row($res))
    {
    $data=array("data"=>$row[0]);
   // $data2=array("data1"=>$data);
    echo json_encode($data);
    }
?>