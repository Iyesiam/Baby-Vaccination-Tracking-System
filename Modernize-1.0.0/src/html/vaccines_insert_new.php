<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form inputs
    $vaccineName = $_POST["vaccine_name"];
    $dateAdministered = $_POST["date_administered"];
    $nurseName = $_POST["nurse_name"];
    $healthInstitution = $_POST["health_institution"];
    $description = $_POST["description"];
    $duration = $_POST["duration"]; // This should now be the selected duration name
    $babyName = $_POST["baby_name"]; // Retrieve baby_name

    // Include the database connection code
    include 'db_connect.php';

    // Prepare the insert query
    $insertQuery = "INSERT INTO vaccines_new (baby_name, vaccine_name, date_administered, nurse_name, health_institution, description, duration) VALUES (?, ?, ?, ?, ?, ?, ?)";

    // Create a prepared statement
    $stmt = $conn->prepare($insertQuery);

    // Bind parameters to the statement
    $stmt->bind_param("sssssss", $babyName, $vaccineName, $dateAdministered, $nurseName, $healthInstitution, $description, $duration);

    // Execute the statement
    if ($stmt->execute()) {
        // Insertion successful
        $stmt->close();
        $conn->close();
        // Display pop-up message using JavaScript
        echo '<script>alert("Data inserted successfully!");</script>';
        // Redirect to the vaccines.php page after accepting the pop-up message
        echo '<script>window.location.href = "vaccines.php";</script>';
    } else {
        // Insertion failed
        $stmt->close();
        $conn->close();
        // Redirect or display error message
        echo '<script>alert("Error: Data insertion failed.");</script>';
    }
}

?>
