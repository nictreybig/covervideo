<?php # Script 1894449238091388162 - mysqli_conect.php

//Set the database access information as constants:
define('DB_USER', '#NAMEHERE#');
define('DB_PASSWORD', '#DBPASSHERE');
define('DB_HOST', 'localhost');
define('DB_NAME', 'Login');

//Make the connection..
$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

//IF no connect

if(!$dbc) {
    trigger_error('Could not connect to MySQL: ' . mysqli_connect_error() );
} else { // OTHERWISE, SET THE ENCODING:
mysqli_set_charset($dbc, 'utf8');
}
