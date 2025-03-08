<?php
$job_id = $_GET['jobid'] ?? null;
$job = $DB->SELECT_ONE_WHERE("jobs", "*", ["job_id" => $job_id]);
?>

<?php include_once("public/_template/Header.php") ?>

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div style="padding: 10rem 0;">

                <div class="row">
                    <div class="col-md-12">

                        <div class="card card__round card__border--hover">
                            <div class="card-header bg-primary text-white text-center py-4">
                                <h2 class="fw-bold">HR ADMISSION</h2>
                            </div>
                            <div class="card-body py-4">
                                <h3 class="fw-bolder text-center"><?= $job['title'] ?></h3>

                                <div class="row mt-4">

                                    <div class="col">
                                        <div class="card card-body card__round shadow">
                                            <form id="admissionForm">
                                                <div class="row">
                                                    <h1>Basic Information</h1>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="mb-2">Lastname: <?= Required() ?></label>
                                                            <input type="text" name="lastname" class="form-control mb-5" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="mb-2">Firstname: <?= Required() ?></label>
                                                            <input type="text" name="firstname" class="form-control mb-5" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="mb-2">Middlename: <?= Required() ?></label>
                                                            <input type="text" name="middlename" class="form-control mb-5" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="mb-2">Gender: <?= Required() ?></label>
                                                            <select name="gender" class="form-control mb-5" required>
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="mb-2">Civil Status: <?= Required() ?></label>
                                                            <select name="civil_status" class="form-control mb-5" required>
                                                                <option value="Single">Single</option>
                                                                <option value="Married">Married</option>
                                                                <option value="Widowed">Widowed</option>
                                                                <option value="Separated">Separated</option>
                                                                <option value="Divorced">Divorced</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="mb-2">Religion: <?= Required() ?></label>
                                                            <input type="text" name="religion" class="form-control mb-5" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="mb-2">Birthday: <?= Required() ?></label>
                                                            <input type="date" name="birthday" class="form-control mb-5" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group"> <input type="email" name="e
                                                            <label class=" mb-2">Email: <?= Required() ?></label>
                                                            mail" class="form-control mb-5" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="mb-2">Contact #: <?= Required() ?></label>
                                                            <input type="number" name="contact" class="form-control mb-5" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="mb-2">Address #: <?= Required() ?></label>
                                                            <input type="text" name="address" class="form-control mb-5" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="mb-2">Barangay: <?= Required() ?></label>
                                                            <input type="text" name="barangay" class="form-control mb-5" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="mb-2">Municipality/City: <?= Required() ?></label>
                                                            <input type="text" name="city" class="form-control mb-5" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="mb-2">File Upload <?= Required() ?></label>
                                                            <input type="file" name="file_upload" class="form-control mb-5" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <button type="submit" id="btnSubmitRequirement" class="btn btn-primary w-100" style="margin-top: 2.00rem !important;">Submit</button>
                                                    </div>
                                                    <h3>Notes!!</h3>
                                                    <p><strong>Application Process Guidelines:</strong></p>
                                                    <ul class="custom-bullets">
                                                        <li>Provide valid email address for updates from HR Department.</li>
                                                        <li>Regularly check email for application instructions, acceptance notifications, and login credentials.</li>
                                                        <li>Ensure application details are accurate as staff cannot make corrections.</li>
                                                        <li>Only resubmitted, error-free applications accepted.</li>
                                                        <li>Confidentiality of information used solely for admissions purposes.</li>
                                                        <li>Consider online readiness and offer flexibility in choosing a convenient learning modality.</li>
                                                    </ul>

                                                    <p class="warning-text text-sm mb-3 fs-6">Warning: The Data Privacy Act requires strict protection of personal information, enforced by the National Privacy Commission, and violations may lead to legal consequences.</p>

                                                    <style>
                                                        .custom-bullets {
                                                            list-style-type: none;
                                                            padding-left: 20px;
                                                        }

                                                        .custom-bullets li {
                                                            background: none;
                                                            padding-left: 30px;
                                                            /* Adjust this to the width of the image */
                                                        }

                                                        .warning-text {
                                                            display: block;
                                                            font-size: 14px;
                                                            /* Adjust font size */
                                                            color: #d9534f;
                                                            /* Red color to indicate warning */
                                                            white-space: normal;
                                                            /* Ensure text wraps instead of overflowing */
                                                            word-wrap: break-word;
                                                            /* Break long words */
                                                        }
                                                    </style>

                                                </div>
                                            </form>
                                            <div id="responseAdmissionForm"></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<script>
    $('#admissionForm').submit(function(e) {
        e.preventDefault();
        btnLoading('#btnSubmitRequirement');

        var formData = new FormData(this);

        $.ajax({
            url: '<?= ROUTE('api/job-posting/create_job.php'); ?>',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(res) {
                $('#responseAdmissionForm').html(res);
                btnLoadingReset('#btnSubmitRequirement');
            },
            error: function() {
                $('#responseAdmissionForm').html('<div class="text-red-500">An error occurred. Please try again.</div>');
                btnLoadingReset('#btnSubmitRequirement');
            }
        });
    });
</script>

<?php include_once("public/_template/Footer.php") ?>