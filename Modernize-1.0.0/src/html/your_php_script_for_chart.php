<?php
// Include the database connection code
include 'db_connect.php';

// SQL query to count babies with complete and incomplete vaccinations
$query = "SELECT
            SUM(CASE WHEN administered_vaccines >= 6 THEN 1 ELSE 0 END) AS complete_vaccinations,
            SUM(CASE WHEN administered_vaccines < 6 THEN 1 ELSE 0 END) AS incomplete_vaccinations
          FROM
            (SELECT
               v.baby_name,
               COUNT(DISTINCT v.vaccine_name) AS administered_vaccines
             FROM
               vaccines_new v
             GROUP BY
               v.baby_name) AS subquery";

$result = $conn->query($query);

$chartData = array();

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $chartData['complete_vaccinations'] = intval($row['complete_vaccinations']);
  $chartData['incomplete_vaccinations'] = intval($row['incomplete_vaccinations']);
}

// Close the database connection
$conn->close();

// Encode the data as JSON and send it as the response
header('Content-Type: application/json');
echo json_encode($chartData);
?>
