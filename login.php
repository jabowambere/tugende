<?php
if(isset($_GET['message'])){
$message=$_GET['message'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - TuGenDe</title>
    <meta name="description" content="Sign in to your room booking account. Access your bookings, manage your properties, and explore available rooms.">
    <link rel="stylesheet" href="all.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
</head>
<body>
    <div class="min-h-screen room-gradient-bg flex items-center justify-center p-4">
        <div class="form-card w-full max-w-md p-8 rounded-2xl shadow-2xl">
            <!-- Header -->
            <div class="text-center mb-8">
                <div><i class="fas fa-wifi"></i></div>
                <h1 class="text-3xl font-bold text-foreground mb-2">Welcome Back</h1>
                <p class="text-muted-foreground">Sign in to your account</p>
            </div>

            <!-- Login Form -->
            <form action="db.php" method="POST" id="loginForm" class="space-y-6">
                <!-- Email Field -->
                <div class="form-item">
                    <div class="relative">
                        <input
                            type="text"
                            id="email"
                            name="email"
                            placeholder=" "
                            class="input-field h-12 px-4 border-2 rounded-xl bg-background w-full"
                            required
                        >
                        <label for="email" class="floating-label">Company Name</label>
                    </div>
                    <div class="validation-message" id="emailError"></div>
                </div>

                <!-- Password Field -->
                <div class="form-item">
                    <div class="relative">
                        <input
                            type="password"
                            id="password"
                            name="pass"
                            placeholder=" "
                            class="input-field h-12 px-4 pr-12 border-2 rounded-xl bg-background w-full"
                            required
                        >
                        <label for="password" class="floating-label">Password</label>
                        <button
                            type="button"
                            id="togglePassword"
                            class="absolute right-2 top-1/2 transform -translate-y-1/2 h-8 w-8 flex items-center justify-center"
                        >
                            <i data-lucide="eye" class="h-4 w-4 text-muted-foreground"></i>
                        </button>
                    </div>
                    <div class="validation-message" id="passwordError"></div>
                </div>

                <!-- Remember Me & Forgot Password -->
               

                <!-- Submit Button -->
                <button
                    name="login"
                    type="submit"
                    id="submitBtn"
                    class="btn-primary w-full h-12 rounded-xl font-semibold shadow-lg hover:shadow-xl flex items-center justify-center"
                >
                    <i data-lucide="log-in" class="w-5 h-5 mr-2"></i>
                    <span style="position: relative; right: 20px" >Sign In</span>
                </button></br></br>

                

                <!-- Register Link -->
            </form>
            <a href="home.php">
                    <button
                    name="login"
                    type="submit"
                    id="submitBtn"
                    class="btn-primary w-30 h-12 rounded-xl font-semibold shadow-lg hover:shadow-xl flex items-center justify-center"
                    style="position: relative; left: 100px; text-align: center"
                >
                    <i data-lucide="log-in" class="w-5 h-5 mr-2"></i>
                    <span style="position: relative; right: 20px">Go To Home</span>
                </button>
                </a>
        </div>
    </div>

    <script src="login.js"></script>
</body>
</html>