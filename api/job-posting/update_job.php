<?php
require("../../app/init.php");
require("../auth/auth.php");

// Validate input fields
$job_id = $_POST['job_id'] ?? ''; // Get job_id from the form to update the existing job
$title = $_POST['title'] ?? '';
$school = $_POST['school'] ?? '';
$location = $_POST['location'] ?? '';
$description = $_POST['description'] ?? '';
$image = $_FILES['image'] ?? null; // Changed from $_POST to $_FILES for file upload

// Begin Transaction
$DB->DB->begin_transaction();

try {
    // Ensure the job_id exists
    if (empty($job_id)) {
        die(toast("error", "Job ID is missing for update."));
    }

    // If an image is uploaded, process it
    if (!empty($_FILES['image']['name'])) {
        // Get the image file information
        $file_name = $job_id . '-' . uniqid();
        $file_extension = pathinfo($image['name'], PATHINFO_EXTENSION); // Get the file extension

        // Set the directory where the image will be saved
        $upload_dir = '../../upload/job/';

        // Call UPLOAD_FILE function to save the image
        $upload_result = UPLOAD_FILE($image, $upload_dir, $file_name, $file_extension);

        if ($upload_result['status'] == 'error') {
            $DB->DB->rollback(); // Rollback transaction if image saving fails
            die(toast("error", "Failed to save image"));
        }

        // Set the image path to be saved in the database
        $image_path = $upload_result['name'];
    } 

    if(empty($_FILES['image']['name'])){
        // Prepare the data to be updated
        $job_data = [
            "title" => $title,
            "school" => $school,
            "location" => $location,
            "description" => $description,
            "updated_at" => DATE_TIME
        ];
    }else{
        $job_data = [
            "title" => $title,
            "school" => $school,
            "location" => $location,
            "description" => $description,
            "image" => $image_path, // Ensure image is a string and not an array
            "updated_at" => DATE_TIME
        ];
    }

    // Prepare the condition for the update query
    $where = ["job_id" => $job_id];

    // Update the job record
    $update = $DB->UPDATE("jobs", $job_data, $where);
    if (!$update) {
        $DB->DB->rollback(); // Rollback transaction on update failure
        die(toast("error", "Failed to update job."));
    }

    // Commit transaction (Everything is successful)
    $DB->DB->commit();
    toast("success", "Job updated successfully.");
    die(redirect('/job-posting', 2000));
} catch (Exception $e) {
    // Rollback transaction on error
    $DB->DB->rollback();
    die(toast("error", "Something went wrong. Please try again. Error: " . $e->getMessage()));
}
