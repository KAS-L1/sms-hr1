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
                            <h6 class="small font-bold text-muted"><?= AUTH_USER['user_id'] . ' - ' .  AUTH_USER['position'] ?></h6>
                            <h4 class="user-name"><?= AUTH_USER['firstname'] . ' ' . AUTH_USER['lastname'] ?></h4>
                            <h6 class="user-email"><?= AUTH_USER['email'] ?></h6>
                            <div class="flex justify-center mt-3" id="previewPicture">
                                <label for="photo" class="btn btn-primary flex items-center justify-center cursor-pointer">
                                    <i class="bi bi-camera text-md mr-1"></i>
                                    <span>Upload</span>
                                </label>
                                <input type="file" id="photo" accept=".jpg, .jpeg, .png" hidden>
                            </div>

                            <!-- Profile Image Preview (Visible after selecting image) -->
                            <!-- <div class="mt-3">
                                <img id="previewImage" src="" alt="Profile Image" class="rounded-full w-32 h-32 object-cover mx-auto" />
                            </div> -->

                            <!-- Modal -->
                            <div id="cropModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="cropModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="cropModalLabel">Crop Image</h5>
                                        </div>
                                        <div class="modal-body">
                                            <div id="imageCropContainer" class="d-flex justify-content-center align-items-center bg-light border border-gray-300 rounded" style="max-width: 100%; max-height: 400px; overflow: hidden;">
                                                <!-- The cropped image will be placed here -->
                                            </div>
                                            <div id="responseUploadPhoto" class="mt-3"></div>
                                        </div>
                                        <div class="modal-footer">
                                            <button id="cropImage" class="btn btn-success">Crop & Save</button>
                                            <button id="cancelCrop" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <script>
                                $(document).ready(function() {
                                    let cropper;
                                    const cropModal = $('#cropModal');
                                    const imageCropContainer = document.getElementById('imageCropContainer');
                                    const previewImage = $('#previewImage'); // This element might not be necessary in this context.

                                    // Handle file input change (when the user selects an image)
                                    $("#photo").on('change', function() {
                                        const file = this.files[0];
                                        if (file) {
                                            const reader = new FileReader();
                                            reader.onload = function(event) {
                                                // Destroy previous cropper instance if it exists
                                                if (cropper) cropper.destroy();

                                                // Create a new image element for cropping
                                                const img = new Image();
                                                img.src = event.target.result;
                                                img.className = "img-fluid"; // Make sure the image is responsive

                                                // Clear the crop container and append the new image
                                                imageCropContainer.innerHTML = '';
                                                imageCropContainer.appendChild(img);

                                                // Initialize Cropper.js for the new image
                                                cropper = new Cropper(img, {
                                                    aspectRatio: 1, // Make sure the image is cropped as a square
                                                    viewMode: 2, // Ensures the crop area is fully visible
                                                    responsive: true, // Make sure it adjusts on screen size changes
                                                });

                                                // Show the modal for cropping
                                                cropModal.modal('show');
                                            };
                                            reader.readAsDataURL(file);
                                        } else {
                                            alert("Please select a valid image file.");
                                        }
                                    });

                                    // Handle crop image confirmation (when the user clicks 'Crop & Save')
                                    $("#cropImage").click(function() {
                                        const btn = $(this);
                                        const originalText = btn.text();
                                        btn.text('Processing...').prop('disabled', true);

                                        const canvas = cropper.getCroppedCanvas({
                                            width: 200,
                                            height: 200,
                                        });

                                        const croppedImage = canvas.toDataURL(); // Get the cropped image as base64

                                        // Send the cropped image to the server via AJAX
                                        $.ajax({
                                            url: "<?= ROUTE('api/user-profile/update_photo.php'); ?>", // Ensure the correct path
                                            type: "POST",
                                            data: {
                                                image: croppedImage // Send the base64 image to the server
                                            },
                                            success: function(res) {
                                                previewImage.attr('src', croppedImage); // Update the profile image preview
                                                btn.text(originalText).prop('disabled', false); // Reset button text and disable state
                                                $('#responseUploadPhoto').html(res); // Show the response message
                                                cropModal.modal('hide'); // Hide the modal after successful upload
                                            },
                                            error: function() {
                                                alert("An error occurred while saving the image.");
                                                btn.text(originalText).prop('disabled', false); // Reset button text and state
                                            }
                                        });
                                    });

                                    // Cancel cropping
                                    $("#cancelCrop").click(function() {
                                        cropModal.modal('hide'); // Use Bootstrap's modal hide method
                                        if (cropper) cropper.destroy(); // Destroy the Cropper instance
                                    });
                                });
                            </script>

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
                            <?= Input("text", "lastname", AUTH_USER['lastname'], null, "bg-white", "disabled") ?>
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
                            $.post('<?= ROUTE('api/user-profile/update_personal.php') ?>', $('#formPersonal').serialize(), function(res) {
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