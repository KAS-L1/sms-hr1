<?php

/**
 * APP GLOBAL CONFIG VARIABLE
**/

// DEBUG MODE
error_reporting(E_ALL);
ini_set("display_errors", 1);


// DATE TIMEZONE
date_default_timezone_set("Asia/Manila");
define("DATE", date("Y-m-d"));
define("TIME", date("H:i:s"));
define("DATE_TIME", date("Y-m-d H:i:s"));


// DEPLOYMENT SETTINGS
define("DOMAIN", "//" . $_SERVER["HTTP_HOST"]);


// INCLUDE SETTINGS
require_once("settings.php");
