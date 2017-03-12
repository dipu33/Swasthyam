<?php
session_start();
if(!isset($_SESSION["admin"]))
{
    header("Location:http://localhost/health1/admin.php");
}
require_once './connection.php';
$con=  connect();
?>
<html>


<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="admin_css.css">

    <link rel="stylesheet" type="text/css" href="src/css/main.css">

</head>
<script type="text/javascript">
    function display_record()
    {
        var ins1=document.getElementById("ins_record");
        var dlt=document.getElementById("delete_record");
        var upd=document.getElementById("update_record");
        var dis=document.getElementById("display_record");
        ins1.style.display="none";
        dlt.style.display="none";
        upd.style.display="none";
        dis.style.display="block";
    }
    function insert() {

        var ins1=document.getElementById("ins_record");
        var dlt=document.getElementById("delete_record");
        var upd=document.getElementById("update_record");

        var dis=document.getElementById("display_record");
//        alert("dadas");
        ins1.style.display="block";
        dlt.style.display="none";
        upd.style.display="none";

        dis.style.display="none";
    }
    function delete1() {
        var ins1=document.getElementById("ins_record");
        var dlt=document.getElementById("delete_record");
        var upd=document.getElementById("update_record");

        var dis=document.getElementById("display_record");
        ins1.style.display="none";
        dlt.style.display="block";
        upd.style.display="none";
            dis.style.display="none";
    }
    function  modified() {

        var dis=document.getElementById("display_record");
        var ins1=document.getElementById("ins_record");
        var dlt=document.getElementById("delete_record");
        var upd=document.getElementById("update_record");

        dis.style.display="none";
        ins1.style.display="none";
        dlt.style.display="none";
        upd.style.display="block";
    }
</script>
<body>

<nav class="navbar " style="font-weight: 900;letter-spacing: 1px; opacity: 1">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><img src="logo.jpg" height="50px"></a>
        </div>

        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
            </ul>

            <ul class="nav navbar-nav navbar-right">

                <?php
                $output1= '<a href="admin_logout.php?logout">LogOut</a>';
                echo '<li><a href="#"><span class="glyphicon glyphicon-user"></span><button type="button" style="background-color: transparent; border-color: transparent">'.$_SESSION["admin"].'</button></a></li>';
                echo '<li>'.$output1.'</li>';
                ?>
            </ul>
        </div>
    </div>
</nav>
    <button type="button" name="insert_record1" style="margin-left: 20%" onclick="insert()">
    insert record
</button>
<button type="button" name="delete_record1" style="margin-left: 20%"  onclick="delete1()">
    delete record
</button>

<button type="button" name="display1" style="margin-left: 20%"  onclick="display_record()">
    Display Record
</button>
<div class="container" id="ins_record">
	<form action="insert_record.php" method="get" class="form-horizontal" role="form">
	    <div class="form-group">
	     
            <div class="col-sm-10 col-sm-offset-2">
            
               <legend>insert deseas</legend>
	    </div>
            </div>
                <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
                <input type="text" name="ds_temp" placeholder="diseases_name" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
                <input type="text" name="sym1" placeholder="symptoms" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
                <input type="text" name="sym2" placeholder="symptoms">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
                <input type="text" name="sym3" placeholder="symptoms">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
                <input type="text" name="sym4" placeholder="symptoms">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
                <input type="text" name="sym5" placeholder="symptoms">
            </div>
        </div>

        <div class="form-group">
	        <div class="col-sm-10 col-sm-offset-2">
	            <button type="submit" class="btn btn-primary">Submit</button>
	        </div>
	    </div>
	</form>
</div>
<div class="container" id="update_record">

</div>
    <div class="container" id="delete_record" style="margin-left: 40%;margin-top: 12%;">
    <?php
    $query_select_diseases="select D_Name from identify_symptoms";
    $res1=mysqli_query($con,$query_select_diseases);
    echo '<strong>select diseases that you want to delete</strong>';
        echo '<form action="delete_record.php" method="get">';
        echo '<select name="diseases_select1">';

    while($row1=mysqli_fetch_row($res1))
    {
    echo '<option value='.$row1[0].'>'.$row1[0].'</option>';
    }
    echo '</select>';
    echo '</br>';
    echo '</br>';
    echo '<button type="submit"  class="btn btn-primary">Submit</button>';
    ?>
</div>
    <div class="container" id="display_record" style="margin-top: 5%;">
    <?php
    $query_display_record="select * from identify_symptoms";
    $res=mysqli_query($con,$query_display_record);
    echo "<table class='table-bordered' style='border: 1px solid black'>";
    echo "<tr>";
    echo "<th >D_Id</th>";
    echo "<th>D_Name</th>";

    echo "<th>Sympoms1</th>";
    echo "<th>Sympoms2</th>";
    echo "<th>Sympoms3</th>";
    echo "<th>Sympoms4</th>";
    echo "<th>Sympoms5</th>";
    echo "</tr>";

    while($row=mysqli_fetch_row($res))
    {
        echo '<tr style="border: 3px solid black">';
        echo  '<td style="border: 1px solid black">'.$row[0].'</td>';
        echo  '<td style="border: 1px solid black">'.$row[1].'</td>';
        echo  '<td style="border: 1px solid black">'.$row[2].'</td>';
        echo  '<td style="border: 1px solid black">'.$row[3].'</td>';
        echo  '<td style="border: 1px solid black">'.$row[4].'</td>';
        echo  '<td style="border: 1px solid black">'.$row[5].'</td>';
        echo  '<td style="border: 1px solid black">'.$row[6].'</td>';
        echo '</tr>';
    }
    echo '</table>';

    ?>

</div>


</body>