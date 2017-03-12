<?php
include '../connection.php';
$con=  connect();
$U_Id=$_REQUEST["user_id"];
$HeartBit=$_REQUEST["HB"];
$BT=$_REQUEST["BT"];
$Humadity=$_REQUEST["HM"];
$TimeStamp=date("Y-m-d h:i:s");
$query_insert_reading="Insert into history_data VALUE('$U_Id',$HeartBit,$BT,$Humadity,'$TimeStamp')";
$result=  mysqli_query($con,$query_insert_reading);
if($result){
    $data=array("data"=>"success");
    echo json_encode($data);
}
else{
    $data=array("data"=>"fail");
    echo json_encode($data);
}
?>
