<?php
require_once 'config.php';
$page_title = "Contact Us";

$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    
    if (empty($name) || empty($email) || empty($message)) {
        $error = "Please fill all required fields";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format";
    } else {
        $query = "INSERT INTO contact_messages (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";
        if (mysqli_query($conn, $query)) {
            $success = "Thank you for contacting us. We'll get back to you soon!";
        } else {
            $error = "Failed to send message. Please try again.";
        }
    }
}
?>
<?php include 'header.php'; ?>

<div class="page-header">
    <h1>Contact Us</h1>
    <p>We'd love to hear from you</p>
</div>

<div style="max-width: 1200px; margin: 3rem auto; padding: 0 20px;">
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 3rem;">
        <!-- Contact Info -->
        <div>
            <h2>Get in Touch</h2>
            <div style="margin: 2rem 0;">
                <p><i class="fas fa-map-marker-alt" style="width: 25px;"></i> 123 Charity Building, Mumbai - 400001</p>
                <p><i class="fas fa-phone" style="width: 25px;"></i> +91 98765 43210</p>
                <p><i class="fas fa-envelope" style="width: 25px;"></i> info@hopefoundation.org</p>
            </div>
            
            <div style="margin-top: 2rem;">
                <h3>Office Hours</h3>
                <p>Monday - Friday: 9:00 AM - 6:00 PM</p>
                <p>Saturday: 10:00 AM - 4:00 PM</p>
                <p>Sunday: Closed</p>
            </div>
        </div>
        
        <!-- Contact Form -->
        <div style="background: #f9f9f9; padding: 2rem; border-radius: 10px;">
            <h2>Send Message</h2>
            
            <?php if($success): ?>
                <div class="alert alert-success"><?php echo $success; ?></div>
            <?php endif; ?>
            
            <?php if($error): ?>
                <div class="alert alert-error"><?php echo $error; ?></div>
            <?php endif; ?>
            
            <form method="POST" action="">
                <div style="margin-bottom: 1rem;">
                    <input type="text" name="name" placeholder="Your Name *" style="width: 100%; padding: 0.7rem; border: 1px solid #ddd; border-radius: 5px;" required>
                </div>
                
                <div style="margin-bottom: 1rem;">
                    <input type="email" name="email" placeholder="Your Email *" style="width: 100%; padding: 0.7rem; border: 1px solid #ddd; border-radius: 5px;" required>
                </div>
                
                <div style="margin-bottom: 1rem;">
                    <input type="text" name="phone" placeholder="Your Phone" style="width: 100%; padding: 0.7rem; border: 1px solid #ddd; border-radius: 5px;">
                </div>
                
                <div style="margin-bottom: 1rem;">
                    <textarea name="message" placeholder="Your Message *" style="width: 100%; padding: 0.7rem; border: 1px solid #ddd; border-radius: 5px; height: 150px;" required></textarea>
                </div>
                
                <button type="submit" class="btn" style="width: 100%;">Send Message</button>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>