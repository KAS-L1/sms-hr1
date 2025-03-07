<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card card-body">
            <div class="text-center py-4">
                <div class="fs-4 fw-bold">Create New Job</div>
            </div>

            <form id="formCreateJob">
                <table class="table table-light">
                    <tr>
                        <td>Title</td>
                        <td>
                            <?= Input('text', 'title', null, null, null, 'required'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>School</td>
                        <td>
                            <?= Input('text', 'school', null, null, null, 'required'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Location</td>
                        <td>
                            <?= Input('text', 'location', null, null, null, 'required'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>
                            <?= Input('text', 'description', null, null, null, 'required'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Image</td>
                        <td>
                            <?= input('file', 'image', null, null); ?>
                        </td>
                    </tr>
                </table>
                <div>
                    <button type="submit" id="btnCreateJob" class="btn btn-primary w-100">Create Job</button>
                </div>
            </form>
            <div id="responseCreateJob"></div>
        </div>
    </div>
</div>

<script>
    $('#formCreateJob').submit(function(e) {
        e.preventDefault();
        btnLoading('#btnCreateJob');

        var formData = new FormData(this);

        $.ajax({
            url: '<?= ROUTE('api/job-posting/create_job.php'); ?>',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(res) {
                $('#responseCreateJob').html(res);
                btnLoadingReset('#btnCreateJob');
            },
            error: function() {
                $('#responseCreateJob').html('<div class="text-red-500">An error occurred. Please try again.</div>');
                btnLoadingReset('#btnCreateJob');
            }
        });
    });
</script>