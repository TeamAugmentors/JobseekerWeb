<?php
session_start();
$success = 0;
if ($_SESSION["isLoggedIn"] != 1) {
    header("Location: http://localhost/JobseekerWeb/signin.php");
} else {
    $success = $_SESSION["doneLoggedIn"];
    $_SESSION["doneLoggedIn"] = 0;
}

// database stuffs
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jobseekerweb";

$user = null;
$name = null;
$email = null;
$phoneNo = null;
$billing = null;

$user_earned = null;
$user_completed = null;
$user_rated = null;

$job = array();

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// query 
$sqlSelect = "SELECT * FROM users WHERE id = " . $_SESSION["userId"];
$result = $conn->query($sqlSelect);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $user = $row["user_name"];
        $name = $row["name"];
        $email = $row["mail"];
        $name = $row["name"];
        $phoneNo = $row["phone_no"];
        $billing = $row["billing_info"];
    }
} else {
    echo "0 results from user";
}

// query 2
$sqlSelectUser = "SELECT * FROM freelancer WHERE id = " . $_SESSION["userId"];
$result = $conn->query($sqlSelectUser);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $user_earned = $row["earned"];
        $user_completed = $row["completed"];
        $user_rated = $row["rating"];
    }
} else {
    echo "0 results from user";
}

//query 3
$sqlUser = "SELECT b.name, b.details, a.serial FROM job b JOIN activeorder a ON b.id = a.job_id WHERE a.user_id =" . $_SESSION["userId"];
$result = $conn->query($sqlUser);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $temp = array("serial" => $row["serial"], "name" => $row["name"], "details" => $row["details"]);
        array_push($job, $temp);
    }
} else {
    echo "0 results from active orders";
}

$conn->close();
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
                            <a class="nav-link" href="explore.php">Explore</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">Edit Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link switch-to-hirer" href="logout.php"><i class='bx bx-log-out'></i> Logout </a>
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
                    <h1><?php echo $user ?></h1>
                </div>
                <div class="profile__mail">
                    <h2><?php echo $email ?></h2>
                </div>
                <div class="profile__job-info flex">
                    <div class="job-info earned">
                        <h2>Earned</h2>
                        <h3><?php echo $user_earned ?></h3>
                        <h4>TAKA</h4>
                    </div>
                    <div class="info-divider"></div>
                    <div class="job-info completed">
                        <h2>Completed</h2>
                        <h3><?php echo $user_completed ?></h3>
                        <h4>JOBS</h4>
                    </div>
                    <div class="info-divider"></div>
                    <div class="job-info rated">
                        <h2>Rated</h2>
                        <h3><?php echo $user_rated ?></h3>
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
                                <h4><?php echo $name ?></h4>
                                <h4><?php echo $email ?></h4>
                                <h4><?php echo $phoneNo ?></h4>
                            </div>
                            <div class="profile__details-item profile__billing">
                                <h3>Billing Information</h3>
                                <h4><?php echo $billing ?></h4>
                            </div>
                        </div>
                    </div>

                    <!-- <div>
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
                    </div> -->

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
                                        <?php
                                        foreach ($job as $temp) {
                                        ?>
                                            <div>
                                                <div class="overview-nested-content__bg">
                                                    <input type="checkbox" name="status-nested-accordion" id="order<?php echo $temp["serial"]?>" class="accordion__input">
                                                    <div class="overview-label flex">
                                                        <label for="order<?php echo $temp["serial"]?>" class="accordion__label flex"><?php echo $temp["name"] ?></label>
                                                        <i class='bx bxs-right-arrow'></i>
                                                    </div>
                                                    <div class="accordion-content">
                                                        <?php echo $temp["details"]?>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                            <!-- <div>
                                <div class="overview-content__bg">
                                    <input type="checkbox" name="status-accordion" id="current-skills" class="accordion__input">
                                    <div class="overview-label flex">
                                        <label for="current-skills" class="accordion__label flex">Current Skills</label>
                                        <i class='bx bxs-right-arrow'></i>
                                    </div>
                                    <div class="accordion-content">
                                        nested accordion
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
                            </div> -->
                        </div>
                    </li>

                    <!-- <li id="dashboard__history">
                        <a href="#dashboard__history" id="transaction-history" class="status-bar__items">History</a>
                        <div class="history-content">
                            hello
                        </div>
                    </li> -->

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
                                                    <h4><?php echo $name ?></h4>
                                                    <h4><?php echo $email ?></h4>
                                                    <h4><?php echo $phoneNo ?></h4>
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
                                                    <h4><?php echo $billing ?></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div>
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
                            </div> -->
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </main>
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <!-- <img src="..." class="rounded me-2" alt="..."> -->
                <strong class="me-auto">Login successful</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <h3>Successfully Logged In</h3>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <script src="js/script.js"></script>
    <script type="text/javascript">
        <?php
        if ($success == 1) {
            echo " var toastTrigger = document.getElementById('liveToastBtn');
            var toastLiveExample = document.getElementById('liveToast');
            var toast = new bootstrap.Toast(toastLiveExample);
            toast.show();";
        }
        ?>
    </script>
</body>

</html>