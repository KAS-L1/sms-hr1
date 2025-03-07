<?php
$get_job_id = $_GET['job_id'] ?? null;
$job = $DB->SELECT_ONE_WHERE("jobs", "*", ["job_id" => $get_job_id]);

?>

<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card card-body">
            <div class="text-center py-4">
                <img src="<?= DOMAIN . '/upload/job/' . ($job['image'] ? $job['image'] : 'default.png') ?>" class="img rounded-circle thumb mb-2" width="125" height="125">
                <div class="mt-3">
                    <span><?= $job['job_id'] ?></span>
                </div>
            </div>
            <form id="formEditJob">
                <input type="hidden" name="job_id" value="<?= $job['job_id'] ?>">
                <input type="hidden" name="update_job" value="1"> <!-- This will trigger form submission in the backend -->
                <table class="table table-light">
                    <tr>
                        <td>Title</td>
                        <td>
                            <?= Input('text', 'title', $job['title'], null, null, 'required'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>School</td>
                        <td>
                            <select name="school" class="form-control">
                                <option value="MV Campus" <?= $job['school'] == 'MV Campus' ? 'selected' : '' ?>>MV Campus</option>
                                <option value="Main Campus" <?= $job['school'] == 'Main Campus' ? 'selected' : '' ?>>Main Campus</option>
                                <option value="Bulacan Campus" <?= $job['school'] == 'Bulacan Campus' ? 'selected' : '' ?>>Bulacan Campus</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Location</td>
                        <td>
                            <select name="location" class="form-control">
                                <option value="Mv - Topaz Millionaires Village Novaliches, Quezon City, Metro Manila" <?= $job['location'] == 'Mv - Topaz Millionaires Village Novaliches, Quezon City, Metro Manila' ? 'selected' : '' ?>>Mv - Topaz Millionaires Village Novaliches, Quezon City, Metro Manila</option>
                                <option value="Main - Quirino Hwy, Novaliches, Quezon City, Metro Manila" <?= $job['location'] == 'Main - Quirino Hwy, Novaliches, Quezon City, Metro Manila' ? 'selected' : '' ?>>Main - Quirino Hwy, Novaliches, Quezon City, Metro Manila</option>
                                <option value="Bulacan - Quirino Hwy, San Jose del Monte City, Bulacan" <?= $job['location'] == 'Bulacan - Quirino Hwy, San Jose del Monte City, Bulacan' ? 'selected' : '' ?>>Bulacan - Quirino Hwy, San Jose del Monte City, Bulacan</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Location</td>
                        <td>
                            <?= Input('text', 'location', $job['location'], null, null, 'required'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>
                            <textarea rows="4" name="description" class="form-control" required><?= $job['description'] ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Image</td>
                        <td>
                            <?= input('file', 'image', $job['image'], null); ?>
                        </td>
                    </tr>
                </table>
                <div>
                    <button type="submit" id="btnUpdateJob" class="btn btn-primary w-100">Update</button>
                </div>
            </form>
            <div id="responseUpdateJob"></div>
        </div>
    </div>
</div>

<script>
    $('#formEditJob').submit(function(e) {
        e.preventDefault();
        btnLoading('#btnUpdateJob');

        var formData = new FormData(this);

        // Submit the form data via AJAX
        $.ajax({
            url: '<?= ROUTE('api/job-posting/update_job.php'); ?>',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(res) {
                $('#responseUpdateJob').html(res);
                btnLoadingReset('#btnUpdateJob');
            },
            error: function() {
                $('#responseUpdateJob').html('<div class="text-red-500">An error occurred. Please try again.</div>');
                btnLoadingReset('#btnUpdateJob');
            }
        });
    });
</script>