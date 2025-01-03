<?php
session_start();
require 'includes/db.php';

// Check if user is logged in
if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

$usersCollection = $database->users;
$error = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $action = $_POST['action']; // login or register

    if ($action === 'register') {
        // Check if username exists
        $existingUser = $usersCollection->findOne(['username' => $username]);
        if ($existingUser) {
            $error = "Username already exists!";
        } else {
            // Register new user
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $usersCollection->insertOne([
                'username' => $username,
                'password' => $hashedPassword,
                'created_at' => new MongoDB\BSON\UTCDateTime()
            ]);
            $_SESSION['user_id'] = (string)$username;
            header('Location: index.php');
            exit;
        }
    } elseif ($action === 'login') {
        // Authenticate user
        $user = $usersCollection->findOne(['username' => $username]);
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = (string)$username;
            header('Location: index.php');
            exit;
        } else {
            $error = "Invalid username or password!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login / Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script defer>
        function toggleTab(tab) {
            document.getElementById('login-form').style.display = tab === 'login' ? 'block' : 'none';
            document.getElementById('register-form').style.display = tab === 'register' ? 'block' : 'none';
        }
    </script>
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Welcome to IMS</h2>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#" onclick="toggleTab('login');">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="toggleTab('register');">Register</a>
                </li>
            </ul>
            <div class="card mt-3">
                <div class="card-body">
                    <?php if ($error): ?>
                        <div class="alert alert-danger"><?= $error ?></div>
                    <?php endif; ?>

                    <!-- Login Form -->
                    <form id="login-form" method="POST">
                        <h3>Login</h3>
                        <input type="hidden" name="action" value="login">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>

                    <!-- Registration Form -->
                    <form id="register-form" method="POST" style="display: none;">
                        <h3>Register</h3>
                        <input type="hidden" name="action" value="register">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
