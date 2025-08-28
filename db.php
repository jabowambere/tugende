<?php
$server="localhost";
$username="root";
$password="";
$database="bookings";
$connection = mysqli_connect('db', 'appuser', 'apppassword', 'bookings');
if(isset($_POST['register'])){
    $Email=$_POST['email'];
    $Role=$_POST['roles'];
    $Pass=$_POST['pass'];
    $Password=password_hash($Pass, PASSWORD_DEFAULT);
    $pattern = '/^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/';

if (preg_match($pattern, $Password)) {
    echo "Password is valid.";
} else {
    echo "Password is invalid. It must contain at least one uppercase letter, one number, and one symbol.";
}
    $query="INSERT INTO rooms (email, roles, pass)VALUES('$Email', '$Role', '$Password')";
    mysqli_query($connection, $query);
    header("location:login.php?mess='Registered Successfully'");
}
if(isset($_POST['login'])){
    $Email= $_POST ['email'];
    $Pass = $_POST['pass'];
    $q="SELECT * FROM rooms WHERE email='$Email'";
    $result=mysqli_query($connection, $q);
    if(mysqli_num_rows($result)==1){
        $user=mysqli_fetch_assoc($result);
        if(PASSWORD_VERIFY($Pass, $user['pass'])){
            SESSION_START();
            $_SESSION['id']=$user['id'];
            $_SESSION['email']=$user['email'];
            $_SESSION['roles']=$user['roles'];
            if($user['roles']=='admin'){
                header("location: admin.php");
            }
        }
    }
    else{
        //echo "Not Found!";
        header("location:login.php?message='User not found'");
    }
}
if(isset($_POST['submit'])){
    $image=$_POST["img"];
    $type=$_POST["type"];
    $price=$_POST["price"];
    $statu=$_POST["statu"];
    $amenities=$_POST["amenities"];
    $q="INSERT INTO booking(img, type, price, statu, amenities)VALUES('$image', '$type', '$price', '$statu', '$amenities')";
    mysqli_query($connection, $q);
    header("location:admin.php");
}
if(ISSET($_POST['edit'])){
    $id=$_POST['id'];
    $image=mysqli_real_escape_string($connection,$_POST["img"]);
    $type=mysqli_real_escape_string($connection,$_POST["type"]);
    $price=mysqli_real_escape_string($connection,$_POST["price"]);
    $statu=mysqli_real_escape_string($connection,$_POST["statu"]);
    $amenities=mysqli_real_escape_string($connection,$_POST["amenities"]);
    $q="UPDATE users SET img='$image', type='$type', price='$price',statu='$statu', amenities='$amenities' WHERE id='$id'";
    $q="UPDATE booking SET img='$image', type='$type', price='$price',statu='$statu', amenities='$amenities' WHERE id='$id'";
    if(mysqli_query($connection,$q)){
      header("location:admin.php");
    }    
   }

   if(isset($_POST['book'])){
    $image=$_POST["img"];
    $type=$_POST["type"];
    $price=$_POST["price"];
    $statu=$_POST["statu"];
    $amenities=$_POST["amenities"];
    $q="INSERT INTO booked(img, type, price, statu, amenities)VALUES('$image', '$type', '$price', '$statu', '$amenities')";
    mysqli_query($connection, $q);
    header("location:thanks.html");
}
?>