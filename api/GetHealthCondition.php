<?php

require '../connection.php';
$con = connect();
$HB = $_REQUEST['HB'];
$HM = $_REQUEST['HM'];
$TM = $_REQUEST['TM'];
$email = $_REQUEST['username'];
if (($TM > 100) || ($HM > 100) || ($HB > 150)) {
    $data = array("data" => "something went wrong please check device");
    echo json_encode($data);
} else {
    $quert_getcount = "select * from history_data where U_Id='" . $email . "'";
    $count = mysqli_query($con, $quert_getcount);
    $cnt = mysqli_num_rows($count);
    echo $cnt;
    if ((int) $cnt <= 10) {
        $HB_Effect = "select effect from heartbit where min<=" . $HB . " AND max>=" . $HB;
        $HM_Effect = "select effect from humidity where min<=" . $HM . " AND max>=" . $HM;
        $TM_Effect = "select effect from body_temperature where min<=" . $TM . " AND max>=" . $TM;
        $res = mysqli_query($con, $HB_Effect);
        $res1 = mysqli_query($con, $HM_Effect);
        $res2 = mysqli_query($con, $TM_Effect);
        $row_HB = mysqli_fetch_array($res);
        $row_HM = mysqli_fetch_array($res1);
        $row_TM = mysqli_fetch_array($res2);
        if (($row_HB[0] == $row_HM[0]) && ($row_HB[0] == $row_TM[0])) {
            $data = array("data" => "Safe & healthy");
            echo json_encode($data);
        } else {
            if ($row_HB[0] == $row_HM[0]) {
                $data = array("data" => $row_TM[0]);
            } else if ($row_HB[0] == $row_TM[0]) {
                $data = array("data" => $row_HM[0]);
            } else if ($row_HM[0] == $row_TM[0]) {
                $data = array("data" => $row_HB[0]);
            } else if ((($row_HB[0] != "normal") && ($row_HM[0] != "normal")) && $row_TM[0] == "normal") {
                $data = array("data" => $row_HB[0] . " and " . $row_HM[0]);
            } else if ((($row_HB[0] != "normal") && ($row_TM[0] != "normal")) && $row_HM[0] == "normal") {
                $data = array("data" => row_HB[0] . " and " . $row_HT[0]);
            } else if ((($row_HM[0] != "normal") && ($row_TM[0] != "normal")) && $row_HB[0] == "normal") {
                $data = array("data" => $row_HM[0] . " and " . $row_TM[0]);
            } else if (($row_HM[0] != "normal") && ($row_TM[0] != "normal") && ($row_HB[0] != "normal")) {
                $data = array("data" => $row_HM[0] . " and " . $row_HB[0] . " and " . $row_TM[0]);
            }
            echo json_encode($data);
        }
    } else {
        $get_user_data_avg = "select *from history_data where U_Id='" . $email . "'";
        echo $get_user_data_avg;
        $result_data = mysqli_query($con, $get_user_data_avg);
        $row_HB1 = 0;
        $row_HM1 = 0;
        $row_TM1 = 0;
        $cnt_data = 0;
        while ($row_data = mysqli_fetch_row($result_data)) {
            $row_HB1 = $row_data[1] + $row_HB1;
            $row_HM1 = $row_data[2] + $row_HM1;
            $row_TM1 = $row_data[2] + $row_TM1;
            $cnt_data++;
        }
        $HB1 = (int) ($row_HB1 / $cnt_data);
        $HM1 = (int) ($row_HM1 / $cnt_data);
        $TM1 = (int) ($row_TM1 / $cnt_data);
        if (($HB >= ($HB1 - 20)) && ($HB <= ($HB1 + 20))) {
            $row_HB = "normal";
        }
        else if(($HB<($HB1-20))){
            $row_HB = "bradycardia";
        }
        else if($HB>($HB1+20)){
            $row_HB = "tachycardia";
        }
        if (($HM >= ($HM1 - 5)) && ($HM <= ($HM1 + 5))) {
            $row_HM = "normal";
        }
        else if(($HM<($HM1-5))){
            $row_HM = "irritated eye,dry skin,feeling of congestion";
        }
        else if($HM>($HM1+5)){
            $row_HM = "breathing problems,allergies can be occurs ";
        }
        if (($TM >=($TM1 - 3)) && ($TM <= ($TM1 + 3))) {
            $row_TM = "normal";
        }        
        else if(($TM>=($TM1-5))&&($TM<=($TM1-3))){
            $row_TM = "Mild Hypothamia";
        }
        else if(($TM>=($TM1-10))&&($TM<($TM1-5))){
            $row_TM = "Severe Hypothamia";
        }
        else if(($TM<=($TM1+5))&&($TM>$TM1)){
            $row_TM = "heat exhaustion";
        }
        else if(($TM<=($TM1+10))&&($TM>($TM1+5))){
            $row_TM = "extremely critical condition may be caused dead";
        }
        else if($TM<=($TM1-10)){
            $row_TM = "Causes death";
        }
        else if($TM>=($TM1-10)){
            $row_TM = "Causes death";
        }        
        echo $row_HB;
        echo '</br>';
        echo $row_HM;
        echo '</br>';
        echo $row_TM;
        echo '</br>';
        
      if (($row_HB == $row_HM) && ($row_HB == $row_TM)) {
            $data = array("data" => "Safe & healthy");
            echo json_encode($data);
        } else {
            if ($row_HB == $row_HM) {
                $data = array("data" => $row_TM);
            } else if ($row_HB == $row_TM) {
                $data = array("data" => $row_HM);
            } else if ($row_HM == $row_TM) {
                $data = array("data" => $row_HB);
            } else if ((($row_HB!= "normal") && ($row_HM!= "normal")) && $row_TM== "normal") {
                $data = array("data" => $row_HB. " and " . $row_HM);
            } else if ((($row_HB!= "normal") && ($row_TM != "normal")) && $row_HM== "normal") {
                $data = array("data" => row_HB . " and " . $row_HT);
            } else if ((($row_HM != "normal") && ($row_TM != "normal")) && $row_HB== "normal") {
                $data = array("data" => $row_HM. " and " . $row_TM);
            } else if (($row_HM!= "normal") && ($row_TM!= "normal") && ($row_HB!= "normal")) {
                $data = array("data" => $row_HM. " and " . $row_HB. " and " . $row_TM);
            }
            echo json_encode($data);
        }

        
        }
    
}
?>