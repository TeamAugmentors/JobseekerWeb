<?php
session_start();
include "dbconnection.php";

$active = 'home';
$isLoggedIn = 0;
if (!empty($_SESSION)) {
    $isLoggedIn = $_SESSION["isLoggedIn"];
}

$sqlForCards = "SELECT id, posted_by, category, name, salary, duration, details, negotiable FROM job order by salary desc LIMIT 4";
$result = $conn->query($sqlForCards);
$jobCards = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $cards = array();
        $cards = array();
        $cards['id'] = $row['id'];
        $cards['name'] = $row['name'];
        $cards['salary'] = $row['salary'];
        $cards['duration'] = $row['duration'];
        $cards['negotiable'] = $row['negotiable'];
        $cards['details'] = $row['details'];
        array_push($jobCards, $cards);
    }
}


?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php include 'headLinks.php' ?>
    <link rel="stylesheet" href="css/home_style.css">
    <title>JobSeeker</title>

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
                            <a href="https://drive.google.com/file/d/1eegNBg5l8NAVdHD5DzRxe_HYoSNoReoy/view?usp=sharing" target="_blank">Get the App</a>
                        </button>
                        <button class="my-button filled hml-10" id="btnVideo">
                            <a href="https://www.youtube.com/watch?v=YYKiquIiLZ4" target="_blank">Watch the video</a>
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
                <!-- ------------------ -->
                <?php
                foreach ($jobCards as $card) {
                ?>
                    <div class="col-lg-6 col-xxl-3 d-grid justify-content-center vm-100">
                        <div class="new-card-container">
                            <div class="inside-container pt-4 bg-black">
                                <h3 class="color-white card-logo-text text-center m-0">
                                    <?php echo $card['name']; ?>
                                </h3>

                                <h3 class="color-white text-center card-salary-text mt-3">
                                    <img src="images/taka-bw.svg" width="35px">
                                    <?php echo $card['salary']; ?>
                                </h3>
                            </div>

                            <div class="inside-container h-100 bg-light d-flex flex-column">
                                <div class="card-section d-flex justify-content-between mt-4">
                                    <h4 class="inside-section-text ">
                                        Duration
                                    </h4>
                                    <h4 class="inside-section-text">
                                        <?php
                                        $interval = date_diff(date_create(date('Y-m-d')), date_create($card['duration']));
                                        echo $interval->format('%a Days');
                                        ?>
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
                                        <?php
                                        if ($card['negotiable'] === 1) {
                                            echo "Yes";
                                        } else {
                                            echo "No";
                                        }
                                        ?>
                                    </h4>
                                    <h4 class="inside-section-text">
                                        Yes
                                    </h4>
                                </div>

                                <div class="card-details color-white">
                                    Looking for someone to do some illustrator work.
                                </div>
                                <form class="card-apply" action="productDetails.php" method="GET">
                                    <input type="hidden" class="card-button" value="<?php echo $card['id'] ?>" name="job_id" />
                                    <button class="apply-button">Apply</button>
                                </form>
                                <!-- <div class="card-apply">
                                    Apply
                                </div> -->
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
                <!-- ------------------------ -->
                <h1 class="header-text-2 color-black text-center vm-100 ">
                    <a href="signup.php" style="text-decoration: none;">Sign up</a> to explore your potential
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
                        <a href="explore.php">I want to start earning! </a>
                    </button>
                    <h1 class="header-text-2 text-center vm-100 ">
                        Curious? Check out who <a href="team.php" class="a-custom" style="text-decoration: none;">we are</a>
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