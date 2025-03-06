<?php
require("../../app/init.php");
require("../auth/auth.php");

// Retrieve the user_id from POST (from the form submission)
$user_id = $_POST['user_id'] ?? null;
if (!$user_id) {
    die(toast("error", "User ID is required."));
}

// Fetch the current user details
$user = $DB->SELECT_ONE_WHERE("users", "*", ["user_id" => $user_id]);
if (!$user) {
    die(toast("error", "User not found."));
}

// Handle form submission
if (isset($_POST['update_user']) && $_POST['update_user'] == '1') {  // Ensure this is the form submit
    // Validate and sanitize input fields
    $firstname = $_POST['firstname'] ?? '';
    $lastname = $_POST['lastname'] ?? '';
    $email = $_POST['email'] ?? '';
    $contact = $_POST['contact'] ?? '';
    $age = $_POST['age'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $address = $_POST['address'] ?? '';
    $status = $_POST['status'] ?? '';
    $role = $_POST['role'] ?? '';
    $position = $_POST['position'] ?? '';
    
    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die(toast("error", "Invalid email format."));
    }

    // Check if the submitted data is different from the current user data
    if (
        $firstname == $user['firstname'] &&
        $lastname == $user['lastname'] &&
        $email == $user['email'] &&
        $contact == $user['contact'] &&
        $age == $user['age'] &&
        $gender == $user['gender'] &&
        $address == $user['address'] &&
        $status == $user['status'] &&
        $role == $user['role'] &&
        $position == $user['position']
    ) {
        die(toast("info", "No changes were made to the user details."));
    }

    // Start a transaction
    $DB->DB->begin_transaction();

    try {
        // Prepare the updated user data
        $updated_data = [
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'contact' => $contact,
            'age' => $age,
            'gender' => $gender,
            'address' => $address,
            'status' => $status,
            'role' => $role,
            'position' => $position,
            'updated_at' => DATE_TIME
        ];

        // Update the user in the database
        $update_result = $DB->UPDATE("users", $updated_data, ["user_id" => $user_id]);

        if (!$update_result['success']) {
            $DB->DB->rollback();
            die(toast("error", "Failed to update user."));
        }

        // Commit the transaction
        $DB->DB->commit();

        // Show success message and redirect
        toast("success", "User updated successfully.");
        die(redirect('/user-management', 2000));
    } catch (Exception $e) {
        // Rollback transaction on error
        $DB->DB->rollback();
        die(toast("error", "Something went wrong. Please try again. Error: " . $e->getMessage()));
    }
}
