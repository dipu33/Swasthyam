<?php
session_start();
require_once './connection.php';
$con=  connect();
if ($_GET) {
    $gender = $_GET['gender'];
    $age = $_GET['age'];
    $place = $_GET['place'];
    $counter = $_GET['counter'];
    $counter = (int) $counter;
    $cnt_temp = 1;
    $ary = array();
    $t = 0;
    while ($counter >= $cnt_temp) {
        $ary[$t] = $_GET['' . $cnt_temp . ''];
        //   echo $ary[$cnt_temp];
        $cnt_temp++;
        $t++;
    }
    $ary1 = array_values(array_filter($ary));
    if (sizeof($ary1) == 0) {
        echo "1";
    } else {
        if ($_SESSION["ary_diseases"] == null) {
            $_SESSION["ary_diseases"] = $ary1;
            $cnt_for_query = sizeof($ary1);
            $tt = 0;
            $query_fetch_deases = "";
            while ($cnt_for_query > $tt) {
                if ($query_fetch_deases == "") {
                    $query_fetch_deases .= "select *from identify_symptoms WHERE (Sym1='" . $ary1[$tt] . "'OR Sym2='" . $ary1[$tt] . "' OR Sym3= '" . $ary1[$tt] . "' OR Sym4='" . $ary1[$tt] . "'OR Sym5='" . $ary1[$tt] . "')";
                } else {
                    $query_fetch_deases .= "OR (Sym1='" . $ary1[$tt] . "'OR Sym2='" . $ary1[$tt] . "'OR Sym3='" . $ary1[$tt] . "'OR Sym4='" . $ary1[$tt] . "'OR Sym5='" . $ary1[$tt] . "')";
                }
                $tt++;

//     if($query_fetch_deases=="") {
//             $query_fetch_deases .= "select D_Name from identify_symptoms WHERE (Sym1='". $ary1[$tt] . "'OR Sym2='" . $ary1[$tt] . "' OR Sym3= '" . $ary1[$tt] . "' OR Sym4='" . $ary1[$tt] . "'OR Sym5='" . $ary1[$tt] . "')";
//         }
//         else{
//             $query_fetch_deases .= "AND (Sym1='". $ary1[$tt] ."'OR Sym2='" . $ary1[$tt] . "'OR Sym3='" . $ary1[$tt] . "'OR Sym4='" . $ary1[$tt] . "'OR Sym5='" . $ary1[$tt] . "')";
//         }
//        $tt++;
            }
            //  $query_fetch_deases.="LIMIT 1";
            $ary4 = array();
            $res = mysqli_query($con, $query_fetch_deases);
            $out = "Sorry we do not able to find any matches deases from your given symptoms please try again";
            while ($row = mysqli_fetch_row($res)) {
                // $out="You may have ".$row[0];
                array_push($ary4, $row[2]);
                array_push($ary4, $row[3]);
                array_push($ary4, $row[4]);
                array_push($ary4, $row[5]);
                array_push($ary4, $row[6]);
                // array_push($ary,$row[0]);
            }

            $ary5 = array_diff($ary4, $ary);
            echo json_encode($ary5);
        }
    }
}
?>

