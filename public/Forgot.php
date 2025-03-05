<?php include_once("public/_template/Header.php") ?>

<div class="bg-white p-4 rounded shadow-sm" style="max-width: 400px; width: 100%;">
    <img src="<?= APP_LOGO ?>" alt="College Logo" class="mx-auto d-block mb-3" style="width: 80px;">
    <h2 class="text-center mb-4">Forgot Password</h2>
    <form action="forgot-password.php" method="POST">
        <div class="mb-3">
            <label for="email" class="form-label">Enter Your Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your registered email" required>
        </div>

        <!-- reCAPTCHA widget -->
        <div class="g-recaptcha mb-3" data-sitekey="your-site-key"></div>

        <button type="submit" class="btn btn-primary w-100">Send Reset Link</button>

        <a href="/login" class="d-block mt-2 text-muted text-center">Back to Login</a>
    </form>
</div>

<?php include_once("public/_template/Footer.php") ?>