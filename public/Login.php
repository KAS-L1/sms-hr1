<?php include_once("public/_template/Header.php") ?>

<?php 
    if (!isset($_GET['type']) || !in_array($_GET['type'], ['student', 'teacher', 'admin'])) {
        Redirect(Route('home?action=invalid-type'));
    } 
?>

<div class="container">
    
    <div class="row min-vh-100 flex items-center w-100">
        <div class="col-md-4 offset-md-4">
            <img src="<?= APP_LOGO ?>" alt="College Logo" class="mx-auto d-block mb-3" style="width: 80px;">
            <h3 class="text-center font-bold mb-4">Login your Account as <?= CAMEL(CHAR($_GET['type'])) ?></h3>
            <form id="formLogin">

                <div id="responseLogin"></div>
                <?= CSRF() ?>
                <input type="hidden" name="type" value="<?= CHAR($_GET['type']) ?>">
                <div class="mb-3">
                    <?php if ($_GET['type'] == "student") { ?>
                        <?= Input("text", "student_id",  "STD-", "Enter Student ID", "form-control-lg") ?>
                    <?php } else if ($_GET['type'] == "teacher") { ?>
                        <?= Input("text", "teacher_id", "TCH-", "Enter Teacher ID", "form-control-lg") ?>
                    <?php } else if ($_GET['type'] == "admin") { ?>
                        <?= Input("text", "username", null, "Enter Admin Username", "form-control-lg") ?>
                    <?php } ?>
                </div>

                <div class="mb-3 position-relative">
                    <?= Password("password", null, "Enter Password", "form-control-lg") ?>
                </div>

                <!-- reCAPTCHA widget -->
                <div class="g-recaptcha mb-3" data-sitekey="your-site-key"></div>

                <?= Button("submit", "btnLogin", "Login", "primary", null, true) ?>

            </form>
        </div>
    </div>

</div>

    <?php include_once("public/_template/Footer.php") ?>