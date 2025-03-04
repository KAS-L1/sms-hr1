<?php if (session_status() === PHP_SESSION_NONE) session_start() ?>
<?php

/**
 * APPLICATION SETUP
**/

// APPLICATION GLOBAL CONFIG VARIABLE
require_once("core/config.php");

// APPLICATION CORE FUNCTIONS
require_once("core/functions.php");

// APPLICATION UTILITY FUNCTIONS
require_once("core/utils.php");
require_once("core/jwt.php");

// APPLICATION COMPONENTS
require_once("core/components.php");

// APPLICATION DATABASE
require_once("core/database.php");

// INITIALIZE DATABASE CONNECTION
$DB = new Database();

