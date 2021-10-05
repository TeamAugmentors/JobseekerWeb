<?php
session_start();
$active = "team";
$isLoggedIn = 0;
if (!empty($_SESSION)) {
    $isLoggedIn = $_SESSION["isLoggedIn"];
}

include "dbconnection.php";

$teammate = array();

$sqlTeam = "SELECT * FROM team";
$result = $conn->query($sqlTeam);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $temp = array("member" => $row["member"], "name" => $row["name"], "id" => $row["id"], "hobby" => $row["hobby"], "picture" => $row["picture"], "background" => $row["background"]);
        array_push($teammate, $temp);
        // print_r($temp);
    }
} else {
    echo "0 results from active orders";
}
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include 'headLinks.php'?>
    
    <!-- fullpage CSS -->
    <link rel="stylesheet" href="css/fullpage.min.css">
    
    <title>Team Page</title>
</head>

<body>
    <div class="team">
        <div id="team-fullpage">
            <section class="section active" id="team-section-0">
                <div class="team-intro">
                    <!-- ------main-nav----------- -->
                    <?php
                    include "nav.php";
                    ?>
                    <!-- main nav  -->

                    <div class="team--hero-text custom--container">
                        <h1 id="team--hero-header"></h1>
                        <div class="team--hero-text">
                            <span>Scroll down to find out</span>
                        </div>
                    </div>
                    <div class="team-arrow">
                        <a href="#sanjid">
                            <div class="team--arrow-down">
                                <div class="shape-1 m-center">
                                    <div class="shape-2 m-center"></div>
                                </div>
                                <div class="shape-3 m-center">
                                    <div class="shape-4 m-center"></div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </section>

            <?php
            foreach ($teammate as $temp) {
            ?>
                <section class="section teammates" id="<?php echo $temp["id"] ?>">
                    <div class="<?php echo $temp["member"] ?> member flex">
                        <?php
                        if (!empty($temp["background"])) {
                            echo '<img class="member-background" src="data:image/jpeg;base64,' . base64_encode($temp["background"]) . '"alt="background-picture"/>';
                        }
                        ?>
                        <div class="default-card flex">
                            <div class="content flex">
                                <div class="member-image">
                                    <?php
                                    if (!empty($temp["picture"])) {
                                        echo '<img src="data:image/jpeg;base64,' . base64_encode($temp["picture"]) . '"alt="profile-picture"/>';
                                    } else {
                                        echo '<img src="./images/JS.png" alt="profile-picture"/>';
                                    }
                                    ?>
                                </div>
                                <h1><?php echo $temp["name"] ?> </h1>
                                <h2>ID: <?php echo $temp["id"] ?> </h2>
                                <span>
                                    Hobby: <?php echo $temp["hobby"] ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </section>
            <?php } ?>
        </div>
    </div>
    <!-- This is a comment -->
    <script src="js/fullpage.min.js"></script>

    <script type="text/javascript" src="js/vanilla-tilt.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <script src="js/script.js"></script>
</body>

</html>