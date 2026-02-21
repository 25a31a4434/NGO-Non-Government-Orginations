<?php
// Run this file first to set up the database
require_once 'config.php';

// Read and execute SQL file
$sql = file_get_contents('database.sql');

if (mysqli_multi_query($conn, $sql)) {
    echo "<h2>Database Setup Successful!</h2>";
    echo "<p>All tables created successfully.</p>";
    echo "<p>Default admin login:</p>";
    echo "<ul>";
    echo "<li>Email: admin@ngo.com</li>";
    echo "<li>Password: password (hashed as 'password' - you can change it)</li>";
    echo "</ul>";
    echo "<p><a href='index.php'>Go to Homepage</a> | <a href='login.php'>Login</a></p>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>