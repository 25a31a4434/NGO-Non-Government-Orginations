<?php
require_once 'config.php';
$page_title = "Events";
?>
<?php include 'header.php'; ?>

<div class="page-header">
    <h1>Our Events</h1>
    <p>Join us in making a difference</p>
</div>

<div style="max-width: 1200px; margin: 3rem auto; padding: 0 20px;">
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 2rem;">
        <?php
        $events = mysqli_query($conn, "SELECT * FROM events WHERE status='upcoming' ORDER BY event_date");
        
        if (mysqli_num_rows($events) > 0) {
            while($event = mysqli_fetch_assoc($events)) {
                echo '<div style="border: 1px solid #ddd; border-radius: 10px; overflow: hidden;">';
                echo '<div style="background: #2c3e50; color: white; padding: 1rem; text-align: center;">';
                echo '<div style="font-size: 2rem;">' . date('d', strtotime($event['event_date'])) . '</div>';
                echo '<div>' . date('M Y', strtotime($event['event_date'])) . '</div>';
                echo '</div>';
                echo '<div style="padding: 1.5rem;">';
                echo '<h3>' . $event['event_name'] . '</h3>';
                echo '<p><i class="fas fa-clock"></i> ' . date('h:i A', strtotime($event['event_time'])) . '</p>';
                echo '<p><i class="fas fa-map-marker"></i> ' . $event['event_location'] . '</p>';
                echo '<p>' . substr($event['event_description'], 0, 100) . '...</p>';
                
                if(isset($_SESSION['volunteer_id'])) {
                    $check = mysqli_query($conn, "SELECT id FROM volunteer_participation WHERE volunteer_id = " . $_SESSION['volunteer_id'] . " AND event_id = " . $event['id']);
                    if(mysqli_num_rows($check) == 0) {
                        echo '<a href="register-event.php?id=' . $event['id'] . '" class="btn" style="margin-top: 1rem;">Register</a>';
                    } else {
                        echo '<span style="color: #27ae60; display: block; margin-top: 1rem;">✓ Already Registered</span>';
                    }
                } else {
                    echo '<a href="login.php" class="btn" style="margin-top: 1rem;">Login to Register</a>';
                }
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p style="text-align: center; grid-column: 1/-1;">No events scheduled at the moment.</p>';
        }
        ?>
    </div>
</div>

<?php include 'footer.php'; ?>