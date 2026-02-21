<?php
require_once 'config.php';
$page_title = "About Us";
?>
<?php include 'header.php'; ?>

<div class="page-header">
    <h1>About Hope Foundation</h1>
    <p>Making a difference since 2010</p>
</div>

<div class="container">
    <!-- Mission & Vision -->
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin: 3rem 0;">
        <div style="background: #f9f9f9; padding: 2rem; border-radius: 10px;">
            <i class="fas fa-bullseye" style="font-size: 3rem; color: var(--primary); margin-bottom: 1rem;"></i>
            <h2>Our Mission</h2>
            <p>To empower communities and transform lives through sustainable development programs, education, healthcare, and social welfare initiatives.</p>
        </div>
        
        <div style="background: #f9f9f9; padding: 2rem; border-radius: 10px;">
            <i class="fas fa-eye" style="font-size: 3rem; color: var(--primary); margin-bottom: 1rem;"></i>
            <h2>Our Vision</h2>
            <p>A world where every individual has equal opportunities to thrive, with access to education, healthcare, and a dignified life.</p>
        </div>
    </div>
    
    <!-- Our Story -->
    <div style="margin: 4rem 0;">
        <h2 style="text-align: center;">Our Story</h2>
        <p style="text-align: center; max-width: 800px; margin: 1rem auto;">Founded in 2010, Hope Foundation started as a small group of dedicated individuals who wanted to make a difference in their community. Today, we have grown into a recognized NGO with multiple branches across India, touching thousands of lives through our various programs.</p>
    </div>
    
    <!-- Team -->
    <h2 style="text-align: center; margin: 3rem 0 2rem;">Our Team</h2>
    <div class="row">
        <div class="card" style="text-align: center;">
            <img src="https://randomuser.me/api/portraits/men/1.jpg" alt="Team Member" style="width: 150px; height: 150px; border-radius: 50%; margin: 2rem auto 1rem;">
            <h3>Rajesh Kumar</h3>
            <p style="color: var(--text-light);">Founder & Director</p>
        </div>
        
        <div class="card" style="text-align: center;">
            <img src="https://randomuser.me/api/portraits/women/2.jpg" alt="Team Member" style="width: 150px; height: 150px; border-radius: 50%; margin: 2rem auto 1rem;">
            <h3>Priya Singh</h3>
            <p style="color: var(--text-light);">Program Manager</p>
        </div>
        
        <div class="card" style="text-align: center;">
            <img src="https://randomuser.me/api/portraits/men/3.jpg" alt="Team Member" style="width: 150px; height: 150px; border-radius: 50%; margin: 2rem auto 1rem;">
            <h3>Amit Patel</h3>
            <p style="color: var(--text-light);">Volunteer Coordinator</p>
        </div>
    </div>
    
    <!-- Achievements -->
    <div style="background: var(--primary); color: white; padding: 3rem; border-radius: 10px; margin: 4rem 0;">
        <h2 style="color: white; text-align: center;">Our Achievements</h2>
        <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 2rem; margin-top: 2rem; text-align: center;">
            <div>
                <div style="font-size: 2.5rem;">500+</div>
                <div>Volunteers</div>
            </div>
            <div>
                <div style="font-size: 2.5rem;">50+</div>
                <div>Projects</div>
            </div>
            <div>
                <div style="font-size: 2.5rem;">10k+</div>
                <div>Lives Impacted</div>
            </div>
            <div>
                <div style="font-size: 2.5rem;">10+</div>
                <div>Branches</div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>