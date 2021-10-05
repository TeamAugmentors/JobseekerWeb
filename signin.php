<?php
session_start();

include "dbconnection.php";

$success = 0;
$isBanned = 0;
if (!empty($_POST)) {
    $sql = "SELECT id, name, user_name, mail, password, ban FROM users;";
    $username = $_POST['username'];
    $password = $_POST['password'];
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ((!strcmp($row['user_name'], $username) || !strcmp($row['mail'], $username)) && !strcmp($row['password'], $password)) {
                $isBanned = $row["ban"];
                if ($isBanned) {
                    break;
                } else {
                    $success = 1;
                    $_SESSION["isLoggedIn"] = 1;
                    $_SESSION["doneLoggedIn"] = 1;
                    $_SESSION["userId"] = $row['id'];
                    $_SESSION["name"] = $row['name'];
                    header("Location: http://localhost/JobseekerWeb/dashboard.php#dashboard__overview");
                }
            } else {
                $success = 0;
            }
        }
    } else {
        echo "Please signup first";
    }
    $conn->close();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'headLinks.php'?>
    <title>Sign-in</title>
</head>

<body>
    <!-- -----------------Toast------------------------- -->
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="liveToastError" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <!-- <img src="..." class="rounded me-2" alt="..."> -->
                <strong class="me-auto">Login Failed</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <h3>Please enter correctly</h3>
            </div>
        </div>
    </div>

    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="liveToastBan" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <!-- <img src="..." class="rounded me-2" alt="..."> -->
                <strong class="me-auto">You have been banned</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <h3>Contact our support for <br> more information</h3>
            </div>
        </div>
    </div>

    <div class="signin-page">
        <div class="left">
            <div class="arrow-left">
                <i class="fa fa-arrow-left fa-3x"></i>
            </div>
            <div class="vertical-signin-text">
                SIGN IN
            </div>
            <div class="text-wrapper">
                <div class="job-seeker">
                    <h1 class="job">JOB</h1>
                    <h1 class="seeker">seeker</h1>
                </div>
                <div class="description">
                    <p>The First Freelancing<br>Platform in Bangladesh.</p>
                </div>
                <div class="footer-text">
                    <p>Discover true talent, or become one.</p>
                </div>
            </div>
        </div>
        <div class="right">
            <div class="signup-reminder">
                <p class="p1">Not a member?</p>
                <a class="p2" href="signup.php">Sign up now?</a>
            </div>
            <div class="form-wrapper">
                <div class="signin-header">
                    <h1>Sign in to Job Seeker</h1>
                </div>
                <button class="signin-with-google-button">
                    <i class="google-icon fab fa-google"></i>
                    Sign in with Google
                </button>
                <div class="or-with-line">
                    <p>Or</p>
                </div>
                <form method="POST" class="custom-form">
                    <div class="custom-form-group">
                        <label class="form-label" for="username">Username or Email Address</label>
                        <input type="text" class="custom-input" name="username" id="username" aria-describedby="emailHelp" placeholder="ani.atikur99@gmail.com" required>
                        <div class="line"></div>
                    </div>
                    <div class="custom-form-group">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" class="custom-input" id="password" name="password" aria-describedby="passwordHelp" required>
                        <div class="line"></div>
                    </div>
                    <button type="submit" class="form-custom-button">Sign in</button>
                </form>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

        <script type="text/javascript" src="js/script.js"></script>
        <script type="text/javascript">
            <?php
            if ($success == 0) {
                echo "var toastLiveExample = document.getElementById('liveToastError');
                    var toast = new bootstrap.Toast(toastLiveExample);
                    toast.show();";
            } else if ($isBanned) {
                echo "var toastLiveExample = document.getElementById('liveToastBan');
                    var toast = new bootstrap.Toast(toastLiveExample);
                    toast.show();";
            }
            ?>
        </script>
</body>

</html>