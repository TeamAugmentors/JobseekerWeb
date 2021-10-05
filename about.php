<?php
session_start();
$isLoggedIn = 0;
$active = "about";
if (!empty($_SESSION)) {
    $isLoggedIn = $_SESSION["isLoggedIn"];
}
$description1 = null;
$description2 = null;
$description3 = null;

include "dbconnection.php";
$sql = "SELECT * FROM aboutus";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $description1 = $row['description_1'];
        $description2 = $row['description_2'];
        $description3 = $row['description_3'];
    }
} else {
    echo "No description found";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'headLinks.php'?>
    <title>About Us</title>
</head>

<body>

    <?php
    include "nav.php";
    ?>

    <div class="main-section">
        <div class="section-1">
            <div class="about-container d-flex">
                <div class="left">
                    <div class="about-js">
                        <h1 class="about-text">About</h1>
                        <h1 class="js">JS</h1>
                    </div>
                    <div class="description">
                        <p>The First Freelancing<br>Platform</p>
                    </div>
                </div>
                <div class="right">
                    <div class="img-div js">
                        <img src="images/JS.png" alt="js">
                    </div>
                </div>
            </div>
        </div>
        <div class="section-2">
            <div class="about-container">
                <div class="left">
                    <div class="img-div">
                        <img src="images/freelance.jpg" alt="">
                    </div>
                </div>
                <div class="right">
                    <div class="text">
                        <h1 class="future">FUTURE</h1>
                        <h2 class="talents">OF TALENTS</h2>
                        <p class="description"><?php echo $description1 ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-3">
            <div class="about-container">
                <div class="left">
                    <div class="img-div">
                        <img src="images/notebook-1.jpg" alt="notebook-1">
                    </div>
                    <div class="text">
                        <h1 class="mtt">MONEY<br>TALENT<br>TIME</h1>
                        <h1 class="all-reward">ALL REWARDED.</h1>
                    </div>
                </div>
                <div class="right">
                    <div class="img-div">
                        <img src="images/notebook-2.jpg" alt="notebook-1">
                    </div>
                </div>
            </div>
        </div>
        <div class="section-4">
            <div class="about-container">
                <div class="left">
                    <div class="text">
                        <p><?php echo $description2 ?></p>
                    </div>
                </div>
                <div class="right">
                    <div class="text">
                        <h1 class="heading-1">ONE APP</h1>
                        <h1 class="heading-2">ENDLESS POSSIBILITIES</h1>
                        <P><?php echo $description3 ?></P>
                    </div>
                </div>
            </div>
        </div>
        <div class="google-play-div-middle">
            <img class="google-play" src="images/google-play.png" alt="">
        </div>
        <footer>
            <div class="footer-section">
                <div class="about-container">
                    <div class="left">
                        <div class="text">
                            <h1 class="heading-1">FIND US</h1>
                            <h1 class="heading-2">WE ARE HERE 24/7</h1>
                        </div>
                        <div class="social-link">
                            <div class="social facebook">
                                <div class="icon-div">
                                    <i class="fab fa-facebook-f icon-custom-bg"></i>
                                </div>
                                <span>FACEBOOK</span>
                            </div>
                            <div class="social youtube">
                                <div class="icon-div">
                                    <i class="fab fa-youtube icon-custom-bg"></i>
                                </div>
                                <span>YOUTUBE</span>
                            </div>
                            <div class="social twitter">
                                <div class="icon-div">
                                    <i class="fab fa-twitter icon-custom-bg"></i>
                                </div>
                                <span>TWITTER</span>
                            </div>
                        </div>
                    </div>
                    <div class="footer-right">
                        <div class="img-div">
                            <img src="images/phone.png" alt="phone">
                        </div>
                    </div>
                </div>
                <div class="google-play-div-bottom">
                    <img class="google-play" src="images/google-play.png" alt="">
                </div>
            </div>
        </footer>

        <?php
        include "footer.php";
        ?>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <script type="text/javascript" src="script.js"></script>
</body>

</html>