<?php
session_start();
setcookie("_xsrf-token", "", time() - 1, "/");
session_destroy();

if(isset($_GET['action'])){
    die(header("Location: ../../login?res=".$_GET['action']));
}else{
    die(header("Location: ../../login?res=logout"));
}

