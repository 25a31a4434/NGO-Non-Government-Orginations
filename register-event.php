<?php
require_once 'config.php';

if (!isset($_SESSION['volunteer_id'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: events.php");
    exit();
}

$event_id = (int)$_GET['id'];
$volunteer_id = $_SESSION['volunteer_id'];

// Check if already registered
$check = mysqli_query($conn, "SELECT id FROM volunteer_participation WHERE volunteer_id = $volunteer_id AND event_id = $event_id");
if (mysqli_num_rows($check) == 0) {
    $query = "INSERT INTO volunteer_participation (volunteer_id, event_id) VALUES ($volunteer_id, $event_id)";
    if (mysqli_query($conn, $query)) {
        $_SESSION['message'] = "Successfully registered for the event!";
        $_SESSION['msg_type'] = "success";
    } else {
        $_SESSION['message'] = "Registration failed: " . mysqli_error($conn);
        $_SESSION['msg_type'] = "error";
    }
} else {
    $_SESSION['message'] = "You are already registered for this event";
    $_SESSION['msg_type'] = "info";
}

header("Location: events.php");
exit();
?>