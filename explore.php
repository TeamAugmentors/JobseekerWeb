<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <title>Explore</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark common-nav__bg">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
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
                    <li class="nav-item active">
                        <a class="nav-link" href="about.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="team.php">Meet the Team</a>
                    </li>
                    <div class="horizontal-border nav-item"></div>
                    <li class="nav-item sign-in">
                        <a class="nav-link custom-link" href="signin.html"><i class="fas fa-lock"></i>Sign in</a>
                    </li>
                    <li class="nav-item sign-up">
                        <a class="nav-link custom-link sign-up" href="signup.php">Sign up<i class="fas fa-user"></i></a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="explore-container">
        <div class="wrapper">
            <div class="left">
                <div class="freelancer-dashboard">
                    <div class="freelancer-info">
                        <div class="picture">
                            <img src="//unsplash.it/500/500" alt="profile-pic">
                        </div>
                        <div class="text-section">
                            <div class="name">
                                <h1>Atiqur</h1>
                                <div class="collapse-button">
                                    <img src="images/arrow.svg" alt="">
                                </div>
                            </div>
                            <div class="acc-setting-text">
                                <span>Go to Account Settings</span>
                            </div>
                        </div>
                    </div>
                    <div class="horizontal-line"></div>
                    <!-- --------------budget------------- -->
                    <div class="budget-div">
                        <div class="heading">
                            <div class="icon-tk">
                                <img src="images/taka2.svg" alt="">
                            </div>
                            <h1>Budget</h1>
                            <div class="icon-triangle">
                                <img src="images/filterDown.svg" alt="">
                            </div>
                        </div>
                        <div class="content">
                            <div class="input-amount">
                                <input type="number" min="0" max="50000" value="1" class="input-tk-min">
                                <span>to</span>
                                <input type="number" min="0" max="50000" value="100" class="input-tk-max">
                            </div>
                            <div class="slider-container">
                                <div class="tk-min">500</div>
                                <div class="amount-slider">
                                    <div class="range-slider">
                                        <div class="track">
                                            <div class="track-bg"></div>
                                            <div class="track-selected"></div>
                                        </div>
                                        <div class="thumbs">
                                            <div class="left-thumb"></div>
                                            <div class="right-thumb"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tk-max">1000</div>
                            </div>
                        </div>
                    </div>
                    <div class="catagory-div">
                        <div class="heading">
                            <div class="icon-catagory">
                                <img src="images/category.svg" alt="catagory">
                            </div>
                            <h1>Catagory</h1>
                            <div class="icon-triangle">
                                <img src="images/filterDown.svg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="choose-catagory">
                        <div class="radio-item">
                            <input type="radio" id="gfxAndDesign" name="catagory">
                            <label for="gfxAndDesign">Graphics & Design</label>
                        </div>
                        <div class="radio-item">
                            <input type="radio" id="digitalMarketing" name="catagory">
                            <label for="digitalMarketing">Digital Marketing</label>
                        </div>
                        <div class="radio-item">
                            <input type="radio" id="writingAndTranslation" name="catagory">
                            <label for="writingAndTranslation">Writing & Translation</label>
                        </div>
                        <div class="radio-item">
                            <input type="radio" id="videoAndAnimation" name="catagory">
                            <label for="videoAndAnimation">Video & Animation</label>
                        </div>
                        <div class="radio-item">
                            <input type="radio" id="musicAndAudio" name="catagory">
                            <label for="musicAndAudio">Music & Audio</label>
                        </div>
                        <div class="radio-item">
                            <input type="radio" id="programmingAndTech" name="catagory">
                            <label for="programmingAndTech">Programming & Tech</label>
                        </div>
                        <div class="radio-item">
                            <input type="radio" id="business" name="catagory">
                            <label for="business">Business</label>
                        </div>
                        <div class="radio-item">
                            <input type="radio" id="lifestyle" name="catagory">
                            <label for="lifestyle">Lifestyle</label>
                        </div>

                    </div>
                </div>
            </div>
            <div class="right">
                <div class="custom-container">
                    <div class="header">
                        <h1>Explore</h1>
                        <div class="line"></div>
                    </div>
                    <div class="job-card-container">

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/script.js"></script>

</body>

</html>