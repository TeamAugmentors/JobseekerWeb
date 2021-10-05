<?php
session_start();
$isLoggedIn = 0;
$active = "profile";
if (!empty($_SESSION)) {
    $isLoggedIn = $_SESSION["isLoggedIn"];
} else {
    header("Location: http://localhost/JobseekerWeb/signin.php");
}

include "dbconnection.php";

$name = null;
$email = null;
$phoneNo = null;
$billing = null;
$oldPass = null;
$profile_image = null;

$isFailed = 0;

$sqlSelect = "SELECT * FROM users WHERE id = " . $_SESSION["userId"];
$result = $conn->query($sqlSelect);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $name = $row["name"];
        $email = $row["mail"];
        $oldPass = $row["password"];
        $name = $row["name"];
        $phoneNo = $row["phone_no"];
        $billing = $row["billing_info"];
        $profile_image = $row["picture"];
    }
} else {
    echo "0 results";
}
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phoneNo = $_POST["phoneNo"];
    $billing = $_POST["billing"];
    $oldPass1 = $_POST["oldPass"];
    $newPass = $_POST["newPass"];
    $confirmPass = $_POST["confirmPass"];
    // echo "<pre>";
    // print_r($_FILES["profile_image"]);
    // echo "</pre>";

    if (strcmp($oldPass, $oldPass1) === 0 && strcmp($newPass, $confirmPass) === 0) {
        if (strlen($newPass) > 0) {
            $oldPass1 = $newPass;
        }
        $sqlInsert = "UPDATE users SET name='" . $name . "',mail='" . $email . "',phone_no='" . $phoneNo . "',billing_info='" . $billing . "',password='" . $oldPass1 . "'WHERE id = " . $_SESSION["userId"];
        if ($conn->query($sqlInsert) === TRUE) {
            // echo "Record updated successfully";
            imageupload($conn);
            header("Location: http://localhost/JobseekerWeb/dashboard.php#dashboard__overview");
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        $isFailed = 1;
    }
    $conn->close();
}
function imageupload($conn)
{
    if (isset($_POST["submit"]) && isset($_FILES["profile_image"]) && $_FILES["profile_image"]["size"] > 0) {
        // echo "<pre>";
        // print_r($_FILES['profile_image']);
        // echo "</pre>";
        // $img_name = $_FILES["profile_image"]["name"];
        // $img_size = $_FILES["profile_image"]["size"];
        $temp_name = $_FILES["profile_image"]["tmp_name"];
        $error = $_FILES["profile_image"]["error"];
        if ($error === 0) {
            $img_file = addslashes(file_get_contents($temp_name));
            $sqlImage = "UPDATE users SET picture = '$img_file' WHERE id = " . $_SESSION["userId"];
            if ($conn->query($sqlImage) === TRUE) {
                header("Location: http://localhost/JobseekerWeb/dashboard.php");
                $conn->close();
            } else {
                echo "Something wrong in uploading image into database";
            }
        } else {
            echo "Error in image";
        }
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <!-- Boxicon CSS  -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <title>Job Seeker</title>
</head>

<body>
    <!-- --------------------main nav------------------ -->

    <?php
    include "nav.php";
    ?>

    <!-- -----------------------main body----------------------------- -->
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <!-- <img src="..." class="rounded me-2" alt="..."> -->
                <strong class="me-auto">Error</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <h3>Incorrect Password</h3>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8 mx-auto">
                <h1 class="account-setting-header">Account Settings</h1>
                <form method="POST" action="" enctype="multipart/form-data">
                    <div class="my-4">
                        <div class="row mt-5 align-items-center">
                            <div class="col-md-3 text-center mb-5">
                                <div class="avatar avatar-xl">
                                    <?php
                                    if (!empty($profile_image)) {
                                        echo '<img src="data:image/jpeg;base64,' . base64_encode($profile_image) . '" alt="..." class="avatar-img rounded-circle"/>';
                                    } else {
                                        echo '<img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="..." class="avatar-img rounded-circle" />';
                                    }
                                    ?>
                                    <input type="file" class="choose-image" name="profile_image" accept="image/x-png,image/gif,image/jpeg" hidden />
                                    <button class="change-picture-btn mt-4">Change Picture</button>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row align-items-center">
                                    <div class="col-md-7">
                                        <h2 class="mb-1 editname"><?php echo $name ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ----------------------Your Info------------------ -->
                        <h2 class="d-flex justify-content-start info-section">Your Info</h2>
                        <div class="edit-profile-horizontal-line mb-1"></div>
                        <div class="form-row row">
                            <div class="my-form-group col-md-6">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" placeholder="Atiqur" value=<?php echo "'" . $name . "'" ?> required />
                            </div>
                            <div class="my-form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" placeholder="brown@asher.me" value=<?php echo $email ?> required />
                            </div>
                        </div>
                        <div class="my-form-group">
                            <div class="form-row row">
                                <div class="my-form-group col-md-6">
                                    <label for="phoneNo">Phone No</label>
                                    <input type="number" id="phoneNo" name="phoneNo" placeholder="0177.........." value=<?php echo $phoneNo ?> />
                                </div>
                                <div class="my-form-group col-md-6">
                                    <label for="billing">Billing info</label>
                                    <input type="number" id="billing" name="billing" placeholder="0177........" value=<?php echo $billing ?> />
                                </div>
                            </div>
                        </div>
                        <!-- ------------------------------Password------------------------------- -->
                        <h2 class="d-flex justify-content-start info-section mt-5">Password</h2>
                        <div class="edit-profile-horizontal-line mb-1"></div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="my-form-group">
                                    <label for="oldPassword">Old Password</label>
                                    <input type="password" id="oldPassword" name="oldPass" required />
                                </div>
                                <div class="my-form-group">
                                    <label for="newPassword">New Password</label>
                                    <input type="password" id="newPassword" name="newPass" />
                                </div>
                                <div class="my-form-group">
                                    <label for="confirmPassword">Confirm Password</label>
                                    <input type="password" id="conformPassword" name="confirmPass" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <p class="mb-2">Password requirements</p>
                                <p class="small text-muted mb-2">To create a new password, you have to meet all of
                                    the
                                    following requirements:</p>
                                <ul class="small text-muted pl-4 mb-0">
                                    <li>Minimum 8 character</li>
                                    <li>At least one special character</li>
                                    <li>At least one number</li>
                                    <li>Can’t be the same as a previous password</li>
                                </ul>
                            </div>
                        </div>
                        <input type="submit" name="submit" class="save-change-btn"></input>
                        <button type="button" class="btn btn btn-outline-danger cancel-button"> <a href="dashboard.php#dashboard__overview">Cancel</a></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript">
        <?php
        if ($isFailed) {
            echo " var toastTrigger = document.getElementById('liveToastBtn');
                var toastLiveExample = document.getElementById('liveToast');
                var toast = new bootstrap.Toast(toastLiveExample);
                toast.show();";
        }
        ?>
    </script>
</body>

</html>