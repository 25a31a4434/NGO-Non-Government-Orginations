<?php
require_once 'config.php';
$page_title = "Our Branches";
?>
<?php include 'header.php'; ?>

<div class="page-header">
    <h1>Our Branches</h1>
    <p>Find a branch near you</p>
</div>

<div class="container">
    <div class="row" style="margin: 3rem 0;">
        <?php
        // Sample branches data - in real app, fetch from database
        $branches = [
            [
                'name' => 'Mumbai Headquarters',
                'address' => '123 Charity Building, Andheri East, Mumbai - 400001',
                'phone' => '022 1234 5678',
                'email' => 'mumbai@hopefoundation.org',
                'manager' => 'Rajesh Kumar',
                'hours' => 'Mon-Fri: 9AM-6PM, Sat: 10AM-4PM'
            ],
            [
                'name' => 'Delhi Branch',
                'address' => '456 NGO Complex, Connaught Place, Delhi - 110001',
                'phone' => '011 2345 6789',
                'email' => 'delhi@hopefoundation.org',
                'manager' => 'Priya Singh',
                'hours' => 'Mon-Sat: 9:30AM-5:30PM'
            ],
            [
                'name' => 'Bangalore Center',
                'address' => '789 Service Road, Indiranagar, Bangalore - 560038',
                'phone' => '080 3456 7890',
                'email' => 'bangalore@hopefoundation.org',
                'manager' => 'Suresh Reddy',
                'hours' => 'Mon-Fri: 9AM-6PM'
            ],
            [
                'name' => 'Chennai Branch',
                'address' => '321 Beach Road, Chennai - 600001',
                'phone' => '044 4567 8901',
                'email' => 'chennai@hopefoundation.org',
                'manager' => 'Lakshmi Rajan',
                'hours' => 'Mon-Sat: 10AM-5PM'
            ],
            [
                'name' => 'Kolkata Center',
                'address' => '654 Park Street, Kolkata - 700016',
                'phone' => '033 5678 9012',
                'email' => 'kolkata@hopefoundation.org',
                'manager' => 'Arun Das',
                'hours' => 'Mon-Fri: 10AM-6PM'
            ],
            [
                'name' => 'Pune Branch',
                'address' => '987 FC Road, Pune - 411004',
                'phone' => '020 6789 0123',
                'email' => 'pune@hopefoundation.org',
                'manager' => 'Neha Sharma',
                'hours' => 'Mon-Sat: 9AM-5PM'
            ]
        ];
        
        foreach($branches as $branch) {
            echo '<div class="card">';
            echo '<div class="card-header" style="background: var(--primary);">';
            echo '<h3 style="color: white; margin: 0;">' . $branch['name'] . '</h3>';
            echo '</div>';
            echo '<div class="card-body">';
            echo '<p><i class="fas fa-map-marker-alt" style="width: 20px;"></i> ' . $branch['address'] . '</p>';
            echo '<p><i class="fas fa-phone" style="width: 20px;"></i> ' . $branch['phone'] . '</p>';
            echo '<p><i class="fas fa-envelope" style="width: 20px;"></i> ' . $branch['email'] . '</p>';
            echo '<p><i class="fas fa-user" style="width: 20px;"></i> Manager: ' . $branch['manager'] . '</p>';
            echo '<p><i class="fas fa-clock" style="width: 20px;"></i> ' . $branch['hours'] . '</p>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
    
    <!-- Map placeholder -->
    <div style="margin: 4rem 0;">
        <h2 style="text-align: center;">Find Us</h2>
        <div style="background: #f9f9f9; height: 400px; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
            <div style="text-align: center;">
                <i class="fas fa-map-marked-alt" style="font-size: 4rem; color: var(--primary); margin-bottom: 1rem;"></i>
                <p>Interactive map will be integrated here</p>
                <p>We have branches across major cities in India</p>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>