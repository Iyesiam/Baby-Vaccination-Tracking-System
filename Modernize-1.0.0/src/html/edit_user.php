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
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./admin_dash.php" aria-expanded="false">
                                <span>
                                    <i class="ti ti-layout-dashboard"></i>
                                </span>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./authentication-register.php" aria-expanded="false">
                                <span>
                                    <i class="ti ti-user-plus"></i>
                                </span>
                                <span class="hide-menu">Register</span>
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
                        <form method="post" action="update_user.php">
                            <?php
                            include 'db_connect.php';

                            if (isset($_GET['id'])) {
                                $userId = $_GET['id'];
                                $query = "SELECT * FROM users WHERE user_id = $userId";
                                $result = $conn->query($query);

                                if ($result->num_rows == 1) {
                                    $row = $result->fetch_assoc();
                                    // Display the user data in the form fields
                                    echo '<div class="mb-3">';
                                    echo '<label for="userName" class="form-label">Name</label>';
                                    echo '<input type="text" class="form-control" id="userName" name="name" value="' . $row["name"] . '">';
                                    echo '</div>';

                                    echo '<div class="mb-3">';
                                    echo '<label for="userRole" class="form-label">Role</label>';
                                    echo '<input type="text" class="form-control" id="userRole" name="role" value="' . $row["role"] . '">';
                                    echo '</div>';

                                    echo '<div class="mb-3">';
                                    echo '<label for="userEmail" class="form-label">Email</label>';
                                    echo '<input type="email" class="form-control" id="userEmail" name="email" value="' . $row["email"] . '">';
                                    echo '</div>';

                                    echo '<div class="mb-3">';
                                    echo '<label for="userPassword" class="form-label">Password</label>';
                                    echo '<input type="password" class="form-control" id="userPassword" name="password" value="' . $row["password"] . '">';
                                    echo '</div>';

                                    // Include the user_id in a hidden input field to identify the user being edited
                                    echo '<input type="hidden" name="user_id" value="' . $row["user_id"] . '">';

                                    echo '<button type="submit" class="btn btn-primary">Update</button>';
                                } else {
                                    echo '<p>No user found with this ID.</p>';
                                }
                            } else {
                                echo '<p>Invalid request.</p>';
                            }

                            $conn->close();
                            ?>
                        </form>
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