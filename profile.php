<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Job Seeker</title>
</head>

<body>
    <!-- --------------------main nav------------------ -->
    <nav class="navbar navbar-expand-lg navbar-dark common-nav__bg">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html">
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
                    <li class="nav-item active">
                        <a class="nav-link" href="about.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="team.php">Meet the Team</a>
                    </li>
                    <div class="horizontal-border nav-item"></div>
                    <li class="nav-item sign-in">
                        <a class="nav-link custom-link" href="signin.php"><i class="fas fa-lock"></i>Sign in</a>
                    </li>
                    <li class="nav-item sign-up">
                        <a class="nav-link custom-link sign-up" href="signup.php">Sign up<i class="fas fa-user"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- -----------------------main body----------------------------- -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8 mx-auto">
                <h1 class="account-setting-header">Account Settings</h1>
                <div class="my-4">
                    <div class="row mt-5 align-items-center">
                        <div class="col-md-3 text-center mb-5">
                            <div class="avatar avatar-xl">
                                <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="..." class="avatar-img rounded-circle" />
                            </div>
                            <input type="file" class="choose-image" accept="image/x-png,image/gif,image/jpeg" hidden>
                            <button class="change-picture-btn mt-4">Change Picture</button>
                        </div>
                        <div class="col">
                            <div class="row align-items-center">
                                <div class="col-md-7">
                                    <h2 class="mb-1">Atiqur Rahman</h2>
                                    <p class="small mb-3"><span class="badge badge-dark">New York, USA</span></p>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-7">
                                    <p class="text-muted">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit nisl
                                        ullamcorper, rutrum metus in, congue lectus. In hac habitasse platea
                                        dictumst. Cras urna quam, malesuada vitae risus at,
                                        pretium blandit sapien.
                                    </p>
                                </div>
                                <div class="col">
                                    <p class="small mb-0 text-muted">Nec Urna Suscipit Ltd</p>
                                    <p class="small mb-0 text-muted">P.O. Box 464, 5975 Eget Avenue</p>
                                    <p class="small mb-0 text-muted">(537) 315-1481</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form>
                        <!-- ----------------------Your Info------------------ -->
                        <h2 class="d-flex justify-content-start info-section">Your Info</h2>
                        <div class="edit-profile-horizontal-line mb-1"></div>
                        <div class="form-row row">
                            <div class="my-form-group col-md-6">
                                <label for="firstname">Firstname</label>
                                <input type="text" id="firstname" placeholder="Atiqur" />
                            </div>
                            <div class="my-form-group col-md-6">
                                <label for="lastname">Lastname</label>
                                <input type="text" id="lastname" placeholder="Rahman" />
                            </div>
                        </div>
                        <div class="my-form-group">
                            <label for="inputEmail4">Email</label>
                            <input type="email" id="inputEmail4" placeholder="brown@asher.me" />
                        </div>
                        <div class="my-form-group">
                            <label for="inputAddress5">Address</label>
                            <input type="text" id="inputAddress5" placeholder="Mirpur-1, Dhaka" />
                        </div>
                        <div class="form-row row">
                            <div class="my-form-group col-md-6">
                                <label for="inputCompany5">Company</label>
                                <input type="text" id="inputCompany5" placeholder="Jobseeker" />
                            </div>
                            <div class="my-form-group col-md-4">
                                <label for="inputState5">State</label>
                                <input type="text" id="inputState5" placeholder="Dhaka" />
                            </div>
                            <div class="my-form-group col-md-2">
                                <label for="inputZip5">Zip</label>
                                <input type="text" id="inputZip5" placeholder="98232" />
                            </div>
                        </div>
                        <!-- -----------------------------Skills---------------------------- -->
                        <h2 class="d-flex justify-content-start info-section mt-5">Skills</h2>
                        <div class="edit-profile-horizontal-line mb-1"></div>
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <div class="my-form-group skill-input-form">
                                    <label for="Skills">Enter Your Skills</label>
                                    <div>
                                        <input type="Text" id="Skills" placeholder="C++, Java, Logo design" />
                                        <button type="button" class="skill-add-btn">Add</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="chip-container">
                                    <div class="chip">
                                        <div class="chip-content">C++</div>
                                        <div class="chip-close">
                                            <svg class="chip-svg" focusable="false" viewBox="0 0 24 24" aria-hidden="true">
                                                <path d="M12 2C6.47 2 2 6.47 2 12s4.47 10 10 10 10-4.47 10-10S17.53 2 12 2zm5 13.59L15.59 17 12 13.41 8.41 17 7 15.59 10.59 12 7 8.41 8.41 7 12 10.59 15.59 7 17 8.41 13.41 12 17 15.59z">
                                                </path>
                                            </svg>

                                        </div>
                                    </div>
                                    <div class="chip">
                                        <div class="chip-content">Java</div>
                                        <div class="chip-close">
                                            <svg class="chip-svg" focusable="false" viewBox="0 0 24 24" aria-hidden="true">
                                                <path d="M12 2C6.47 2 2 6.47 2 12s4.47 10 10 10 10-4.47 10-10S17.53 2 12 2zm5 13.59L15.59 17 12 13.41 8.41 17 7 15.59 10.59 12 7 8.41 8.41 7 12 10.59 15.59 7 17 8.41 13.41 12 17 15.59z">
                                                </path>
                                            </svg>

                                        </div>
                                    </div>
                                    <div class="chip">
                                        <div class="chip-content">Python</div>
                                        <div class="chip-close">
                                            <svg class="chip-svg" focusable="false" viewBox="0 0 24 24" aria-hidden="true">
                                                <path d="M12 2C6.47 2 2 6.47 2 12s4.47 10 10 10 10-4.47 10-10S17.53 2 12 2zm5 13.59L15.59 17 12 13.41 8.41 17 7 15.59 10.59 12 7 8.41 8.41 7 12 10.59 15.59 7 17 8.41 13.41 12 17 15.59z">
                                                </path>
                                            </svg>

                                        </div>
                                    </div>
                                    <div class="chip">
                                        <div class="chip-content">Javascript</div>
                                        <div class="chip-close">
                                            <svg class="chip-svg" focusable="false" viewBox="0 0 24 24" aria-hidden="true">
                                                <path d="M12 2C6.47 2 2 6.47 2 12s4.47 10 10 10 10-4.47 10-10S17.53 2 12 2zm5 13.59L15.59 17 12 13.41 8.41 17 7 15.59 10.59 12 7 8.41 8.41 7 12 10.59 15.59 7 17 8.41 13.41 12 17 15.59z">
                                                </path>
                                            </svg>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ------------------------------Password------------------------------- -->
                        <h2 class="d-flex justify-content-start info-section mt-5">Password</h2>
                        <div class="edit-profile-horizontal-line mb-1"></div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="my-form-group">
                                    <label for="Old-Password">Old Password</label>
                                    <input type="password" id="Old-Password" />
                                </div>
                                <div class="my-form-group">
                                    <label for="New-Password">New Password</label>
                                    <input type="password" id="New-Password" />
                                </div>
                                <div class="my-form-group">
                                    <label for="Confirm-Password">Confirm Password</label>
                                    <input type="password" id="Conform-Password" />
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
                        <button class="save-change-btn">Save Change</button>
                        <button type="button" class="btn btn btn-outline-danger cancel-button"> <a href="./index.html">Cancel</a></button>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
        <script src="js/script.js"></script>
</body>

</html>