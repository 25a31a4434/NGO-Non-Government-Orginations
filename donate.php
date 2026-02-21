<?php
require_once 'config.php';
$page_title = "Donate";

$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $amount = (float)$_POST['amount'];
    $payment_method = mysqli_real_escape_string($conn, $_POST['payment_method']);
    
    if (empty($name) || $amount <= 0) {
        $error = "Please fill all required fields with valid amount";
    } else {
        $query = "INSERT INTO donations (donor_name, donor_email, amount, payment_method, status) 
                  VALUES ('$name', '$email', $amount, '$payment_method', 'pending')";
        
        if (mysqli_query($conn, $query)) {
            $success = "Thank you for your donation! You will be redirected to payment page.";
            // Here you would integrate payment gateway
        } else {
            $error = "Failed to process donation: " . mysqli_error($conn);
        }
    }
}
?>
<?php include 'header.php'; ?>

<div class="page-header">
    <h1>Make a Donation</h1>
    <p>Your support helps us make a difference</p>
</div>

<div style="max-width: 600px; margin: 3rem auto; padding: 2rem; background: #f9f9f9; border-radius: 10px;">
    <?php if($success): ?>
        <div class="alert alert-success"><?php echo $success; ?></div>
    <?php endif; ?>
    
    <?php if($error): ?>
        <div class="alert alert-error"><?php echo $error; ?></div>
    <?php endif; ?>
    
    <form method="POST" action="">
        <div style="margin-bottom: 1rem;">
            <label style="display: block; margin-bottom: 0.5rem;">Your Name *</label>
            <input type="text" name="name" style="width: 100%; padding: 0.7rem; border: 1px solid #ddd; border-radius: 5px;" required>
        </div>
        
        <div style="margin-bottom: 1rem;">
            <label style="display: block; margin-bottom: 0.5rem;">Email</label>
            <input type="email" name="email" style="width: 100%; padding: 0.7rem; border: 1px solid #ddd; border-radius: 5px;">
        </div>
        
        <div style="margin-bottom: 1rem;">
            <label style="display: block; margin-bottom: 0.5rem;">Amount (₹) *</label>
            <input type="number" name="amount" min="10" step="10" style="width: 100%; padding: 0.7rem; border: 1px solid #ddd; border-radius: 5px;" required>
        </div>
        
        <div style="margin-bottom: 1rem;">
            <label style="display: block; margin-bottom: 0.5rem;">Payment Method</label>
            <select name="payment_method" style="width: 100%; padding: 0.7rem; border: 1px solid #ddd; border-radius: 5px;">
                <option value="card">Credit/Debit Card</option>
                <option value="netbanking">Net Banking</option>
                <option value="upi">UPI</option>
                <option value="bank">Bank Transfer</option>
            </select>
        </div>
        
        <button type="submit" class="btn" style="width: 100%;">Donate Now</button>
    </form>
</div>

<?php include 'footer.php'; ?>