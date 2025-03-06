<?php
require("../../app/init.php");
require("../auth/auth.php");

// Ensure CSRF protection
csrfProtect('verify');

// Check if all required POST data exists
$requiredFields = ['username', 'email', 'address', 'contact', 'age', 'gender'];
foreach ($requiredFields as $field) {
    if (!isset($_POST[$field])) {
        die(toast('error', 'Invalid server request'));
    }
}

// Sanitize and validate input data
$data = [
    "username"   => $DB->ESCAPE(VALID_STRING($_POST['username'])),
    "email"      => $DB->ESCAPE(VALID_MAIL($_POST['email'])),
    "address"    => $DB->ESCAPE(VALID_STRING($_POST['address'])),
    "contact"    => $DB->ESCAPE(VALID_NUMBER($_POST['contact'])),
    "age"    => $DB->ESCAPE(VALID_NUMBER($_POST['age'])),
    "gender"    => $DB->ESCAPE(VALID_NUMBER($_POST['gender'])),
];

// Check if any fields have not changed
if (
    $data['username'] == AUTH_USER['username'] &&
    $data['email'] == AUTH_USER['email'] &&
    $data['address'] == AUTH_USER['address'] &&
    $data['age'] == AUTH_USER['age'] &&
    $data['gender'] == AUTH_USER['gender']
) {
    die(toast('error', 'No changes were made.'));
}

$where = ["user_id" => AUTH_USER_ID];

$update_user = $DB->UPDATE("users", $data, $where);

if (!$update_user === "success") die(toast('error', 'Failed to update Personal Information'));

toast('success', 'Personal information successfully updated');
die(refresh(2000));
