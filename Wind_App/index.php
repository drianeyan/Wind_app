<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.html");
    exit();
}
$username = $_SESSION['username'];
// echo "Welcome, " . $_SESSION['username']; // Test to see if logged in
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="x-icon" href="./assets/pictures/icon.png">
    <title>Wind Wave Direction - Weather App</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    
    <!-- Header -->
    <header>
        <div class="logo" style="display: flex; align-items: center;">
            <img src="./assets/pictures/wind.png" alt="Wind Wave Direction Logo" class="logo-img">
            <h1>Wind Wave Direction</h1>
        </div>
        
        <nav>
            <ul>
                <li><a href="#features">Features</a></li>
                <li><a href="#about">About</a></li>
                <li><span><?php echo htmlspecialchars($username); ?></span></li> 
                <li><a href="logout.php"><img src="./assets/pictures/logout.png" alt="Logout" style="width: 30px; height: 30px;"></a></li>
                <!-- Display username -->
            </ul>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h2>Your Ultimate Wind and Wave Direction App</h2>
            <p>Get real-time wind, wave, and weather updates for any location.</p>
            <a href="#map" class="btn">View Map</a>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="features">
        <h2>App Features</h2>
        <div class="feature-grid">
            <div class="feature">
                <h3>Real-Time Updates</h3>
                <p>Stay updated with real-time weather, wind, and wave direction.</p>
            </div>
            <div class="feature">
                <h3>Global Coverage</h3>
                <p>Access weather data from any location around the globe.</p>
            </div>
            <div class="feature">
                <h3>Simple and Intuitive</h3>
                <p>Our app is designed to be user-friendly and easy to navigate.</p>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about">
        <h2>About Wind Wave Direction</h2>
        <p>
            Wind Wave Direction is a weather forecasting app that provides accurate wind and wave data for mariners, surfers, and anyone needing precise environmental conditions.
        </p>
    </section>

    <!-- Map Section -->
    <section id="map" class="map-section">
        <h2>Interactive Weather Map</h2>
        <div id="map-container">
            <p>Map will be displayed here...</p>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact">
        <p>&copy; 2024 Wind Wave Direction. All rights reserved.</p>
    </footer>
</body>
</html>
