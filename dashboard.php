<?php
session_start();

if ($_SESSION["isLoggedIn"] != 1) {
    header("Location: http://localhost/JobseekerWeb/signin.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <!-- Boxicon CSS  -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>


    <link rel="stylesheet" href="css/styles.css">
    <title>Dashboard</title>
</head>

<body>
    <header class="dashboard">
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

                        <form class="flex align-items-center custom-search">
                            <i class='bx bx-search custom-search-icon'></i>
                            <input class="form-control custom-search-field shadow-none" type="search" placeholder="Search for work..." aria-label="Search">
                            <button class="btn custom-search-btn shadow-none" type="submit">Search</button>
                        </form>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Explore</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Inbox</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link switch-to-hirer" href="#">Switch to hirer</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="dashboard-main custom--container flex">

            <div class="dashboard__profile">
                <div class="profile__pic flex">
                    <img src="./images/JS.png" alt="profile picture">
                </div>
                <div class="profile__name">
                    <h1>Lorem, ipsum dolor.</h1>
                </div>
                <div class="profile__mail">
                    <h2>Lorem, ipsum.</h2>
                </div>
                <div class="profile__job-info flex">
                    <div class="job-info earned">
                        <h2>Earned</h2>
                        <h3>lorem</h3>
                        <h4>TAKA</h4>
                    </div>
                    <div class="info-divider"></div>
                    <div class="job-info completed">
                        <h2>Completed</h2>
                        <h3>lorem</h3>
                        <h4>JOBS</h4>
                    </div>
                    <div class="info-divider"></div>
                    <div class="job-info rated">
                        <h2>Rated</h2>
                        <h3>lorem</h3>
                        <h4>STARS</h4>
                    </div>
                </div>

                <div class="profile__details">
                    <div>
                        <input type="checkbox" name="details-accordion" id="acc-details" class="accordion__input" checked>

                        <div class="details flex">
                            <i class='bx bxs-right-arrow'></i>
                            <label for="acc-details" class="accordion__label">Details</label>
                        </div>

                        <div class="accordion-content">
                            <div class="profile__details-item profile__account-details">
                                <h3>Account Details</h3>
                                <h4>name</h4>
                                <h4>mail</h4>
                                <h4>phone</h4>
                            </div>
                            <div class="profile__details-item profile__billing">
                                <h3>Billing Information</h3>
                                <h4>bkash no</h4>
                            </div>
                        </div>
                    </div>

                    <div>
                        <input type="checkbox" name="details-accordion" id="acc-statistics" class="accordion__input">

                        <div class="details flex">
                            <i class='bx bxs-right-arrow'></i>
                            <label for="acc-statistics" class="accordion__label">Statistics</label>
                        </div>

                        <div class="accordion-content">
                            <div class="profile__details-item profile__account-details">
                                <h4>Inbox response rate</h4>
                                <h4>Inbox response time</h4>
                                <h4>Order completion rate</h4>
                                <h4>Timely Delivery</h4>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="profile-divider"></div>

            <div class="dashboard__status">
                <ul class="status-bar flex">
                    <li id="dashboard__overview">
                        <a href="#dashboard__overview" id="user-overview" class="status-bar__items">Overview</a>
                        <div class="overview-content">
                            <div>
                                <div class="overview-content__bg">
                                    <input type="checkbox" name="status-accordion" id="active-orders" class="accordion__input" checked>
                                    <div class="overview-label flex">
                                        <label for="active-orders" class="accordion__label flex">Active Orders</label>
                                        <i class='bx bxs-right-arrow'></i>
                                    </div>
                                    <div class="accordion-content">
                                        <!-- nested accordion -->
                                        <div>
                                            <div class="overview-nested-content__bg">
                                                <input type="checkbox" name="status-nested-accordion" id="order1" class="accordion__input">
                                                <div class="overview-label flex">
                                                    <label for="order1" class="accordion__label flex">Logo
                                                        Design</label>
                                                    <i class='bx bxs-right-arrow'></i>
                                                </div>
                                                <div class="accordion-content">
                                                    wat an egg!
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="overview-nested-content__bg">
                                                <input type="checkbox" name="status-nested-accordion" id="order2" class="accordion__input">
                                                <div class="overview-label flex">
                                                    <label for="order2" class="accordion__label flex">Banner
                                                        Design</label>
                                                    <i class='bx bxs-right-arrow'></i>
                                                </div>
                                                <div class="accordion-content">
                                                    wat an egg!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="overview-content__bg">
                                    <input type="checkbox" name="status-accordion" id="current-skills" class="accordion__input">
                                    <div class="overview-label flex">
                                        <label for="current-skills" class="accordion__label flex">Current Skills</label>
                                        <i class='bx bxs-right-arrow'></i>
                                    </div>
                                    <div class="accordion-content">
                                        <!-- nested accordion -->
                                        <div>
                                            <div class="overview-nested-content__bg">
                                                <input type="checkbox" name="status-nested-accordion" id="skill1" class="accordion__input">
                                                <div class="overview-label flex">
                                                    <label for="skill1" class="accordion__label flex">E.</label>
                                                    <i class='bx bxs-right-arrow'></i>
                                                </div>
                                                <div class="accordion-content">
                                                    E.
                                                </div>
                                            </div>
                                        </div>
                                        <div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li id="dashboard__history">
                        <a href="#dashboard__history" id="transaction-history" class="status-bar__items">History</a>
                        <div class="history-content">
                            hello
                        </div>
                    </li>

                    <li id="dashboard__acc-details">
                        <a href="#dashboard__acc-details" id="user__acc-details" class="status-bar__items">Personal
                            Information</a>
                        <div class="user__info-content">
                            <div>
                                <div class="overview-content__bg">
                                    <input type="checkbox" name="status-accordion" id="user__info-details" class="accordion__input" checked>
                                    <div class="overview-label flex">
                                        <label for="user__info-details" class="accordion__label flex">Details</label>
                                        <i class='bx bxs-right-arrow'></i>
                                    </div>
                                    <div class="accordion-content">
                                        <!-- nested accordion -->
                                        <div>
                                            <div class="overview-nested-content__bg">
                                                <input type="checkbox" name="status-nested-accordion" id="acc--details" class="accordion__input">
                                                <div class="overview-label flex">
                                                    <label for="acc--details" class="accordion__label flex">Account
                                                        Details</label>
                                                    <i class='bx bxs-right-arrow'></i>
                                                </div>
                                                <div class="accordion-content">
                                                    <h4>name</h4>
                                                    <h4>mail</h4>
                                                    <h4>phone</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="overview-nested-content__bg">
                                                <input type="checkbox" name="status-nested-accordion" id="bill--info" class="accordion__input">
                                                <div class="overview-label flex">
                                                    <label for="bill--info" class="accordion__label flex">Billing
                                                        Information</label>
                                                    <i class='bx bxs-right-arrow'></i>
                                                </div>
                                                <div class="accordion-content">
                                                    <h4>bkash no</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="overview-content__bg">
                                    <input type="checkbox" name="status-accordion" id="user__info-statistics" class="accordion__input">
                                    <div class="overview-label flex">
                                        <label for="user__info-statistics" class="accordion__label flex">Statistics</label>
                                        <i class='bx bxs-right-arrow'></i>
                                    </div>
                                    <div class="accordion-content stats">
                                        <h4>Inbox response rate</h4>
                                        <h4>Inbox response time</h4>
                                        <h4>Order completion rate</h4>
                                        <h4>Timely Delivery</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <script src="js/script.js"></script>
</body>

</html>