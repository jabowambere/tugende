<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TuGenDe</title>
    <link rel="stylesheet" href="home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Navigation Header -->
    <header class="navbar">
        <div class="container">
            <div class="nav-logo">
                <i class="fas fa-bus"></i>
                <span>TuGenDe</span>
            </div>
            <nav class="nav-menu">
                <a href="#home" class="nav-link">Home</a>
                <a href="user.php" class="nav-link">Destination</a>
                <a href="#about" class="nav-link">About</a>
                <a href="#contact" class="nav-link">Contact</a>
            </nav>
            <div class="nav-auth">
                <a href="login.php"><button class="btn btn-outline">Login</button></a>
            <div class="mobile-menu-toggle">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="hero-background">
            <img src="https://www.newtimes.co.rw/thenewtimes/uploads/images/2024/01/19/thumbs/1200x700/39034.jpg" alt="twegerane" class="hero-image">
        </div>
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">
                    Grab Your Ticket 
                    <span class="gradient-text">In Seconds</span>
                </h1>
                <p class="hero-subtitle">
                    Adventure begins where your comfort zone ends.
                </p>
                <div class="hero-actions">
                    <a href="user.php"><button class="btn btn-large btn-primary">
                       <i class="fas fa-ticket-alt"></i>
                        Book Now
                    </button></a>
                    
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="about" class="features">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Why Choose TuGenDe?</h2>
                <p class="section-subtitle">Streamlined booking experience with premium accommodations</p>
            </div>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h3 class="feature-title">Convenience</h3>
                    <p class="feature-description">Book your ticket in under 60 seconds from everywhere you are at any time.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3 class="feature-title">Secure & Trusted</h3>
                    <p class="feature-description">Bank-level security with verified properties and guaranteed reservations</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3 class="feature-title">Time-Saving</h3>
                    <p class="feature-description">Avoids waiting in long queues at ticket counters.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Bus Showcase -->
    <section id="rooms" class="rooms-showcase">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Featured Accommodations</h2>
                <p class="section-subtitle">Served accomodations during the travel.</p>
            </div>
            <div class="rooms-grid">
                <div class="room-card">
                    <div class="room-image">
                        <img src="https://umuseke.rw/wp-content/uploads/2022/10/ritco-new.jpg" alt="Executive Suite">
                        <div class="room-overlay">
                            <a href="user.php"><button class="btn btn-primary">Explore</button></a>
                        </div>
                    </div>
                    <div class="room-info">
                        <h3 class="room-title">Ritco Ltd</h3>
                        <p class="room-price">Rwf 4,000 and below</p>
                        <div class="room-amenities">
                            <span class="amenity"><i class="fas fa-wifi"></i>WiFi</span>
                            <span class="amenity"><i class="fas fa-bus"></i>AC</span>
                        </div>
                    </div>
                </div>
                <div class="room-card">
                    <div class="room-image">
                        <img src="https://pbs.twimg.com/media/D1X11L2WoAAfCRK.jpg:large" alt="Luxury Bedroom">
                        <div class="room-overlay">
                            <a href="user.php"><button class="btn btn-primary">Explore</button></a>
                        </div>
                    </div>
                    <div class="room-info">
                        <h3 class="room-title">YEGOCABS</h3>
                        <p class="room-price">Rwf 10,000 and below</p>
                        <div class="room-amenities">
                            <span class="amenity"><i class="fas fa-wifi"></i> WiFi</span>
                            <span class="amenity"><i class="fas fa-bus"></i>AC</span>
                            <span class="amenity"><i class="fas fa-music"></i>Radio access</span>
                        </div>
                    </div>
                </div>
                <div class="room-card">
                    <div class="room-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSkeYADiaqaU1uevWoSiHVgRcyWo_eIlNdQ-A&shttps://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSkeYADiaqaU1uevWoSiHVgRcyWo_eIlNdQ-A&s" alt="Modern Room">
                        <div class="room-overlay">
                            <a href="user.php"><button class="btn btn-primary">Explore</button></a>
                        </div>
                    </div>
                    <div class="room-info">
                        <h3 class="room-title">Jaguar</h3>
                        <p class="room-price">Rwf 30,000 and below</p>
                        <div class="room-amenities">
                            <span class="amenity"><i class="fas fa-wifi"></i> WiFi</span>
                            <span class="amenity"><i class="fas fa-coffee"></i> AC</span>
                             <span class="amenity"><i class="fas fa-dumbbell"></i>Mini-bar</span>
                            <span class="amenity"><i class="fas fa-pillow"></i>Pillows</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2 class="cta-title">Ready to Make Great Adventures?</h2>
                <p class="cta-subtitle">Join TuGenDe thousand users for a fast and best travel ways.</br>
                 A valid login is for a super-admin and an admin.
                </p>
                <div class="cta-actions">
                    
                    <a href="login.php"><button class="btn btn-large btn-outline">
                        <i class="fas fa-sign-in-alt"></i>
                        Sign In
                    </button></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact" class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-brand">
                    <h3 class="footer-logo">TuGenDe</h3>
                    <p class="footer-description">Adventure begins where your comfort zone ends.</p>
                </div>
                <div class="footer-links">
                    <div class="footer-column">
                        <h4 class="footer-title">Company</h4>
                        <a href="#rooms" class="footer-link">Destinations</a>
                        <a href="#about" class="footer-link">About</a>
                        <a href="#contact" class="footer-link">Contact</a>
                    </div>
                    <div class="footer-column">
                        <h4 class="footer-title">Support</h4>
                        <a href="#" class="footer-link">Help Center</a>
                        <a href="#" class="footer-link">Contact</a>
                        <a href="#" class="footer-link">Safety</a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="footer-social">
                    <a href="#" class="social-link"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
                </div>
                <p class="footer-copyright">© 2025 TuGenDe. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
