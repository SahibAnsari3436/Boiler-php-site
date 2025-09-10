<?php
session_start();
include('includes/config.php');

// If already logged in, go to home
if (isset($_SESSION['auth']) && $_SESSION['auth'] === true) {
    header("Location: home.php");
    exit();
}

// Handle login form submission
if (isset($_POST['login_btn'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
    $query_run = mysqli_query($con, $query);

    if (mysqli_num_rows($query_run) > 0) {
        $row = mysqli_fetch_assoc($query_run);

        // If using password_hash
        if (password_verify($password, $row['password'])) {
            $_SESSION['auth'] = true;
            $_SESSION['auth_user'] = [
                'user_id' => $row['id'],
                'username' => $row['username'],
                'email' => $row['email']
            ];
            header("Location: home.php");
            exit();
        } 
        // If still using MD5 temporarily
        elseif (md5($password) === $row['password']) {
            $_SESSION['auth'] = true;
            $_SESSION['auth_user'] = [
                'user_id' => $row['id'],
                'username' => $row['username'],
                'email' => $row['email']
            ];
            header("Location: home.php");
            exit();
        }
        else {
            $_SESSION['auth_status'] = "Invalid Password";
        }
    } else {
        $_SESSION['auth_status'] = "Invalid Username";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<style>
.login-body {
    background-color: #fff;
    height: 90vh;
    display: flex;
    align-items: center;
    justify-content: center;
}
    /* Login Box */
.login-box {
    position: relative;
    background: #fff;
    padding: 40px 30px;
    border-radius: 10px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 350px;
    text-align: center;
    margin: auto;
}

/* Logo */
.login-box img {
    width: 100px;
    margin-bottom: 15px;
}

/* Heading */
.login-box h2 {
    margin-bottom: 20px;
    font-size: 22px;
    color: #222;
    font-weight: 600;
}

/* Input Fields */
.login-box input[type="text"],
.login-box input[type="password"] {
    width: 94%;
    padding: 12px 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 14px;
    transition: 0.3s ease;
}

.login-box input:focus {
    border-color: #007BFF;
    outline: none;
}

/* Button */
.login-box button {
    width: 100%;
    padding: 12px;
    background-color: #A91212;
    color: #fff;
    font-size: 15px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    transition: 0.3s ease;
    font-family: "Source Sans Pro", sans-serif;
}

.btn-close {
    width: 1rem !important;
    height: 1rem !important;
    background: transparent url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23000' viewBox='0 0 16 16'%3E%3Cpath d='M2.146 2.146a.5.5 0 0 1 .708 0L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854a.5.5 0 0 1 0-.708z'/%3E%3C/svg%3E") center/1rem auto no-repeat;
    border: none;
    opacity: 0.7 !important;
    position: absolute;
    padding: 12px !important;
    top: 0.50rem !important;
    right: 0.50rem !important;
}

.btn-close:hover {
    opacity: 1 !important;
}

.login-box button:hover {
    background-color: #A91212;
}

/* Error Message */
.login-box p {
    color: red;
    font-size: 13px;
    margin-bottom: 10px;
}

.login-alert {
        width: 100%;
        margin-bottom: 20px;
        font-size: 14px;
    }
</style>



<section>
    <div class="login-body">
        <div class="login-box">
            <img src="assets/dist/assets/img/logo/boiler-fav-icon.webp" alt="Logo"><br>
            <h2>Sign In</h2>

            <?php if (isset($_SESSION['auth_status'])): ?>
                <div class="login-alert alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Login Failed:</strong> <?= $_SESSION['auth_status']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                <?php unset($_SESSION['auth_status']); ?>
            <?php endif; ?>

            <form action="" method="POST">
                <input type="text" name="username" placeholder="Username" required><br><br>
                <input type="password" name="password" placeholder="Password" required><br><br>
                <button type="submit" name="login_btn">Login</button>
            </form> 
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
