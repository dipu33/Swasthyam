<?php

require_once '../connection.php';
$con = connect();
if ($_REQUEST) {
    $counter = $_REQUEST['counter'];
    $counter = (int) $counter;
    $cnt_temp = 1;
    $ary = array();
    $t = 0;
    while ($counter >= $cnt_temp) {
        $ary[$t] = $_REQUEST['' . $t . ''];
        $cnt_temp++;
        $t++;
    }
    $ary1 = array_values(array_filter($ary));
    $cnt_for_query = sizeof($ary1);
    $tt = 0;
    $query_fetch_deases = "";

    while ($cnt_for_query > $tt) {
        if ($query_fetch_deases == "") {
            $query_fetch_deases .= "select D_Name from identify_symptoms WHERE (Sym1='" . $ary1[$tt] . "'OR Sym2='" . $ary1[$tt] . "' OR Sym3= '" . $ary1[$tt] . "' OR Sym4='" . $ary1[$tt] . "'OR Sym5='" . $ary1[$tt] . "')";
        } else {
            $query_fetch_deases .= "OR (Sym1='" . $ary1[$tt] . "'OR Sym2='" . $ary1[$tt] . "'OR Sym3='" . $ary1[$tt] . "'OR Sym4='" . $ary1[$tt] . "'OR Sym5='" . $ary1[$tt] . "')";
        }
        $tt++;
    }
    $ary4 = array();
    $res = mysqli_query($con, $query_fetch_deases);
    $out = "Sorry we do not able to find any matches deases from your given symptoms please try again";
    $array_data = array();
    while ($row = mysqli_fetch_row($res)) {
        array_push($ary4, $row[0]);
        $query_sym_count = "select *from identify_symptoms where D_Name='" . $row[0] . "'";
        $res_count = mysqli_query($con, $query_sym_count);
        while ($row1 = mysqli_fetch_row($res_count)) {
            $cnt3 = 0;
            if ($row1[2] != "") {
                $cnt3++;
            }
            if ($row1[3] != "") {
                $cnt3++;
            }
            if ($row1[4] != "") {
                $cnt3++;
            }
            if ($row1[5] != "") {
                $cnt3++;
            }
            if ($row1[6] != "") {
                $cnt3++;
            }
            $array_data[$row[0]] = (($cnt_for_query / $cnt3) * 100);
        }
    }
    asort($array_data);
    echo json_encode($array_data);
}
?>