<?php require_once("app/init.php") ?>
<?php

/**
 * MAIN APPLICATION
**/

// GET THE INDEX PAGE
$PAGE = PAGE();

// REDIRECT TO DEFAULT PAGE
if($PAGE == "index") redirect("/home");

// PUBLIC ROUTE ****************************************

switch ($PAGE) {
    case "403":
        die(include_once("public/403.php"));
    case "home":
        die(include_once("public/Home.php"));
    case "portal":
        die(include_once("public/Portal.php"));
    case "login":
        die(include_once("public/Login.php"));
    case "register":
        die(include_once("public/Register.php"));
    case "forgot":
        die(include_once("public/Forgot.php"));
    case "reset":
        die(include_once("public/Reset.php"));
}

// PROTECTED ROUTE ****************************************

//require_once("api/auth/auth.php"); // AUTHENTICATED USER
//require_once("page/_utils/app.php"); // APPLICATION UTILITY FUNCTIONS
//require_once("page/_component/app.php"); // APPLICATION COMPONENTS

// DASHBOARD ****************************************
include_once("page/_template/Header.php");

if (VIEW("page/", $PAGE) == "404") {
    include_once("page/404.php");
} else {
    include_once(VIEW("page/", $PAGE));
}

include_once("page/_template/Footer.php");
