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
                        <h1>TuGenDe Dashboard</h1>
                        <p>Welcome back, Admin</p>
                    </div>
                </header>
               
<div class="rooms-section">
    <h3>Booked Buses</h3>
    <div class="rooms-grid">
        <?php
        $connection = mysqli_connect("localhost", "root", "", "bookings");
        $query = "SELECT * FROM booked";
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
                <div style="  text-align: center;
                justify-content:center;
                align-items:center;
    position: relative;
    top: 100px;
    right: 40px;
    font-size:30px" class="name">
                 <b><p class="room-title"><?php echo mysqli_real_escape_string($connection, $image); ?></p></b>
                </div>
                <div style="color:black; background-color:green" class="room-status <?php echo strtolower($statu); ?>">
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
                    <a href="delete_client.php?id=<?php echo $id;?>" onclick="return confirm('Are you sure you want to delete this room?');" class="btn btn-delete">
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
    </body>
</html>