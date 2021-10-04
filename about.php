<?php
session_start();
$isLoggedIn = 0;
$active = "about";
if (!empty($_SESSION)) {
    $isLoggedIn = $_SESSION["isLoggedIn"];
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
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">

    <!-- Boxicon CSS  -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    
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
                        <p class="description">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quam,
                            blanditiis rem? Quos ullam
                            cupiditate ipsum tempora quaerat molestiae iusto aliquam molestias enim, quis cumque facere
                            qui quae, ad in aperiam.</p>
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
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur, magni. Obcaecati nobis,
                            provident nisi corrupti ducimus recusandae! Minima illum asperiores enim aliquid repellat
                            explicabo, velit optio?Lorem ipsum dolor sit amet</p>
                    </div>
                </div>
                <div class="right">
                    <div class="text">
                        <h1 class="heading-1">ONE APP</h1>
                        <h1 class="heading-2">ENDLESS POSSIBILITIES</h1>
                        <P>Get jobs on the go with our mobile app<br> available at the playstore</P>
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
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <script type="text/javascript" src="script.js"></script>
</body>

</html>