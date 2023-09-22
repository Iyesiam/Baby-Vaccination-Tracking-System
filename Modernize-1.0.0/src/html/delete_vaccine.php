<?php
// Include the database connection code
include 'db_connect.php';

// Check if the 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    $vaccineId = $_GET['id'];

    // Prepare and execute the SQL DELETE query
    $deleteQuery = "DELETE FROM vaccines_new WHERE id = ?";
    $stmt = $conn->prepare($deleteQuery);
    $stmt->bind_param("i", $vaccineId);

    if ($stmt->execute()) {
        // Deletion was successful
        $stmt->close();
        $conn->close();

        // Display a JavaScript alert indicating successful deletion
        echo '<script>alert("Record deleted successfully.");</script>';

        // Redirect to the appropriate page after successful deletion
        echo '<script>window.location.href = "vaccines.php";</script>';
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
