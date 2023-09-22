
<?php
session_start(); // Start the session
session_unset(); // Unset all session variables
session_destroy(); // Destroy the session

header("Location: authentication-login.php"); // Redirect to login page after logout
exit();
?>
