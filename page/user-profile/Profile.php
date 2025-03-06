<div class="row gutters">

    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="account-settings w-100">
                    <div class="user-profile border-0">
                        <div class="user-avatar text-center">
                            <?= UserAvatar() ?>
                        </div>
                        <div class="text-center mt-3">
                            <h6 class="small font-bold text-muted"><?= AUTH_USER['user_id'] ?></h6>
                            <h4 class="user-name"><?= AUTH_USER['firstname'] . ' ' . AUTH_USER['lastname'] ?></h4>
                            <h6 class="user-email"><?= AUTH_USER['email'] ?></h6>
                            <div class="flex justify-center mt-3">
                                <button class="btn btn-primary">Change Picture</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="card mb-3">
            <div class="card-header">
                <div class="card-title">Account Information <?= Required() ?></div>
            </div>
            <div class="card-body">
                <div id="responsePersonal"></div>
                <form id="formPersonal">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="firstname" class="mb-2 fw-bold">First Name</label>
                            <?= Input("text", "firstname",  AUTH_USER['firstname'], null, "bg-white", "disabled") ?>
                        </div>
                        <div class="col-md-6">
                            <label for="lastname" class="mb-2 fw-bold">Last Name</label>
                            <?= Input("text", "lastname", AUTH_USER['lastname'], "bg-white", "disabled") ?>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label for="email" class="mb-2 fw-bold">Email</label>
                            <?= Input("email", "email", AUTH_USER['email']) ?>
                        </div>
                        <div class="col-md-6">
                            <label for="address" class="mb-2 fw-bold">Address</label>
                            <?= Input("text", "address",  AUTH_USER['address']) ?>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label for="text" class="mb-2 fw-bold">User Name</label>
                            <?= Input("text", "username", AUTH_USER['username']) ?>
                        </div>
                        <div class="col-md-6">
                            <label for="contact" class="mb-2 fw-bold">Contact</label>
                            <?= Input("text", "contact",  AUTH_USER['contact']) ?>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label for="age" class="mb-2 fw-bold">Age</label>
                            <?= Input("number", "age", AUTH_USER['age'], null, "bg-white", "disabled") ?>
                        </div>
                        <div class="col-md-6">
                            <label for="gender" class="mb-2 fw-bold">Gender</label>
                            <?= Input("text", "gender", AUTH_USER['gender'], null, "bg-white", "disabled") ?>
                        </div>
                    </div>
                    <div class="text-right">
                        <?= Button("submit", "btnUpdateInfo", "Update", "primary") ?>
                    </div>
                    <script>
                        $('#formPersonal').submit(function(e) {
                            e.preventDefault();
                            btnLoading('#btnUpdateInfo');
                            $.post('<?= Route('api/user-profile/update_personal.php') ?>', $('#formPersonal').serialize(), function(res) {
                                $('#responsePersonal').html(res);
                                btnLoadingReset('#btnUpdateInfo');
                            })
                        });
                    </script>
                </form>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header">
                <div class="card-title">Account Password <?= Required() ?></div>
            </div>
            <div class="card-body">
                <div id="responsePassword"></div>
                <form id="formPassword">
                    <div class="alert alert-info text-xs mb-3" role="alert">
                        <i class="icon-info1"></i>Please enter your current password and your new password.
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <?= Input("password", "newPassword") ?>
                        </div>
                        <div class="col-md-6">
                            <?= Input("password", "confirmPassword") ?>
                        </div>
                    </div>
                    <div class="flex items-center pl-1 mb-3">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="togglePassword">
                            <label class="custom-control-label" for="togglePassword">Show Password</label>
                        </div>
                    </div>
                    <div class="text-right">
                        <?= Button("submit", "btnUpdatePassword", "Update", "primary") ?>
                    </div>
                    <script>
                        $('#togglePassword').change(function() {
                            if ($(this).is(':checked')) {
                                $('#newPassword').attr('type', 'text');
                                $('#confirmPassword').attr('type', 'text');
                                $('label[for="togglePassword"]').text('Hide Password');
                            } else {
                                $('#newPassword').attr('type', 'password');
                                $('#confirmPassword').attr('type', 'password');
                                $('label[for="togglePassword"]').text('Show Password');
                            }
                        });
                        $('#formPassword').submit(function(e) {
                            e.preventDefault();
                            btnLoading('#btnUpdatePassword');
                            $.post('<?= ROUTE('api/user-profile/update_password.php') ?>', $('#formPassword').serialize(), function(res) {
                                $('#responsePassword').html(res);
                                btnLoadingReset('#btnUpdatePassword');
                            })
                        });
                    </script>
                </form>

            </div>
        </div>
    </div>

</div>