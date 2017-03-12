<?php //
//check user is login or not
//session_start();
//if (!isset($_SESSION["username"])) {
//    header("Location:http://localhost/health1/index.php");
//}
//
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
        <link rel="stylesheet" href="src/css/footer.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
        <script type="text/javascript" src="js/header.js"></script>
        <link rel="stylesheet" type="text/css" href="src/css/about_us.css">
    </head>
    <script type="text/javascript">
        $(document).ready(function () {
     $("#article_div3").click(function(){
    $("p").toggle();
});
});   
            function load_file() {
                $("#header").load("header.php");
                $('footer').load("footer.html");
            }

            wow = new WOW(
                    {
                        animateClass: 'animated',
                    });
            wow.init();
    </script>
    <body onload="load_file()">
        <div id="header"></div>
        <div class="container" style="background-color: whitesmoke; width: 100%;z-index: 3;position: relative;margin-bottom: 300px;"> 
            <div id="about_we">
                <h1 style="text-align: center;color: #0040D0" class="wow flip" id="article_div3">
                    Who We Are!
                </h1>
                <p class="text-muted text-justify wow fadeInDown" style="display: none">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
            </div>

            <div class="row" >
                <div class="col-lg-12">
                    <h1 style="text-align: center;color: #0040D0" class="wow flip">
                        Meet Our Team!</h1>
                    <ul class="timeline">
                        <li>
                            <div class="timeline-image wow fadeInRight" >
                                <img class="img-circle img-responsive" src="src/rsz_jc1.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading ">
                                    <h4>Prof. Jayesh Chaudhari</h4>
                                    <h4 class="subheading">Project Guide</h4>
                                </div>
                                <div class="timeline-body ">
                                    <p class="text-muted">
                                        He played a very integral part in guiding us throughout the project.
                                    </p>
                                </div>
                            </div>
                            <div class="line wow rotateInDownLeft"></div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image wow fadeInLeft">
                                <img class="img-circle img-responsive" src="src/rsz_photo.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading wow rotateInDownLeft">
                                    <h4>Harsh Gandhi</h4>
                                    <h4 class="subheading">Team Leader</h4>
                                </div>
                                <div class="timeline-body wow rotateInUpLeft ">
                                    <p class="text-muted">
                                        
                                    </p>
                                </div>
                            </div>
                            <div class="line wow rotateInDownLeft"></div>
                        </li>
                        <li>
                            <div class="timeline-image wow fadeInRight">
                                <img class="img-circle img-responsive" src="src/rsz_jd.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading wow rotateInDownLeft">
                                    <h4>Jenish Dudhat</h4>
                                    <!--<h4 class="subheading">Subtitle</h4>-->
                                </div>
                                <div class="timeline-body wow rotateInUpLeft">
                                    <p class="text-muted">
                                        
                                    </p>
                                </div>
                            </div>
                            <div class="line rotateInDownLeft"></div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image wow fadeInLeft ">
                                <img class="img-circle img-responsive" src="src/rsz_img_4000.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading wow rotateInDownLeft">
                                    <h4>Jenish Muniwala</h4>
                                    <!--<h4 class="subheading">Subtitle</h4>-->
                                </div>
                                <div class="timeline-body wow rotateInUpLeft ">
                                    <p class="text-muted">
                                        

                                    </p>
                                </div>
                            </div>
                            <div class="line"></div>
                        </li>
                        <li>
                            <div class="timeline-image wow fadeInRight">
                                <img class="img-circle img-responsive" src="src/rsz_dipu.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading wow rotateInDownLeft">
                                    <h4>Dipak Makvana</h4>
                                    <!--<h4 class="subheading">Subtitle</h4>-->
                                </div>
                                <div class="timeline-body wow rotateInUpLeft">
                                    <p class="text-muted">
                                        
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <footer>
            <!--asdddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd-->
        </footer>


    </body>
</html>