<?php
require_once 'config.php';

if (isset($_SESSION['volunteer_id'])) {
    header("Location: dashboard.php");
    exit();
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    
    $query = "SELECT id, full_name, email, password FROM volunteers WHERE email = '$email' AND status = 'active'";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            $_SESSION['volunteer_id'] = $user['id'];
            $_SESSION['volunteer_name'] = $user['full_name'];
            $_SESSION['volunteer_email'] = $user['email'];
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Invalid email or password";
        }
    } else {
        $error = "Invalid email or password";
    }
}

$page_title = "Login";
?>
<?php include 'header.php'; ?>

<div class="page-header">
    <h1>Login to Your Account</h1>
</div>

<div style="max-width: 400px; margin: 3rem auto; padding: 2rem; background: #f9f9f9; border-radius: 10px;">
    <?php if($error): ?>
        <div class="alert alert-error"><?php echo $error; ?></div>
    <?php endif; ?>
    
    <form method="POST" action="">
        <div style="margin-bottom: 1rem;">
            <label style="display: block; margin-bottom: 0.5rem;">Email</label>
            <input type="email" name="email" style="width: 100%; padding: 0.7rem; border: 1px solid #ddd; border-radius: 5px;" required>
        </div>
        
        <div style="margin-bottom: 1rem;">
            <label style="display: block; margin-bottom: 0.5rem;">Password</label>
            <input type="password" name="password" style="width: 100%; padding: 0.7rem; border: 1px solid #ddd; border-radius: 5px;" required>
        </div>
        
        <button type="submit" class="btn" style="width: 100%;">Login</button>
    </form>
    
    <p style="text-align: center; margin-top: 1rem;">
        Don't have an account? <a href="register.php">Register here</a>
    </p>
</div>

<?php include 'footer.php'; ?>