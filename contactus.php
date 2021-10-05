<?php
session_start();

$active = 'contactUs';
$isLoggedIn = 0;
if (!empty($_SESSION)) {
    $isLoggedIn = $_SESSION["isLoggedIn"];
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <link rel="stylesheet" href="css/styles.css">
    <title>Hello, world!</title>

    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>

    <style>
        .main-container {
            min-height: 100vh;
        }

        .contact-section {
            position: relative;
            min-height: 70%;
            background-color: rgb(18, 18, 18);
            background-image: url('images/map-2.png');
        }

        .below-contact-section {
            min-height: 30%;
            background-color: rgb(15, 15, 15);
        }

        .w-75 {
            width: 75% !important;
        }


        .header-text {
            position: absolute;
            bottom: 0;
            color: white;
            font-size: 9rem;
            margin-bottom: 2.5rem;
        }

        .button-map {
            border: none;
            padding: 10px 20px;
            font-size: 2rem;
            background-color: transparent;
            border: 2px solid white;
            border-radius: 5px;
            color: white;
            opacity: 0.6;
            margin-top: 55px;
            transition: all 0.3s;
        }

        .button-map:hover {
            opacity: 1;
            transform: translateY(-10px);
        }

        .form-container {
            height: fit-content;
            max-width: 550px;
            background-color: white;
            border-radius: 10px;
            top: 100px;
            padding: 50px;
            left: 200px;
            box-shadow: 3px 2px 10px -4px rgba(0, 0, 0, 0.33);
        }

        .feedback-text {
            font-family: 'fresh';
            opacity: 0.4;
            font-size: 2.2rem;
        }

        input[type="text"] {
            font-size: 2.7rem;
            border: none;
            border-bottom: 2px solid black;
            opacity: 0.3;
            margin-top: 55px;
            transition: all 0.3s;
        }

        input[type="text"]:focus {
            box-shadow: none;
            opacity: 1;
            border-bottom: 4px solid black;
        }

        input[type="text"]:focus-visible {
            outline: none;
        }

        input[type="submit"] {
            border: none;
            padding: 10px 20px;
            font-size: 2rem;
            background-color: transparent;
            border: 2px solid black;
            border-radius: 5px;
            color: black;
            opacity: 0.6;
            margin-top: 55px;
            transition: all 0.3s;
        }

        input[type="submit"]:hover {
            opacity: 1;
            background-color: black;
            color: white;
        }

        .footer-title {
            font-family: 'fresh';
            color: white;
            font-size: 2rem;
            opacity: 0.6;
        }

        .footer-text {
            color: white;
            font-size: 1.6rem;
            line-height: 24px;
        }

        @media (max-width: 1400px) {
            .button-map {
                display: block;
                margin-top: 30px;
                margin-left: auto;
                margin-right: auto;
            }

            .form-container {
                margin: 30px 0;
                width: 100%;
                padding: 10%;
                margin-top: 10%;
                text-align: center;
            }

            .header-text {
                display: none;
            }

            .footer-title {
                font-size: clamp(12px, 2.4vw, 2.4rem) !important;
            }

            .footer-text {
                font-size: clamp(10px, 2vw, 2.2rem) !important;
            }

            input[type="text"] {
                font-size: clamp(16px, 2vw, 2.7rem) !important;
                margin-top: clamp(16px, 6vw, 55px) !important;
            }

            input[type="submit"] {
                font-size: clamp(14px, 2vw, 2rem);
            }

        }

        @media (max-width: 400px) {
            .w-75 {
                width: 100% !important;
            }
        }

        body {
            overflow-x: hidden;
        }
    </style>
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
                            <form>
                                <h1 class="feedback-text">Feedback Card</h1>
                                <input type="text" class="w-100" placeholder="Name">
                                <input type="text" class="w-100" placeholder="Email">
                                <input type="text" class="w-100" placeholder="Phone">
                                <input type="text" class="w-100" placeholder="Message">
                                <input type="submit" value="Submit">
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

</html>