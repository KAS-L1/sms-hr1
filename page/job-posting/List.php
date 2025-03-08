<?php
$jobs = $DB->SELECT("jobs", "*", "ORDER BY created_at DESC");
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
                    <th class="text-start">Job ID</th>
                    <th class="text-start">Title</th>
                    <th class="text-start">School</th>
                    <th class="text-start">Posted Position</th>
                    <th class="text-start">Location</th>
                    <th class="text-start">Description</th>
                    <th class="text-start">Image</th>
                    <th class="text-start">Status</th>
                    <th class="text-start">Created</th>
                    <th class="text-end">Updated</th>
                </tr>
            </thead>
            <tbody>

                <?php $i = 1;
                foreach ($jobs as $job) { ?>
                    <tr>
                        <td class="d-flex gap-2">
                            <a href="<?= ROUTE('job-posting/details?job_id=' . $job['job_id']) ?>" class="btn btn-sm btn-light"><i class="bi bi-eye"></i></a>
                            <button id="btnDeleteJob" class="btn btn-sm btn-danger" data-job_id="<?= $job['job_id'] ?>"><i class="bi bi-trash"></i></button>
                        </td>
                        <td class="text-start"><?= $job['job_id'] ?></td>
                        <td class="text-start"><?= $job['title'] ?></td>
                        <td class="text-start"><?= $job['school'] ?></td>
                        <td class="text-start"><?= $job['position'] ?></td>
                        <td class="text-start"><?= $job['location'] ?></td>
                        <td class="text-start"><?= $job['description'] ?></td>
                        <td class="text-start">
                            <div class="d-flex align-items-center gap-2">
                                <img src="<?= DOMAIN . '/upload/job/' . ($job['image'] ? $job['image'] : 'default.png') ?>" class="img rounded" width="50">
                            </div>
                        </td>
                        <?php if ($job['status'] == 1) { ?>
                            <td class="text-start"><?= BadgeStatus('Active') ?></td>
                        <?php } else { ?>
                            <td class="text-start"><?= BadgeStatus('Inactive') ?></td>
                        <?php } ?>
                        <td class="text-start"><?= DATE_TIME_SHORT($job['created_at']) ?></td>
                        <td class="text-start"><?= DATE_TIME_SHORT($job['updated_at'] ?? '') ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<div id="responseDeleteJob"></div>

<script>
    $(document).on('click', '#btnDeleteJob', function() {
        const job_id = $(this).data('job_id');
        const button = this; // Store the context of the button
        btnLoading(button); // Show loading spinner

        $.post('../api/job-posting/delete_job.php', {
            job_id: job_id
        }, function(res) {
            // Directly use the response HTML from backend (toast message)
            $('#responseDeleteJob').html(res);
            // Reset loading spinner after response
            btnLoadingReset(button);
            // Optionally, remove the deleted job row from the table
            if (res.includes('success')) {
                $(button).closest('tr').remove();
            }
        }).fail(function(jqXHR, textStatus, errorThrown) {
            // Handle AJAX error
            $('#responseDeleteJob').html(`<div class="alert alert-danger">An error occurred: ${errorThrown}</div>`);
            btnLoadingReset(button);
        });
    });
</script>