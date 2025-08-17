<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "bookings";
$connection = mysqli_connect($server, $username, $password, $database);

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $result = mysqli_query($connection, "SELECT * FROM users WHERE id='$id'");
    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    }

    $room = mysqli_fetch_assoc($result);
    if ($room) {
        $image = $room["img"];
        $type = $room["type"];
        $price = $room["price"];
        $statu = $room["statu"];
        $amenities = $room["amenities"];

        $q = "INSERT INTO booked(img, type, price, statu, amenities)
              VALUES('$image', '$type', '$price', '$statu', '$amenities')";

        if (mysqli_query($connection, $q)) {
            header("location:user.php");
            exit();
        } else {
            echo "Insert failed: " . mysqli_error($connection);
        }
    } else {
        echo "No record found with id=$id";
    }
}
?>
