<?php
session_start();
$role = $_SESSION['roles'] ?? null;

if(!$role || strtolower($role) !=='admin'){
    header("location:login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>TuGenDe Admin Dashboard</title>
        <link rel="stylesheet" href="admin-card.css">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>
    <body>
        <div class="dashboard-container">
            <!-- Sidebar -->
            <nav class="sidebar">
                <div class="sidebar-header">
                    <h2><i class="fas fa-bus"></i> TuGenDe Dashboard</h2>
                </div>
                <ul class="sidebar-menu">
    <li class="active">
        <a href="admin.php"><i class="fas fa-chart-pie"></i> Dashboard</a>
    </li>
    <li>
        <a href="booked_buses.php"><i class="fas fa-bus"></i> Buses Booked</a>
    </li>
    <li>
        <a href="edit.php"><i class="fas fa-plus"></i> Add Bus</a>
    </li>
    <li>
        <a href="#analytics"><i class="fas fa-chart-bar"></i> Analytics</a>
    </li>
</ul>
<div class="sidebar-footer">
    <a href="logout.php" class="logout-btn">
        <i class="fas fa-sign-out-alt"></i> Logout
    </a>
</div>

            </nav>

            <!-- Main Content -->
            <div class="main-content">
                <!-- Header -->
                <header class="dashboard-header">
                    <div class="header-left">
                        <h1>TuGenDe Dashboard</h1>
                        <p>Welcome back, Admin</p>
                    </div>

                </header>

                <!-- Stats Cards -->
                <div class="stats-grid">
                    <div class="stat-card total-rooms">
                        <div class="stat-icon">
                            <i class="fas fa-bus"></i>
                        </div>
                        <div class="stat-content">
                            <h3>12</h3>
                            <p>Total Buses</p>
                        </div>
                    </div>
                    <div class="stat-card available-rooms">
                        <div class="stat-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="stat-content">
                            <h3>8</h3>
                            <p>Available</p>
                        </div>
                    </div>
                    
                    <div class="stat-card occupied-rooms">
                        <div class="stat-icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="stat-content">
                            <h3>3</h3>
                            <p>Occupied</p>
                        </div>
                    </div>
                </div>

                <!-- Charts and Add Room Form -->
                <div class="content-grid">
                    <!-- Chart Section -->
                    <div class="chart-section">
                        <div class="chart-card">
                            <h3>Bus Status Distribution</h3>
                            <canvas id="roomStatusChart"></canvas>
                        </div>
                    </div>

                    <!-- Add Room Form -->
                    <div class="add-room-section">
                        <div class="form-card">
                            <h3><i class="fas fa-plus"></i> Add New Bus</h3>
                            <form action="db.php" method="POST" class="add-room-form">
                                <div class="form-group">
                                    <label for="img">Bus Image URL</label>
                                    <input type="text" name="img" id="img" placeholder="Enter image URL" required>
                                </div>
                                <div class="form-group">
                                    <label for="type">Destination</label>
                                   <input type="text" name="type" id="type" placeholder="Where to?" required>
                                </div>
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" name="price" id="price" placeholder="Price" required>
                                </div>
                                <div class="form-group">
                                    <label for="statu">Status</label>
                                    <input type="text" name="statu" id="statu" placeholder="Bus Status" required>
                                </div>
                                <div class="form-group">
                                    <label for="amenities">Time</label>
                                    <textarea name="amenities" id="amenities" placeholder="When the buses will be available"></textarea>
                                </div>
                                <button type="submit" name="submit" class="submit-btn">
                                    <i class="fas fa-plus"></i> Add Bus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Rooms Grid -->
                <!-- Rooms Grid -->
<div class="rooms-section">
    <h3>Bus Management</h3>
    <div class="rooms-grid">
        <?php
        $connection = mysqli_connect("localhost", "root", "", "bookings");
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
        <!-- Room Card -->
        <div class="room-card">
            <div class="room-image">
                <img src="<?php echo mysqli_real_escape_string($connection, $image); ?>" alt="Image">
                <div class="room-status <?php echo strtolower($statu); ?>">
                    <p class="value"><?php echo mysqli_real_escape_string($connection, $statu); ?></p>
                </div>
            </div>
            <div class="room-content">
                <h4 class="room-title"><?php echo mysqli_real_escape_string($connection, $type); ?></h4>
                <p class="room-price"><?php echo mysqli_real_escape_string($connection, $price); ?></p>
                <p class="room-amenities"><?php echo mysqli_real_escape_string($connection, $amenities); ?></p>
                <div class="room-actions">
                    <a href="edit.php?id=<?= $id;?>" class="btn btn-edit">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="delete.php?id=<?php echo $id;?>" onclick="return confirm('Are you sure you want to delete this room?');" class="btn btn-delete">
                        <i class="fas fa-trash"></i> Delete
                    </a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
            </div>
        </div>

        <script>
            // Initialize Chart
            const ctx = document.getElementById('roomStatusChart').getContext('2d');
            const roomStatusChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Available', 'Occupied'],
                    datasets: [{
                        data: [8, 3, 1],
                        backgroundColor: ['#10b981', '#3b82f6'],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                padding: 20,
                                usePointStyle: true
                            }
                        }
                    }
                }
            });

            // Sidebar navigation
            document.querySelectorAll('.sidebar-menu a').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    document.querySelectorAll('.sidebar-menu li').forEach(li => li.classList.remove('active'));
                    this.parentElement.classList.add('active');
                });
            });

            // Search functionality
            document.querySelector('.search-box input').addEventListener('input', function(e) {
                const searchTerm = e.target.value.toLowerCase();
                document.querySelectorAll('.room-card').forEach(card => {
                    const roomType = card.querySelector('h4').textContent.toLowerCase();
                    const amenities = card.querySelector('.room-amenities').textContent.toLowerCase();
                    
                    if (roomType.includes(searchTerm) || amenities.includes(searchTerm)) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });

            // Mobile sidebar toggle (you can add a hamburger menu button)
            function toggleSidebar() {
                document.querySelector('.sidebar').classList.toggle('active');
            }

            // Add notification click handler
            document.querySelector('.notification-btn').addEventListener('click', function() {
                alert('3 new notifications:\n- Room 101 needs maintenance\n- New booking for Suite 205\n- Housekeeping completed for Room 304');
            });
        </script>
    </body>
</html>