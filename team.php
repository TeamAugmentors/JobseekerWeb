<?php
session_start();
$active = "team";
$isLoggedIn = 0;
if (!empty($_SESSION)) {
    $isLoggedIn = $_SESSION["isLoggedIn"];
}

// database stuffs
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jobseekerweb";

$teammate = array();

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sqlTeam = "SELECT * FROM team";
$result = $conn->query($sqlTeam);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $temp = array("name" => $row["name"], "id" => $row["id"], "hobby" => $row["hobby"], "picture" => $row["picture"]);
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

    <title>Team Page</title>
    <link rel="stylesheet" href="css/styles.css">

    <!-- fullpage CSS -->
    <link rel="stylesheet" href="css/fullpage.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <!-- Boxicon CSS  -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    
    <!-- Font -->
    <link href='https://bigfontsite.com/fonts/fresh-eaters.html' rel="stylesheet">

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
            foreach($teammate as $temp){
            ?>
            <section class="section" id="<?php echo $temp["id"] ?>">
                <div class="<?php echo $temp["name"]?>">
                    <h1><?php echo $temp["name"] ?> </h1>
                    <h2><?php echo $temp["id"]?> </h2>
                    <?php echo $temp["hobby"] ?>
                    <!-- <?php echo $temp["picture"] ?> -->
                </div>
            </section>
            <?php } ?>
        </div>
    </div>
    <!-- This is a comment -->
    <script src="js/fullpage.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <script src="js/script.js"></script>
</body>

</html>