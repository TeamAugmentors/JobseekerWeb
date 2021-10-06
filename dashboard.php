<?php
session_start();
$active = "dashboard";
$isLoggedIn = 1;
$success = 0;
$orderCnt = 0;
if ($_SESSION["isLoggedIn"] != 1) {
    $isLoggedIn = 0;
    header("Location: http://localhost/JobseekerWeb/signin.php");
} else {
    $success = $_SESSION["doneLoggedIn"];
    $_SESSION["doneLoggedIn"] = 0;
}


include "dbconnection.php";

$user = null;
$name = null;
$email = null;
$phoneNo = null;
$billing = null;
$picture = null;

$user_earned = null;
$user_completed = null;
$user_rated = null;

$job = array();
$applied = array();

// query personal info
$sqlSelect = "SELECT * FROM users WHERE id = " . $_SESSION["userId"];
$result = $conn->query($sqlSelect);
if ($result->num_rows > 0) {
    $orderCnt = 1;
    while ($row = $result->fetch_assoc()) {
        $user = $row["user_name"];
        $name = $row["name"];
        $email = $row["mail"];
        $name = $row["name"];
        $phoneNo = $row["phone_no"];
        $billing = $row["billing_info"];
        $picture = $row['picture'];
    }
} else {
    echo "0 results from user";
}

// query 2 freelancing info
$sqlSelectUser = "SELECT * FROM freelancer WHERE id = " . $_SESSION["userId"];
$result = $conn->query($sqlSelectUser);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $user_earned = $row["earned"];
        $user_completed = $row["completed"];
        $user_rated = $row["rating"];
    }
} else {
    echo "0 results from freelancer";
}

//query 3 job details
$sqlUser = "SELECT b.name, b.details, a.serial FROM job b JOIN activeorder a ON b.id = a.job_id WHERE a.user_id =" . $_SESSION["userId"];
$result = $conn->query($sqlUser);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $temp = array("serial" => $row["serial"], "name" => $row["name"], "details" => $row["details"]);
        array_push($job, $temp);
    }
} else {
    $orderCnt = 0;
    // echo "0 results from active orders";
}

//query 4 applied jobs
$sqlUser = "SELECT b.name, b.details,a.serial FROM job b JOIN application a ON b.id = a.job_id WHERE a.applied_id =" . $_SESSION["userId"];
$result = $conn->query($sqlUser);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $temp = array("serial" => $row["serial"], "name" => $row["name"], "details" => $row["details"]);
        array_push($applied, $temp);
    }
} else {
    $orderCnt = 0;
    // echo "0 results from applied orders";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'headLinks.php' ?>
    <title>Dashboard</title>
</head>

<body>
    <header class="dashboard">
        <?php
        include "nav.php";
        ?>
    </header>
    <main>
        <div class="dashboard-main custom--container flex">

            <div class="dashboard__profile">
                <div class="profile__pic flex">
                    <?php
                    if (!empty($picture)) {
                        echo '<img src="data:image/jpeg;base64,' . base64_encode($picture) . '"alt="profile-picture"/>';
                    } else {
                        echo '<img src="./images/JS.png" alt="profile picture">';
                    }
                    ?>
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
                                                    <input type="checkbox" name="status-nested-accordion" id="order<?php echo $temp["serial"] ?>" class="accordion__input">
                                                    <div class="overview-label flex">
                                                        <label for="order<?php echo $temp["serial"] ?>" class="accordion__label flex"><?php echo $temp["name"] ?></label>
                                                        <i class='bx bxs-right-arrow'></i>
                                                    </div>
                                                    <div class="accordion-content">
                                                        <?php echo $temp["details"] ?>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="overview-content__bg">
                                    <input type="checkbox" name="status-accordion" id="current-skills" class="accordion__input">
                                    <div class="overview-label flex">
                                        <label for="current-skills" class="accordion__label flex">Applied Jobs</label>
                                        <i class='bx bxs-right-arrow'></i>
                                    </div>
                                    <div class="accordion-content">
                                        <!-- nested accordion -->
                                        <?php
                                        foreach ($applied as $temp) {
                                        ?>
                                            <div>
                                                <div class="overview-nested-content__bg">
                                                    <input type="checkbox" name="status-nested-accordion" id="applied<?php echo $temp["serial"] ?>" class="accordion__input">
                                                    <div class="overview-label flex">
                                                        <label for="applied<?php echo $temp["serial"] ?>" class="accordion__label flex"><?php echo $temp["name"] ?></label>
                                                        <i class='bx bxs-right-arrow'></i>
                                                    </div>
                                                    <div class="accordion-content">
                                                        <?php echo $temp["details"] ?>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php } ?>
                    
                                    </div>
                                </div>
                            </div>
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
                                                <input type="checkbox" name="status-nested-accordion" id="acc--details" class="accordion__input" checked>
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
    <!-- ---------------------------------Toast------------------------------- -->
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <h4 class="me-auto mb-0">Login successful</h4>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <h3>Successfully Logged In</h3>
            </div>
        </div>
    </div>

    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="liveToastNoOrder" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <h4 class="me-auto mb-0">You have no active orders</h4>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <h3>Please apply for suitable jobs<br>for start earning</h3>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <script src="js/script.js"></script>
    <script type="text/javascript">
        <?php
        if ($success === 1) {
            echo "var toastLiveExample = document.getElementById('liveToast');
            var toast = new bootstrap.Toast(toastLiveExample);
            toast.show();";
        }
        if ($orderCnt === 0) {
            echo "var toastLiveExample = document.getElementById('liveToastNoOrder');
            var toast = new bootstrap.Toast(toastLiveExample);
            toast.show();";
        }
        ?>
    </script>
</body>

</html>