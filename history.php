<?php
//Check user is logged in or not
session_start();
if (!isset($_SESSION["username"])) {
    header("Location:http://localhost/health1/index.php");
}
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script><script>new WOW().init();</script>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/header.js"></script>
        <link rel="stylesheet" type="text/css" href="src/css/main.css">
        <link rel="stylesheet" type="text/css" href="src/css/footer.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
        <script type="text/javascript" src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
    </head>
    <script type="text/javascript">
        $(document).ready(function () {
     $("#article_div2").click(function(){
    $("p").toggle();
});
});     
            function load_file() {
                $("#header").load("header.php");
                $("footer").load("footer.html");
                $("#display_graph").load("heartbit.php");
            }
            function get_data(str) {
                $("#display_graph").load('' + str + '');
            }
            $(document).ready(function () {
//                $('#left,#left1,#btm,#right').hover(function () {
//                    $('#display_graph').toggleClass('test1');
                });
            

    </script>
    <style>
        .test11{
            padding-left: 20%;opacity: 1; 
        }  
        .test1{
            padding-left: 20%;opacity: 0.5; 
        }
    </style>
    <body onload="load_file()" style="padding-top: 50px;">
        <!--navigation bar start-->
        <div id="header"></div>
        <!--Navbar end-->
        <!--History Display Div start-->
        <div class="container" style="z-index:10;background-color: whitesmoke;margin-bottom: 300px; ">
            <section>
                <h1 style="text-align: center;" id="article_div2">Why It Is Important For You!</h1>
                <p class="text-justify" style="display: none">
                    Our product will prove to be a very good solution in the field of health as all the

other existing health monitoring devices either basically measures the readings of

the sensors or alerts the user. But our device will not only measure the readings of

the sensor but it will also provide valuable precautions to the user using this device.

This device can prove to be very useful for preventing certain diseases and help in

supressing it before it results into something bigger and harmful. The alert button

feature of this device can be very much useful. Sometimes it happens that a person

starts feeling uncomfortable and get unconscious. So in such conditions, the person

can press the alert button which will send SMS to his guardian/doctor along with

the readings of the sensors attached to the wearable device.
                </p>
            </section>
            
            <section style="margin-bottom: 5%;">
                <h1 style="text-align: center"> Your Past Data!</h1>
                <div id="display_graph" class="test11 wow pulse" data-wow-iteration="infinite" data-wow-duration="5000ms">
                </div>
                </section>
                <section>
                <!--Headrbit-->
                <div class="text-center col-xs-6 col-sm-6 col-md-3 col-lg-3 wow fadeInRight"   id="left"  onclick="get_data('heartbit.php')">
                    <h1 style="margin-top: 20%" >HeartBeat</h1>
                </div>
                <!--</a>-->
                <!--Humidity-->
                <div class="text-center col-xs-6 col-sm-6 col-md-3 col-lg-3 wow fadeInRight " id="right" onclick="get_data('humidity.php')">
                    <h1 style="margin-top: 20%">Humidity</h1>
                </div>


                <!--Qualtity of Air-->
                <div class="text-center col-xs-6 col-sm-6 col-md-3 col-lg-3 wow fadeInLeft"   id="left1" onclick="get_data('Air_Quality.php')">
                    <h1 style="margin-top: 20%">Air Quality </h1>
                </div>
                

                <!--Temprature-->
                <div class="text-center col-xs-6 col-sm-6 col-md-3 col-lg-3 wow fadeInLeft" id="btm" onclick="get_data('Surrounding_Temprature.php')">
                    <h1 style="margin-top: 20%">surrounding  Temprature</h1>
                </div>
            </section>
        </div>

        <footer></footer>
    </body>
</html>