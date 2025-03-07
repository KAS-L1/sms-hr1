<?php include_once("public/_template/Header.php") ?>

<div class="container">

    <div class="row min-vh-100 flex items-center">
        <div class="col-md-6 offset-md-3">
            <div class="card__wrapper">
                <img src="<?= APP_LOGO ?>" alt="College Logo" class="mx-auto d-block mb-3" width="80">
                <h3 class="text-center font-bold text-lg mb-5 text-white text__shadow">Login Portal Access</h3>
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <a href="<?= ROUTE('login?type=employee') ?>" class="card card-body text-center box__shadow--white card__border--hover">
                            <div class="flex justify-center">
                                <img src="https://img.icons8.com/?size=96&id=13042&format=png" class="" width="50">
                            </div>
                            <h5 class="font-bold">Employee Portal</h5>
                            <p class="small">Access to employee-specific information.</p>
                        </a>
                    </div>
                    <div class="col-md-6 mb-4">
                        <a href="<?= ROUTE('login?type=admin') ?>" class="card card-body text-center box__shadow--white card__border--hover">
                            <div class="flex justify-center">
                                <img src="https://img.icons8.com/?size=96&id=13042&format=png" class="" width="50">
                            </div>
                            <h5 class="font-bold">Admin Portal</h5>
                            <p class="small">Access to system-wide information.</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<?php include_once("public/_template/Footer.php") ?>