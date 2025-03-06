<?php require("../../app/init.php") ?>
<?php require("../auth/auth.php") ?>
<?php

// Check if the image data was received via POST
if (isset($_POST['image'])) {
    // The image data is received as a base64 encoded string
    $base64_image = $_POST['image'];

    // Remove the "data:image/png;base64," or "data:image/jpeg;base64," part of the string
    $image_parts = explode(";base64,", $base64_image);
    $image_type = str_replace('data:image/', '', $image_parts[0]);
    $image_data = base64_decode($image_parts[1]);

    // Set the directory where the image will be saved
    $upload_dir = '../../upload/user/';

    // Make sure the directory exists
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }

    // Generate a unique filename to avoid overwriting
    $file_name = AUTH_USER_ID . '-' . uniqid() . '.' . $image_type;

    // Set the path where the image will be saved
    $file_path = $upload_dir . $file_name;

    // Save the image to the server
    if (file_put_contents($file_path, $image_data)) {
        $data = array(
            "image" => $file_name,
            "updated_at" => DATE_TIME
        );
        $where = array("user_id" => AUTH_USER_ID);
        $UPDATE = $DB->UPDATE("users", $data, $where);

        toast("success", "Successfully Updated");
        die(refresh(2000));
    } else {
        // If there was an error saving the image
        die(toast("error", "Failed to save image"));
    }
} else {
    // If no image was received
    die(toast("error", "No image was received"));
}
