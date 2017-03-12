<?php
include_once("inc/facebook.php"); //include facebook SDK
######### Facebook API Configuration ##########
$appId = '490947004427595'; //Facebook App ID
$appSecret = '7f7b816a8cfe7b439669f2dfb6378f36'; // Facebook App Secret
$homeurl = 'http://localhost/health1/index.php';  //return to home
$fbPermissions = 'email';  //Required facebook permissions

//Call Facebook API
$facebook = new Facebook(array(
  'appId'  => $appId,
  'secret' => $appSecret

));
$fbuser = $facebook->getUser();
?>