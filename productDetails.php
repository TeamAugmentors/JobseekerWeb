<?php
session_start();
$isLoggedIn = 1;
$active = "productDetails";
if ($_SESSION["isLoggedIn"] != 1) {
    header("Location: http://localhost/JobseekerWeb/signin.php");
}


include "dbconnection.php";

$posted_by = null;
$category = null;
$name = null;
$salary = null;
$duration = null;
$details = null;
$negotiable = null;
$preferred_skills = null;
$sample_images = array();
$sample_files = array();

$hirer_name = null;
$hirer_spent = null;
$hirer_hired = null;
$hirer_rated = null;
$hirer_picture = null;

$isApplied = 0;


// query 
$sqlSelect = "SELECT * FROM job WHERE id = " . $_GET["job_id"];
$result = $conn->query($sqlSelect);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $posted_by = $row['posted_by'];
        $category = $row["category"];
        $name = $row["name"];
        $salary = $row["salary"];
        $duration = $row["duration"];
        $details = $row["details"];
        $negotiable = $row["negotiable"];
        $preferred_skills = $row["preferred_skills"];
    }
} else {
    echo "0 results from job";
}

//query 2
$sqlPoster = "SELECT u.name,u.picture, h.* FROM users u JOIN hirer h ON u.id = h.id WHERE h.id = " . $posted_by;
$result = $conn->query($sqlPoster);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $hirer_name = $row["name"];
        $hirer_spent = $row["spent"];
        $hirer_hired = $row["hired"];
        $hirer_rated = $row["rating"];
        $hirer_picture = $row["picture"];
    }
} else {
    // echo "0 results from hirer";
}

//query 3 fetching sample images
$sqlSelect = "SELECT sample_images FROM jobimages WHERE id =" . $_GET["job_id"];
$result = $conn->query($sqlSelect);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        array_push($sample_images, $row["sample_images"]);
    }
}

//query 4 fetching sample files
$sqlSelect = "SELECT sample_files FROM jobfiles WHERE id =" . $_GET["job_id"];
$result = $conn->query($sqlSelect);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        array_push($sample_files, $row["sample_files"]);
    }
}

