<?php
$server="localhost";
$username="root";
$password="";
$database= "bookings";
$connection=mysqli_connect( $server, $username, $password, $database);
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query="DELETE FROM booking WHERE id=$id";
    mysqli_query($connection, $query);
    header("location:admin.php");
}
?>