<?php
require_once 'config.php';
$page_title = "Register";

$error = '';
$success = '';

// Areas of interest for dropdown
$interest_areas = [
    'Education', 'Healthcare', 'Environment', 'Animal Welfare', 
    'Women Empowerment', 'Child Care', 'Elderly Care', 
    'Disaster Relief', 'Community Development', 'Skill Training'
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get and sanitize form data
    $full_name = mysqli_real_escape_string($conn, trim($_POST['full_name']));
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $phone = mysqli_real_escape_string($conn, trim($_POST['phone']));
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $city = mysqli_real_escape_string($conn, trim($_POST['city']));
    $interested_area = mysqli_real_escape_string($conn, trim($_POST['interested_area']));
    $address = mysqli_real_escape_string($conn, trim($_POST['address']));
    $occupation = mysqli_real_escape_string($conn, trim($_POST['occupation']));
    
    // Validation
    $errors = [];
    
    if (empty($full_name)) {
        $errors[] = "Full name is required";
    }
    
    if (empty($email)) {
        $errors[] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }
    
    if (empty($phone)) {
        $errors[] = "Phone number is required";
    } elseif (!preg_match('/^[0-9]{10}$/', $phone)) {
        $errors[] = "Phone number must be 10 digits";
    }
    
    if (empty($password)) {
        $errors[] = "Password is required";
    } elseif (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters";
    }
    
    if ($password != $confirm_password) {
        $errors[] = "Passwords do not match";
    }
    
    // Check if email already exists
    if (empty($errors)) {
        $check_query = "SELECT id FROM volunteers WHERE email = '$email'";
        $check_result = mysqli_query($conn, $check_query);
        
        if (mysqli_num_rows($check_result) > 0) {
            $errors[] = "Email already registered. Please login or use another email.";
        }
    }
    
    // If no errors, insert into database
    if (empty($errors)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        $insert_query = "INSERT INTO volunteers (full_name, email, phone, password, city, interested_area, address, occupation, status) 
                        VALUES ('$full_name', '$email', '$phone', '$hashed_password', '$city', '$interested_area', '$address', '$occupation', 'active')";
        
        if (mysqli_query($conn, $insert_query)) {
            $success = "Registration successful! You can now login.";
            
            // Clear form data on success
            $_POST = array();
        } else {
            $errors[] = "Registration failed: " . mysqli_error($conn);
        }
    }
    
    // Set error message
    if (!empty($errors)) {
        $error = implode("<br>", $errors);
    }
}
?>
<?php include 'header.php'; ?>

