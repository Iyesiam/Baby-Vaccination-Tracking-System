<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form inputs
    $babyName = $_POST["baby_name"];
    $gender = isset($_POST["gender"]) ? $_POST["gender"] : null;
    $birthDate = $_POST["birth_date"];
    $motherName = $_POST["mother_name"];
    $fatherName = $_POST["father_name"];
    $motherID = $_POST["motherID"];
    $fatherID = $_POST["fatherID"];
    $healthInstitution = $_POST["healthins"];
    $district = $_POST["district"];
    $sector = $_POST["sector"];

    // Include the database connection code
    include 'db_connect.php';

    // Check if the baby information already exists
    $checkQuery = "SELECT * FROM babies WHERE baby_name = ? AND birth_date = ?";
    $checkStmt = $conn->prepare($checkQuery);
    $checkStmt->bind_param("ss", $babyName, $birthDate);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();

    if ($checkResult->num_rows > 0) {
        $checkStmt->close();
        $conn->close();
        echo '<script>alert("Baby information already exists in the database.");</script>';
        echo '<script>window.location.href = "register_baby.php";</script>';
    } else {
        // Prepare the insert query
        $insertQuery = "INSERT INTO babies (baby_name, gender, birth_date, mother_name, father_name, mother_id, father_id, health_institution, district, sector) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Create a prepared statement
        $stmt = $conn->prepare($insertQuery);

        // Bind parameters to the statement
        $stmt->bind_param("sssssiisss", $babyName, $gender, $birthDate, $motherName, $fatherName, $motherID, $fatherID, $healthInstitution, $district, $sector);

        // Execute the statement
        if ($stmt->execute()) {
            $stmt->close();
            $conn->close();
            echo '<script>alert("Baby information inserted successfully!");</script>';
            echo '<script>window.location.href = "register_baby.php";</script>';
        } else {
            $stmt->close();
            $conn->close();
            echo '<script>alert("Error: Baby information insertion failed.");</script>';
            echo '<script>window.location.href = "register_baby.php";</script>';
        }
    }
}
?>
