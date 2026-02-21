<?php
// Database configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'ngo_database');

// Create connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Set charset
mysqli_set_charset($conn, "utf8");

// Start session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Site info
define('SITE_NAME', 'Hope Foundation NGO');
define('SITE_URL', 'http://localhost/ngo/');
?>