<?php
if(isset($_GET['mess'])){
 $mess=$_GET['mess'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account - Room Booking Platform</title>
    <meta name="description" content="Join our professional room booking platform. Create your account to start booking rooms or list your properties.">
    <link rel="stylesheet" href="all.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
</head>
<body>
    <div class="min-h-screen room-gradient-bg flex items-center justify-center p-4">
        <div class="form-card w-full max-w-md p-8 rounded-2xl shadow-2xl">
            <!-- Header -->
            <div class="text-center mb-8">
                <div class="w-16 h-16 bg-gradient-to-br from-primary to-secondary rounded-full flex items-center justify-center mx-auto mb-4">
                    <i data-lucide="bed" class="text-white text-2xl w-8 h-8"></i>
                </div>
                <h1 class="text-3xl font-bold text-foreground mb-2">Create Account</h1>
                <p class="text-muted-foreground">Join our Buses Booking Platform</p>
            </div>

            <!-- Registration Form -->
            <form action="db.php" method="POST" id="registerForm" class="space-y-6">
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

                <!-- Role Dropdown -->
                <div class="form-item">
                    <div class="relative">
                        <select
                            id="role"
                            name="roles"
                            class="input-field h-12 px-4 border-2 rounded-xl bg-background w-full"
                            required
                        >
                            <option value="" disabled selected hidden></option>
                            <option value="admin">Administrator</option>
                        </select>
                        <label for="role" class="floating-label select-label">Role</label>
                        <i data-lucide="chevron-down" class="absolute right-3 top-1/2 transform -translate-y-1/2 h-4 w-4 text-muted-foreground pointer-events-none"></i>
                    </div>
                    <div class="validation-message" id="roleError"></div>
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
                    
                    <!-- Password Strength Indicator -->
                    <div id="passwordStrength" class="mt-2 hidden">
                        <div class="flex space-x-1">
                            <div class="password-strength-bar flex-1" data-strength="1"></div>
                            <div class="password-strength-bar flex-1" data-strength="2"></div>
                            <div class="password-strength-bar flex-1" data-strength="3"></div>
                            <div class="password-strength-bar flex-1" data-strength="4"></div>
                        </div>
                        <p class="text-sm text-muted-foreground mt-1">
                            Password strength: <span id="strengthText" class="font-medium">Very Weak</span>
                        </p>
                    </div>
                    
                    <div class="validation-message" id="passwordError"></div>
                </div>

                <!-- Submit Button -->
                <button
                    name="register"
                    type="submit"
                    id="submitBtn"
                    class="btn-primary w-full h-12 rounded-xl font-semibold shadow-lg hover:shadow-xl flex items-center justify-center"
                >
                    <i data-lucide="user-plus" class="w-5 h-5 mr-2"></i>
                    <span style="position: relative; right: 20px">Create Account</span>
                </button> </br></br>

                <!-- Login Link -->
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

    <script src="register.js"></script>
</body>
</html>