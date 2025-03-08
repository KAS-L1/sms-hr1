<?php
require("../../app/init.php");
require("../auth/auth.php");

$application_id = $_POST['application_id'] ?? null;

$data = [
    "status" => "Declined",
    "remark" => $DB->ESCAPE($_POST['remarks']  ?? null),
    "updated_at" => DATE_TIME
];
$update = $DB->UPDATE("jobs_application", $data, ["application_id" => $application_id]);
if(!$update['success']) die(toast("error", "Failed to declined application."));

SwalAlert("success", "Application declined successfully.");
die(Refresh(2000));
