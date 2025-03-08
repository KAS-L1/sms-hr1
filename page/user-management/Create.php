<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card card-body">
            <div class="text-center py-4">
                <div class="fs-4 fw-bold">Create New User</div>
            </div>

            <form id="formCreateUser">
                <table class="table table-light">
                    <tr>
                        <td>First Name</td>
                        <td>
                            <?= Input('text', 'firstname', null, null, null, 'required'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td>
                            <?= Input('text', 'lastname', null, null, null, 'required'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td>
                            <?= Input('text', 'username', null, null, null, 'required'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>
                            <?= Password('password', null, null, null, 'required'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Confirm Password</td>
                        <td>
                            <?= Password('confirmPassword', null, null, null, 'required'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>
                            <?= Input('email', 'email', null, null, null, 'required'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Contact</td>
                        <td>
                            <?= Input('number', 'contact', null, null, null, 'required'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Age</td>
                        <td>
                            <?= Input('number', 'age'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>
                            <select name="gender" class="form-control">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>
                            <?= Input('text', 'address'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Role</td>
                        <td>
                            <select name="role" class="form-control">
                                <option value="Admin">Admin</option>
                                <option value="Employee">Employee</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Position</td>
                        <td>
                            <select name="position" class="form-control">
                                <option value="Professor">Professor</option>
                                <option value="Cashier">Cashier</option>
                                <option value="Staff">Staff</option>
                                <option value="Clerk">Clerk</option>
                                <option value="Admin">Admin</option>
                                <option value="Manager">Manager</option>
                                <option value="Guard">Guard</option>
                                <option value="Human Resources">Human Resources</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <div>
                    <button type="submit" id="btnCreateUser" class="btn btn-primary w-100">Create User</button>
                </div>
            </form>
            <div id="responseCreateUser"></div>
        </div>
    </div>
</div>

<script>
    $('#formCreateUser').submit(function(e) {
        e.preventDefault();
        btnLoading('#btnCreateUser');

        $.post('<?= ROUTE('api/user-management/create_user.php'); ?>', $('#formCreateUser').serialize(), function(res) {
            $('#responseCreateUser').html(res);
            btnLoadingReset('#btnCreateUser');
        }).fail(function() {
            $('#responseCreateUser').html('<div class="text-red-500">An error occurred. Please try again.</div>');
            btnLoadingReset('#btnCreateUser');
        });
    });
</script>