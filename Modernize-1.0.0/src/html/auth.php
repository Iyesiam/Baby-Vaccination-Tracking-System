<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Include the database connection code
    include 'db_connect.php';

    // Use prepared statements for security
    $query = "SELECT * FROM users WHERE name = ? AND password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // User is authenticated
        $user = $result->fetch_assoc();
        $_SESSION["username"] = $username;
        $_SESSION["user_role"] = $user["role"];

        $stmt->close();
        $conn->close();

        // Perform role-based authorization check
        if ($user["role"] === "admin") {
            header("Location: admin_dash.php");
            exit();
        } elseif ($user["role"] === "doc") {
            header("Location: doc_dash.php");
            exit();
        } elseif ($user["role"] === "nurse") {
            header("Location: register_baby.php");
            exit();
        } else {
            // Unknown role or no role assigned
            header("Location: authentication-login.php?error=Unknown role");
            exit();
        }
    } else {
        // Invalid credentials
        $stmt->close();
        $conn->close();
        echo '<script>alert("Invalid credentials. Please try again.");</script>';
        header("Location: authentication-login.php?error=Invalid credentials");
        exit();
    }
} else {
    header("Location: authentication-login.php?error=Invalid request");
    exit();
}
?>
