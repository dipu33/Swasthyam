
<script type="text/javascript">
    function  fun2() {
        alert("record delete successfully");

        window.location = "http://localhost/health1/admin_home.php";
    }
</script>
<?php

$host="localhost";
$username="root";
$password="";
$con=mysqli_connect($host,$username,$password);
mysqli_select_db($con,'users');
$des_name=$_REQUEST['diseases_select1'];
$query_delete_record="delete from identify_symptoms where D_Name='".$des_name."'" ;
mysqli_query($con,$query_delete_record);

echo '<script type="text/javascript">fun2()</script>';


?>