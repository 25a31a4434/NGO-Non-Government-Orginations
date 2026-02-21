<?php
require_once 'config.php';
$page_title = "Our Services";
?>
<?php include 'header.php'; ?>

<div class="page-header">
    <h1>Our Social Services</h1>
    <p>Comprehensive support for communities in need</p>
</div>

<div class="container">
    <!-- Services Grid -->
    <div class="row" style="margin: 3rem 0;">
        <!-- Education Support -->
        <div class="card">
            <div style="background: var(--primary); color: white; padding: 2rem; text-align: center;">
                <i class="fas fa-graduation-cap" style="font-size: 3rem;"></i>
            </div>
            <div class="card-body">
                <h3>Education Support</h3>
                <p>We provide educational resources, scholarships, and tutoring to underprivileged children and adults.</p>
                <ul style="margin: 1rem 0; padding-left: 1.5rem;">
                    <li>After-school tutoring</li>
                    <li>Scholarship programs</li>
                    <li>Digital literacy classes</li>
                    <li>School supplies distribution</li>
                </ul>
                <a href="contact.php" class="btn btn-primary">Learn More</a>
            </div>
        </div>

        <!-- Healthcare -->
        <div class="card">
            <div style="background: var(--success); color: white; padding: 2rem; text-align: center;">
                <i class="fas fa-heartbeat" style="font-size: 3rem;"></i>
            </div>
            <div class="card-body">
                <h3>Healthcare Services</h3>
                <p>Free medical camps, health awareness programs, and basic healthcare facilities.</p>
                <ul style="margin: 1rem 0; padding-left: 1.5rem;">
                    <li>Free medical checkups</li>
                    <li>Health awareness camps</li>
                    <li>Medicine distribution</li>
                    <li>Maternal health programs</li>
                </ul>
                <a href="contact.php" class="btn btn-success">Learn More</a>
            </div>
        </div>

        <!-- Environment -->
        <div class="card">
            <div style="background: #27ae60; color: white; padding: 2rem; text-align: center;">
                <i class="fas fa-leaf" style="font-size: 3rem;"></i>
            </div>
            <div class="card-body">
                <h3>Environment Protection</h3>
                <p>Tree plantation drives, waste management, and environmental awareness campaigns.</p>
                <ul style="margin: 1rem 0; padding-left: 1.5rem;">
                    <li>Tree plantation drives</li>
                    <li>Clean-up campaigns</li>
                    <li>Recycling programs</li>
                    <li>Environmental education</li>
                </ul>
                <a href="contact.php" class="btn" style="background: #27ae60;">Learn More</a>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Women Empowerment -->
        <div class="card">
            <div style="background: #8e44ad; color: white; padding: 2rem; text-align: center;">
                <i class="fas fa-female" style="font-size: 3rem;"></i>
            </div>
            <div class="card-body">
                <h3>Women Empowerment</h3>
                <p>Skill development, self-help groups, and support for women's rights and independence.</p>
                <ul style="margin: 1rem 0; padding-left: 1.5rem;">
                    <li>Skill training programs</li>
                    <li>Self-help groups</li>
                    <li>Legal awareness</li>
                    <li>Entrepreneurship support</li>
                </ul>
                <a href="contact.php" class="btn" style="background: #8e44ad;">Learn More</a>
            </div>
        </div>

        <!-- Food Security -->
        <div class="card">
            <div style="background: #f39c12; color: white; padding: 2rem; text-align: center;">
                <i class="fas fa-utensils" style="font-size: 3rem;"></i>
            </div>
            <div class="card-body">
                <h3>Food Security</h3>
                <p>Food distribution programs, community kitchens, and nutrition awareness.</p>
                <ul style="margin: 1rem 0; padding-left: 1.5rem;">
                    <li>Food banks</li>
                    <li>Community kitchens</li>
                    <li>Nutrition education</li>
                    <li>Mid-day meal programs</li>
                </ul>
                <a href="contact.php" class="btn" style="background: #f39c12;">Learn More</a>
            </div>
        </div>

        <!-- Elderly Care -->
        <div class="card">
            <div style="background: #e74c3c; color: white; padding: 2rem; text-align: center;">
                <i class="fas fa-user-plus" style="font-size: 3rem;"></i>
            </div>
            <div class="card-body">
                <h3>Elderly Care</h3>
                <p>Support and care for senior citizens through various programs and services.</p>
                <ul style="margin: 1rem 0; padding-left: 1.5rem;">
                    <li>Day care centers</li>
                    <li>Health checkups</li>
                    <li>Recreational activities</li>
                    <li>Home visits</li>
                </ul>
                <a href="contact.php" class="btn btn-accent">Learn More</a>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div style="background: linear-gradient(135deg, var(--primary), var(--secondary)); color: white; padding: 4rem; text-align: center; border-radius: 10px; margin: 4rem 0;">
        <h2 style="color: white; font-size: 2rem;">Want to Help?</h2>
        <p style="font-size: 1.2rem; margin: 1rem 0;">Join us in making a difference. Your support matters!</p>
        <div>
            <a href="volunteer.php" class="btn" style="background: white; color: var(--primary); margin: 0 0.5rem;">Volunteer</a>
            <a href="donate.php" class="btn" style="background: var(--accent); color: white; margin: 0 0.5rem;">Donate</a>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>