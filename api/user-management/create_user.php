<?php
require("../../app/init.php");
require("../auth/auth.php");

predie($_POST);
// Validate input fields
$firstname = $_POST['firstname'] ?? '';
$lastname = $_POST['lastname'] ?? '';
$username = $_POST['username'] ?? '';
$email = $_POST['email'] ?? '';
$address = $_POST['address'] ?? '';
$contact = $_POST['contact'] ?? '';
$age = $_POST['age'] ?? '';
$gender = $_POST['gender'] ?? '';
$role = $_POST['role'] ?? '';
$position = $_POST['position'] ?? ''; 
$password = $_POST['password'] ?? '';
$confirmPassword = $_POST['confirmPassword'] ?? '';

// Validate required fields
if (!$firstname || !$lastname || !$username || !$email || !$contact || !$age || !$gender || !$role || !$position || !$password || !$confirmPassword) {
    die(toast("error", "All fields are required."));
}

// Validate role
$allowed_roles = ['Admin', 'Employee'];
if (!in_array($role, $allowed_roles)) {
    die(toast("error", "Invalid role."));
}

// Validate email format
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die(toast("error", "Invalid email format."));
}

if ($password !== $confirmPassword) {
    die(toast("error", "Passwords do not match."));
}

// Hash the password
$hashedPassword = HASH_PASSWORD($password);

// Begin Transaction
$DB->DB->begin_transaction();

try {
    // Check if email or username already exists
    $existing_user = $DB->SELECT_ONE_WHERE("users", "*", ["email" => $email]);
    if ($existing_user) {
        $DB->DB->rollback();
        die(toast("error", "Email already exists."));
    }

    $existing_username = $DB->SELECT_ONE_WHERE("users", "*", ["username" => $username]);
    if ($existing_username) {
        $DB->DB->rollback();
        die(toast("error", "Username already taken."));
    }

    $user_id = ($role == 'Admin') ? GENERATE_ID('11', 4) : GENERATE_ID('EMP', 4);

    // Insert user data
    $user_data = [
        "user_id" => $user_id,
        "firstname" => $firstname,
        "lastname" => $lastname,
        "username" => $username,
        "email" => $email,
        "address" => $address,
        "contact" => $contact,
        "role" => $role,
        "age" => $age,
        "gender" => $gender,
        "position" => $position,
        "password" => $hashedPassword,
        "created_at" => DATE_TIME,
        "updated_at" => DATE_TIME
    ];

    $insert = $DB->INSERT("users", $user_data);
    if (!$insert['success']) {
        $DB->DB->rollback();
        die(toast("error", "Failed to create user."));
    }

    // Get newly created user ID
    $new_user = $DB->SELECT_ONE_WHERE("users", "user_id", ["email" => $email]);
    $new_user_id = $new_user['user_id'] ?? null;

    if (!$new_user_id) {
        $DB->DB->rollback();
        die(toast("error", "User created, but failed to fetch user ID."));
    }

    // Commit transaction (Everything is successful)
    $DB->DB->commit();
    toast("success", "User created successfully.");
    die(redirect('/user-management', 2000));
} catch (Exception $e) {
    // Rollback transaction on error
    $DB->DB->rollback();
    die(toast("error", "Something went wrong. Please try again. Error: " . $e->getMessage()));
}
