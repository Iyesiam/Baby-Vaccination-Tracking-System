
<?php
$host = 'localhost';      // Change to your database host if different
$dbname = 'monit_baby';   // Change to your database name
$user = 'root';           // Change to your database username
$pass = '';               // Change to your database password (if any)

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}// Debug line
