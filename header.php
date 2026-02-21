<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? SITE_NAME . ' - ' . $page_title : SITE_NAME; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        
        .navbar {
            background: #2c3e50;
            padding: 1rem 5%;
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        
        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .logo {
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
            text-decoration: none;
        }
        
        .nav-menu {
            display: flex;
            list-style: none;
            gap: 1rem;
        }
        
        .nav-menu a {
            color: white;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: 0.3s;
        }
        
        .nav-menu a:hover, .nav-menu a.active {
            background: #34495e;
        }
        
        .register-btn {
            background: #e74c3c;
        }
        
        .page-header {
            background: #34495e;
            color: white;
            text-align: center;
            padding: 3rem 5%;
        }
        
        .footer {
            background: #2c3e50;
            color: white;
            padding: 2rem 5% 1rem;
            margin-top: 3rem;
        }
        
        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }
        
        .footer-section h3 {
            margin-bottom: 1rem;
        }
        
        .footer-links {
            list-style: none;
        }
        
        .footer-links a {
            color: #ccc;
            text-decoration: none;
            line-height: 2;
        }
        
        .social-links a {
            color: white;
            font-size: 1.5rem;
            margin-right: 1rem;
        }
        
        .footer-bottom {
            text-align: center;
            margin-top: 2rem;
            padding-top: 1rem;
            border-top: 1px solid #444;
        }
        
        .alert {
            padding: 1rem;
            border-radius: 5px;
            margin-bottom: 1rem;
        }
        
        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        .btn {
            display: inline-block;
            padding: 0.7rem 1.5rem;
            background: #2c3e50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }
        
        .btn:hover {
            background: #34495e;
        }
        
        @media (max-width: 768px) {
            .nav-container {
                flex-direction: column;
                gap: 1rem;
            }
            
            .nav-menu {
                flex-wrap: wrap;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="nav-container">
            <a href="index.php" class="logo">
                <i class="fas fa-hand-holding-heart"></i> Hope Foundation
            </a>
            <ul class="nav-menu">
                <li><a href="index.php" class="<?php echo $current_page == 'index.php' ? 'active' : ''; ?>">Home</a></li>
                <li><a href="events.php" class="<?php echo $current_page == 'events.php' ? 'active' : ''; ?>">Events</a></li>
                <li><a href="contact.php" class="<?php echo $current_page == 'contact.php' ? 'active' : ''; ?>">Contact</a></li>
                <li><a href="donate.php" class="<?php echo $current_page == 'donate.php' ? 'active' : ''; ?>">Donate</a></li>
                <?php if(isset($_SESSION['volunteer_id'])): ?>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="logout.php" class="register-btn">Logout</a></li>
                <?php else: ?>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="register.php" class="register-btn">Register</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>