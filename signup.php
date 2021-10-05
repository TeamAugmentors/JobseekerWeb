<?php

include "dbconnection.php";

$isChecked = 1;
if (!empty($_POST) && array_key_exists('isChecked', $_POST)) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "INSERT INTO users (user_name, mail, password, name) VALUES('" . $username . "','" . $email . "','" . $password . "','" . $name . "')";
    if ($conn->query($sql) === TRUE) {
        $id = getId($email, $conn);
        insertId($id, $conn);
        $success = 1;
        header("Location: http://localhost/JobseekerWeb/signin.php");
    } else {
        echo "Something went wrong";
    }
    $conn->close();
} else {
    $isChecked = 0;
}
function getId($email, $conn)
{
    $sqlForId = "SELECT id FROM users WHERE mail='" . $email . "'";
    $result = $conn->query($sqlForId);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            return $row["id"];
        }
    } else {
        echo "Error";
    }
}
function insertId($id, $conn)
{
    $sqlForFreelancerId = "INSERT INTO freelancer (id) VALUES(" . $id . ")";
    $sqlForHirerId = "INSERT INTO hirer (id) VALUES(" . $id . ")";
    if ($conn->query($sqlForFreelancerId) === TRUE) {
        // echo "New record in freelancer created successfully";
    } else {
        echo "Error: " . $sqlForFreelancerId . "<br>" . $conn->error;
    }
    if ($conn->query($sqlForHirerId) === TRUE) {
        // echo "New record in hirer created successfully";
    } else {
        echo "Error: " . $sqlForFreelancerId . "<br>" . $conn->error;
    }
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
    <title>Sign-up</title>
</head>

<body>
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <!-- <img src="..." class="rounded me-2" alt="..."> -->
                <strong class="me-auto">Error</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <h3>Please check terms and conditions</h3>
            </div>
        </div>
    </div>
    <div class="signup-page">
        <div class="left">
            <div class="arrow-left">
                <i class="fa fa-arrow-left fa-3x"></i>
            </div>
            <div class="vertical-signin-text">
                SIGN UP
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
            <div class="form-wrapper">
                <div class="signup-header">
                    <h1>Sign up to Job Seeker</h1>
                </div>
                <button class="signup-with-google-button">
                    <i class="google-icon fab fa-google"></i>
                    Sign up with Google
                </button>
                <div class="or-with-line">
                    <p>Or</p>
                </div>
                <form method="POST" class="custom-form" action="">
                    <div class="custom-form-group  name-and-username-form-group">
                        <div class="name-form-group">
                            <label class="form-label" for="name">Name</label>
                            <input type="name" class="custom-input" id="name" name="name" aria-describedby="nameHelp" placeholder="Atiqur" required>
                            <div class="line"></div>
                        </div>
                        <div class="username-form-group">
                            <label class="form-label" for="name">Username</label>
                            <input type="username" class="custom-input" id="username" name="username" aria-describedby="usernameHelp" placeholder="Atiq" required>
                            <div class="line"></div>
                        </div>
                    </div>
                    <div class="custom-form-group">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" class="custom-input" id="email" name="email" aria-describedby="emailHelp" placeholder="something@gmail.com" required>
                        <div class="line"></div>
                    </div>
                    <div class="custom-form-group">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" class="custom-input" id="password" name="password" aria-describedby="passwordHelp" placeholder="6+ characters" required>
                        <div class="line"></div>
                    </div>
                    <div class="custom-form-check">
                        <input class="custom-form-check-input" type="checkbox" value=1 id="termAndCondition" name="isChecked">
                        <label class="custom-form-check-label" for="termAndCondition">Creating an account means you're
                            okay to our <a href="#" class="term-text-green">Term of Services, Privacy Policy,</a>and out
                            default
                            <a href="#" class="term-text-green">Notification
                                Settings</a>
                        </label>
                    </div>
                    <button type="submit" class="form-custom-button">Create Account</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript">
        <?php
        if ($isChecked === 0) {
            echo " var toastTrigger = document.getElementById('liveToastBtn');
            var toastLiveExample = document.getElementById('liveToast');
            var toast = new bootstrap.Toast(toastLiveExample);
            toast.show();";
        }
        ?>
    </script>
</body>

</html>