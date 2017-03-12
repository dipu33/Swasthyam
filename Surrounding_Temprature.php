<?php
//check user is logged in or not
include './src/fusioncharts.php';
require_once './connection.php';

session_start();
if(!isset($_SESSION["username"]))
{
    header("Location:http://localhost/health1/index.php");
}

$temp_query="select id from users where email='".$_SESSION["uemail"]."'";
$dbhandle = connect();
if ($dbhandle->connect_error) {
exit("There was an error with your connection: ".$dbhandle->connect_error);
}
?>
<body style="opacity: 0.8">
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
              "caption" => "History of Temprature",
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

        $columnChart = new FusionCharts("column2D", "Temprature" , 900, 300, "chart-1", "json", $jsonEncodedData);

        // Render the chart
        $columnChart->render();

        // Close the database connection
        $dbhandle->close();
    }
    ?>

    <div id="chart-1" style="width:70%; overflow-x:scroll "><!-- Fusion Charts will render here--></div>
</body>
</html>