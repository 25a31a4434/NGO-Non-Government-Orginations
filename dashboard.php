<?php
require_once 'config.php';

if (!isset($_SESSION['volunteer_id'])) {
    header("Location: login.php");
    exit();
}

$volunteer_id = $_SESSION['volunteer_id'];

// Get volunteer details
$user = mysqli_query($conn, "SELECT * FROM volunteers WHERE id = $volunteer_id");
$volunteer = mysqli_fetch_assoc($user);

// Get registered events
$events = mysqli_query($conn, "
    SELECT e.*, vp.participation_status 
    FROM events e 
    JOIN volunteer_participation vp ON e.id = vp.event_id 
    WHERE vp.volunteer_id = $volunteer_id 
    ORDER BY e.event_date DESC
");

// Get upcoming events
$upcoming = mysqli_query($conn, "
    SELECT * FROM events 
    WHERE event_date >= CURDATE() AND status = 'upcoming'
    ORDER BY event_date 
    LIMIT 5
");

$page_title = "Dashboard";
?>
<?php include 'header.php'; ?>

<div style="max-width: 1200px; margin: 2rem auto; padding: 0 20px;">
    <h1>Welcome, <?php echo $volunteer['full_name']; ?>!</h1>
    
    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 2rem; margin-top: 2rem;">
        <!-- Left Column -->
        <div>
            <div style="background: #f9f9f9; padding: 1.5rem; border-radius: 10px; margin-bottom: 2rem;">
                <h2>Your Profile</h2>
                <p><strong>Email:</strong> <?php echo $volunteer['email']; ?></p>
                <p><strong>Phone:</strong> <?php echo $volunteer['phone']; ?></p>
                <p><strong>City:</strong> <?php echo $volunteer['city'] ?: 'Not specified'; ?></p>
                <p><strong>Interest:</strong> <?php echo $volunteer['interested_area'] ?: 'Not specified'; ?></p>
            </div>
            
            <div style="background: #f9f9f9; padding: 1.5rem; border-radius: 10px;">
                <h2>Your Events</h2>
                <?php if(mysqli_num_rows($events) > 0): ?>
                    <?php while($event = mysqli_fetch_assoc($events)): ?>
                        <div style="border-bottom: 1px solid #ddd; padding: 1rem 0;">
                            <h3><?php echo $event['event_name']; ?></h3>
                            <p><i class="fas fa-calendar"></i> <?php echo date('d M Y', strtotime($event['event_date'])); ?></p>
                            <p><i class="fas fa-map-marker"></i> <?php echo $event['event_location']; ?></p>
                            <span style="background: #e74c3c; color: white; padding: 0.2rem 0.5rem; border-radius: 3px; font-size: 0.8rem;">
                                <?php echo ucfirst($event['participation_status']); ?>
                            </span>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p>You haven't registered for any events yet.</p>
                <?php endif; ?>
            </div>
        </div>
        
        <!-- Right Column -->
        <div>
            <div style="background: #f9f9f9; padding: 1.5rem; border-radius: 10px;">
                <h2>Upcoming Events</h2>
                <?php if(mysqli_num_rows($upcoming) > 0): ?>
                    <?php while($event = mysqli_fetch_assoc($upcoming)): ?>
                        <div style="border-bottom: 1px solid #ddd; padding: 1rem 0;">
                            <h3><?php echo $event['event_name']; ?></h3>
                            <p><?php echo date('d M Y', strtotime($event['event_date'])); ?></p>
                            <a href="register-event.php?id=<?php echo $event['id']; ?>" class="btn" style="padding: 0.3rem 1rem; font-size: 0.9rem;">Register</a>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p>No upcoming events.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>