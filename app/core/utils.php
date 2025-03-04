<?php

/**
 * USEFUL GLOBAL UTILITY FUNCTIONS
**/


// DEBUGGING
function pre($data){
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}

function predie($data){
    echo '<pre>';
    die(print_r($data));
}

function ROUTE($path){
	return DOMAIN ."/". $path;
}

// INPUT VALIDATION
function VALID_STRING($string){
    return strip_tags(preg_replace('/[^a-zA-Z0-9_@.]+/', ' ', trim($string)));
}

function VALID_NUMBER($int){
    return preg_replace('/[^0-9]/', '', $int);
}

function VALID_PASS($string){
    return trim($string);
}

function VALID_MAIL($email){
    return filter_var($email, FILTER_SANITIZE_EMAIL);
}

function HASH_PASSWORD($password)
{
    return password_hash($password, PASSWORD_DEFAULT);
}

function VERIFY_PASSWORD($password, $hashed_password)
{
    return password_verify($password, $hashed_password);
}

// CHARACTER FORMATING
function CHAR($string){
    return htmlspecialchars($string);
}

function LOWER($string){
    return strtolower($string);
}

function UPPER($string){
    return strtoupper($string);
}

function CAMEL($string){
    return ucwords($string);
}


// NUMBER FORMATTING
function NUMBER($int, $decimal = 0){
    if($decimal == 0){
        return number_format($int);
    }else{
        return number_format($int, $decimal);
    }
}

function PHP($int, $decimal = 0){
    if($decimal == 0){
        return '₱'.number_format($int);
    }else{
        return '₱'.number_format($int, $decimal);
    }
}


// DATE FORMATTING
function FORMAT_DATE($date, $format){
    return date_format(date_create($date), $format);
}

function DATE_SHORT($date){
    return date_format(date_create($date),'M d, Y');
}

function DATE_TIME_SHORT($date){
    return date_format(date_create($date),'M d, Y h:i A');
}

function DATE_UPDATED($date){
    return $date != null ? date_format(date_create($date),'M d, Y') : null ;
}

function DATE_TIME_UPDATED($date){
    return $date != null ? date_format(date_create($date),'M d, Y h:i A') : null ;
}


// FILE UPLOAD SERVER
function UPLOAD_FILE($file_data, $file_path, $file_name, $file_extension){
    $file_name = $file_name.'.'.$file_extension;
    $source_path = $file_data['tmp_name'];
    $target_path = $file_path.'/'.$file_name;
    if(move_uploaded_file($source_path, $target_path)){
        return array('name' => $file_name, 'status' => 'success');
    }else{
        return array('name' => $file_name, 'status' => 'error');
    }
}


// CSRF SECURITY PROTECTION
function CSRF($action = 'generate')
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start(); // Start the session if not already started
    }

    if ($action === 'generate') {
        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); // Generate CSRF token
        }
        // Return hidden input for the CSRF token
        return '<input type="hidden" name="csrf_token" value="' . htmlspecialchars($_SESSION['csrf_token']) . '">';
    }

    if ($action === 'verify') {
        if (empty($_SESSION['csrf_token']) || empty($_POST['csrf_token'])) {
            die(Toast("error", "CSRF token not found"));
        }

        if (hash_equals($_SESSION['csrf_token'], $_POST['csrf_token']) === false) {
            die(Toast("error", "Invalid CSRF token"));
        }
    }
}


// OTHER FUNCTIONS
function GENERATE_ID($prefix = null, $digits = 4)
{
    $digit = max(9999, pow(10, $digits) - 1);
    $random_digits = str_pad(rand(1000, $digit), $digits, "0", STR_PAD_LEFT);
    return $prefix . $random_digits;
}



