<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bestlink College - Landing Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .landing-page {
            background: url('../assets/img/landing.jpg') no-repeat center center fixed;
            background-size: cover;
            color: white;
            text-align: center;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
        }

        /* Semi-transparent overlay for better text visibility */
        .landing-page::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: -1;
            /* Ensures the overlay is behind the text */
        }

        .landing-page h1,
        .landing-page p {
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
        }

        .apply-btn {
            font-size: 18px;
            padding: 15px 30px;
            border-radius: 50px;
            margin-top: 20px;
        }

        .nav-link {
            color: white !important;
        }

        .nav-link:hover {
            text-decoration: none;
            color: #f8f9fa !important;
        }

        .navbar-brand img {
            width: 50px;
            height: 50px;
        }

        /* Responsive adjustments for the container */
        @media (max-width: 768px) {
            .landing-page h1 {
                font-size: 2rem;
            }

            .landing-page p {
                font-size: 1rem;
            }
        }
    </style>
</head>

<body>

    <header class="landing-page">
        <nav class="navbar navbar-expand-lg navbar-primary bg-primary fixed-top">
            <div class="container-fluid mx-5">
                <a class="navbar-brand" href="#">
                    <img src="../assets/logo/logo.png" alt="Bestlink College Logo"> <!-- Use the uploaded logo -->
                    Bestlink College of the Philippines
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">About BCP</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">BCP News</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=ROUTE('portal')?>">Log In</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <h1>Welcome to Bestlink College of the Philippines</h1>
            <p>At Bestlink College of the Philippines, we provide and promote quality education with modern and unique techniques to enhance the skills and knowledge of our dear students to make them globally competitive and productive citizens.</p>
            <a href="<?= ROUTE('portal') ?>" class="btn btn-danger apply-btn">Apply Now</a>
        </div>
    </header>

    <!-- Bootstrap JS & Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>