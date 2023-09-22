<?php
// Include the database connection code
include 'db_connect.php';

// Check if the 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Prepare and execute the SQL DELETE query
    $deleteQuery = "DELETE FROM users WHERE user_id = ?";
    $stmt = $conn->prepare($deleteQuery);
    $stmt->bind_param("i", $userId);

    if ($stmt->execute()) {
        // Deletion was successful
        $stmt->close();
        $conn->close();

        // Display a JavaScript alert indicating successful deletion
        echo '<script>alert("User deleted successfully.");</script>';

        // Redirect to authentication-register.php after successful deletion
        echo '<script>window.location.href = "admin_dash.php";</script>';
        exit();
    } else {
        // Deletion failed
        $stmt->close();
        $conn->close();
        echo 'Error: ' . $conn->error;
    }
} else {
    // 'id' parameter is not set in the URL
    echo 'Invalid request.';
}
?>
