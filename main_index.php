<?php
//check user is login or not
session_start();
if (!isset($_SESSION["username"])) {
    header("Location:http://localhost/health1/index.php");
}
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="utf-8">
        <title>Swasthyam</title>

        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script><script>new WOW().init();</script>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/jquery.stellar.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
        <link rel="stylesheet" type="text/css" href="src/css/main_index.css">
        <link rel="stylesheet" href="src/css/footer.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
        <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="js/header.js"></script>
    </head>
    <script>
            //create wow object
            wow = new WOW(
                    {
                        animateClass: 'animated',
                    }
            );
            //envoke object
            wow.init();

    </script>
    <script type="text/javascript">
        //stellar library
        $.stellar({
            // Set scrolling to be in either one or both directions
            horizontalScrolling: true,
            verticalScrolling: true,
        });
        $(window).scroll(function () {

            var window_scroll = $(this).scrollTop();
            //console.log(window_scroll);
            var head = $("#main_header");
            var ele = $("#main_div");
            var h = ele.height();
            var h2 = head.height();
            console.log(h2);
            console.log(window_scroll);
            if (window_scroll > h2) {
                $("#main_header").fadeIn(2000);

            }
            if (window_scroll >= (h / 3)) {
                //  console.log("no no no");
                $('#know_btn').fadeOut();
            } else {
                //console.log("dsadasdasdsads");
                $('#know_btn').fadeIn();

            }
        });
        //function on load page
        function load_file() {
            $('#timeline_main').load('timeline_watch.php');
            $('footer').load('footer.html');
            $('#header').load('header.php');
        }
    </script>
    <body onload="load_file();">
    <secti
        <!--navbar starting-->
        <div id="header"  ></div>
        <!--navbar end-->
        <!--second header and slider start-->
        <section style="z-index: 5;">
            <div id="head_part" data-stellar-ratio="10">
                <h1 style="color: #2e6da4">Smart Watch</h1>
                <p style="font-weight: bolder">A watch you like to wear</p>
            </div>
            <div id="main_div" data-stellar-ratio="0.2">
                <a href="About_Us.php"> <button class="btn-responsive btn-primary" id="know_btn" data-stellar-ratio=0.1>Know more</button></a>

            </div>
        </section>
        <!--Second header and slider end-->
        <!--Timeline section start-->
        <section style="z-index: -3">
            <div id='timeline_main'></div>
        </section>
        <!--Timeline Section end-->

        <section id="get_app">
            <H1 style="text-align: center;top: 15%;">Get App Now</H1>
            <a class="btn btn-lg btn-success big-btn android-btn wow pulse" href="#" data-wow-iteration="infinite" data-wow-duration="2000ms">
                <img width="80px" class="pull-left "   src="http://www.userlogos.org/files/logos/jumpordie/google_play_04.png"><div class="btn-text"><small>Available on</small><br><strong>Google Play</strong></div></a>
        </section>

        <!--Footer section start-->

        <footer>

        </footer>   <!--Footer section end-->

    </body>
</html>
