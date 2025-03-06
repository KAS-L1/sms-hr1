

<div class="row gutters">

    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="account-settings w-100">
                    <div class="user-profile border-0">
                        <div class="user-avatar text-center">
                            <?=UserAvatar()?>
                        </div>
                        <div class="text-center mt-3">
                            <h6 class="small font-bold text-muted"><?=AUTH_USER['user_id']?></h6>
                            <h4 class="user-name"><?=AUTH_USER['firstname'].' '.AUTH_USER['lastname']?></h4>
                            <h6 class="user-email"><?=AUTH_USER['email']?></h6>
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
                <div class="card-title">Account Information <?=Required()?></div>
            </div>
            <div class="card-body">
                <div id="responsePersonal"></div>
                <form id="formPersonal">
                    <?=CSRF()?>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <?=Input("text", "firstname", "FIRST NAME", AUTH_USER['firstname'])?>
                        </div>
                        <div class="col-md-6">
                            <?=Input("text", "lastname", "LAST NAME", AUTH_USER['lastname'])?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <?=Input("text", "email", "EMAIL", AUTH_USER['email'], "bg-white","readonly")?>
                        </div>
                        <div class="col-md-6">
                            <?=Input("text", "contact", "CONTACT", AUTH_USER['contact'], "bg-white", "readonly")?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <?=Input("text", "address", "ADDRESS", AUTH_USER['address'])?>
                        </div>
                    </div>
                    <div class="text-right">
                        <?=Button("submit","btnUpdateInfo","Update","primary") ?>
                    </div>
                    <script>
                        $('#formPersonal').submit(function(e){
                            e.preventDefault();
                            btnLoading('#btnUpdateInfo');
                            $.post('<?=ROUTE('api/profile/update_information.php')?>', $('#formPersonal').serialize(), function(res){
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
                <div class="card-title">Account Password <?=Required()?></div>
            </div>
            <div class="card-body">
                <div id="responsePassword"></div>
                <form id="formPassword">
                    <div class="alert alert-info text-xs mb-3" role="alert">
                        <i class="icon-info1"></i>Please enter your current password and your new password. Don't forget your new password you will logged out to the system once updated.
                    </div>
                    <?=CSRF()?>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <?=Input("password", "old_password", "OLD PASSWORD")?>
                        </div>
                        <div class="col-md-6">
                            <?=Input("password", "new_password", "NEW PASSWORD", null, null, 'minlength="6"')?>
                        </div>
                    </div>
                    <div class="flex items-center pl-1">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="togglePassword">
                            <label class="custom-control-label" for="togglePassword">Show Password</label>
                        </div>
                    </div>
                    <div class="text-right">
                        <?=Button("submit","btnUpdatePassword","Update","primary") ?>
                    </div>
                    <script>
                        $('#togglePassword').change(function() {
                            if ($(this).is(':checked')) {
                                $('#old_password').attr('type', 'text');
                                $('#new_password').attr('type', 'text');
                                $('label[for="togglePassword"]').text('Hide Password');
                            } else {
                                $('#old_password').attr('type', 'password');
                                $('#new_password').attr('type', 'password');
                                $('label[for="togglePassword"]').text('Show Password');
                            }
                        });
                        $('#formPassword').submit(function(e){
                            e.preventDefault();
                            btnLoading('#btnUpdatePassword');
                            $.post('<?=ROUTE('api/profile/update_password.php')?>', $('#formPassword').serialize(), function(res){
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
