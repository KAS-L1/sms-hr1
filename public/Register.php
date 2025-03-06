<?php include_once("public/_template/Header.php") ?>

<?php
// Check if 'type' is set in the URL, otherwise redirect
if (!isset($_GET['type']) || !in_array($_GET['type'], ['employee', 'admin'])) {
    Redirect(Route('home?action=invalid-type'));
}

// Sanitize the 'type' parameter
$type = htmlspecialchars($_GET['type']);
?>

<div class="row min-vh-100 flex items-center w-100">
    <div class="col-md-4 offset-md-4">
        <img src="<?= APP_LOGO ?>" alt="College Logo" class="mx-auto d-block mb-3" style="width: 80px;">
        <h3 class="text-center font-bold mb-4">Register your Account as <?= ucfirst($type) ?></h3>
        <form id="formRegister">

            <div id="responseRegister"></div>
            <?= CSRF() ?>
            <input type="hidden" name="type" value="<?= $type ?>">
            <div class="mb-3">
                <?php if ($type == "student") { ?>
                    <?= Input("text", "student_id", null, "Enter Student ID", "form-control-lg") ?>
                <?php } else if ($type == "teacher") { ?>
                    <?= Input("text", "teacher_id", null, "Enter Teacher ID", "form-control-lg") ?>
                <?php } else if ($type == "admin") { ?>
                    <?= Input("text", "username", null, "Enter Admin Username", "form-control-lg") ?>
                <?php } ?>
            </div>

            <div class="mb-3 position-relative">
                <?= Password("password", null, "Enter Password", "form-control-lg") ?>
            </div>

            <div class="mb-3 position-relative">
                <?= Password("confirm_password", null, "Confirm Password", "form-control-lg") ?>
            </div>

            <!-- reCAPTCHA widget -->
            <div class="g-recaptcha mb-3" data-sitekey="your-site-key"></div>

            <?= Button("submit", "btnRegister", "Register", "primary", null, true) ?>

            <div class="py-5">
                <a href="<?= Route('login') . '?type=' . htmlspecialchars($_GET['type']) ?>" class="d-block mt-2 text-muted text-center">Already have an account? Login here</a>
            </div>

        </form>
    </div>
</div>

<?php include_once("public/_template/Footer.php") ?>