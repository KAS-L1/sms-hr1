$("#formLogin").submit(function (e) {
    e.preventDefault();
    btnLoading("#btnLogin");
    $.post("api/auth/login.php", $("#formLogin").serialize(), function (res) {
        $("#responseLogin").html(res);
        btnLoadingReset("#btnLogin");
    }).fail(function () {
        console.log("An error occurred! Please try again.");
    });
});

$("#formRegister").submit(function (e) {
    e.preventDefault();
    btnLoading("#btnRegister");
    $.post(
        "api/auth/register.php",
        $("#formRegister").serialize(),
        function (res) {
            $("#responseRegister").html(res);
            btnLoadingReset("#btnRegister");
        }
    ).fail(function () {
        console.log("An error occurred! Please try again.");
    });
});

$("#formForgot").submit(function (e) {
    e.preventDefault();
    btnLoading("#btnForgot");
    $.post("api/auth/forgot.php", $("#formForgot").serialize(), function (res) {
        $("#responseForgot").html(res);
        btnLoadingReset("#btnForgot");
    }).fail(function () {
        console.log("An error occurred! Please try again.");
    });
});

$("#formResetPassword").submit(function (e) {
    e.preventDefault();
    btnLoading("#btnRecover");
    $.post(
        "api/auth/recover.php",
        $("#formResetPassword").serialize(),
        function (res) {
            $("#responseNewPassword").html(res);
            btnLoadingReset("#btnRecover");
        }
    ).fail(function () {
        console.log("An error occurred! Please try again.");
    });
});
