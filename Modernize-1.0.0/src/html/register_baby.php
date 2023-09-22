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
          <a href="./index.php" class="text-nowrap logo-img">
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
                <span class="hide-menu">Vaccines</span>
              </a>
            </li>
          </ul>
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
            <h5 class="card-title fw-semibold mb-4">Baby Registration</h5>
            <div class="card">
              <div class="card-body">
                <form method="post" action="insert_bby_info.php">
                  <div class="mb-3">
                    <label for="exampleInputBabyname" class="form-label">Baby name</label>
                    <input type="text" class="form-control" id="exampleInputBabyname" name="baby_name" aria-describedby="exampleInputBabyname">
                  </div>
                  <div class="mb-3">
                    <label for="gender" class="form-label">Gender</label><br>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                      <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                      <label class="form-check-label" for="female">Female</label>
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="dateofbirth" class="form-label">Birth Date</label>
                    <input type="date" class="form-control" id="dateofbirth" name="birth_date" aria-describedby="dateofbirth" value="<?php echo date('Y-m-d'); ?>" readonly>
                  </div>

                  <div class="mb-3">
                    <label for="Mother's name" class="form-label">Mother's Name</label>
                    <input type="text" class="form-control" id="mother's name" name="mother_name" aria-describedby="exampleInputmother'sname">
                  </div>
                  <div class="mb-3">
                    <label for="Mother's name" class="form-label">Mother's ID</label>
                    <input type="number" class="form-control" id="mother'sID" name="motherID" aria-describedby="exampleInputmotherID">
                  </div>
                  <div class="mb-3">
                    <label for="Father's name" class="form-label">Father's Name</label>
                    <input type="text" class="form-control" id="father's name" name="father_name" aria-describedby="exampleInputfather'sname">
                  </div>
                  <div class="mb-3">
                    <label for="fatherID" class="form-label">Father's ID</label>
                    <input type="number" class="form-control" id="fatherID" name="fatherID" aria-describedby="exampleInputfatherID">
                  </div>
                  <div class="mb-3">
                    <label for="healthins" class="form-label">Health Institution</label>
                    <input type="text" class="form-control" id="healthins" name="healthins" aria-describedby="exampleInputhealthins">
                  </div>
                  <div class="mb-3">
                    <label for="District" class="form-label">District</label>
                    <input type="text" class="form-control" id="healthins" name="district" aria-describedby="district">
                  </div>
                  <div class="mb-3">
                    <label for="sector" class="form-label">Sector</label>
                    <input type="text" class="form-control" id="sector" name="sector" aria-describedby="exampleInputsector">
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>



              </div>

            </div>


            <div class="card w-100">
              <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Babies Registered</h5>
                <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="search-button" id="search-input">

                  <button class="btn btn-outline-primary" type="button" id="search-button">Search</button>
                </div>

                <div class="table-responsive">
                  <!-- Display the table -->
                  <table id="baby-table" class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Id</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Baby Name</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Gender</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Birth Date</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Mother's Name</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Father's Name</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Mother's ID</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Father's ID</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Health Institution</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">District</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Sector</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Actions</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      // Include the database connection code
                      include 'db_connect.php';

                      // Retrieve data from the "babies" table
                      $query = "SELECT * FROM babies";
                      $result = $conn->query($query);

                      // Check if there are any baby records
                      if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                          echo '<tr>';
                          echo '<td>' . $row["id"] . '</td>';
                          echo '<td>' . $row["baby_name"] . '</td>';
                          echo '<td>' . $row["gender"] . '</td>';
                          echo '<td>' . $row["birth_date"] . '</td>';
                          echo '<td>' . $row["mother_name"] . '</td>';
                          echo '<td>' . $row["father_name"] . '</td>';
                          echo '<td>' . $row["mother_id"] . '</td>';
                          echo '<td>' . $row["father_id"] . '</td>';
                          echo '<td>' . $row["health_institution"] . '</td>';
                          echo '<td>' . $row["district"] . '</td>';
                          echo '<td>' . $row["sector"] . '</td>';

                          // Add the "Actions" column with edit and delete buttons
                          echo '<td>';
                          echo '<a href="edit_baby.php?id=' . $row["id"] . '" class="btn btn-primary btn-sm">Edit</a>';
                          echo ' ';
                          echo '<a href="delete_baby.php?id=' . $row["id"] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure you want to delete this record?\')">Delete</a>';
                          echo '</td>';

                          echo '</tr>';
                        }
                      } else {
                        echo '<tr><td colspan="12">No baby records found.</td></tr>';
                      }

                      // Close the database connection
                      $conn->close();
                      ?>
                      <script>
    document.addEventListener("DOMContentLoaded", function () {
        // Get references to the input field and table
        const searchInput = document.getElementById("search-input");
        const babyTable = document.getElementById("baby-table");
        const rows = babyTable.querySelectorAll("tbody tr");

        // Add an event listener to the search input
        searchInput.addEventListener("input", function () {
            const searchTerm = searchInput.value.toLowerCase();

            // Loop through the table rows and hide/show them based on the search term
            rows.forEach(function (row) {
                const cells = row.querySelectorAll("td");
                let found = false;

                // Check each cell in the row for a match
                cells.forEach(function (cell) {
                    const cellText = cell.textContent.toLowerCase();

                    if (cellText.includes(searchTerm)) {
                        found = true;
                    }
                });

                // Toggle the row's visibility based on the search result
                if (found) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });
    });
</script>

                    </tbody>
                  </table>


                </div>
              </div>
            </div>
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