<?php
$host = "localhost";
$username = "root";
$password = "";
$con = mysqli_connect($host, $username, $password);
mysqli_select_db($con, 'users');
$query_fetch_distinc="select Sym1,Sym2,Sym3,Sym4,Sym5 from identify_symptoms";
$res=mysqli_query($con,$query_fetch_distinc);
//$ary=array("diapk","asda","asdasa");
$ary=array();
$cnt=0;

while($row=mysqli_fetch_row($res))
{
    //$ary[$cnt]=$row[1];
    array_push($ary, $row[0]);
    array_push($ary, $row[1]);
    array_push($ary, $row[2]);
    array_push($ary, $row[3]);
    array_push($ary, $row[4]);
    
   // $cnt++;
}

$result= array_unique($ary);
$renumbered = array_merge($result, array());

echo json_encode($renumbered);
?>