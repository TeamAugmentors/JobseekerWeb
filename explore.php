<?php
session_start();
$isLoggedIn = 1;
$active = "explore";
$sApplied = 0;
if (array_key_exists("isApplied", $_SESSION)) {
    $isApplied = $_SESSION["isApplied"];
    $_SESSION["isApplied"] = 0;
}

if ($_SESSION["isLoggedIn"] != 1) {
    $isLoggedIn = 0;
    header("Location: http://localhost/JobseekerWeb/signin.php");
}

include "dbconnection.php";

$applied_jobs = array();
// query for applied jobs 
$sqlApplied = "SELECT job_id FROM application WHERE applied_id = " . $_SESSION["userId"];
$result = $conn->query($sqlApplied);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        array_push($applied_jobs, $row["job_id"]);
    }
}

//query for profile picture
$sqlPicture = "SELECT picture FROM users WHERE id = " . $_SESSION['userId'];
$result = $conn->query($sqlPicture);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $profile_image = $row["picture"];
    }
} else {
    echo "No image found";
}
// query 
$sqlCards = null;
$cardCnt = 0;
if (empty($_GET)) {
    $sqlCards = "SELECT id, category, name, salary, duration, details, negotiable FROM job";
    // echo 1;
} else if (array_key_exists("category", $_GET) && strcmp($_GET['category'], "None") === 0) {
    $sqlCards = "SELECT id, category, name, salary, duration, details, negotiable FROM job";
    // echo 2;
    goto HERE;
}
if (array_key_exists("category", $_GET)) {
    $sqlCards = "SELECT id, category, name, salary, duration, details, negotiable FROM job WHERE category ='" . $_GET['category'] . "'";
    // echo 3;
}
if (array_key_exists("tk_min", $_GET) && array_key_exists("tk_max", $_GET)) {
    $sqlCards = "SELECT id, category, name, salary, duration, details, negotiable FROM job WHERE salary >=" . $_GET['tk_min'] . " AND salary<=" . $_GET['tk_max'];
    // echo 4;
}
if (array_key_exists("tk_min", $_GET) && array_key_exists("tk_max", $_GET) && array_key_exists("category", $_GET)) {
    $sqlCards = "SELECT id, category, name, salary, duration, details, negotiable FROM job WHERE salary >=" . $_GET['tk_min'] . " AND salary<=" . $_GET['tk_max'] . " AND category ='" . $_GET['category'] . "'";
    // echo 5;
}
HERE:
unset($_GET);
// echo $sqlCards;
$result = $conn->query($sqlCards);
$allCards = array();
if ($result->num_rows > 0) {
    $cardCnt = 1;
    while ($row = $result->fetch_assoc()) {
        $rowItems = array();
        $rowItems['id'] = $row['id'];
        $rowItems['category'] = $row['category'];
        $rowItems['name'] = $row['name'];
        $rowItems['salary'] = $row['salary'];
        $rowItems['duration'] = $row['duration'];
        $rowItems['negotiable'] = $row['negotiable'];
        $rowItems['details'] = $row['details'];

        $datetime = new DateTime($rowItems['duration']);
        $rowItems['duration'] =  $datetime->format('Y-m-d');
        array_push($allCards, $rowItems);
    }
} else {
    $cardCnt = 0;
    // echo "0 results";
}
$conn->close();

// echo "<pre>";
// print_r($allCards);
// echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'headLinks.php' ?>
    <title>Explore</title>
</head>

