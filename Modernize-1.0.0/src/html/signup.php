<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = $_POST["role"]; // Add this line to retrieve the role field

    // Basic input validation
    if (empty($name) || empty($email) || empty($password) || empty($role)) {
        echo '<script>alert("All fields are required.");</script>';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<script>alert("Invalid email format.");</script>';
    } else {
        // Input sanitization
        $name = htmlspecialchars($name);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        // Include the database connection code
        include 'db_connect.php';

        // Create the insert query with role included
        $insertQuery = "INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')";

        if ($conn->query($insertQuery) === TRUE) {
            echo '<script>alert("New account created successfully!");</script>';
            echo '<script>window.location.href = "authentication-register.php";</script>';
        } else {
            echo '<script>alert("Error: ' . $conn->error . '");</script>';
        }

        $conn->close(); // Close the database connection
    }
}
?>
