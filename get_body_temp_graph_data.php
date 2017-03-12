<?php
require_once './connection.php';

$u_id=$_GET["u_email"];
$get_tb_name=$_GET["tb_name"];

$dbhandle =  connect();

if ($dbhandle->connect_error) {
exit("There was an error with your connection: ".$dbhandle->connect_error);
}
        $arrData["data"] = array();
        $strQuery = "SELECT Time,".$get_tb_name." FROM history_data where U_Id='".$u_id."'";   
       echo $strQuery;
        $result_temp =$dbhandle->query($strQuery) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
    
// Push the data into the array
        while($row = mysqli_fetch_array($result_temp)) {
        array_push($arrData["data"], array(
            "label" => $row[0],
            "value" => $row[1]
            )
        );
       }
        echo json_encode($arrData["data"]);
    
    ?>