<body>
    <?php
    include "nav.php";
    ?>
    <div class="explore-container">
        <div class="wrapper">
            <div class="left">
                <div class="freelancer-dashboard">
                    <div class="freelancer-info">
                        <div class="picture">
                            <?php
                            if (!empty($profile_image)) {
                                echo '<img src="data:image/jpeg;base64,' . base64_encode($profile_image) . '" alt="profile-pic"/>';
                            } else {
                                echo '<img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="profile-pic"/>';
                            }
                            ?>
                            <!-- <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="profile-pic"> -->
                        </div>
                        <div class="text-section">
                            <div class="name">
                                <h1><?php echo $_SESSION['name'] ?></h1>
                            </div>
                            <div class="acc-setting-text">
                                <a href="dashboard.php">Go to Account Settings</a>
                            </div>
                        </div>
                    </div>
                    <div class="horizontal-line"></div>
                    <!-- --------------budget------------- -->
                    <form action="" method="GET">
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
                                    <input type="number" min="0" max="50000" class="input-tk-min" name="tk_min">
                                    <span>to</span>
                                    <input type="number" min="0" max="50000" class="input-tk-max" name="tk_max">
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
                                <h1>Category</h1>
                                <div class="icon-triangle">
                                    <img src="images/filterDown.svg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="choose-catagory">
                            <div class="radio-item">
                                <input type="radio" id="gfxAndDesign" name="category" value="Graphics & Design">
                                <label for="gfxAndDesign">Graphics & Design</label>
                            </div>
                            <div class="radio-item">
                                <input type="radio" id="digitalMarketing" name="category" value="Digital Marketing">
                                <label for="digitalMarketing">Digital Marketing</label>
                            </div>
                            <div class="radio-item">
                                <input type="radio" id="writingAndTranslation" name="category" value="Writing & Translation">
                                <label for="writingAndTranslation">Writing & Translation</label>
                            </div>
                            <div class="radio-item">
                                <input type="radio" id="videoAndAnimation" name="category" value="Video & Animation">
                                <label for="videoAndAnimation">Video & Animation</label>
                            </div>
                            <div class="radio-item">
                                <input type="radio" id="musicAndAudio" name="category" value="Music & Audio">
                                <label for="musicAndAudio">Music & Audio</label>
                            </div>
                            <div class="radio-item">
                                <input type="radio" id="programmingAndTech" name="category" value="Programming & Tech">
                                <label for="programmingAndTech">Programming & Tech</label>
                            </div>
                            <div class="radio-item">
                                <input type="radio" id="business" name="category" value="Business">
                                <label for="business">Business</label>
                            </div>
                            <div class="radio-item">
                                <input type="radio" id="lifestyle" name="category" value="Lifestyle">
                                <label for="lifestyle">Lifestyle</label>
                            </div>
                            <div class="radio-item">
                                <input type="radio" id="none" name="category" value="None">
                                <label for="none">None</label>
                            </div>
                            <button type="submit" class="filter-btn">OK</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="right">
                <div class="custom-container">
                    <div class="header">
                        <h1>Explore</h1>
                        <div class="line"></div>
                    </div>
                    <div class="job-card-container">
                        <?php
                        foreach ($allCards as $card) {
                        ?>
                            <div class="job-card">
                                <div class="job-card-header">
                                    <h1 class="catagory"><?php echo $card['category'] ?></h1>
                                    <h1 class="job-name"><?php echo $card['name'] ?></h1>
                                    <div class="amount-div">
                                        <div class="tk-icon">
                                            <img src="images/taka3.svg" alt="">
                                        </div>
                                        <h1 class="amount"><?php echo $card['salary'] ?></h1>
                                    </div>
                                    <div class="line"></div>
                                    <div class="details">
                                        <div class="duration">
                                            <div class="details-left">Duration</div>
                                            <div class="details-right"><?php
                                                                        $interval = date_diff(date_create(date('Y-m-d')), date_create($card['duration']));
                                                                        echo $interval->format('%a Days');
                                                                        ?>
                                            </div>
                                        </div>
                                        <div class="revisions">
                                            <div class="details-left">revisions</div>
                                            <div class="details-right">4</div>
                                        </div>
                                        <div class="negotiable">
                                            <div class="details-left">Negotiable</div>
                                            <div class="details-right"><?php
                                                                        if ($card['negotiable'] === 1) {
                                                                            echo "Yes";
                                                                        } else {
                                                                            echo "No";
                                                                        }
                                                                        ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="description">
                                        <p><?php echo $card['details'] ?></p>
                                    </div>
                                    <?php
                                    if (!in_Array($card["id"], $applied_jobs)) {
                                    ?>
                                        <form action="productDetails.php" method="GET">
                                            <input type="hidden" class="card-button" value="<?php echo $card['id'] ?>" name="job_id" />
                                            <button class="card-button">See More</button>
                                        </form>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="card-button">Applied!</div>
                                    <?php
                                    } ?>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- -----------------------Toast------------------------- -->
    <!-- -----------------Toast------------------------- -->
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="liveToastApplied" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <h4 class="me-auto mb-0">Job Application Successful</h4>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <h3>You will be notified when you<br> get accepted by the hirer</h3>
            </div>
        </div>
    </div>

    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="liveToastNoCard" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <!-- <img src="..." class="rounded me-2" alt="..."> -->
                <h4 class="me-auto mb-0">Messege</h4>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <h3>No job card found</h3>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript">
        <?php
        if ($cardCnt === 0) {
            echo "var toastLiveExample = document.getElementById('liveToastNoCard');
                    var toast = new bootstrap.Toast(toastLiveExample);
                    toast.show();";
        }
        if ($isApplied === 1) {
            echo "var toastLiveExample = document.getElementById('liveToastApplied');
                    var toast = new bootstrap.Toast(toastLiveExample);
                    toast.show();";
        }
        ?>
    </script>

</body>

</html>