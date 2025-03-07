<!doctype html>
<html lang="en">

<head>
    <title><?= APP_TITLE ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <link rel="shortcut icon" href="<?= APP_ICON ?>" />

    <!-- Styles -->
    <link rel="stylesheet" href="<?= DOMAIN ?>/assets/css/tailwind.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="<?= DOMAIN ?>/assets/css/app.css" />
    <link rel="stylesheet" href="<?= DOMAIN ?>/assets/css/sweetalert2.min.css" />
    
    <!-- Scripts -->
    <script src="<?= DOMAIN ?>/assets/js/jquery.min.js"></script>
    <script src="<?= DOMAIN ?>/assets/js/sweetalert2.min.js"></script>

    <style>
        .text__shadow{
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        .btn__round{
            border-radius: 50px !important;
        }
        .card__round{
            border-radius: 1rem !important;
            overflow: hidden;
        }
        .box__shadow--white {
            box-shadow: 0 15px 25px rgba(255, 255, 255, 0.5);
        }
        .card__border--hover:hover {
            outline:6px solid  #007bff;
        }
    </style>

<body class="bg-light" style="background: url('../assets/img/landing.jpg') no-repeat center center fixed; position: relative;">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top shadow">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center gap-2" href="#">
                <img src="<?=APP_LOGO_NAV?>" width="50" class="me-2">
                <div style="line-height: 1;">
                    <div class="fs-4 fw-bold">Bestlink College</div>
                    <div class="small" style="letter-spacing: 0.5rem;">Philippines</div>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
                <div class="d-flex">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-white" aria-current="page" href="<?=ROUTE('home')?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?=ROUTE('about')?>">ABOUT BCP</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?=ROUTE('jobs')?>">JOB HIRING</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-white" href="<?=ROUTE('portal')?>"><i class="bi bi-person me-2"></i>LOGIN</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <main class="pt-5">
        