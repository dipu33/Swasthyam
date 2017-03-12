<?php
include_once("src/Google_Client.php");
include_once("src/contrib/Google_Oauth2Service.php");
######### edit details ##########
$clientId = '186105132091-hssn6hfvosqgl58j23m61h7ioh66cm7k.apps.googleusercontent.com'; //Google CLIENT ID
$clientSecret = '8Joc2_keIxNy1ZGyCkO9sdFq'; //Google CLIENT SECRET
$redirectUrl = 'http://localhost/health1/index.php';  //return url (url to script)
$homeUrl = 'http://localhost/health1/index.php';  //return to home

##################################

$gClient = new Google_Client();
$gClient->setApplicationName('Login to Swastyham');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectUrl);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>