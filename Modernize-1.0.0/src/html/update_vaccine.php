<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include the database connection code
    include 'db_connect.php';

    // Retrieve form data
    $vaccineId = $_POST["vaccine_id"];
    $vaccineName = $_POST["vaccine_name"];
    $dateAdministered = $_POST["date_administered"];
    $nurseName = $_POST["nurse_name"];
    $healthInstitution = $_POST["health_institution"];
    $description = $_POST["description"];

    // Update query
    $updateQuery = "UPDATE vaccines_new SET
                    vaccine_name = '$vaccineName',
                    date_administered = '$dateAdministered',
                    nurse_name = '$nurseName',
                    health_institution = '$healthInstitution',
                    description = '$description'
                    WHERE id = $vaccineId";

    if ($conn->query($updateQuery) === TRUE) {
        // Update successful
        echo '<script>alert("Record updated successfully!");</script>';
        echo '<script>window.location.href = "vaccines.php";</script>';
    } else {
        // Update failed
        echo '<script>alert("Error: ' . $conn->error . '");</script>';
    }

    $conn->close(); // Close the database connection
} else {
    // Invalid request method
    echo '<script>alert("Invalid request.");</script>';
}
?>
