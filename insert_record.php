<script type="text/javascript">
    function  fun2() {
        alert("record insert successfully");
        window.location="http://localhost/health1/admin_home.php";
    }
</script>
<?php
require_once './connection.php';
$con=  connect();
$des_name=$_GET['ds_temp'];
$sym1=$_GET['sym1'];
$sym2=$_GET['sym2'];
$sym3=$_GET['sym3'];
$sym4=$_GET['sym4'];
$sym5=$_GET['sym5'];

$queri_insert_data="insert into identify_symptoms(D_Id,D_Name,Sym1,Sym2,Sym3,Sym4,Sym5) VALUE('','$des_name','$sym1','$sym2','$sym3','$sym4','$sym5')";
mysqli_query($con,$queri_insert_data);
echo '<script type="text/javascript">fun2()</script>';

?>