//query 5 applying for job
if (isset($_POST["apply"])) {
    $sqlApply = "INSERT INTO application (job_id, applied_id) VALUES (" . $_GET["job_id"] . "," . $_SESSION["userId"] . ")";
    // echo $sqlApply;
    if ($conn->query($sqlApply) === TRUE) {
        $_SESSION["isApplied"] = 1;
        header("Location: http://localhost/JobseekerWeb/explore.php");
    } else {
        $isApplied = 1;
        // echo "Oops the job has already been accepted";
    }
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
    <title>Product Details</title>
</head>

<body>
    <header>
        <div class="product-nav">
            <?php
            include "nav.php";
            ?>
        </div>
    </header>

    <main>
        <div class="product-details">
            <h1 class="special--container"><?php echo $category ?></h1>
            <section class="product__title-section special--container flex">
                <h2><?php echo $name ?>.</h2>
                <div class="taka flex">
                    <div class="taka-logo flex">
                        <img src="images/taka-bw.svg" alt="taka">
                    </div>
                    <div class="taka-amount"><?php echo $salary ?></div>
                </div>
            </section>
            <section class="job-info-section flex">
                <div class="job-info__details special--container">
                    <div class="job-details flex">
                        <h3>Deadline</h3>
                        <h3><?php echo $duration ?></h3>
                    </div>
                    <div class="job-details flex">
                        <h3>Revisions</h3>
                        <h3>4</h3>
                    </div>
                    <div class="job-details flex">
                        <h3>Negotiable</h3>
                        <h3><?php
                            if ($negotiable) {
                                echo "YES";
                            } else {
                                echo "NO";
                            }
                            ?>
                        </h3>
                    </div>
                    <!-- <div class="job-details flex">
                        <h3>Preferred skills</h3>
                        <h3><?php echo $preferred_skills ?></h3>
                    </div> -->
                </div>
                <div class="job-info__hirer flex">
                    <div class="hirer-card">
                        <div class="hirer__pic-name flex">
                            <div class="hirer__pic">
                                <?php
                                if (!empty($hirer_picture)) {
                                    echo '<img src="data:image/jpeg;base64,' . base64_encode($hirer_picture) . '"alt="profile-picture"/>';
                                } else {
                                    echo '<img src="https://picsum.photos/200/300" alt="profile picture">';
                                }
                                ?>
                            </div>
                            <div class="hirer__name">
                                <h3><?php echo $hirer_name ?> </h3>
                                <h4>Hirer</h4>
                            </div>
                        </div>
                        <div class="hirer__info flex">
                            <div class="job-info earned">
                                <h2>Spent</h2>
                                <h3><?php echo $hirer_spent ?></h3>
                                <h4>TAKA</h4>
                            </div>
                            <div class="info-divider"></div>
                            <div class="job-info completed">
                                <h2>Hired</h2>
                                <h3><?php echo $hirer_hired ?></h3>
                                <h4>Freelancers</h4>
                            </div>
                            <div class="info-divider"></div>
                            <div class="job-info rated">
                                <h2>Rated</h2>
                                <h3><?php echo $hirer_rated ?></h3>
                                <h4>STARS</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="description-section special--container">
                <h2>Description</h2>
                <p><?php echo $details ?></p>
            </section>
            <section class="sample-files-section">
                <div class="special--container">
                    <h2>Sample Images & Files </h2>
                    <h3>Images</h3>
                    <?php
                    if (!empty($sample_images)) {
                    ?>
                        <div class="img-carousel">
                            <div id="carouselExampleControls" class="carousel slide custom-carousel" data-interval="false">
                                <div class="carousel-inner">
                                    <?php
                                    for ($i = 0; $i < count($sample_images); $i++) {
                                    ?>
                                        <div class="carousel-item <?php
                                                                    if ($i === 0) {
                                                                        echo 'active';
                                                                    }
                                                                    ?>">
                                            <?php
                                            echo '<img src="data:image/jpeg;base64,' . base64_encode($sample_images[$i]) . '" alt="slide" class="d-block" />';
                                            ?>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <?php
                                if (count($sample_images) > 1) {
                                ?>
                                    <a class="carousel-control-prev custom-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next custom-next" href="#carouselExampleControls" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                <?php
                                }
                                ?>
                            </div>

                        </div>
                    <?php
                    } else {
                        echo "<h4>There are no sample images for this job.</h4>";
                    }
                    ?>

                    <h3>Files</h3>
                    <?php
                    if (!empty($sample_files)) {
                    ?>
                        <div class="files flex">
                            <?php
                            foreach ($sample_files as $temp) {
                            ?>
                                <button class="download-file-btn flex">
                                    <span>File</span>
                                    <i class="fas fa-download"></i>
                                </button>
                            <?php } ?>
                        </div>
                    <?php } else {
                        echo "<h4>There are no sample files for this job.</h4>";
                    }
                    ?>
                </div>
            </section>
            <section class="apply-section">
                <div class="special--container">
                    <h2>Hurry Up!</h2>
                    <p>Only few applications left for this job!</p>
                    <p>If you have what it takes, what are you waiting for?</p>
                    <form action="" method="POST">
                        <input type="hidden" value="1" name="apply" />
                        <button>Apply now</button>
                    </form>
                    <h3>By clicking the apply button, I agree to all the terms and conditions</h3>
                </div>
            </section>
        </div>
    </main>
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="liveToastApplication" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <h4 class="me-auto mb-0">Application failed</h4>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <h3>This job has been already accepted</h3>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <script src="js/script.js"></script>
    <script type="text/javascript">
        <?php
        if ($isApplied === 1) {
            echo "var toastLiveExample = document.getElementById('liveToastApplication');
            var toast = new bootstrap.Toast(toastLiveExample);
            toast.show();";
        }
        ?>
    </script>
</body>

</html>