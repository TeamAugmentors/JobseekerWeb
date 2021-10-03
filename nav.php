<nav class="navbar navbar-expand-lg navbar-dark common-nav__bg">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <div class="d-flex">
                <img src="images/tie2.png" height="auto" width="auto">
                <div class=" d-flex flex-column justify-content-center">
                    <h1 class="header-logo job">
                        JOB
                    </h1>
                    <h1 class="header-logo seeker">
                        seeker
                    </h1>
                </div>
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse navbar-margin-top" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item <?php if (strcmp($active, "about") === 0) {
                                        echo "active";
                                    } ?>">
                    <a class="nav-link" href="about.php">About Us</a>
                </li>
                <li class="nav-item <?php if (strcmp($active, "team") === 0) {
                                        echo "active";
                                    } ?>">
                    <a class="nav-link" href="team.php">Meet the Team</a>
                </li>
                <div class="horizontal-border nav-item"></div>
                <?php
                if ($isLoggedIn === 1) {
                    if (strcmp($active, "explore") === 0) {
                        echo '<li class="nav-item active">
                        <a class="nav-link" href="explore.php">Explore</a>
                        </li>';
                    } else {
                        echo '<li class="nav-item">
                        <a class="nav-link" href="explore.php">Explore</a>
                        </li>';
                    }
                    echo '<li class="nav-item">
                            <a class="nav-link" href="dashboard.php#dashboard__overview">Dashboard</a>
                            </li>';
                    echo '<li class="nav-item sign-up">
                        <a class="nav-link custom-link sign-up" href="logout.php">Log out<i class="fas fa-user"></i></a>
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