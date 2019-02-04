<?php
session_start();
require_once( 'Facebook/autoload.php' );
 
$fb = new Facebook\Facebook([
  'app_id' => $_SESSION["APPID"],
  'app_secret' => $_SESSION["APPSID"],
  'default_graph_version' => $_SESSION["VERID"],
]);
 
$helper = $fb->getRedirectLoginHelper();
 
$permissions = ['email','user_photos'];
$loginUrl = $helper->getLoginUrl('https://localhost/rtCamp/callback.php', $permissions);
header("location: ".$loginUrl);
 
?>