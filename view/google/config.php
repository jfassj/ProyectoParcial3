<?php
	session_start();
	require_once "GoogleAPI/vendor/autoload.php";
	$gClient = new Google_Client();
	$gClient->setClientId("545854364645-99il0iqbfluo0e3v0gfko2o07iotpckj.apps.googleusercontent.com");
	$gClient->setClientSecret("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");
	$gClient->setApplicationName("CPI Login Tutorial");
	$gClient->setRedirectUri("http://localhost/proyectoparcial2/Api/view/google/g-callback.php");
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
?>
