<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <title>Sign-in</title>
</head>

<body>
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
                        <input type="email" class="custom-input" id="username" aria-describedby="emailHelp"
                            placeholder="ani.atikur99@gmail.com" required>
                        <div class="line"></div>
                    </div>
                    <div class="custom-form-group">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" class="custom-input" id="password" aria-describedby="passwordHelp"
                            required>
                        <div class="line"></div>
                    </div>
                    <button type="submit" class="form-custom-button">Sign in</button>
                </form>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
            crossorigin="anonymous"></script>

        <script type="text/javascript" src="js/script.js"></script>
</body>

</html>