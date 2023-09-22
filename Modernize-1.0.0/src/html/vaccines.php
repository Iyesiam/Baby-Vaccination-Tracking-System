<?php
session_start();

if (!isset($_SESSION['username'])) {
  header('Location: authentication-login.php');
  exit();
}
?>
<!-- Your protected content goes here -->
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BabyCare</title>
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
                <span class="hide-menu">Vaccinated</span>
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
            <h5 class="card-title fw-semibold mb-4">Vaccinated</h5>
            <div class="card">
              <div class="card-body">
                <form method="post" action="vaccines_insert_new.php">
                  <div class="mb-3">
                    <!-- Drop down containing baby names -->
                    <label for="baby_name" class="form-label">Baby name</label>
                    <select class="form-control" id="baby_name" name="baby_name">
                      <option value="0">--Choose Baby Name--</option>
                      <?php
                      // Include the database connection code
                      include 'db_connect.php';

                      // Retrieve baby names from babies table
                      $query = "SELECT id, baby_name FROM babies";
                      $result = $conn->query($query);

                      // Loop through the results and populate the dropdown options
                      while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['baby_name'] . '">' . $row['baby_name'] . '</option>';
                      }
                      ?>
                    </select>
                  </div>

                  <div class="mb-3">
                    <!-- Drop down containing vaccine names -->
                    <label for="vaccine_name" class="form-label">Vaccine name</label>
                    <select class="form-control" id="vaccine_name" name="vaccine_name">
                      <option value="0">--Choose Vaccine Name--</option>
                      <?php
                      // Include the database connection code
                      include 'db_connect.php';

                      // Retrieve vaccine names from vaccine_names table
                      $query = "SELECT id, name FROM vaccine_names";
                      $result = $conn->query($query);

                      // Loop through the results and populate the dropdown options
                      while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
                      }
                      ?>
                    </select>
                  </div>
                  <div class="mb-3">
                    <!-- Drop down containing duration -->
                    <label for="duration" class="form-label">Duration</label>
                    <select class="form-control" id="duration" name="duration">
                      <option value="0">--Choose Duration--</option>
                      <?php
                      // Include the database connection code
                      include 'db_connect.php';

                      // Retrieve duration options from durations table
                      $query = "SELECT id, name FROM durations";
                      $result = $conn->query($query);

                      // Loop through the results and populate the dropdown options
                      while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
                      }
                      ?>
                    </select>
                  </div>


                  <div class="mb-3">
                    <label for="dateadministered" class="form-label">Date administered</label>
                    <input type="date" class="form-control" id="dateadministered" name="date_administered" value="<?php echo date('Y-m-d'); ?>" readonly>
                  </div>


                  <div class="mb-3">
                    <label for="nurse_name" class="form-label">Nurse name</label>
                    <input type="text" class="form-control" id="nurse_name" name="nurse_name">
                  </div>
                  <div class="mb-3">
                    <label for="healthins" class="form-label">Health Institution</label>
                    <input type="text" class="form-control" id="healthins" name="health_institution">
                  </div>
                  <div class="mb-3">
                    <label for="Description" class="form-label">Description</label>
                    <textarea class="form-control" id="Description" name="description"></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>

              </div>

            </div>


            <div class="card w-100">
              <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">vaccines Registered</h5>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="search-button" id="vaccines-new-search-input">
                  <button class="btn btn-outline-primary" type="button" id="search-button">Search</button>
                </div>
                <div class="table-responsive">
                  <!-- Display the table -->
                  <!-- Display the table -->
                  <table id="vaccines-new-table" class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Id</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Baby Name</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Vaccine Name</h6>
                        </th>

                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Date Administered</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Doctor's Name</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Location</h6>
                        </th>
                        <!--<th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Batch Number</h6>
            </th>-->
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Description</h6>
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

                      // Retrieve data from the "vaccines_new" table
                      $query = "SELECT * FROM vaccines_new";
                      $result = $conn->query($query);

                      // Check if there are any vaccine records
                      if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                          echo '<tr>';
                          echo '<td>' . $row["id"] . '</td>';
                          echo '<td>' . $row["baby_name"] . '</td>';
                          echo '<td>' . $row["vaccine_name"] . '</td>';
                          echo '<td>' . $row["date_administered"] . '</td>';
                          echo '<td>' . $row["nurse_name"] . '</td>';
                          echo '<td>' . $row["health_institution"] . '</td>';
                          //echo '<td>' . $row["batch_number"] . '</td>';
                          echo '<td>' . $row["description"] . '</td>';
                          echo '<td>';
                          echo '<a href="edit_vaccine.php?id=' . $row["id"] . '" class="btn btn-primary btn-sm">Edit</a>';
                          echo ' ';
                          echo '<a href="delete_vaccine.php?id=' . $row["id"] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure you want to delete this record?\')">Delete</a>';
                          echo '</td>';
                          echo '</tr>';
                        }
                      } else {
                        echo '<tr><td colspan="7">No vaccine records found.</td></tr>';
                      }

                      // Close the database connection
                      $conn->close();
                      ?>
                      <script>
    document.addEventListener("DOMContentLoaded", function () {
        // Get references to the input field and vaccines_new table
        const vaccinesNewSearchInput = document.getElementById("vaccines-new-search-input");
        const vaccinesNewTable = document.getElementById("vaccines-new-table");
        const vaccinesNewRows = vaccinesNewTable.querySelectorAll("tbody tr");

        // Add an event listener to the search input
        vaccinesNewSearchInput.addEventListener("input", function () {
            const searchTerm = vaccinesNewSearchInput.value.toLowerCase();

            // Loop through the vaccines_new table rows and hide/show them based on the search term
            vaccinesNewRows.forEach(function (row) {
                const vaccinesNewCells = row.querySelectorAll("td");
                let found = false;

                // Check each cell in the row for a match
                vaccinesNewCells.forEach(function (cell) {
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