<?php
require("../../app/init.php");
require("../auth/auth.php");

$application_id = $_POST['application_id'] ?? null;

$data = [
    "status" => "Approved",
    "updated_at" => DATE_TIME
];
$update = $DB->UPDATE("jobs_application", $data, ["application_id" => $application_id]);
if(!$update['success']) die(toast("error", "Failed to approve application."));

SwalAlert("success", "Application approved successfully.");
die(Refresh(2000));
