<?php
require_once 'config.php';
$page_title = "Register";

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $interested_area = mysqli_real_escape_string($conn, $_POST['interested_area']);
    
    if (empty($full_name) || empty($email) || empty($phone) || empty($password)) {
        $error = "Please fill all required fields";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format";
    } elseif ($password != $confirm_password) {
        $error = "Passwords do not match";
    } elseif (strlen($password) < 6) {
        $error = "Password must be at least 6 characters";
    } else {
        $check = mysqli_query($conn, "SELECT id FROM volunteers WHERE email = '$email'");
        if (mysqli_num_rows($check) > 0) {
            $error = "Email already registered";
        } else {
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO volunteers (full_name, email, phone, password, city, interested_area) 
                      VALUES ('$full_name', '$email', '$phone', '$hashed', '$city', '$interested_area')";
            
            if (mysqli_query($conn, $query)) {
                $success = "Registration successful! You can now login.";
            } else {
                $error = "Registration failed: " . mysqli_error($conn);
            }
        }
    }
}
?>
<?php include 'header.php'; ?>

<div class="page-header">
    <h1>Volunteer Registration</h1>
    <p>Join us in making a difference</p>
</div>

<div style="max-width: 600px; margin: 3rem auto; padding: 2rem; background: #f9f9f9; border-radius: 10px;">
    <?php if($error): ?>
        <div class="alert alert-error"><?php echo $error; ?></div>
    <?php endif; ?>
    
    <?php if($success): ?>
        <div class="alert alert-success"><?php echo $success; ?></div>
    <?php endif; ?>
    
    <form method="POST" action="">
        <div style="margin-bottom: 1rem;">
            <label style="display: block; margin-bottom: 0.5rem;">Full Name *</label>
            <input type="text" name="full_name" style="width: 100%; padding: 0.7rem; border: 1px solid #ddd; border-radius: 5px;" required>
        </div>
        
        <div style="margin-bottom: 1rem;">
            <label style="display: block; margin-bottom: 0.5rem;">Email *</label>
            <input type="email" name="email" style="width: 100%; padding: 0.7rem; border: 1px solid #ddd; border-radius: 5px;" required>
        </div>
        
        <div style="margin-bottom: 1rem;">
            <label style="display: block; margin-bottom: 0.5rem;">Phone *</label>
            <input type="text" name="phone" style="width: 100%; padding: 0.7rem; border: 1px solid #ddd; border-radius: 5px;" required>
        </div>
        
        <div style="margin-bottom: 1rem;">
            <label style="display: block; margin-bottom: 0.5rem;">Password *</label>
            <input type="password" name="password" style="width: 100%; padding: 0.7rem; border: 1px solid #ddd; border-radius: 5px;" required>
        </div>
        
        <div style="margin-bottom: 1rem;">
            <label style="display: block; margin-bottom: 0.5rem;">Confirm Password *</label>
            <input type="password" name="confirm_password" style="width: 100%; padding: 0.7rem; border: 1px solid #ddd; border-radius: 5px;" required>
        </div>
        
        <div style="margin-bottom: 1rem;">
            <label style="display: block; margin-bottom: 0.5rem;">City</label>
            <input type="text" name="city" style="width: 100%; padding: 0.7rem; border: 1px solid #ddd; border-radius: 5px;">
        </div>
        
        <div style="margin-bottom: 1rem;">
            <label style="display: block; margin-bottom: 0.5rem;">Area of Interest</label>
            <select name="interested_area" style="width: 100%; padding: 0.7rem; border: 1px solid #ddd; border-radius: 5px;">
                <option value="">Select</option>
                <option value="Education">Education</option>
                <option value="Healthcare">Healthcare</option>
                <option value="Environment">Environment</option>
                <option value="Animal Welfare">Animal Welfare</option>
                <option value="Women Empowerment">Women Empowerment</option>
            </select>
        </div>
        
        <button type="submit" class="btn" style="width: 100%;">Register</button>
    </form>
    
    <p style="text-align: center; margin-top: 1rem;">
        Already have an account? <a href="login.php">Login here</a>
    </p>
</div>

<?php include 'footer.php'; ?>