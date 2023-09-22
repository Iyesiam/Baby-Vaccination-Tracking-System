<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: authentication-login.php');
    exit();
}
?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modernize Free</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="./index.html" class="text-nowrap logo-img">
                        <img src="../assets/images/logos/dark-logo.svg" width="180" alt="" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./dashboard_user.php" aria-expanded="false">
                                <span>
                                    <i class="ti ti-layout-dashboard"></i>
                                </span>
                                <span class="hide-menu">Overview</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./register_baby.php" aria-expanded="false">
                                <span>
                                    <i class="ti ti-layout-dashboard"></i>
                                </span>
                                <span class="hide-menu">Baby</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./vaccines.php" aria-expanded="false">
                                <span>
                                    <i class="ti ti-layout-dashboard"></i>
                                </span>
                                <span class="hide-menu">Vaccinated</span>
                            </a>
                        </li>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                                <i class="ti ti-bell-ringing"></i>
                                <div class="notification bg-primary rounded-circle"></div>
                            </a>
                        </li>
                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="../assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                                    <div class="message-body">
                                        <a href="./logout.php" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!--  Header End -->
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4">Update-User</h5>
                        <form method="post" action="update_baby.php">
                            <?php
                            include 'db_connect.php';

                            if (isset($_GET['id'])) {
                                $babyId = $_GET['id'];
                                $query = "SELECT * FROM babies WHERE id = $babyId";
                                $result = $conn->query($query);

                                if ($result->num_rows == 1) {
                                    $row = $result->fetch_assoc();
                            ?>

                                    <div class="row">
                                        <!-- First Section Column -->
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="babyName" class="form-label">Baby Name</label>
                                                <input type="text" class="form-control" id="babyName" name="baby_name" value="<?php echo $row["baby_name"]; ?>">
                                            </div>

                                            <div class="mb-3">
                                                <label for="babyGender" class="form-label">Gender</label>
                                                <select class="form-select" id="babyGender" name="baby_gender">
                                                    <option value="male" <?php if ($row["gender"] == "male") echo "selected"; ?>>Male</option>
                                                    <option value="female" <?php if ($row["gender"] == "female") echo "selected"; ?>>Female</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="babyBirthDate" class="form-label">Birth Date</label>
                                                <input type="date" class="form-control" id="babyBirthDate" name="baby_birth_date" value="<?php echo $row["birth_date"]; ?>">
                                            </div>

                                            <div class="mb-3">
                                                <label for="babyMotherName" class="form-label">Mother's Name</label>
                                                <input type="text" class="form-control" id="babyMotherName" name="baby_mother_name" value="<?php echo $row["mother_name"]; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="babyMotherID" class="form-label">Mother's ID</label>
                                                <input type="number" class="form-control" id="babyMotherID" name="baby_mother_id" value="<?php echo $row["mother_id"]; ?>">
                                            </div>
                                        </div>

                                        <!-- Second Section Column -->
                                        <div class="col-md-6">

                                            <div class="mb-3">
                                                <label for="babyFatherName" class="form-label">Father's Name</label>
                                                <input type="text" class="form-control" id="babyFatherName" name="baby_father_name" value="<?php echo $row["father_name"]; ?>">
                                            </div>

                                            <div class="mb-3">
                                                <label for="babyFatherID" class="form-label">Father's ID</label>
                                                <input type="number" class="form-control" id="babyFatherID" name="baby_father_id" value="<?php echo $row["father_id"]; ?>">
                                            </div>

                                            <div class="mb-3">
                                                <label for="babyHealthInstitution" class="form-label">Health Institution</label>
                                                <input type="text" class="form-control" id="babyHealthInstitution" name="baby_health_institution" value="<?php echo $row["health_institution"]; ?>">
                                            </div>

                                            <div class="mb-3">
                                                <label for="babyDistrict" class="form-label">District</label>
                                                <input type="text" class="form-control" id="babyDistrict" name="baby_district" value="<?php echo $row["district"]; ?>">
                                            </div>

                                            <div class="mb-3">
                                                <label for="babySector" class="form-label">Sector</label>
                                                <input type="text" class="form-control" id="babySector" name="baby_sector" value="<?php echo $row["sector"]; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Hidden Field -->
                                    <input type="hidden" name="baby_id" value="<?php echo $row["id"]; ?>">

                                    <!-- Submit Button -->
                                    <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                <?php
                                } else {
                                    echo '<p>No baby found with this ID.</p>';
                                }
                            } else {
                                echo '<p>Invalid request.</p>';
                            }

                            $conn->close();
                ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/sidebarmenu.js"></script>
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>