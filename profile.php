<?php
require_once 'config.php';

if (!isset($_SESSION['volunteer_id'])) {
    header("Location: login.php");
    exit();
}

$volunteer_id = $_SESSION['volunteer_id'];
$success = '';
$error = '';

// Get current user data
$query = "SELECT * FROM volunteers WHERE id = $volunteer_id";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

// Update profile
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $interested_area = mysqli_real_escape_string($conn, $_POST['interested_area']);
    
    $update = "UPDATE volunteers SET 
                full_name = '$full_name',
                phone = '$phone',
                city = '$city',
                interested_area = '$interested_area'
                WHERE id = $volunteer_id";
    
    if (mysqli_query($conn, $update)) {
        $success = "Profile updated successfully!";
        $_SESSION['volunteer_name'] = $full_name;
        
        // Refresh user data
        $result = mysqli_query($conn, $query);
        $user = mysqli_fetch_assoc($result);
    } else {
        $error = "Failed to update profile: " . mysqli_error($conn);
    }
}

$page_title = "My Profile";
?>
<?php include 'header.php'; ?>

<div class="page-header">
    <h1>My Profile</h1>
</div>

<div class="container" style="max-width: 800px;">
    <?php if($success): ?>
        <div class="alert alert-success"><?php echo $success; ?></div>
    <?php endif; ?>
    
    <?php if($error): ?>
        <div class="alert alert-error"><?php echo $error; ?></div>
    <?php endif; ?>
    
    <div style="background: white; padding: 2rem; border-radius: 10px; box-shadow: var(--shadow); margin: 2rem 0;">
        <form method="POST" action="">
            <div class="form-group">
                <label class="form-label">Full Name</label>
                <input type="text" name="full_name" class="form-control" value="<?php echo $user['full_name']; ?>" required>
            </div>
            
            <div class="form-group">
                <label class="form-label">Email (cannot be changed)</label>
                <input type="email" class="form-control" value="<?php echo $user['email']; ?>" disabled>
            </div>
            
            <div class="form-group">
                <label class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control" value="<?php echo $user['phone']; ?>" required>
            </div>
            
            <div class="form-group">
                <label class="form-label">City</label>
                <input type="text" name="city" class="form-control" value="<?php echo $user['city']; ?>">
            </div>
            
            <div class="form-group">
                <label class="form-label">Area of Interest</label>
                <select name="interested_area" class="form-select">
                    <option value="">Select</option>
                    <option value="Education" <?php echo $user['interested_area'] == 'Education' ? 'selected' : ''; ?>>Education</option>
                    <option value="Healthcare" <?php echo $user['interested_area'] == 'Healthcare' ? 'selected' : ''; ?>>Healthcare</option>
                    <option value="Environment" <?php echo $user['interested_area'] == 'Environment' ? 'selected' : ''; ?>>Environment</option>
                    <option value="Animal Welfare" <?php echo $user['interested_area'] == 'Animal Welfare' ? 'selected' : ''; ?>>Animal Welfare</option>
                    <option value="Women Empowerment" <?php echo $user['interested_area'] == 'Women Empowerment' ? 'selected' : ''; ?>>Women Empowerment</option>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>
        
        <hr style="margin: 2rem 0;">
        
        <h3>Account Information</h3>
        <p><strong>Member since:</strong> <?php echo date('d M Y', strtotime($user['registered_at'])); ?></p>
        <p><strong>Status:</strong> <span class="badge badge-success"><?php echo ucfirst($user['status']); ?></span></p>
        
        <div style="margin-top: 2rem;">
            <a href="change-password.php" class="btn" style="background: var(--warning);">Change Password</a>
            <a href="dashboard.php" class="btn" style="background: var(--secondary);">Back to Dashboard</a>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>