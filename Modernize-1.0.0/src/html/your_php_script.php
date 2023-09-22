<?php
// Include the database connection code
include 'db_connect.php';

// SQL query to count administered vaccines for each baby
$countQuery = "SELECT
    v.baby_name,
    COUNT(DISTINCT v.vaccine_name) AS administered_vaccines
FROM
    vaccines_new v
GROUP BY
    v.baby_name";

$result = $conn->query($countQuery);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Calculate the vaccination status based on the number of administered vaccines
        $administeredVaccines = intval($row["administered_vaccines"]);
        $vaccinationStatus = ($administeredVaccines >= 6) ? 'Complete' : 'Incomplete';

        // Set the badge color based on vaccination status
        $badgeColor = ($vaccinationStatus == 'Complete') ? 'bg-success' : 'bg-danger';

        $data[] = array(
            'baby_name' => $row["baby_name"],
            'administered_vaccines' => $row["administered_vaccines"],
            'vaccination_status' => $vaccinationStatus,
            'badge_color' => $badgeColor
        );
    }
}

// Close the database connection
$conn->close();

// Encode the data as JSON and send it as the response
header('Content-Type: application/json');
echo json_encode($data);
?>
