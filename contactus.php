<?php
session_start();

$active = 'contactUs';
$isLoggedIn = 0;
if (!empty($_SESSION)) {
    $isLoggedIn = $_SESSION["isLoggedIn"];
}

$name = null;
$email = null;
$phone = null;
$message = null;

include "dbconnection.php";

ini_set('display_errors', '0');

$recaptcha = $_POST['g-recaptcha-response'];
$res = reCaptcha($recaptcha);
if(!$res['success']){
  // Error
} else {
    if (!empty($_POST)) {
        $name = $_POST["Name"];
        $email = $_POST["Email"];
        $phone = $_POST["Phone"];
        $message =  $_POST["Message"];
    
        $query = "INSERT INTO feedback(name, email, phone, message) VALUES ('".$name."','".$email."','".$phone."','".$message."')";
    
        if ($conn->query($query) === TRUE) {
        } else {
            echo "Something went wrong";
        }
        $conn->close(); 
    }
}

function reCaptcha($recaptcha){
    $secret = "6LfHOrEcAAAAAPF4FmqUZrBvABpidqM2gVz9XnZ7";
    $ip = $_SERVER['REMOTE_ADDR'];
  
    $postvars = array("secret"=>$secret, "response"=>$recaptcha, "remoteip"=>$ip);
    $url = "https://www.google.com/recaptcha/api/siteverify";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
    $data = curl_exec($ch);
    curl_close($ch);
  
    return json_decode($data, true);
  }

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php include 'headLinks.php' ?>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>

    <link href="css/contact_us.css" rel="stylesheet">

</head>

<body>

    <?php
    include "nav.php";
    ?>

    <div class="row main-container">
        <div class="col-12">
            <div class="row contact-section">
                <div class="row w-75 mx-auto">
                    <div class="col-xxl-6">
                        <button class="button-map">Look at Google maps</button>
                        <h1 class="header-text color-white">Contact Us</h1>
                    </div>
                    <div class="col-xxl-6 d-grid justify-content-center align-items-center">
                        <div class="form-container">
                            <form method="POST" action="">
                                <h1 class="feedback-text">Feedback Card</h1>
                                <input type="text" class="w-100" placeholder="Name" name="Name" required>
                                <input type="email" class="w-100" placeholder="Email" name="Email" required>
                                <input type="text" class="w-100" placeholder="Phone" name="Phone" required>
                                <textarea  class="w-100"  placeholder="Message" name="Message"></textarea>
                                <div class="g-recaptcha brochure__form__captcha mt-4" data-sitekey="6LfHOrEcAAAAAFG1OLI4XyXCZLUylmSXa-whltWM"></div> 
                                <?php 
                                    if (!$res['success']){
                                        echo "<h5>Please check the captcha box</h5>";
                                    }
                                ?>
                                <input type="submit" value="Submit" id="submit" required>
 
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row below-contact-section">
                <div class="row w-75 mx-auto p-5">
                    <div class="col-xxl-6 d-flex justify-content-between">
                        <div class='d-flex flex-column'>
                            <h1 class="footer-title">
                                Our Address
                            </h1>
                            <h1 class="footer-text">
                                63/1 Purana Paltan Line<br>
                                Paltan Paradise<br>
                                Flat - 5D<br>
                                Dhaka 1217<br>
                                Bangladesh
                            </h1>
                        </div>

                        <div class='d-flex flex-column'>
                            <h1 class="footer-title">
                                Call us
                            </h1>
                            <h1 class="footer-text text-2">
                                +8801733799386<br>
                                +8801778499812<br>
                                <br>
                                Email us at <br>
                                JobseekerSupport@Js.com<br>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>


<script>


    $('.button-map').click(() => {
        console.log($(window).width())

        if ($(window).width() < 900) {
            window.open('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2582.5410447349577!2d90.40990819101722!3d23.737943019051567!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8f52f0cd403%3A0x967de59de993fe2c!2s36%20Garage%20goli%2C%20Dhaka%201205!5e0!3m2!1sen!2sbd!4v1633490753672!5m2!1sen!2sbd')
        } else {
            $('body').prepend(`<div class="iframe-container">   
        <button id="close" style="float: right; width:15px; height:15px;">X</button>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2582.5410447349577!2d90.40990819101722!3d23.737943019051567!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8f52f0cd403%3A0x967de59de993fe2c!2s36%20Garage%20goli%2C%20Dhaka%201205!5e0!3m2!1sen!2sbd!4v1633490753672!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>`)

            $('#close').click(() => {
                console.log("hello")
                $('.iframe-container').remove()
            })
        }

    })
</script>

</html>