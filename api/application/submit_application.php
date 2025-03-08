<?php
require("../../app/init.php");


// Validate input fields
$job_id = $_POST['job_id'] ?? null;
$lastname = $DB->ESCAPE($_POST['lastname'] ?? '');
$firstname = $DB->ESCAPE($_POST['firstname'] ?? '');
$middlename = $DB->ESCAPE($_POST['middlename'] ?? '');
$gender = $DB->ESCAPE($_POST['gender'] ?? '');
$civil_status = $DB->ESCAPE($_POST['civil_status'] ?? '');
$religion = $DB->ESCAPE($_POST['religion'] ?? '');
$birthday = $DB->ESCAPE($_POST['birthday'] ?? '');
$email = $DB->ESCAPE($_POST['email'] ?? '');
$contact = $DB->ESCAPE($_POST['contact'] ?? '');
$address = $DB->ESCAPE($_POST['address'] ?? '');
$barangay = $DB->ESCAPE($_POST['barangay'] ?? '');
$city = $DB->ESCAPE($_POST['city'] ?? '');
$file_upload = $_FILES['attachment']; // Get the file from the form

// Begin Transaction
$DB->DB->begin_transaction();

try {
    // Validate that the job exists
    $job = $DB->SELECT_ONE_WHERE("jobs", "*", ["job_id" => $job_id]);
    if (!$job) {
        $DB->DB->rollback();
        die(toast("error", "Job not found."));
    }

    // Process the file upload if provided
    $file_path = '';
    if ($file_upload && $file_upload['error'] == 0) {
        $file_name = $job_id . '-' .uniqid();
        $file_extension = pathinfo($file_upload['name'], PATHINFO_EXTENSION);
        $upload_dir = '../../upload/application/';

        // Ensure the file is uploaded
        $upload_result = UPLOAD_FILE($file_upload, $upload_dir, $file_name, $file_extension);

        if ($upload_result['status'] == 'error') {
            $DB->DB->rollback();
            die(toast("error", "Failed to upload file"));
        }

        $file_path = $upload_result['name']; // Store the file path
    }

    $application_id = GENERATE_ID('APP-', 6);

    // Insert the admission details into the database
    $admission_data = [
        "application_id" => $application_id,
        "job_id" => $job_id,
        "lastname" => $lastname,
        "firstname" => $firstname,
        "middlename" => $middlename,
        "gender" => $gender,
        "civil_status" => $civil_status,
        "religion" => $religion,
        "birthdate" => $birthday,
        "email" => $email,
        "contact" => $contact,
        "address" => $address,
        "barangay" => $barangay,
        "city" => $city,
        "attachment" => $file_path,
        "created_at" => DATE_TIME,
        "updated_at" => DATE_TIME
    ];

    $insert = $DB->INSERT("jobs_application", $admission_data);
    if (!$insert['success']) {
        $DB->DB->rollback();
        die(toast("error", "Failed to submit admission."));
    }

    // Commit transaction (Everything is successful)
    $DB->DB->commit();
    toast("success", "Your application has been submitted successfully.");
    die(redirect('thankyou?app_id=' . $application_id, 2000)); // Redirect to a success page

} catch (Exception $e) {
    // Rollback transaction on error
    $DB->DB->rollback();
    die(toast("error", "Something went wrong. Please try again. Error: " . $e->getMessage()));
}
