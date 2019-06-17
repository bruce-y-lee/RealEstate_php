<?php
session_start();
 
// session_unset();
include("$_SERVER[DOCUMENT_ROOT]/config.php");
//Google API PHP Library includes
// require_once '../../vendor/autoload.php';
include("$_SERVER[DOCUMENT_ROOT]/vendor/autoload.php");
 
// Set config params to acces Google API
 $client_id = $google_client_id;
 $client_secret = $google_client_secret;
 $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'];
 
//Create and Request to access Google API
$client = new Google_Client();
$client->setApplicationName("Google OAuth Login With PHP");
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] );
$client->addScope(Google_Service_Oauth2::USERINFO_PROFILE);
$client->addScope("https://www.googleapis.com/auth/userinfo.email"); 
$objRes = new Google_Service_Oauth2($client);
 
//Add access token to php session after successfully authenticate
if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['access_token'] = $client->getAccessToken();
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}
 
//set token
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  $client->setAccessToken($_SESSION['access_token']);
}
 
//store with user data
if ($client->getAccessToken()) {
  $userData = $objRes->userinfo->get();
  if(!empty($userData)) {
  //insert data into database
  // var_dump($userData->givenName);
  }
  $_SESSION['access_token'] = $client->getAccessToken();
} else {
  $googleAuthUrl  =  $client->createAuthUrl();
}

// var_dump($_SESSION['access_token']);
// var_dump($userData);
//logout
// unset($_SESSION['access_token']);
if (isset($_REQUEST['logout'])) {
  unset($_SESSION['access_token']);
  $client->revokeToken();
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL)); //redirect user back to page
}
?>