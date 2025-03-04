<?php

if (isset($_COOKIE['_xsrf-token'])) {

    // Verifying a token
    $token = $_COOKIE['_xsrf-token'];
    $jwt = new JWT("this-is-a-secure-secret-key-token");
    $payload = $jwt->verifyToken($token);
    if ($payload) {

        $user = $DB->SELECT_ONE_WHERE("users", "*", ['user_id' => $payload['user_id']]);
        define('AUTH_USER_ID', $user['user_id']);
        define('AUTH_USER', $user);

    }else{
        setcookie("_xsrf-token", "", time() - 1, "/");
        session_destroy();
        Redirect("/403?res=token-expired");
    }

}else{
    Redirect("/403?res=unauthorized");
}