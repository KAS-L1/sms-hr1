<?php sleep(1) ?>
<?php require("../../app/init.php") ?>
<?php

CSRF('verify');

// Check if the request is POST
if ($_POST) {
    
    $username = $DB->ESCAPE($_POST['username'] ?? '');
    $type = $DB->ESCAPE($_POST['type'] ?? '');
    $password = VALID_PASS($_POST['password']);

  
    if ($type == "employee") {
        if (empty($username)) die(Toast("error", "Employee ID is empty"));
        $user = $DB->SELECT_ONE_WHERE("users", "*", ["user_id" => $username]);
    }
    else if ($type == "admin") {
        $user = $DB->SELECT_ONE_WHERE("users", "*", ["username" => $username]);
    }

    if (empty($password)) die(Toast("error", "Password is empty"));

    if (empty($user)) die(Toast("error", "Oops! is invalid account"));
    
    // Verify password
    if (!VERIFY_PASSWORD($password, $user['password'])) {
        die(Toast("error", "Incorrect password"));
    }

    // Generate JWT
    $jwt = new JWT("this-is-a-secure-secret-key-token");
    $user_token = $jwt->createToken([
        "user_id"  => $user['user_id'],
        "username" => $user['username'],
        "email"    => $user['email'],
        "role" => $type
    ]);

    // Set cookie
    $expiry = strtotime('+1 month');
    if (!setcookie("_xsrf-token", $user_token, $expiry, "/"))
        die(Toast("error", "Failed to set cookie"));

    $DB->UPDATE("users", ["last_login" => DATE_TIME], ["user_id" => $user['user_id']]);

    // Login successful
    Toast("success", "Successfully logged in");

    if ($type == "employee") {
        Redirect($user['position'], 1000);
    }
    else if ($type == "admin") {
        Redirect("admin", 1000);
    }

}else{
    die(Toast("error", "Invalid server request"));
}
