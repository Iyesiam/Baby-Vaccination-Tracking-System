<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $babyId = $_POST["baby_id"];
    $babyName = $_POST["baby_name"];
    $babyGender = $_POST["baby_gender"];
    $babyBirthDate = $_POST["baby_birth_date"];
    $babyMotherName = $_POST["baby_mother_name"];
    $babyMotherID = $_POST["baby_mother_id"];
    $babyFatherName = $_POST["baby_father_name"];
    $babyFatherID = $_POST["baby_father_id"];
    $babyHealthInstitution = $_POST["baby_health_institution"];
    $babyDistrict = $_POST["baby_district"];
    $babySector = $_POST["baby_sector"];

    // Create the update query
    $updateQuery = "UPDATE babies SET 
        baby_name = '$babyName', 
        gender = '$babyGender', 
        birth_date = '$babyBirthDate', 
        mother_name = '$babyMotherName', 
        mother_id = '$babyMotherID', 
        father_name = '$babyFatherName', 
        father_id = '$babyFatherID', 
        health_institution = '$babyHealthInstitution', 
        district = '$babyDistrict', 
        sector = '$babySector' 
        WHERE id = $babyId";

    if ($conn->query($updateQuery) === TRUE) {
        echo '<script>alert("Record updated successfully!");</script>';
        echo '<script>window.location.href = "register_baby.php";</script>';
    } else {
        echo '<script>alert("Error updating record: ' . $conn->error . '");</script>';
    }

    $conn->close(); // Close the database connection
}
?>
