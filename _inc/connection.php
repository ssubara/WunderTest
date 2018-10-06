<?php

/* DATABASE CONFIGURATION */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'wunder');
define("GL_URL", "http://www.wunder.org"); // Eg. http://yourwebsite.com

$dbhost=DB_SERVER;
$dbuser=DB_USERNAME;
$dbpass=DB_PASSWORD;
$dbname=DB_DATABASE;

/*CONNECTION*/


$con = @new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($con->connect_error) {
    echo "Error: " . $con->connect_error;
	exit();
}
echo 'Connected to MySQL';

//time zone
date_default_timezone_set('Europe/Belgrade');


?>