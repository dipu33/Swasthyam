<?php
//check user is logged in or not
require_once './connection.php';

include './src/fusioncharts.php';
session_start();
if(!isset($_SESSION["username"]))
{
    header("Location:http://localhost/health1/index.php");
}
$temp_query="select id from users where email='".$_SESSION["uemail"]."'";
$dbhandle=connect();
if ($dbhandle->connect_error) {
exit("There was an error with your connection: ".$dbhandle->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <script type="text/javascript" src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="src/css/main.css">

</head>
<body style="opacity: 0.8">

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
                <li><a href="index.php">Home</a></li>

                <li class="active"><a href="history.php">Precautions</a></li>
                <li><a href="Health_Check.php">Health Checker</a> </li>
                <li><a href="threshold.php">threshold</a> </li>

            </ul>

            <ul class="nav navbar-nav navbar-right">

                <?php

                $output1= '<a href="logout.php?logout">LogOut</a>';




                echo '<li><a href="#"><span class="glyphicon glyphicon-user"></span><button type="button" style="background-color: transparent; border-color: transparent">'.$_SESSION["username"].'</button></a></li>';
                echo '<li>'.$output1.'</li>';


                ?>
            </ul>
        </div>
    </div>
</nav>
<?php
    $result_temp = $dbhandle->query($temp_query) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
    $u_id=0;
    while ($row=  mysqli_fetch_row($result_temp)){
        $u_id=$row[0];
    }
    $strQuery = "SELECT Time, Body_Temprature FROM history_data where U_Id=".$u_id;
  
    // Execute the query, or else return the error message.
    $result = $dbhandle->query($strQuery) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
   
    // If the query returns a valid response, prepare the JSON string
    if ($result) {
        // The `$arrData` array holds the chart attributes and data
        $arrData = array(
            "chart" => array(
              "caption" => "History of Your Body Temprature",
              "paletteColors" => "#0075c2",
              "bgColor" => "#ffffff",
              "borderAlpha"=> "20",
              "canvasBorderAlpha"=> "0",
              "usePlotGradientColor"=> "0",
              "plotBorderAlpha"=> "10",
              "showXAxisLine"=> "1",
              "xAxisLineColor" => "#999999",
              "showValues" => "0",
              "divlineColor" => "#999999",
              "divLineIsDashed" => "1",
              "showAlternateHGridColor" => "0"
            )
        );

        $arrData["data"] = array();

// Push the data into the array
        while($row = mysqli_fetch_array($result)) {
        array_push($arrData["data"], array(
            "label" => $row[0],
            "value" => $row[1]
            )
        );
        }
        /*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */

        $jsonEncodedData = json_encode($arrData);
/*Create an object for the column chart using the FusionCharts PHP class constructor. Syntax for the constructor is ` FusionCharts("type of chart", "unique chart id", width of the chart, height of the chart, "div id to render the chart", "data format", "data source")`. Because we are using JSON data to render the chart, the data format will be `json`. The variable `$jsonEncodeData` holds all the JSON data for the chart, and will be passed as the value for the data source parameter of the constructor.*/

        $columnChart = new FusionCharts("column2D", "myFirstChart" , 600, 300, "chart-1", "json", $jsonEncodedData);

        // Render the chart
        $columnChart->render();

        // Close the database connection
        $dbhandle->close();
    }
    ?>

<div id="chart-1"><!-- Fusion Charts will render here--></div>
</body>
</html>