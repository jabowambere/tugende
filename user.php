
<!DOCTYPE html>
<html>
    <head>
        <title>TuGenDe - Book Your Spot</title>
        <link rel="stylesheet" href="user-card.css">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    </head>
    <body>
        <!-- Header -->
        <header class="header">
            <div class="header-container">
                <div class="logo">
                    <h1><i class="fas fa-bus"></i>TuGenDe</h1>
                </div>
                <nav class="nav-menu">
                    <a href="home.php">Home</a>

                </nav>
            </div>
        </header>

        <!-- Hero Section -->
        <section class="hero">
            <div class="hero-content">
                <h2>Welcome to TuGenDe</h2>
                <p>Experience luxury and comfort in our premium accommodations</p>
            </div>
       <!-- Available Rooms Section -->
<section class="available-rooms">
    <div class="container">
        <h2>Available Buses</h2>
        <p class="section-subtitle">Book your perfect stay today</p>
        
        <div class="rooms-grid">
            <?php
            $connection = mysqli_connect("db", "appuser", "apppassword", "bookings");
            $query = "SELECT * FROM booking";
            $result = mysqli_query($connection, $query);
            
            while($card = mysqli_fetch_assoc($result)) {
                $id = $card['id'];
                $image = $card['img'];
                $type = $card['type'];
                $price = $card['price'];
                $statu = $card['statu'];
                $amenities = $card['amenities'];
            ?>
            <!-- Available Room Card -->
            <div class="room-card <?php echo strtolower($statu); ?>">
                <div class="room-image">
                    <img src="<?php echo mysqli_real_escape_string($connection, $image); ?>" alt="<?php echo htmlspecialchars($type); ?>">
                    <div class="room-badge <?php echo strtolower($statu); ?>">
                        <p class="value"><?php echo mysqli_real_escape_string($connection, $statu); ?></p>
                    </div>
                </div>
                <div class="room-content">
                    <h3 class="room-title"><?php echo mysqli_real_escape_string($connection, $type); ?></h3>
                    <p class="room-price"><?php echo mysqli_real_escape_string($connection, $price); ?></p>
                    <p class="room-amenities"><?php echo mysqli_real_escape_string($connection, $amenities); ?></p>
                    <div class="room-actions">
                        <a href="book.php?id=<?php echo $id; ?>">
                            <a href="confirm.html"><input type="submit" value="BOOK NOW" name="book" class="login-btn">
                        </a>
                    </div>
                </div>
            </div>
            <?php 
            }
            mysqli_close($connection);
            ?>
        </div>
    </div>
</section>

    <script src="script.js"></script>
    </body>
</html>