<style>
    .register-container {
        max-width: 800px;
        margin: 3rem auto;
        padding: 2rem;
        background: white;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }
    
    .register-header {
        text-align: center;
        margin-bottom: 2rem;
    }
    
    .register-header h1 {
        color: var(--primary);
        font-size: 2.2rem;
        margin-bottom: 0.5rem;
    }
    
    .register-header p {
        color: var(--text-light);
    }
    
    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
    }
    
    .form-group {
        margin-bottom: 1.5rem;
    }
    
    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 600;
        color: var(--dark);
    }
    
    .form-group label .required {
        color: #e74c3c;
        margin-left: 3px;
    }
    
    .form-control {
        width: 100%;
        padding: 0.8rem 1rem;
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        font-size: 1rem;
        transition: all 0.3s;
    }
    
    .form-control:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(44,62,80,0.1);
    }
    
    .form-select {
        width: 100%;
        padding: 0.8rem 1rem;
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        font-size: 1rem;
        background: white;
        cursor: pointer;
    }
    
    .form-select:focus {
        outline: none;
        border-color: var(--primary);
    }
    
    .form-textarea {
        width: 100%;
        padding: 0.8rem 1rem;
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        font-size: 1rem;
        min-height: 100px;
        resize: vertical;
    }
    
    .checkbox-group {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 0.8rem;
        margin-top: 0.5rem;
    }
    
    .checkbox-group label {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-weight: normal;
        cursor: pointer;
    }
    
    .checkbox-group input[type="checkbox"] {
        width: 18px;
        height: 18px;
        cursor: pointer;
    }
    
    .btn-register {
        width: 100%;
        padding: 1rem;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 1.2rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
    }
    
    .btn-register:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    }
    
    .login-link {
        text-align: center;
        margin-top: 2rem;
        padding-top: 1.5rem;
        border-top: 2px solid #f0f0f0;
    }
    
    .login-link a {
        color: var(--primary);
        text-decoration: none;
        font-weight: 600;
    }
    
    .login-link a:hover {
        text-decoration: underline;
    }
    
    .alert {
        padding: 1rem 1.5rem;
        border-radius: 8px;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 1rem;
    }
    
    .alert-success {
        background: #d4edda;
        color: #155724;
        border-left: 5px solid #27ae60;
    }
    
    .alert-error {
        background: #f8d7da;
        color: #721c24;
        border-left: 5px solid #e74c3c;
    }
    
    .password-hint {
        font-size: 0.85rem;
        color: #666;
        margin-top: 0.3rem;
    }
    
    .terms {
        margin: 1.5rem 0;
        padding: 1rem;
        background: #f9f9f9;
        border-radius: 8px;
    }
    
    .terms label {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        cursor: pointer;
    }
    
    .terms input[type="checkbox"] {
        width: 18px;
        height: 18px;
    }
    
    .terms a {
        color: var(--primary);
        text-decoration: none;
    }
    
    .terms a:hover {
        text-decoration: underline;
    }
    
    @media (max-width: 768px) {
        .register-container {
            margin: 1rem;
            padding: 1.5rem;
        }
        
        .form-row {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="page-header">
    <h1>Join Hope Foundation</h1>
    <p>Register to become a volunteer and make a difference</p>
</div>

<div class="register-container">
    <div class="register-header">
        <h1>Registration Form</h1>
        <p>Please fill in your details to create an account</p>
    </div>
    
    <?php if ($error): ?>
        <div class="alert alert-error">
            <i class="fas fa-exclamation-circle"></i>
            <?php echo $error; ?>
        </div>
    <?php endif; ?>
    
    <?php if ($success): ?>
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i>
            <?php echo $success; ?>
        </div>
    <?php endif; ?>
    
    <form method="POST" action="" onsubmit="return validateForm()">
        <!-- Personal Information -->
        <h3 style="margin-bottom: 1rem; color: var(--primary);">Personal Information</h3>
        
        <div class="form-row">
            <div class="form-group">
                <label>Full Name <span class="required">*</span></label>
                <input type="text" name="full_name" class="form-control" 
                       value="<?php echo isset($_POST['full_name']) ? htmlspecialchars($_POST['full_name']) : ''; ?>" 
                       placeholder="Enter your full name" required>
            </div>
            
            <div class="form-group">
                <label>Email Address <span class="required">*</span></label>
                <input type="email" name="email" class="form-control" 
                       value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" 
                       placeholder="Enter your email" required>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label>Phone Number <span class="required">*</span></label>
                <input type="tel" name="phone" class="form-control" 
                       value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>" 
                       placeholder="10-digit mobile number" pattern="[0-9]{10}" maxlength="10" required>
                <div class="password-hint">Enter 10-digit mobile number</div>
            </div>
            
            <div class="form-group">
                <label>City</label>
                <input type="text" name="city" class="form-control" 
                       value="<?php echo isset($_POST['city']) ? htmlspecialchars($_POST['city']) : ''; ?>" 
                       placeholder="Enter your city">
            </div>
        </div>
        
        <div class="form-group">
            <label>Address</label>
            <textarea name="address" class="form-textarea" placeholder="Enter your complete address"><?php echo isset($_POST['address']) ? htmlspecialchars($_POST['address']) : ''; ?></textarea>
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label>Occupation</label>
                <input type="text" name="occupation" class="form-control" 
                       value="<?php echo isset($_POST['occupation']) ? htmlspecialchars($_POST['occupation']) : ''; ?>" 
                       placeholder="e.g., Student, Teacher, Engineer">
            </div>
            
            <div class="form-group">
                <label>Area of Interest</label>
                <select name="interested_area" class="form-select">
                    <option value="">Select your interest</option>
                    <?php foreach ($interest_areas as $area): ?>
                        <option value="<?php echo $area; ?>" 
                                <?php echo (isset($_POST['interested_area']) && $_POST['interested_area'] == $area) ? 'selected' : ''; ?>>
                            <?php echo $area; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        
        <!-- Account Security -->
        <h3 style="margin: 2rem 0 1rem; color: var(--primary);">Account Security</h3>
        
        <div class="form-row">
            <div class="form-group">
                <label>Password <span class="required">*</span></label>
                <input type="password" name="password" id="password" class="form-control" 
                       placeholder="Minimum 6 characters" minlength="6" required>
                <div class="password-hint">Password must be at least 6 characters</div>
            </div>
            
            <div class="form-group">
                <label>Confirm Password <span class="required">*</span></label>
                <input type="password" name="confirm_password" id="confirm_password" class="form-control" 
                       placeholder="Re-enter password" required>
            </div>
        </div>
        
        <!-- Terms and Conditions -->
        <div class="terms">
            <label>
                <input type="checkbox" name="terms" id="terms" required>
                I agree to the <a href="#" onclick="alert('Terms and Conditions will be displayed here')">Terms and Conditions</a> 
                and <a href="#" onclick="alert('Privacy Policy will be displayed here')">Privacy Policy</a>
                <span class="required">*</span>
            </label>
        </div>
        
        <!-- Submit Button -->
        <button type="submit" class="btn-register">
            <i class="fas fa-user-plus"></i> Create Account
        </button>
        
        <!-- Login Link -->
        <div class="login-link">
            Already have an account? <a href="login.php">Login here</a>
        </div>
    </form>
</div>

<script>
function validateForm() {
    // Get form values
    var password = document.getElementById('password').value;
    var confirm = document.getElementById('confirm_password').value;
    var terms = document.getElementById('terms');
    var phone = document.querySelector('input[name="phone"]').value;
    
    // Validate phone number
    var phoneRegex = /^[0-9]{10}$/;
    if (!phoneRegex.test(phone)) {
        alert('Please enter a valid 10-digit phone number');
        return false;
    }
    
    // Validate password match
    if (password !== confirm) {
        alert('Passwords do not match!');
        return false;
    }
    
    // Validate terms
    if (!terms.checked) {
        alert('Please agree to Terms and Conditions');
        return false;
    }
    
    return true;
}

// Real-time password match validation
document.getElementById('confirm_password').addEventListener('keyup', function() {
    var password = document.getElementById('password').value;
    var confirm = this.value;
    
    if (password !== confirm) {
        this.style.borderColor = '#e74c3c';
    } else {
        this.style.borderColor = '#27ae60';
    }
});

document.getElementById('password').addEventListener('keyup', function() {
    var confirm = document.getElementById('confirm_password').value;
    
    if (confirm && this.value !== confirm) {
        document.getElementById('confirm_password').style.borderColor = '#e74c3c';
    } else if (confirm) {
        document.getElementById('confirm_password').style.borderColor = '#27ae60';
    }
});
</script>

<?php include 'footer.php'; ?>