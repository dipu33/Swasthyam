<?php
session_start();
$_SESSION["ary_diseases"] = null;
if (!isset($_SESSION["username"])) {
    header("Location:http://localhost/health1/index.php");
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
        <link rel="stylesheet" type="text/css" href="src/css/health_check.css">
        <link rel="stylesheet" type="text/css" href="src/css/footer.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
        <script src="//cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script><script>new WOW().init();</script>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

        <script type="text/javascript" src="js/header.js"></script>     
        <script type="text/javascript" src="js/Health_check.js"></script>
    </head>
    <body onload="load_file();" style="background-color: whitesmoke;" >
        <div id="header"></div>
        <section style="background-color: whitesmoke;">
            <section style="z-index: 6;background-color: whitesmoke;" id="article_div">
                <h1 class="text-justify strong wow flip" style="text-align: center;font-weight: 900;">Why It Is usefull??</h1>
            <article class="text-muted text-justify wow fadeInDown" style="width: 80%; margin-left:10%; margin-right:10%;display: none">
                The information or symptoms regarding the diseases are fed into the

system and user can check the diseases regarding their health issues and

that response is gathered by the system by processing various parameters

fetched from sensors.

 The information about user’s past medical history is also gathered for

getting a better insight about user’s health issues and allergies.  </article>
        </section>
        <div class="container" >
            <div class="text-center col-xs-12 col-sm-12 col-md-12 col-lg-12" id="main_div">
                <form method="get" class="form-horizontal"  id="search_deases_form" role="form" enctype="multipart/form-data">
                    <div class="form-group wow pulse" data-wow-iteration="infinite" data-wow-duration="2000ms" >
                        <legend>Enter Symptoms</legend>
                    </div>
                    <table class="table-responsive table-bordered " style="border: 2px solid black">
                        <tr>
                            <td>Age</td>
                            <td>
                                <div class="form-group">
                                    <div class="col-sm-8 col-sm-offset-2">
                                        <input type="text" name="age">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Gender
                            </td>
                            <td>
                                <div class="form-group">
                                    <div class="col-sm-8 col-sm-offset-2">
                                        <input type="radio" name="gender" value="male" checked>Male
                                        <input type="radio" name="gender" value="female">female

                                    </div>
                                </div>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                Enter Region
                            </td>
                            <td>
                                <div class="form-group">
                                    <div class="col-sm-8 col-sm-offset-2">
                                        <select name="place">
                                            <option value="gujrat">Gujrat</option>
                                            <option value="Maharastra">Maharastra</option>
                                            <option value="Punjab">Punjab</option>
                                        </select>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Enter symptoms
                            </td>
                            <td>
                                <div id="txt_symp">
                                           <!--<input type="text" class="typeahead tt-query" autocomplete="o" spellcheck="false">
                                    -->
                                    <input data-provide="typeahead"  type="text" name="1" id="1" autocomplete="off">
                                    <input data-provide="typeahead" type="text" name="2" id="2" autocomplete="off">
                                    <input data-provide="typeahead" type="text" name="3" id="3" autocomplete="off">
                                    <input data-provide="typeahead"  type="text" name="4" id="4" autocomplete="off">
                                    <input data-provide="typeahead" type="text" name="5" id="5" autocomplete="off">

                                </div>
                                <div class="col-sm-8 col-sm-offset-2">
                                    <!--                <button type="button" name="add_symptoms" id="add_symptoms">add another symtopms</button>
                                                        <button type="button" name="remove_symptoms" id="remove_symptoms">remove symtopms</button>
                                    -->
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="hidden" name="counter" id="counter" value="5" >
                            </td>
                            <td>
                                <div class="form-group">
                                    <div class="col-sm-8 col-sm-offset-3 wow pulse" data-wow-iteration="infinite" data-wow-duration="2000ms" >
                                        <!--<button type="submit" name="search">Search</button>-->
                                        <button type="submit" class="btn btn-primary" name="search">Search</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <footer></footer>
        </section>
    </body>
</html>
