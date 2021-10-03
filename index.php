<?php
session_start();

$isLoggedIn = 0;
if (!empty($_SESSION)) {
    $isLoggedIn = $_SESSION["isLoggedIn"];
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <!-- Boxicon CSS  -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="css/styles.css">
    <title>Hello, world!</title>
</head>

<body>
    <div class="bg">
        <img src="images/header-bg.png" alt="header-bg">
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent common-nav__bg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <div class="d-flex">
                    <img src="images/tie2.png" height="auto" width="auto">
                    <div class=" d-flex flex-column justify-content-center">
                        <h1 class="header-logo job">
                            JOB
                        </h1>
                        <h1 class="header-logo seeker">
                            seeker
                        </h1>
                    </div>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item  active">
                        <a class="nav-link" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="team.php">Meet the Team</a>
                    </li>
                    <div class="horizontal-border nav-item"></div>
                    <?php
                    if ($isLoggedIn === 1) {
                        echo '<li class="nav-item">
                        <a class="nav-link" href="explore.php">Explore</a>
                        </li>';
                        echo '<li class="nav-item">
                            <a class="nav-link" href="dashboard.php#dashboard__overview">Dashboard</a>
                            </li>';
                        echo '<li class="nav-item sign-up">
                        <a class="nav-link custom-link sign-up" href="logout.php"><i class="bx bx-log-out"></i> Log out</a>
                        </li>';
                    } else {
                        echo '<li class="nav-item sign-in">
                        <a class="nav-link custom-link" href="signin.php"><i class="fas fa-lock"></i>Sign in</a>
                        </li>
                        <li class="nav-item sign-up">
                            <a class="nav-link custom-link sign-up" href="signup.php">Sign up<i class="fas fa-user"></i></a>
                        </li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-md-6 col-sm-12 hero-text-col">
                <div class="spacer-130"></div>
                <div class="hero-text-div">
                    <h1 class="hero-title">
                        Better teamwork and more sales,
                        start with a napoli system
                    </h1>

                    <h2 class="hero-subtext">
                        Business card management for your company
                    </h2>
                </div>

                <div class="hero-buttons">
                    <a class="btn shadow-none btn-primary-custom rounded-btn" href="https://drive.google.com/u/0/uc?id=1eegNBg5l8NAVdHD5DzRxe_HYoSNoReoy&export=download" target="_blank">Get
                        the app<i class="fas fa-arrow-down"></i></a>
                    <a class="btn shadow-none btn-secondary rounded-btn" href="https://www.youtube.com/watch?v=YYKiquIiLZ4&t=193s" target="_blank">Watch
                        Video<i class="fas fa-play fa-xs"></i></a>
                </div>
            </div>
            <div class="col-lg-6  col-md-6 col-sm-12 hero-image-col">
                <div class="hero-image">
                    <img src="images/img-1.png" alt="money-phone" />
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row d-flex justify-content-around">
                    <div class="custom-col card">
                        <div class="spacer-10"></div>
                        <h1 class="card-heading">Logo Design</h1>

                        <h2 class="card-money">3,500 ৳</h2>

                        <h3 class="card-details">Need a logo for our startup. Must be minimal and modern</h3>

                        <div class="hidden-button align-self-center">Apply Now!</div>

                        <h4 class="card-requirements">Illustrator, Photoshop</h4>
                    </div>
                    <div class="custom-col card">
                        <div class="spacer-10"></div>
                        <h1 class="card-heading">Poster Design
                        </h1>

                        <h2 class="card-money">2,500 ৳
                        </h2>

                        <h3 class="card-details">
                            Need a logo for our startup. Must be minimal and modern
                        </h3>

                        <div class="hidden-button align-self-center">
                            Apply Now!
                        </div>

                        <h4 class="card-requirements">
                            Illustrator, Photoshop
                        </h4>
                    </div>
                    <div class="custom-col card">
                        <div class="spacer-10"></div>
                        <h1 class="card-heading">Banner Design
                        </h1>

                        <h2 class="card-money">3,000 ৳
                        </h2>

                        <h3 class="card-details">
                            Need a logo for our startup. Must be minimal and modern
                        </h3>

                        <div class="hidden-button align-self-center">
                            Apply Now!
                        </div>

                        <h4 class="card-requirements">
                            Illustrator, Photoshop
                        </h4>
                    </div>
                    <div class="custom-col card">
                        <div class="spacer-10"></div>
                        <h1 class="card-heading">Music Teacher
                        </h1>

                        <h2 class="card-money">7,500 ৳
                        </h2>

                        <h3 class="card-details">
                            Need a logo for our startup. Must be minimal and modern
                        </h3>

                        <div class="hidden-button align-self-center">
                            Apply Now!
                        </div>

                        <h4 class="card-requirements">
                            Illustrator, Photoshop
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <script type="text/javascript" src="script.js"></script>
</body>

</html>