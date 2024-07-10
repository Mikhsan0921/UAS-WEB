<?php
session_start();
require 'connect.php';
if (isset($_POST['login'])) {
    # code...
    $email = $_POST["login-email"];
    $password = $_POST["password"];

    $email = mysqli_real_escape_string($konek, $email);
    $password = mysqli_real_escape_string($konek, $password);

    $query = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($konek, $query);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;
        $_SESSION['username'] = $username;
        header("Location: recomended/recommended.html");
        exit;
    }
}

if(isset($_POST['register'])){
    $email = $_POST["email"];
    $username = $_POST["username"];
    $telp = $_POST["telp"];
    $password = $_POST["password"];
    $query = "INSERT INTO user (email, username, telp, password)
              VALUES ('$email', '$username', '$telp', '$password')";

    if (mysqli_query($konek, $query)) {
       header("Location: login.php");
    } else {
        echo "Gagal Mendaftar : " . mysqli_error($konek);
    }
}
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
    <link rel="stylesheet" href="login.cs">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login dan Registrasi</title>
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="container" id="login-container">
            <div class="form-container sign-in-container ">
                <form action="login.php" method="POST">
                    <h2>Login</h2>
                    <label for="login-email">Email</label>
                    <input type="email" id="login-email" name="login-email" required>
                    
                    <label for="login-password">Password</label>
                    <input type="password" id="login-password" name="password" required>
                    
                    <button type="submit" name='login'>Login</button>
                    <p class="message">Belum punya akun? <a href="#" onclick="showRegister()">Register</a></p>
                </form>
            </div>
        </div>
        <div class="container" id="register-container" style="display: none;">
            <div class="form-container sign-up-container">
                <form action="login.php" method="POST">
                    <h2>Register</h2>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                    
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                    
                    <label for="telpon">Telepon</label>
                    <input type="text" id="telpon" name="telp" required>
                    
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                    
                    <button type="submit" name="register">Register</button>
                    <p class="message">Sudah punya akun? <a href="#" onclick="showLogin()">Login</a></p>
                </form>
            </div>
        </div>

        <script>
            function showRegister() {
                document.getElementById('login-container').style.display = 'none';
                document.getElementById('register-container').style.display = 'block';
            }

            function showLogin() {
                document.getElementById('login-container').style.display = 'block';
                document.getElementById('register-container').style.display = 'none';
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
    </html>