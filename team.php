<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Team Page</title>
    <link rel="stylesheet" href="css/styles.css">

    <!-- fullpage CSS -->
    <link rel="stylesheet" href="css/fullpage.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <!-- Font -->
    <link href='https://bigfontsite.com/fonts/fresh-eaters.html' rel="stylesheet">

</head>

<body>
    <div class="team">
        <div id="team-fullpage">
            <section class="section active" id="team-section-0">
                <div class="team-intro">
                    <nav class="navbar navbar-expand-lg navbar-dark common-nav__bg">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="index.html">
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

                            <div class="collapse navbar-collapse navbar-margin-top" id="navbarNav">
                                <ul class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="about.php">About Us</a>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-link" href="team.php">Meet the Team</a>
                                    </li>
                                    <div class="horizontal-border nav-item"></div>
                                    <li class="nav-item sign-in">
                                        <a class="nav-link custom-link" href="signin.php"><i class="fas fa-lock"></i>Sign in</a>
                                    </li>
                                    <li class="nav-item sign-up">
                                        <a class="nav-link custom-link sign-up" href="signup.php">Sign up<i class="fas fa-user"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <div class="team--hero-text custom--container">
                        <h1 id="team--hero-header"></h1>
                        <div class="team--hero-text">
                            <span>Scroll down to find out</span>
                        </div>
                    </div>
                    <div class="team-arrow">
                        <a href="#sanjid">
                            <div class="team--arrow-down">
                                <div class="shape-1 m-center">
                                    <div class="shape-2 m-center"></div>
                                </div>
                                <div class="shape-3 m-center">
                                    <div class="shape-4 m-center"></div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </section>

            <section class="section" id="team-section-1">
                <div class="sanjid">
                    Hello
                </div>
            </section>

            <section class="section" id="team-section-2">
                <div class="atikur">
                    Hi
                </div>
            </section>

            <section class="section" id="team-section-3">
                <div class="tanim">
                    Bye
                </div>
            </section>
        </div>
    </div>
    <!-- This is a comment -->
    <script src="js/fullpage.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <script src="js/script.js"></script>
</body>

</html>