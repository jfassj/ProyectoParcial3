<?php

// Update the path below to your autoload.php,
// see https://getcomposer.org/doc/01-basic-usage.md
require '../vendor/autoload.php';

use Twilio\Rest\Client;

// Find your Account Sid and Auth Token at twilio.com/console
// DANGER! This is insecure. See http://twil.io/secure
$sid    = "ACb9f1bbddfe20019e36d189ac157b3662";
$token  = "84f04ab9a68808a51262a13ce3c91707";
$twilio = new Client($sid, $token);

if(isset($_POST['submit'])) {
	$message = $twilio->messages
                  ->create($_POST['number'], // to
                           array(
                               "body" => $_POST['message'],
                               "from" => "+16822675496"
                           )
                  );

	//print($message->sid);
	header("Location: AdminQuejas.php?sent");
}