<?php
// Installation Script - Run this first
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo '<!DOCTYPE html>
<html>
<head>
    <title>Hope Foundation - Installation</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; margin: 0; padding: 20px; background: #f4f4f4; }
        .container { max-width: 800px; margin: 0 auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h1 { color: #2c3e50; border-bottom: 2px solid #2c3e50; padding-bottom: 10px; }
        .step { background: #f9f9f9; padding: 15px; margin: 15px 0; border-left: 4px solid #2c3e50; }
        .success { color: #27ae60; }
        .error { color: #e74c3c; }
        .btn { display: inline-block; padding: 10px 20px; background: #2c3e50; color: white; text-decoration: none; border-radius: 5px; margin: 10px 0; }
        .btn:hover { background: #34495e; }
        code { background: #ecf0f1; padding: 2px 5px; border-radius: 3px; }
    </style>
</head>
<body>
    <div class="container">';

// Step 1: Check PHP version
echo '<div class="step">';
echo '<h3>Step 1: Checking PHP Version</h3>';
if (version_compare(PHP_VERSION, '7.0.0', '>=')) {
    echo '<p class="success">✓ PHP Version: ' . PHP_VERSION . ' (Required: 7.0+)</p>';
} else {
    echo '<p class="error">✗ PHP Version: ' . PHP_VERSION . ' (Required: 7.0+)</p>';
    die('Please upgrade PHP to continue.');
}
echo '</div>';

// Step 2: Check database connection
echo '<div class="step">';
echo '<h3>Step 2: Database Connection</h3>';

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'ngo_database';

$conn = @mysqli_connect($host, $user, $pass);

if ($conn) {
    echo '<p class="success">✓ Connected to MySQL successfully</p>';
    
    // Create database if not exists
    $sql = "CREATE DATABASE IF NOT EXISTS $db";
    if (mysqli_query($conn, $sql)) {
        echo '<p class="success">✓ Database "' . $db . '" created or already exists</p>';
    } else {
        echo '<p class="error">✗ Failed to create database: ' . mysqli_error($conn) . '</p>';
    }
    
    // Select database
    mysqli_select_db($conn, $db);
    
    // Read and execute SQL file
    $sql_file = file_get_contents('database.sql');
    if ($sql_file) {
        $queries = explode(';', $sql_file);
        $success_count = 0;
        $error_count = 0;
        
        foreach ($queries as $query) {
            $query = trim($query);
            if (!empty($query)) {
                if (mysqli_query($conn, $query)) {
                    $success_count++;
                } else {
                    $error_count++;
                }
            }
        }
        
        echo '<p class="success">✓ Tables created successfully: ' . $success_count . ' queries executed</p>';
        if ($error_count > 0) {
            echo '<p class="error">✗ Errors: ' . $error_count . ' queries failed</p>';
        }
    } else {
        echo '<p class="error">✗ Could not read database.sql file</p>';
    }
    
    mysqli_close($conn);
} else {
    echo '<p class="error">✗ Could not connect to MySQL: ' . mysqli_connect_error() . '</p>';
    echo '<p>Please check your MySQL server is running.</p>';
}
echo '</div>';

// Step 3: Check file permissions
echo '<div class="step">';
echo '<h3>Step 3: Checking File Permissions</h3>';

$files_to_check = ['config.php', 'header.php', 'footer.php', 'index.php', 'database.sql'];
$writable_needed = ['uploads/'];

// Check if files exist
foreach ($files_to_check as $file) {
    if (file_exists($file)) {
        echo '<p class="success">✓ File exists: ' . $file . '</p>';
    } else {
        echo '<p class="error">✗ File missing: ' . $file . '</p>';
    }
}

// Check/create uploads directory
if (!file_exists('uploads')) {
    if (mkdir('uploads', 0777)) {
        echo '<p class="success">✓ Created uploads directory</p>';
    } else {
        echo '<p class="error">✗ Could not create uploads directory</p>';
    }
} else {
    echo '<p class="success">✓ Uploads directory exists</p>';
}
echo '</div>';

// Step 4: Configuration check
echo '<div class="step">';
echo '<h3>Step 4: Configuration Check</h3>';

if (file_exists('config.php')) {
    include 'config.php';
    if (defined('DB_HOST') && defined('DB_NAME')) {
        echo '<p class="success">✓ Configuration file loaded successfully</p>';
    } else {
        echo '<p class="error">✗ Configuration constants not defined properly</p>';
    }
}
echo '</div>';

// Step 5: Installation complete
echo '<div class="step">';
echo '<h3>Step 5: Installation Complete</h3>';
echo '<p class="success">✓ Your NGO website has been installed successfully!</p>';
echo '<p><strong>Default Login Credentials:</strong></p>';
echo '<ul>';
echo '<li><strong>Email:</strong> admin@ngo.com</li>';
echo '<li><strong>Password:</strong> password</li>';
echo '</ul>';
echo '<p><strong>Important Next Steps:</strong></p>';
echo '<ol>';
echo '<li>Delete or rename the <code>install.php</code> file for security</li>';
echo '<li>Change the default admin password</li>';
echo '<li>Update site settings in the database</li>';
echo '<li>Add your organization details and content</li>';
echo '</ol>';
echo '<p><a href="index.php" class="btn">Go to Homepage</a> ';
echo '<a href="login.php" class="btn" style="background: #27ae60;">Login to Admin</a></p>';
echo '</div>';

echo '</div></body></html>';
?>