<?php
session_start();

$active = 'home';
$isLoggedIn = 0;
if (!empty($_SESSION)) {
    $isLoggedIn = $_SESSION["isLoggedIn"];
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <!-- Boxicon CSS  -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="css/styles.css">
    <title>Hello, world!</title>

    <style>
        .enter-text {
            margin: 0;
            font-family: 'fresh';
            font-size: 140px;
            text-align: center;
            animation: slide 1s ease-in-out forwards;
            opacity: 0;
            transform: translateX(-100px);
            transition: all 1s;
        }

        .second {
            font-size: 80px;
            margin: 0;
            padding: 0;
            position: relative;
            opacity: 0;
            transform: translateY(-50px);
            transition: all 1s;
            animation: top-down 1s ease-in-out forwards;
            animation-delay: 0.7s;
        }

        .border-bottom {
            background-color: black;
            width: 100%;
            height: 10px;
            margin: auto;
            transform: scaleX(0);
            transition: all 0.5s;
            animation: line-from-middle 0.5s ease-in-out forwards;
            animation-delay: 1s;
        }

        .computer {
            display: block;
            margin: auto;
            width: 400px;
            height: 300px;
            background-image: url('images/computer.svg');
            background-position: center;
            background-repeat: no-repeat;
            transition: all 0.3s;
            transform: scale(0);
            animation: bounce-out 0.7s cubic-bezier(0.46, -0.24, 0.29, 1.26) forwards 1s;
        }

        .computer:hover {
            cursor: pointer;
            transform: scale(1.1, 1.1);
        }

        @keyframes hover {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(15px);
            }
        }

        @keyframes bounce-out {
            0% {
                transform: scale(0);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        @keyframes line-from-middle {
            100% {
                transform: scaleX(1);
            }
        }

        @keyframes top-down {
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes slide {
            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }



        .vm-100 {
            margin-top: 100px;
        }

        .vm-60 {
            margin-top: 60px;
        }

        .vm-30 {
            margin-top: 30px;
        }

        .hml-10 {
            margin-left: 10px;
        }

        .hmr-10 {
            margin-right: 10px;
        }

        .text-div {
            width: fit-content;
            overflow-wrap: break-word;
            flex-direction: column;
        }

        body {
            background-color: #212529;
            z-index: -2;
            overflow-x: hidden;
        }


        @keyframes circle-close-in {
            from {
                clip-path: circle(50% at 50% 50%);
            }

            to {
                clip-path: circle(0% at 50% 50%);
            }
        }


        .white-bg {
            position: absolute;
            z-index: -1;
            width: 150vw;
            height: 140vh;
            top: -25%;
            left: -25%;
            background-color: white;
        }

        .white-bg:before {
            display: inline-block;
            content: '';
            height: 50%;
            width: 0;
        }

        .third {
            color: white;
            font-size: 70px;
            transform: translateY(-110px) translateX(-50px);
            transition: all 0.5s;
            opacity: 0;
        }

        .fourth {
            font-size: 60px;
            letter-spacing: 5px;
            padding: 0 20px;
            white-space: nowrap;
        }

        .fourth-bg {
            background-color: white;
            color: black;
            transform: translateY(-280px);
            width: 0;
            max-width: fit-content;
            height: auto;
            overflow: hidden;

        }

        @keyframes reveal-text {
            from {
                width: 0;
            }

            to {
                width: 400px;
            }

            from {
                width: 0;
            }
        }

        .header-text {
            color: white;
            font-size: 8rem;
        }

        .header-text-2 {
            color: white;
            font-size: 4rem;
            opacity: 0.8;
        }

        .header-text-3 {
            color: white;
            font-size: 3rem;
            opacity: 0.8;
        }

        .my-button {
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 2.5rem;
            transition: all 0.3s;
        }

        .outline {
            color: white;
            background-color: transparent;
            border: 2px solid white;
        }

        .outline:hover {
            background-color: rgba(255, 255, 255, 0.281);
            transform: translateY(-5px);
        }

        .filled:hover {
            background-color: rgba(255, 255, 255, 0.733);
            transform: translateX(15px);
        }

        .w-80 {
            width: 80% !important;
        }

        .icon-scroll:before {
            position: absolute;
            left: 50%;
        }

        .icon-scroll {
            position: relative;
            width: 30px;
            height: 60px;
            box-shadow: inset 0 0 0 2px #fff;
            border-radius: 25px;
            opacity: 0.5;
        }

        .icon-scroll:before {
            content: '';
            width: 8px;
            height: 8px;
            background: #fff;
            margin-left: -4px;
            top: 8px;
            border-radius: 4px;
            animation-duration: 1.5s;
            animation-iteration-count: infinite;
            animation-name: scroll;
        }

        @-moz-keyframes scroll {
            0% {
                opacity: 1;
            }

            100% {
                opacity: 0;
                transform: translateY(46px);
            }
        }

        @-webkit-keyframes scroll {
            0% {
                opacity: 1;
            }

            100% {
                opacity: 0;
                transform: translateY(46px);
            }
        }

        @-o-keyframes scroll {
            0% {
                opacity: 1;
            }

            100% {
                opacity: 0;
                transform: translateY(46px);
            }
        }

        @keyframes scroll {
            0% {
                opacity: 1;
            }

            100% {
                opacity: 0;
                transform: translateY(46px);
            }
        }

        .vr {
            border-right: 2px solid white;
            height: 100%;
            opacity: 1;
        }

        .color-black {
            color: black !important;
        }

        .new-card-container {
            background-color: white;
            overflow: hidden;
            height: 430px;
            width: 300px;
            border-radius: 10px;
            box-shadow: 1px 1px 8px -1px rgba(0, 0, 0, 0.14);
            -webkit-box-shadow: 1px 1px 8px -1px rgba(0, 0, 0, 0.14);
            -moz-box-shadow: 1px 1px 8px -1px rgba(0, 0, 0, 0.14);
            transition: all 0.5s;
        }

        .new-card-container:hover {
            transform: scale(1.2)
        }

        .inside-container {
            background-color: #212529;
            height: 130px;
            width: 100%;
        }

        .color-white {
            color: white;
        }

        .card-logo-text {
            font-size: 4rem;
        }

        .card-salary-text {
            font-size: 3rem;
        }

        .inside-section-text {
            font-size: 2.2rem;
            padding: 0px 12px;
        }

        .card-details {
            background-color: black;
            opacity: 0.8;
            height: 80px;
            margin: 0px 10px;
            border-radius: 6px;
            padding: 5px;
        }

        .card-apply {
            background-color: black;
            height: 60px;
            margin-top: 15px;
            color: white;
            font-size: 2.3rem;
            text-align: center;
            padding-top: 5px;
        }

        .card-apply:hover {
            cursor: pointer;
        }

        .w-90 {
            width: 90% !important;
        }

        .vh-90 {
            height: 90vh;
        }

        .a-custom {
            text-decoration: none;
            border-bottom: 1px dotted white;
            color: white;
            transition: all 0.5s;
            padding: 0 5px;
        }

        .a-custom:hover {
            cursor: pointer;
            background-color: rgba(255, 255, 255, 0.151);
            color: white;
        }

        .vm-220 {
            margin-top: 220px;
        }

        .animation-content {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }

        .section {
            min-height: 100vh;
        }


        /* MOBILE  */

        /*LG*/
        
        @media (max-width: 999px) {
            .img-col {
                display: none !important;
            }

            .header-col {
                text-align: center;
            }

            .button-col {
                display: block !important;
                margin: auto;
            }

            .icon-scroll {
                display: none !important;
            }
        }

        @media (max-width: 600px) {
            .header-text {
                font-size: 12vw;
            }

            .header-text-2 {
                font-size: 9vw !important;
            }

            .header-text-3 {
                font-size: 7vw;
            }

            .my-button {
                font-size: 7vw;
                margin: 10px 0 !important;
            }

            .button-earn {
                margin: 10px auto !important;
            }
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
</head>

<body class="overflow-hidden">
    <?php
    include "nav.php";
    ?>

    <div class="white-bg">
    </div>

    <div id="animationContent" class="position-absolute animation-content">
        <div class="mt-5 d-flex flex-column align-items-center">
            <h1 class="enter-text" id="enter">
                ENTER
            </h1>
            <div class="text-div" id="div">
                <h2 class="second" id="second">
                    A lifetime of opportunities
                </h2>
                <div class="border-bottom"></div>
            </div>

            <div class="vm-30"></div>

            <div class="fourth-bg">
                <h2 class="fourth">take a peek</h2>
            </div>

            <div class="computer" id="computer">

            </div>
            <div>
                <h2 class="third">go ahead</h2>
            </div>
        </div>
    </div>

    <div class="main-content" style="transform-origin: center;transform: scale(0.3) translate(110px, -820px);opacity: 1;transition: all 0.5s ease 0s;  pointer-events: none; opacity: 0;" id="mainContent">
        <div class="container-fluid vm-100 w-80 section" id="headerContent">
            <div class="row">
                <div class="col-lg-6 header-col">
                    <h1 class="header-text">We pave the way</h1>
                    <h2 class="header-text-2 vm-30">So that you can focus on what is important</h2>
                    <h3 class="header-text-3 vm-100">Interested? Explore how it works</h3>
                    <div class="d-flex vm-30 button-col">
                        <button class="my-button outline hmr-10" id="btnDownload">
                            Get the App
                        </button>
                        <button class="my-button filled hml-10" id="btnVideo">
                            Watch the video
                        </button>
                    </div>
                </div>

                <div class="col-lg-6 d-flex img-col">
                    <div class="vr">

                    </div>
                    <img src="images/headerimg.png" class="m-auto img-fluid">
                </div>
            </div>

            <div class='icon-scroll mx-auto  vm-220 '></div>
        </div>
    </div>

    <div id="secondContent" class="d-none">
        <div class="vm-30"></div>

        <div class="container-fluid p-5 bg-light section">
            <div class="row w-90 m-auto">
                <h1 class="header-text color-black text-center vm-100">
                    Pick one which is right for you.
                </h1>

                <div class="col-lg-6 col-xxl-3 d-grid justify-content-center vm-100">
                    <div class="new-card-container">
                        <div class="inside-container pt-4 bg-black">
                            <h3 class="color-white card-logo-text text-center m-0">
                                Illustrator
                            </h3>

                            <h3 class="color-white text-center card-salary-text mt-3">
                                <img src="images/taka-bw.svg" width="35px">
                                3500
                            </h3>
                        </div>

                        <div class="inside-container h-100 bg-light d-flex flex-column">
                            <div class="card-section d-flex justify-content-between mt-4">
                                <h4 class="inside-section-text ">
                                    Duration
                                </h4>
                                <h4 class="inside-section-text">
                                    2 Days
                                </h4>
                            </div>
                            <div class="card-section d-flex justify-content-between">
                                <h4 class="inside-section-text">
                                    Revisions
                                </h4>
                                <h4 class="inside-section-text">
                                    4 times
                                </h4>
                            </div>
                            <div class="card-section d-flex justify-content-between">
                                <h4 class="inside-section-text">
                                    Negotiable
                                </h4>
                                <h4 class="inside-section-text">
                                    Yes
                                </h4>
                            </div>

                            <div class="card-details color-white">
                                Looking for someone to do some illustrator work.
                            </div>

                            <div class="card-apply">
                                Apply
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xxl-3 d-grid justify-content-center vm-100">
                    <div class="new-card-container">
                        <div class="inside-container pt-4 bg-black">
                            <h3 class="color-white card-logo-text text-center m-0">
                                Illustrator
                            </h3>

                            <h3 class="color-white text-center card-salary-text mt-3">
                                <img src="images/taka-bw.svg" width="35px">
                                3500
                            </h3>
                        </div>

                        <div class="inside-container h-100 bg-light d-flex flex-column">
                            <div class="card-section d-flex justify-content-between mt-4">
                                <h4 class="inside-section-text ">
                                    Duration
                                </h4>
                                <h4 class="inside-section-text">
                                    2 Days
                                </h4>
                            </div>
                            <div class="card-section d-flex justify-content-between">
                                <h4 class="inside-section-text">
                                    Revisions
                                </h4>
                                <h4 class="inside-section-text">
                                    4 times
                                </h4>
                            </div>
                            <div class="card-section d-flex justify-content-between">
                                <h4 class="inside-section-text">
                                    Negotiable
                                </h4>
                                <h4 class="inside-section-text">
                                    Yes
                                </h4>
                            </div>

                            <div class="card-details color-white">
                                Looking for someone to do some illustrator work.
                            </div>

                            <div class="card-apply">
                                Apply
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xxl-3 d-grid justify-content-center vm-100">
                    <div class="new-card-container">
                        <div class="inside-container pt-4 bg-black">
                            <h3 class="color-white card-logo-text text-center m-0">
                                Illustrator
                            </h3>

                            <h3 class="color-white text-center card-salary-text mt-3">
                                <img src="images/taka-bw.svg" width="35px">
                                3500
                            </h3>
                        </div>
                        <div class="inside-container h-100 bg-light d-flex flex-column">
                            <div class="card-section d-flex justify-content-between mt-4">
                                <h4 class="inside-section-text ">
                                    Duration
                                </h4>
                                <h4 class="inside-section-text">
                                    2 Days
                                </h4>
                            </div>
                            <div class="card-section d-flex justify-content-between">
                                <h4 class="inside-section-text">
                                    Revisions
                                </h4>
                                <h4 class="inside-section-text">
                                    4 times
                                </h4>
                            </div>
                            <div class="card-section d-flex justify-content-between">
                                <h4 class="inside-section-text">
                                    Negotiable
                                </h4>
                                <h4 class="inside-section-text">
                                    Yes
                                </h4>
                            </div>

                            <div class="card-details color-white">
                                Looking for someone to do some illustrator work.
                            </div>

                            <div class="card-apply">
                                Apply
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xxl-3 d-grid justify-content-center vm-100">
                    <div class="new-card-container">
                        <div class="inside-container pt-4 bg-black">
                            <h3 class="color-white card-logo-text text-center m-0">
                                Illustrator
                            </h3>

                            <h3 class="color-white text-center card-salary-text mt-3">
                                <img src="images/taka-bw.svg" width="35px">
                                3500
                            </h3>
                        </div>
                        <div class="inside-container h-100 bg-light d-flex flex-column">
                            <div class="card-section d-flex justify-content-between mt-4">
                                <h4 class="inside-section-text ">
                                    Duration
                                </h4>
                                <h4 class="inside-section-text">
                                    2 Days
                                </h4>
                            </div>
                            <div class="card-section d-flex justify-content-between">
                                <h4 class="inside-section-text">
                                    Revisions
                                </h4>
                                <h4 class="inside-section-text">
                                    4 times
                                </h4>
                            </div>
                            <div class="card-section d-flex justify-content-between">
                                <h4 class="inside-section-text">
                                    Negotiable
                                </h4>
                                <h4 class="inside-section-text">
                                    Yes
                                </h4>
                            </div>

                            <div class="card-details color-white">
                                Looking for someone to do some illustrator work.
                            </div>

                            <div class="card-apply">
                                Apply
                            </div>
                        </div>
                    </div>
                </div>

                <h1 class="header-text-2 color-black text-center vm-100 ">
                    <a href="#" style="text-decoration: none;">Sign up</a> to explore your potential
                </h1>
            </div>
        </div>

        <div class="container-fluid vm-100 w-80 section">
            <div class="row">
                <div class="col-lg-6 d-flex justify-content-center img-col">
                    <img src="images/sectionimg.png" class="img-fluid" width="500px">
                    <div class="vr mx-5"></div>
                </div>
                <div class="col-lg-6 d-flex header-col">
                    <div>
                        <h1 class="header-text">Having doubts?</h1>
                        <h2 class="header-text-2 vm-30">We believe in actions more than words.</h2>
                        <h3 class="header-text-3 vm-30">We believe that everyone
                            should get an equal chance at earning opportunities, because we believe everyone is talented
                            in
                            their own way<br><br>So give us a try, its completely free :)</h3>
                    </div>
                </div>
                <div class="col-lg-12">
                    <button class="my-button outline w-50 d-block mx-auto vm-100 button-earn">
                        I want to start earning!
                    </button>
                    <h1 class="header-text-2 text-center vm-100 ">
                        Curious? Check out who <a href="#" class="a-custom" style="text-decoration: none;">we are</a>
                    </h1>
                </div>
            </div>
        </div>
        <?php
        include "footer.php";
        ?>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <script type="text/javascript" src="script.js"></script>

    <script>
        $(document).ready(() => {

        })
    </script>

    <script>
        $(document).ready(() => {
            var width = $(window).width();

            var computer = $('#computer')
            var enter = $('#enter')
            var second = $('#second')
            var third = $('.third')
            var fourthBg = $('.fourth-bg')
            var border = $('.border-bottom')
            var whiteBg = $('.white-bg')

            var mainContent = $('#mainContent')
            var animationContent = $('#animationContent')

            var bool = false
            var resized = false

            $(window).resize(() => {

                if (!resized && $(window).width() < 1950) {
                    whiteBg.remove()

                    mainContent.css('transform', 'scale(1)')
                    mainContent.css('pointer-events', 'auto')

                    animationContent.remove()
                    $('#headerContent').unwrap()

                    $('body').removeClass('overflow-hidden')
                    $('#secondContent').removeClass('d-none')

                    resized = true;
                }
            })

            if (width < 1950 && !resized) {
                whiteBg.remove()

                mainContent.css('transform', 'scale(1)')
                mainContent.css('pointer-events', 'auto')

                animationContent.remove()
                $('#headerContent').unwrap()

                $('body').removeClass('overflow-hidden')
                $('#secondContent').removeClass('d-none')
                resized = true;
            }

            setTimeout(() => {
                enter.css({
                    'animation': 'none',
                    'transform': 'translateX(0)',
                    'transition': 'all 0.5s',
                    'opacity': '1'
                })

                second.css({
                    'animation': 'none',
                    'transform': 'translateY(0)',
                    'transition': 'all 0.5s',
                    'opacity': '1'
                })

            }, 2000)


            setTimeout(function() {
                computer.css('animation', "hover 1s ease-in-out both infinite")

                computer.hover(() => {
                    computer.css('animation', "none")
                    computer.css('transform')
                    computer.css('transform', "translateY(-200px) scale(1.4)")
                    computer.css('background-image', "url('images/computer-lightup.svg')")

                    enter.css('opacity')
                    enter.css('opacity', '0')

                    second.css('opacity', '0')
                    border.css('opacity', '0')

                    whiteBg.css('animation', 'circle-close-in 1s 1 forwards')

                    setTimeout(() => {
                        if (!bool) {
                            computer.css('background-image', "url('images/computer-jobseeker.svg')")

                            computer.mouseover(() => {
                                computer.css('background-image', "url('images/computer-jobseeker.svg')")
                            })

                            setTimeout(() => {
                                setTimeout(() => {
                                    fourthBg.css('animation', "reveal-text 0.7s ease-in-out forwards")

                                }, 1000)
                                third.css({
                                    'transform': 'translateX(0) translateY(-110px)',
                                    'opacity': '1'
                                })
                            }, 500)

                            bool = true
                            computer.click(() => {
                                computer.unbind('mouseenter mouseleave mouseover');
                                computer.css('background-image', "url('images/computer-jobseeker-finished.svg')")

                                third.css('opacity', '0')
                                fourthBg.css('opacity', '0')

                                setTimeout(() => {
                                    mainContent.css('opacity', '1')
                                }, 1000)

                                setTimeout(() => {
                                    computer.css('transform', 'scale(7)')
                                    mainContent.css('transform', 'scale(1)')
                                    mainContent.css('pointer-events', 'auto')
                                }, 2000)

                                setTimeout(() => {
                                    animationContent.remove()
                                    $('#headerContent').unwrap()

                                    $('body').removeClass('overflow-hidden')
                                    $('#secondContent').removeClass('d-none')
                                }, 2600)
                            })
                        }
                    }, 1000)

                }, () => {
                    computer.css('background-image', "url('images/computer-lightup.svg')")
                })
            }, 2000);

        })
    </script>
</body>

</html>