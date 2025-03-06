<?php require("../../app/init.php"); ?>
<?php require("../auth/auth.php"); ?>

<?php

/**
 * UPDATE USER PERSONAL PASSWORD
 **/


csrfProtect('verify');

$newPassword = $_POST['newPassword'];
$confirmPassword = $_POST['confirmPassword'];

if (!VALID_STRONG_PASS($newPassword)) {
    die();
}

if ($newPassword !== $confirmPassword) {
    toast("error", "Passwords do not match.");
    die();
}

$hashedPassword = HASH_PASSWORD($newPassword);
// Verify the new password if no changes made
if ($newPassword == $user['password']) die(toast("error", "No changes made to password."));

$data = array(
    "password" => $hashedPassword,
);

$where = array("user_id" => AUTH_USER_ID);
$update_password = $DB->UPDATE("users", $data, $where);

if (!$update_password === "success") die(toast("error", "Failed to update password"));

$notification_data = [
    "user_id" => AUTH_USER_ID,
    "message" => "You account password has been updated",
    "action" => "AccountPasswordUpdated",
    "created_at" => DATE_TIME
];

$DB->INSERT("notifications", $notification_data);

toast("success", "Password updated successfully");
die(refresh(2000));
