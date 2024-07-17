<?php
session_start();
require 'connect.php';

$login_error = "";
$register_error = "";

// Proses login
if (isset($_POST['login'])) {
    $email = trim($_POST["login-email"]);
    $password = trim($_POST["password"]);

    if (empty($email) || empty($password)) {
        $login_error = "<span style='color:red;'>Email and password cannot be empty.</span>";
    } else {
        $email = mysqli_real_escape_string($konek, $email);
        $password = mysqli_real_escape_string($konek, $password);

        $query = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($konek, $query);

        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            $_SESSION['username'] = $user['username'];
            
            // Redirect to recommended.html after successful login
            header("Location: recomended/recommended.html");
            exit;
            
        } else {
            $login_error = "<span style='color:red;'>Invalid email or password.</span>";
        }
    }
}

// Proses registrasi
if (isset($_POST['register'])) {
    $email = trim($_POST["email"]);
    $username = trim($_POST["username"]);
    $telp = trim($_POST["telp"]);
    $password = trim($_POST["password"]);

    if (empty($email) || empty($username) || empty($telp) || empty($password)) {
        $register_error = "<span style='color:red;'>All fields are required.</span>";
    } else {
        $email = mysqli_real_escape_string($konek, $email);
        $username = mysqli_real_escape_string($konek, $username);
        $telp = mysqli_real_escape_string($konek, $telp);
        $password = mysqli_real_escape_string($konek, $password);

        // Check if email already exists
        $check_query = "SELECT * FROM user WHERE email = '$email'";
        $check_result = mysqli_query($konek, $check_query);

        if (mysqli_num_rows($check_result) > 0) {
            $register_error = "<span style='color:red;'>Email already exists.</span>";
        } else {
            $insert_query = "INSERT INTO user (email, username, telp, password) VALUES ('$email', '$username', '$telp', '$password')";

            if (mysqli_query($konek, $insert_query)) {
                header("Location: login.php");
                exit;
            } else {
                $register_error = "<span style='color:red;'>Failed to register: " . mysqli_error($konek) . "</span>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login dan Registrasi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container" id="login-container">
        <div class="form-container sign-in-container">
            <form action="login.php" method="POST" onsubmit="return validateLogin()">
                <h2>Login</h2>
                <label for="login-email">Email</label>
                <input type="email" id="login-email" name="login-email" required>
                
                <label for="login-password">Password</label>
                <input type="password" id="login-password" name="password" required>
                
                <button type="submit" name='login'>Login</button>
                <?php echo $login_error; ?>
                <p class="message">Belum punya akun? <a href="#" onclick="showRegister()">Register</a></p>
            </form>
        </div>
    </div>
    <div class="container" id="register-container" style="display: none;">
        <div class="form-container sign-up-container">
            <form action="login.php" method="POST" onsubmit="return validateRegister()">
                <h2>Register</h2>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
                
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
                
                <label for="telp">Telephone</label>
                <input type="text" id="telp" name="telp" required>
                
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                
                <button type="submit" name='register'>Register</button>
                <?php echo $register_error; ?>
                <p class="message">Sudah punya akun? <a href="#" onclick="showLogin()">Login</a></p>
            </form>
        </div>
    </div>

    <script>
    function validateLogin() {
        var email = document.getElementById("login-email").value;
        var password = document.getElementById("login-password").value;
        
        if (email.trim() === '' || password.trim() === '') {
            alert("Email dan password tidak boleh kosong.");
            return false;
        }
        
        return true; // Allow form submission
    }

    function validateRegister() {
        var email = document.getElementById("email").value;
        var username = document.getElementById("username").value;
        var telp = document.getElementById("telp").value;
        var password = document.getElementById("password").value;
        
        if (email.trim() === '' || username.trim() === '' || telp.trim() === '' || password.trim() === '') {
            alert("Semua kolom harus diisi.");
            return false;
        }
        
        return true; // Allow form submission
    }

    function showRegister() {
        document.getElementById("login-container").style.display = "none";
        document.getElementById("register-container").style.display = "block";
    }

    function showLogin() {
        document.getElementById("login-container").style.display = "block";
        document.getElementById("register-container").style.display = "none";
    }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
