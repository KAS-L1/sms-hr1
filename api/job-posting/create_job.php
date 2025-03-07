<?php
require("../../app/init.php");
require("../auth/auth.php");

// Validate input fields
$title = $DB->ESCAPE($_POST['title'] ?? '');
$school = $DB->ESCAPE($_POST['school'] ?? '');
$location = $DB->ESCAPE($_POST['location'] ?? '');
$description = $DB->ESCAPE($_POST['description'] ?? '');
$image = $DB->ESCAPE($_FILES['image'] ?? null); // Changed from $_POST to $_FILES for file upload

// Begin Transaction
$DB->DB->begin_transaction();

try {

    $job_id = GENERATE_ID('JOB-', 4);

    // If an image is uploaded, process it
    if ($image) {
        // Get the image file information
        $file_name = $job_id . '-' . uniqid();
        $file_extension = pathinfo($image['name'], PATHINFO_EXTENSION); // Get the file extension

        // Set the directory where the image will be saved
        $upload_dir = '../../upload/job/';

        // Call UPLOAD_FILE function to save the image
        $upload_result = UPLOAD_FILE($image, $upload_dir, $file_name, $file_extension);

        if ($upload_result['status'] == 'error') {
            $DB->DB->rollback();
            die(toast("error", "Failed to save image"));
        }

        // Set the image path to be saved in the database
        $image_path = $upload_result['name'];
    } else {
        $image_path = ''; // If no image is provided, leave the image field empty
    }

    // Insert job data
    $job_data = [
        "job_id" => $job_id,
        "title" => $title,
        "school" => $school,
        "location" => $location,
        "description" => $description,
        "image" => $image_path,
        "created_at" => DATE_TIME,
        "updated_at" => DATE_TIME
    ];

    $insert = $DB->INSERT("jobs", $job_data);
    if (!$insert['success']) {
        $DB->DB->rollback();
        die(toast("error", "Failed to create job."));
    }

    // Commit transaction (Everything is successful)
    $DB->DB->commit();
    toast("success", "Job created successfully.");
    die(redirect('/job-posting', 2000));
} catch (Exception $e) {
    // Rollback transaction on error
    $DB->DB->rollback();
    die(toast("error", "Something went wrong. Please try again. Error: " . $e->getMessage()));
}
