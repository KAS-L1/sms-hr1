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

<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card card__round card__border--hover mt-5">
            <div class="card-header bg-primary text-white text-center py-4">
                <h2 class="fw-bold">APPLICATION DETAILS</h2>
            </div>
            <di class="card-body py-4">

                <?php if ($application['status'] == "Approved") { ?>
                    <div class="alert alert-success">
                        <strong>Application has been approved!</strong>
                    </div>
                <?php } elseif ($application['status'] == "Declined") { ?>
                    <div class="alert alert-danger">
                        <strong>Application has been declined!</strong>
                    </div>
                <?php } ?>

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
                                    <td><?= BadgeStatus($application['status']) ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Updated</strong></td>
                                    <td><?= $application['updated_at'] ?></td>
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

                            <!-- Action Buttons for Approve and Reject -->
                            <?php if ($application['status'] == "Pending") { ?>
                                <div class="mt-4">
                                    <button class="btn btn-success btn-sm" id="btnApprove" data-application_id="<?= $application['application_id'] ?>">Approve</button>
                                    <button class="btn btn-danger btn-sm" id="btnReject" data-application_id="<?= $application['application_id'] ?>">Reject</button>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>

        </div>
    </div>
</div>

<!-- Reject Application Modal -->
<div class="modal fade" id="rejectApplicationModal" tabindex="-1" aria-labelledby="rejectApplicationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rejectApplicationModalLabel">Reject Application</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <textarea id="rejectRemarks" class="form-control" rows="3" placeholder="Enter rejection remarks here"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" id="btnRejectConfirm">Reject</button>
            </div>
        </div>
    </div>
</div>

<div id="responseApplication"></div>
</div>

<script>
    // Approve Application
    $('#btnApprove').click(function() {
        const application_id = '<?= $app_id ?>';
        btnLoading('#btnApprove');
        $.post('<?= ROUTE('api/application/approve.php') ?>', {
            application_id: application_id
        }, function(res) {
            $('#responseApplication').html(res);
            btnLoadingReset('#btnApprove');
        });
    });

    // Reject Application with Remarks
    $('#btnReject').click(function() {
        $('#rejectApplicationModal').modal('show');
    });

    $('#btnRejectConfirm').click(function() {
        const application_id = '<?= $app_id ?>';
        const remarks = $('#rejectRemarks').val();
        btnLoading('#btnRejectConfirm');
        $.post('<?= ROUTE('api/application/decline.php') ?>', {
            application_id: application_id,
            remarks: remarks
        }, function(res) {
            $('#responseApplication').html(res);
            btnLoadingReset('#btnRejectConfirm');
            $('#rejectApplicationModal').modal('hide');
        });
    });
</script>