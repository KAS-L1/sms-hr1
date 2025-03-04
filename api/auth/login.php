<?php sleep(1) ?>
<?php require("../../app/init.php") ?>
<?php

CSRF('verify');

// Check if the request is POST
if (isset($_POST['username']) AND isset($_POST['password'])) {
    
    $username = $DB->ESCAPE(VALID_STRING($_POST['username']));
    $password = VALID_PASS($_POST['password']);

    if (empty($username) || empty($password)) {
        die(Toast("error", "Email or password empty"));
    }

    // Fetch user from the database
    $user = $DB->SELECT_ONE("users", "*", "WHERE username = '$username' OR email = '$username'");

    if (empty($user)) die(Toast("error", "Oops! email is invalid"));
    
    // Verify password
    if (!VERIFY_PASSWORD($password, $user['password'])) {
        die(Toast("error", "Incorrect password"));
    }

    if ($user['status'] == "Inactive")die(Toast("error", "Oops! account is inactive"));
    
    if($user['status'] == 'Pending'){
        $DB->UPDATE("users", ["status" => "Active"], ["user_id" => $user['user_id']]);
    }

    // Generate JWT
    $jwt = new JWT("this-is-a-secure-secret-key-token");
    $user_token = $jwt->createToken([
        "user_id"  => $user['user_id'],
        "username" => $user['username'],
        "email"    => $user['email']
    ]);

    // Set cookie
    $expiry = strtotime('+1 month');
    if (!setcookie("_xsrf-token", $user_token, $expiry, "/"))
        die(Toast("error", "Failed to set cookie"));
    
    if($user['remark'] == "Update Password"){
        $userData = ["remark" => 'Login', "last_login" => DATE_TIME];
    }else{
        $userData = ["last_login" => DATE_TIME];
    }

    $DB->UPDATE("users", $userData, ["user_id" => $user['user_id']]);

    // Login successful
    Toast("success", "Successfully logged in");
    Redirect("/dashboard", 1000);

}else{
    die(Toast("error", "Invalid server request"));
}
