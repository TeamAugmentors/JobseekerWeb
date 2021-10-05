<style>
    .navbar-brand {
        font-size: 40px !important;
        padding: 0 8px !important;
    }
</style>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark common-nav__bg sticky-top ">
    <div class="container-fluid">

        <a class="navbar-brand" href="#">
            JS
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse navbar-margin-top" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item <?php if (strcmp($active, "home") === 0) {
                                        echo "active";
                                    } ?>">
                    <a class="nav-link" aria-current="page" href="index.php" <?php if (strcmp($active, "home") === 0) {
                                                                                    echo 'style="color:white"';
                                                                                } ?>>Home</a>
                </li>
                <li class="nav-item <?php if (strcmp($active, "about") === 0) {
                                        echo "active";
                                    } ?>">
                    <a class="nav-link" href="about.php" <?php if (strcmp($active, "about") === 0) {
                                                                echo 'style="color:white"';
                                                            } ?>>About Us</a>
                </li>
                <li class="nav-item <?php if (strcmp($active, "contactUs") === 0) {
                                        echo "active";
                                    } ?>">
                    <a class="nav-link" href="contactus.php" <?php if (strcmp($active, "contactUs") === 0) {
                                                            echo 'style="color:white"';
                                                        } ?>>Contact Us</a>
                </li>

                <li class="nav-item <?php if (strcmp($active, "team") === 0) {
                                        echo "active";
                                    } ?>">
                    <a class="nav-link" href="team.php" <?php if (strcmp($active, "team") === 0) {
                                                            echo 'style="color:white"';
                                                        } ?>>Meet the Team</a>
                </li>
                <div class="horizontal-border nav-item"></div>
                <?php
                if ($isLoggedIn === 1) {
                    if (strcmp($active, "explore") === 0) {
                        echo '<li class="nav-item active">
                        <a class="nav-link" href="explore.php" style="color:white">Explore</a>
                        </li>';
                    } else {
                        echo '<li class="nav-item">
                        <a class="nav-link" href="explore.php">Explore</a>
                        </li>';
                    }
                    if (strcmp($active, "dashboard") === 0) {
                        echo '<li class="nav-item active">
                    <a class="nav-link" href="profile.php">Edit profile</a>
                    </li>';
                    } else {
                        echo '<li class="nav-item">
                    <a class="nav-link" href="dashboard.php#dashboard__overview">Dashboard</a>
                    </li>';
                    }

                    echo '<li class="nav-item sign-up">
                        <a class="nav-link custom-link sign-up" href="logout.php"> <i class="bx bx-log-out"></i> Log out</a>
                        </li>';
                } else {
                    echo '<li class="nav-item sign-in">
                        <a class="nav-link custom-link" href="signin.php"><i class="fas fa-lock"></i>Sign in</a>
                        </li>
                        <li class="nav-item sign-up">
                            <a class="nav-link custom-link sign-up" href="signup.php">Sign up<i class="fas fa-user"></i></a>
                        </li>';
                }
                ?>
            </ul>
        </div>
    </div>
</nav>