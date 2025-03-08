<?php
require("../../app/init.php");

try {
    // Start transaction
    $DB->DB->begin_transaction();

    // Get the job ID from the POST data
    $job_id = $_POST['job_id'];

    // Define the condition for the deletion
    $where = array("job_id" => $job_id);

    // Attempt to delete the job from the database
    $delete = $DB->DELETE("jobs", $where);

    // Check if the delete operation was successful
    if ($delete['success']) {  // Check if delete operation was successful (boolean)
        // Commit the transaction
        $DB->DB->commit();

        // Show a success message
        toast('success', 'Job deleted successfully.');
        refresh(2000);
    } else {
        // If deletion failed, throw an exception
        throw new Exception('Failed to delete job');
    }
} catch (Exception $e) {
    // Rollback the transaction if there was an error
    $DB->DB->rollback();

    // Log the error for debugging (optional)
    error_log($e->getMessage());

    // Show an error message with the exception message
    toast('error', 'Error: ' . $e->getMessage());
}
