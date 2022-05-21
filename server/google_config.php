<?php

require_once 'constants.php';
//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';
//Make object of Google API Client for call Google API
$google_client = new Google_Client();
//Set the OAuth 2.0 Client ID
$google_client->setClientId('326602506558-tnuarjcbpidp2fh7nj0bfdu1u19m4pc9.apps.googleusercontent.com');
//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');
//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost:81/Lartist/artist-dash.php');
// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

?>