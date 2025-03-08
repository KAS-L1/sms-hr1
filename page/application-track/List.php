<?php
// Fetch jobs with applications
$applications = $DB->SELECT("jobs_application", "*", "ORDER BY created_at DESC");

?>

<div class="card">
    <div class="card-body">
        <div>
            <a href="<?= ROUTE('job-posting/create') ?>" type="button" class="btn btn-primary">
                <i class="bi bi-plus"></i> Add Job
            </a>
        </div>
        <table id="dataTableUsers" class="table table-hover">
            <thead class="table-secondary">
                <tr>
                    <th class="text-start">Action</th>
                    <th class="text-start">Title</th>
                    <th class="text-start">School</th>
                    <th class="text-start">Position</th>
                    <th class="text-start">Location</th>
                    <th class="text-start">Status</th>
                    <th class="text-start">Created</th>
                    <th class="text-end">Updated</th>
                </tr>
            </thead>
            <tbody>

                <?php $i = 1;
                foreach ($applications as $application) {
                    $job = $DB->SELECT_ONE_WHERE("jobs", "*", ["job_id" => $application['job_id']]);
                ?>
                    <tr>
                        <td class="text-start">
                            <!-- Display the number of applications for this application -->
                            <a href="<?= ROUTE('application-track/details?app_id=' . $application['application_id']) ?>" class="btn btn-sm btn-info">
                                View Applications <?= $application['application_id'] ?>
                            </a>
                        </td>
                        <td class="text-start"><?= $job['title'] ?></td>
                        <td class="text-start"><?= $job['school'] ?></td>
                        <td class="text-start"><?= $job['position'] ?></td>
                        <td class="text-start"><?= $job['location'] ?></td>

                        <td class="text-start"><?= BadgeStatus($application['status']) ?></td>
                        <td class="text-start"><?= DATE_TIME_SHORT($application['created_at']) ?></td>
                        <td class="text-start"><?= DATE_TIME_SHORT($application['updated_at'] ?? '') ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

