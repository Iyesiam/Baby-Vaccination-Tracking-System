<?php
// Include the database connection code
include 'db_connect.php';

// Check if the 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    $babyId = $_GET['id'];

    // Prepare and execute the SQL DELETE query
    $deleteQuery = "DELETE FROM babies WHERE id = ?";
    $stmt = $conn->prepare($deleteQuery);
    $stmt->bind_param("i", $babyId);

    if ($stmt->execute()) {
        // Deletion was successful
        $stmt->close();
        $conn->close();

        // Display a JavaScript alert indicating successful deletion
        echo '<script>alert("Record deleted successfully.");</script>';

        // Redirect to register_baby.php after successful deletion
        echo '<script>window.location.href = "register_baby.php";</script>';
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
