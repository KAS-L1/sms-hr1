<?php
$app_id = $_GET['app_id'] ?? null;
$application = $DB->SELECT_ONE_WHERE("jobs_application", "*", ["application_id" => $app_id]);

if (!$application) {
    echo '<div class="alert alert-danger">Application not found!</div>';
    exit;
}

$job = $DB->SELECT_ONE_WHERE("jobs", "*", ["job_id" => $application['job_id']]);

if (!$job) {
    echo '<div class="alert alert-danger">Job not found!</div>';
    exit;
}
?>

<?php include_once("public/_template/Header.php") ?>

<div class="container min-vh-100 d-flex align-items-center">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center text-white w-100">
                <h1 class="text__shadow fw-bolder">Thank You for Applying</h1>
                <p class="text__shadow mb-5">At Bestlink College of the Philippines, we provide and promote quality education with modern and unique techniques to enhance the skills and knowledge of our dear students to make them globally competitive and productive citizens.</p>
                <a href="<?= ROUTE('contact') ?>" class="btn btn-danger p-3 px-5 fw-bold fs-5 btn__round">Contact Us</a>
            </div>
            <div class="card card__round card__border--hover mt-5">
                <div class="card-header bg-primary text-white text-center py-4">
                    <h2 class="fw-bold">APPLICATION DETAILS</h2>
                </div>
                <div class="card-body py-4">
                    <h3 class="fw-bolder text-center"><?= $job['title'] ?></h3>

                    <div class="row mt-4">
                        <div class="col">
                            <div class="py-4">
                                <h4>Basic Information</h4>

                                <div class="py-4">
                                    <div>Location: <?= $job['location'] ?></div>
                                    <div>Position: <?= $job['position'] ?></div>
                                </div>

                                <table class="table table-bordered table-hover">
                                    <tr>
                                        <td><strong>Full Name</strong></td>
                                        <td><?= $application['lastname'] . ' ' . $application['firstname'] . ', ' . $application['middlename'] ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Email</strong></td>
                                        <td><?= $application['email'] ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Contact Number</strong></td>
                                        <td><?= $application['contact'] ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Address</strong></td>
                                        <td><?= $application['address'] ?>, <?= $application['barangay'] ?>, <?= $application['city'] ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Application Status</strong></td>
                                        <td><?= $application['status'] ?? 'Pending' ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Uploaded Document</strong></td>
                                        <td>
                                            <?php if (!empty($application['attachment'])): ?>
                                                <a href="<?= ROUTE('upload/application') . '/' . $application['attachment'] ?>" target="_blank">View Document</a>
                                            <?php else: ?>
                                                No document uploaded.
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                </table>

                                <h4 class="mt-5">Job Description</h4>
                                <p><?= $job['description'] ?></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once("public/_template/Footer.php") ?>