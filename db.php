<?php
session_start();

// Connection settings for Neon PostgreSQL
$conn = pg_connect(
    "host=ep-curly-art-ad25dgqw-pooler.c-2.us-east-1.aws.neon.tech " .
    "port=5432 " .
    "dbname=neondb " .
    "user=neondb_owner " .
    "password=npg_SXMs4RfrYb9p " .
    "sslmode=require"
);

if (!$conn) {
    die("❌ Connection failed: " . pg_last_error());
}

// ======================= REGISTER =======================
if (isset($_POST['register'])) {
    $Email = $_POST['email'];
    $Role = $_POST['roles'];
    $Pass = $_POST['pass'];

    // Hash password
    $Password = password_hash($Pass, PASSWORD_DEFAULT);

    // Password strength check (on raw password, not hash!)
    $pattern = '/^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/';
    if (!preg_match($pattern, $Pass)) {
        echo "Password is invalid. It must contain at least one uppercase letter, one number, and one symbol.";
        exit;
    }

    // Insert user into Postgres table "rooms"
    $query = "INSERT INTO rooms (email, roles, pass) VALUES ($1, $2, $3)";
    $result = pg_query_params($conn, $query, [$Email, $Role, $Password]);

    if ($result) {
        header("Location: login.php?mess=Registered Successfully");
        exit;
    } else {
        echo "Error: " . pg_last_error($conn);
    }
}

// ======================= LOGIN =======================
if (isset($_POST['login'])) {
    $Email = $_POST['email'];
    $Pass = $_POST['pass'];

    $q = "SELECT * FROM rooms WHERE email=$1";
    $result = pg_query_params($conn, $q, [$Email]);

    if (pg_num_rows($result) == 1) {
        $user = pg_fetch_assoc($result);
        if (password_verify($Pass, $user['pass'])) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['roles'] = $user['roles'];

            if ($user['roles'] == 'admin') {
                header("Location: admin.php");
                exit;
            }
        }
    } else {
        header("Location: login.php?message=User not found");
        exit;
    }
}

// ======================= ADD BOOKING =======================
if (isset($_POST['submit'])) {
    $image = $_POST["img"];
    $type = $_POST["type"];
    $price = $_POST["price"];
    $statu = $_POST["statu"];
    $amenities = $_POST["amenities"];

    $q = "INSERT INTO booking (img, type, price, statu, amenities) VALUES ($1, $2, $3, $4, $5)";
    $result = pg_query_params($conn, $q, [$image, $type, $price, $statu, $amenities]);

    if ($result) {
        header("Location: admin.php");
        exit;
    } else {
        echo "Error: " . pg_last_error($conn);
    }
}

// ======================= EDIT BOOKING =======================
if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $image = $_POST["img"];
    $type = $_POST["type"];
    $price = $_POST["price"];
    $statu = $_POST["statu"];
    $amenities = $_POST["amenities"];

    $q = "UPDATE booking SET img=$1, type=$2, price=$3, statu=$4, amenities=$5 WHERE id=$6";
    $result = pg_query_params($conn, $q, [$image, $type, $price, $statu, $amenities, $id]);

    if ($result) {
        header("Location: admin.php");
        exit;
    } else {
        echo "Error: " . pg_last_error($conn);
    }
}

// ======================= BOOK NOW =======================
if (isset($_POST['book'])) {
    $image = $_POST["img"];
    $type = $_POST["type"];
    $price = $_POST["price"];
    $statu = $_POST["statu"];
    $amenities = $_POST["amenities"];

    $q = "INSERT INTO booked (img, type, price, statu, amenities) VALUES ($1, $2, $3, $4, $5)";
    $result = pg_query_params($conn, $q, [$image, $type, $price, $statu, $amenities]);

    if ($result) {
        header("Location: thanks.html");
        exit;
    } else {
        echo "Error: " . pg_last_error($conn);
    }
}
?>
