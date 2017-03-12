<?php
session_start();
if (isset($_SESSION["username"])) {
    header("Location:http://localhost/health1/main_index.php");
}
$_SESSION["count"] = 0;
include_once("config1.php");
include_once("includes/functions.php");

if (isset($_REQUEST['code'])) {

    $gClient->authenticate();
    $_SESSION['token'] = $gClient->getAccessToken();
    header('Location: ' . filter_var($redirectUrl, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
    $gClient->setAccessToken($_SESSION['token']);
}

if ($gClient->getAccessToken()) {
    $userProfile = $google_oauthV2->userinfo->get();
    //DB Insert
    $gUser = new Users();
    $gUser->checkUser('google', $userProfile['id'], $userProfile['given_name'], $userProfile['family_name'], $userProfile['email'], $userProfile['gender'], $userProfile['locale'], $userProfile['link'], $userProfile['picture']);
    $_SESSION['google_data'] = $userProfile; // Storing Google User Data in Session
    $_SESSION['token'] = $gClient->getAccessToken();
    $_SESSION["username"] = $_SESSION['google_data']['name'];
    $_SESSION["uemail"] = $_SESSION['google_data']['email'];
} else {

    $authUrl = $gClient->createAuthUrl();
}
if (isset($authUrl)) {
    $out = '<a href="' . $authUrl . '"><img src="src/img/gmail_signin_button.png" alt="" style="width:100%;"/></a>';
} else {
    $out = '<a href="logout1.php?logout">Logout</a>';
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src = "//cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js" ></script><script>new WOW().init();</script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
        <link rel="stylesheet" type="text/css" href="src/css/main.css">

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
    <style>
        .img-responsive:before{
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            bottom: 0;    
            background: rgba(0,0,0,0);

        }
    </style>
    <body class="img-responsive" style="background-image: url(Newfolder/web-background-health-edit.png);">
         <div class="text-center col-ld-3 col-sm-10 col-md-2 col-xe-10 wow pulse"  data-wow-iteration="infinite" data-wow-duration="2000ms" style="left: 40%;position: absolute" >
             <img src="logo.png" style="height:100px; width: 100px;">
         </div>
        <section class="text-center col-ld-4 col-sm-12 col-md-4 col-xe-12" style="top: 30%; right:5%;float:right; position: absolute;width: 40%;color:white;">
            <div   data-wow-iteration="infinite" data-wow-duration="2000ms"  >
                <h1>Your Health Is Our Priority!</h1>
                <article  class="text-justify text-muted" style="font-weight: 700; font-size: 20px; color: white; text-align: center"> 
                    Let's Start
</article>
                <button  class="wow pulse" data-wow-iteration="infinite" data-wow-duration="2000ms" style="background-color: transparent;padding:0;border: none;background: none;">
                    <?php
                    echo $out;
                    ?>
                </button>
            </div>
        </section>

    </body>

</html>

