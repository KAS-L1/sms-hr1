<?php include_once("public/_template/Header.php") ?>

<div class="container">

    <div class="row min-vh-100 flex items-center">
        <div class="col-md-6 offset-md-3">
            <div class="card__wrapper">
                <img src="<?= APP_LOGO ?>" alt="College Logo" class="mx-auto d-block mb-3" width="80">
                <h3 class="text-center font-bold mb-5">Login Portal Access</h3>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <a href="<?= Route('login?type=student') ?>" class="card card-body text-center shadow">
                            <div class="flex justify-center">
                                <img src="https://img.icons8.com/?size=96&id=13042&format=png" class="" width="50">
                            </div>
                            <h5 class="font-bold">Student Portal</h5>
                            <p class="small">Access to student-specific information.</p>
                        </a>
                    </div>
                    <div class="col-md-4 mb-3">
                        <a href="<?= Route('login?type=teacher') ?>" class="card card-body text-center shadow">
                            <div class="flex justify-center">
                                <img src="https://img.icons8.com/?size=96&id=13042&format=png" class="" width="50">
                            </div>
                            <h5 class="font-bold">Teacher Portal</h5>
                            <p class="small">Access to teacher-specific information.</p>
                        </a>
                    </div>
                    <div class="col-md-4 mb-3">
                        <a href="<?= Route('login?type=admin') ?>" class="card card-body text-center shadow">
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