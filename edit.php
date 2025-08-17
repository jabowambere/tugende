<?php
//session_start();
$server="localhost";
$username="root";
$password="";
$database="bookings";
$connection=mysqli_connect($server, $username, $password, $database);
$id=$_GET['id'];
$query="SELECT * FROM booking WHERE id='$id'";
$any=mysqli_query($connection, $query);
$row=mysqli_fetch_assoc($any);
if(!isset($_GET['id'])){
    header("location: admin.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Edit</title>
        <link rel="stylesheet" href="admin-card.css">
    </head>
    <body>
       <div class="dashboard-container">
            <!-- Sidebar -->
            <nav class="sidebar">
                <div class="sidebar-header">
                    <h2><i class="fas fa-hotel"></i> TuGenDe Dashboard</h2>
                </div>
                <ul class="sidebar-menu">
                    <li class="active">
                        <a href="admin.php"><i class="fas fa-chart-pie"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="booked.php"><i class="fas fa-bed"></i> Buses Booked</a>
                    </li>
                    <li>
                        <a href="admin.php"><i class="fas fa-plus"></i> Add Bus</a>
                    </li>
                    <li>
                        <a href="#analytics"><i class="fas fa-chart-bar"></i> Analytics</a>
                    </li>
                    <li>
                        <a href="#settings"><i class="fas fa-cog"></i> Settings</a>
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
                        <h1>Bus Dashboard</h1>
                        <p>Welcome back, Admin</p>
                    </div>
                </header>

                <!-- Stats Cards -->
                <div class="stats-grid">
                    <div class="stat-card total-rooms">
                        <div class="stat-icon">
                            <i class="fas fa-bed"></i>
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

                    <!-- Add Room Form -->
                    <div class="add-room-section">
                        <div class="form-card">
                            <h3><i class="fas fa-plus"></i> Add Bus</h3>
                            <form action="db.php" method="POST" class="add-room-form">


                            <div class="form-group">
                                    <label for="type">Bus</label>
                                    <input type="hidden" name="id" value=<?=$row['id']?> id="type" required>
                                </div>
                                
                                
                                <div class="form-group">
                                    <label for="img">Bus Image URL</label>
                                    <input type="text" name="img" value=<?=$row['img']?> id="img" placeholder="Enter image URL" required>
                                </div>
                                <div class="form-group">
                                    <label for="type">Destination</label>
                                    <input type="text" name="type" value=<?=$row['type']?> id="type" required>
                                </div>
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" name="price" value=<?=$row['price']?> id="price" required>
                                </div>
                                <div class="form-group">
                                    <label for="statu">Status</label>
                                    <input type="text" name="statu" value=<?=$row['statu']?> id="statu" required>
                                </div>
                                <div class="form-group">
                                    <label for="amenities">Time</label>
                                    <textarea name="amenities"  id="amenities" placeholder="Enter amenities separated by commas"><?=$row['amenities']?></textarea>
                                </div>
                                    <button type="submit" name="edit" class="submit-btn">
                                    <i class="fas fa-plus"></i> Add Bus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
    </body>
</html>