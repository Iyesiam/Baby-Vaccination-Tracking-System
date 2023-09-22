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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js">
  </script>
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
            <div class="row">
              <div class="col-lg-8 d-flex align-items-strech">
                <div class="card w-100">
                  <div class="card-body">
                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                      <div class="mb-3 mb-sm-0">
                        <h5 class="card-title fw-semibold">Vaccines Overview</h5>
                      </div>
                    </div>
                    <div id="chart2"></div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="row">
                  <div class="col-lg-12">
                    <!-- Yearly  NewBorn Babies -->
                    <div class="card overflow-hidden">
                      <div class="card-body p-4">
                        <h5 class="card-title mb-9 fw-semibold">Yearly NewBorn Babies</h5>
                        <div class="row align-items-center">
                          <div class="col-8">
                            <h4 class="fw-semibold mb-3">
                              <h4 class="fw-semibold mb-3">
                                <?php
                                $conn = new mysqli("localhost", "root", "", "monit_baby");
                                if ($conn->connect_error) {
                                  die("Connection failed: " . $conn->connect_error);
                                }

                                // Get the current year
                                $currentYear = date("Y");

                                $sql = "SELECT COUNT(*) AS total_babies 
            FROM babies 
            WHERE YEAR(birth_date) = $currentYear";

                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                  // Fetch the total number of babies born this year
                                  $row = $result->fetch_assoc();
                                  echo $row["total_babies"];
                                } else {
                                  echo "0";
                                }

                                $conn->close();
                                ?>
                              </h4>

                            </h4>

                            <div class="d-flex align-items-center mb-3">
                            </div>
                            <div class="d-flex align-items-center">
                              <div class="me-4">
                                <span class="round-8 bg-primary rounded-circle me-2 d-inline-block"></span>
                                <span class="fs-2">2023</span>
                              </div>
                              <div>
                                <span class="round-8 bg-light-primary rounded-circle me-2 d-inline-block"></span>
                                <span class="fs-2">2024</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-4">
                            <div class="d-flex justify-content-center">
                              <div id="breakup"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <!-- Monthly  NewBorn Babies -->
                    <div class="card">
                      <div class="card-body">
                        <div class="row alig n-items-start">
                          <div class="col-8">
                            <h5 class="card-title mb-9 fw-semibold"> Monthly NewBorn Babies </h5>
                            <?php
                            $conn = new mysqli("localhost", "root", "", "monit_baby");
                            if ($conn->connect_error) {
                              die("Connection failed: " . $conn->connect_error);
                            }

                            $currentMonth = date('m');
                            $sql = "SELECT COUNT(*) AS total_babies FROM babies WHERE MONTH(birth_date) = $currentMonth";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                              $row = $result->fetch_assoc();
                              $babiesBornThisMonth = $row["total_babies"];
                            } else {
                              $babiesBornThisMonth = 0;
                            }

                            $conn->close();
                            ?>

                            <h4 class="fw-normal mb-2">
                              <?php echo $babiesBornThisMonth; ?>
                            </h4>

                            </h4>


                          </div>
                          <div class="col-4">
                            <div class="d-flex justify-content-end">

                            </div>
                          </div>
                        </div>
                      </div>
                      <div id="earning"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4 d-flex align-items-stretch">
                <div class="card w-100">
                  <div class="card-body p-4">
                    <div class="mb-4">
                      <h5 class="card-title fw-semibold">Vaccinations Schedule</h5>
                    </div>
                    <div style="max-height: 300px; overflow-y: auto;">
                      <ul class="timeline-widget mb-4 position-relative mb-n5">
                        <?php
                        // Include the database connection code
                        include 'db_connect.php';

                        // Modify the SQL query as suggested
                        $query = "SELECT vn.id AS vaccine_id, vn.name AS vaccine_name, d.id AS duration_id, d.name AS duration_name
          FROM vaccine_names vn
          JOIN durations d ON vn.id = d.id";

                        $result = $conn->query($query);

                        if ($result) {
                          if ($result->num_rows > 0) {
                            echo '<ul class="timeline-widget mb-4 position-relative mb-n5">';
                            while ($row = $result->fetch_assoc()) {
                              echo '<li class="timeline-item d-flex position-relative overflow-hidden">';
                              echo '<div class="timeline-time text-dark flex-shrink-0 text-end">' . $row["vaccine_name"] . '</div>';
                              echo '<div class="timeline-badge-wrap d-flex flex-column align-items-center">';
                              echo '<span class="timeline-badge border-2 border border-primary flex-shrink-0 my-8"></span>';
                              echo '<span class="timeline-badge-border d-block flex-shrink-0"></span>';
                              echo '</div>';
                              echo '<div class="timeline-desc fs-3 text-dark mt-n1">' . $row["duration_name"] . '</div>';
                              echo '</li>';
                            }
                            echo '</ul>';
                          } else {
                            echo 'No data available.';
                          }
                        } else {
                          echo 'Error: ' . $conn->error;
                        }

                        // Close the database connection
                        $conn->close();
                        ?>

                      </ul>





                    </div>
                  </div>



                </div>
              </div>
              <div class="col-lg-8 d-flex align-items-stretch">
                <div class="card w-100">
                  <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">Report On Vaccinations</h5>
                    <div class="mb-3">
                      <input type="text" id="searchInput" class="form-control" placeholder="Search by Baby Name">
                    </div>

                    <div class="table-responsive">
                      <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                          <tr>
                            <th class="border-bottom-0">
                              <h6 class="fw-semibold mb-0">Baby Name</h6>
                            </th>
                            <th class="border-bottom-0">
                              <h6 class="fw-semibold mb-0">Baby ID</h6>
                            </th>
                            <th class="border-bottom-0">
                              <h6 class="fw-semibold mb-0">Administered Vaccines</h6>
                            </th>
                          </tr>
                        </thead>
                        <tbody id="table-data">

                          <script>
                            // Function to fetch data from the server and populate the table
                            function fetchDataAndPopulateTable() {
                              // Make an AJAX request to your server using fetch or another AJAX library
                              fetch('your_php_script.php') // Replace 'your_php_script.php' with the actual URL to your PHP script
                                .then(response => response.json()) // Assuming the response is in JSON format
                                .then(data => {
                                  const tableBody = document.getElementById('table-data');

                                  // Clear existing table rows
                                  tableBody.innerHTML = '';

                                  // Loop through the data and create table rows
                                  data.forEach(item => {
                                    const row = document.createElement('tr');
                                    row.innerHTML = `
            <td>${item.baby_name}</td>
            <td>${item.administered_vaccines}</td>
            <td><span class="badge ${item.vaccination_status === 'Complete' ? 'bg-success' : 'bg-danger'} rounded-3 fw-semibold">${item.vaccination_status}</span></td>
          `;

                                    // Conditionally add the "View Certificate" button for completed vaccinations
                                  /*  if (item.vaccination_status === 'Complete') {
                                      const certificateCell = document.createElement('td');
                                      const certificateButton = document.createElement('button');
                                      certificateButton.className = 'btn btn-primary';
                                      certificateButton.textContent = 'View Certificate';
                                      certificateButton.addEventListener('click', generateCertificate);
                                      certificateCell.appendChild(certificateButton);
                                      row.appendChild(certificateCell);
                                    }*/

                                    tableBody.appendChild(row);
                                  });
                                })
                                .catch(error => {
                                  console.error('Error fetching data:', error);
                                });
                            }

                            // Call the fetchDataAndPopulateTable function to populate the table when the page loads
                            fetchDataAndPopulateTable();

                            // Function to generate a certificate (you can call this when the button is clicked)

                           // Attach the viewCertificate function to the "View Certificate" button
                           function generateCertificate() {
                              var babyName = 'x'; // Replace with the baby's name from the table
                              viewCertificate(babyName);
                            }

                            // Function to generate and view the certificate
                            

                          </script>


                          <script>
                            function filterTable() {
                              // Declare variables
                              var input, filter, table, tr, td, i, txtValue;
                              input = document.getElementById("searchInput");
                              filter = input.value.toUpperCase();
                              table = document.getElementById("table-data");
                              tr = table.getElementsByTagName("tr");

                              // Loop through all table rows, and hide those that don't match the search query
                              for (i = 0; i < tr.length; i++) {
                                td = tr[i].getElementsByTagName("td")[0]; // Change the index to the column you want to search (0 is for Baby Name)
                                if (td) {
                                  txtValue = td.textContent || td.innerText;
                                  if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                    tr[i].style.display = "";
                                  } else {
                                    tr[i].style.display = "none";
                                  }
                                }
                              }
                            }

                            // Attach the filterTable function to the input field's onchange event
                            document.getElementById("searchInput").addEventListener("input", filterTable);

                            // Function to generate a certificate (you can call this when the button is clicked)
                            function viewCertificate(babyName) {
                              // Send an AJAX request to the PHP script to generate the certificate
                              fetch('generate_certificate.php?generate_certificate=true&baby_name=' + babyName)
                                .then(response => response.blob())
                                .then(blob => {
                                  // Create a URL for the blob (PDF) and open it in a new tab for viewing
                                  var url = window.URL.createObjectURL(blob);
                                  var newTab = window.open(url, '_blank');
                                  newTab.focus();
                                })
                                .catch(error => {
                                  console.error('Error generating certificate:', error);
                                });
                            }

                            
                          </script>

                        </tbody>
                      </table>



                      <style>
                        table {
                          overflow-y: auto;
                        }

                        tbody {
                          overflow-x: auto;
                        }
                      </style>


                    </div>

                  </div>




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
  <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script>
    // Function to fetch data for the chart and create the chart
    function fetchChartDataAndCreateChart() {
      fetch('your_php_script_for_chart.php') // Replace with the actual URL to your PHP script
        .then(response => response.json())
        .then(data => {
          // Create the chart using ApexCharts
          var options = {
            chart: {
              type: 'bar',
              height: 350,
            },
            plotOptions: {
              bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded',
              },
            },
            dataLabels: {
              enabled: false,
            },
            series: [{
                name: 'Complete Vaccinations',
                data: [data.complete_vaccinations],
              },
              {
                name: 'Incomplete Vaccinations',
                data: [data.incomplete_vaccinations],
              },
            ],
            xaxis: {
              categories: ['Vaccination Status'],
            },
            fill: {
              opacity: 1,
            },
            tooltip: {
              y: {
                formatter: function(val) {
                  return val + ' babies';
                },
              },
            },
          };

          var chart2 = new ApexCharts(document.querySelector('#chart2'), options);
          chart2.render();
        })
        .catch(error => {
          console.error('Error fetching chart data:', error);
        });
    }

    // Call the fetchChartDataAndCreateChart function to create the chart when the page loads
    fetchChartDataAndCreateChart();
  </script>

  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="../assets/js/dashboard.js"></script>
</body>

</html>