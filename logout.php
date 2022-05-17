<?php

//logout.php

include('server\google_config.php');

//Reset OAuth access token
$google_client->revokeToken();

//Destroy entire session data.
session_start();
session_unset();
session_destroy();

//redirect page to index.php
header('location:http://localhost:81/Lartist/artist-reg.php');

?>