<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: authentication-login.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include the database connection code
    include 'db_connect.php';

    $userId = $_POST["user_id"];
    $name = $_POST["name"];
    $role = $_POST["role"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Basic input validation
    if (empty($name) || empty($role) || empty($email) || empty($password)) {
        echo '<script>alert("All fields are required.");</script>';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<script>alert("Invalid email format.");</script>';
    } else {
        // Input sanitization
        $name = htmlspecialchars($name);
        $role = htmlspecialchars($role);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $password = htmlspecialchars($password);

        // Update the user information in the database
        $updateQuery = "UPDATE users SET name = ?, role = ?, email = ?, password = ? WHERE user_id = ?";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bind_param("ssssi", $name, $role, $email, $password, $userId);

        if ($stmt->execute()) {
            $stmt->close();
            $conn->close();

            echo '<script>alert("User information updated successfully!");</script>';
            echo '<script>window.location.href = "edit_user.php?id=' . $userId . '";</script>';
        } else {
            $stmt->close();
            $conn->close();
            echo '<script>alert("Error updating user information: ' . $conn->error . '");</script>';
        }
    }
} else {
    // Invalid request method
    echo '<script>alert("Invalid request.");</script>';
    echo '<script>window.location.href = "edit_user.php";</script>';
}
?>
