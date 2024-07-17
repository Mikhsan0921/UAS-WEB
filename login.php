<?php
session_start();
require 'connect.php';
$login_error = ""; // Variable to store login error messages

if (isset($_POST['login'])) {
    $email = trim($_POST["login-email"]);
    $password = trim($_POST["password"]);

    if (empty($email) || empty($password)) {
        $login_error = "Email and password cannot be empty.";
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
            header("Location: recomended/recommended.html");
            exit;
        } else {
            $login_error = "Invalid email or password.";
        }
    }
}

if (isset($_POST['register'])) {
    $email = trim($_POST["email"]);
    $username = trim($_POST["username"]);
    $telp = trim($_POST["telp"]);
    $password = trim($_POST["password"]);

    if (empty($email) || empty($username) || empty($telp) || empty($password)) {
        $register_error = "All fields are required.";
    } else {
        $email = mysqli_real_escape_string($konek, $email);
        $username = mysqli_real_escape_string($konek, $username);
        $telp = mysqli_real_escape_string($konek, $telp);
        $password = mysqli_real_escape_string($konek, $password);

        $query = "INSERT INTO user (email, username, telp, password)
                  VALUES ('$email', '$username', '$telp', '$password')";

        if (mysqli_query($konek, $query)) {
            header("Location: login.php");
            exit;
        } else {
            $register_error = "Failed to register: " . mysqli_error($konek);
        }
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
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container" id="login-container">
        <div class="form-container sign-in-container">
            <form action="login.php" method="POST">
                <h2>Login</h2>
                <label for="login-email">Email</label>
                <input type="email" id="login-email" name="login-email" required>
                
                <label for="login-password">Password</label>
                <input type="password" id="login-password" name="password" required>
                
                <button type="submit" name='login'>Login</button>
                <?php
                if (!empty($login_error)) {
                    echo '<p class="error">'.$login_error.'</p>';
                }
                ?>
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
<!--                 
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                 -->

                 <label for="psw">Password</label>
                 <input type="password" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                 
                 <button type="submit" name="register">Register</button>
                 </form>
                </div>

                <div id="message">
                 <h3>Password must contain the following:</h3>
                 <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                 <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                 <p id="number" class="invalid">A <b>number</b></p>
                 <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                </div>

                <?php
                if (!empty($register_error)) {
                    echo '<p class="error">'.$register_error.'</p>';
                }
                ?>
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

        // function validateForm() {
        //     var password = document.forms["registerForm"]["password"].value;
        //     var regex = /^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/;
        //     if (!regex.test(password)) {
        //         alert("Gunakan 1 huruf kapital, angka, dan minimal 8 karakter");
        //         return false;
        //     }
        //     return true;
        // }

        var myInput = document.getElementById("psw");
        var letter = document.getElementById("letter");
        var capital = document.getElementById("capital");
        var number = document.getElementById("number");
        var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
        myInput.onfocus = function() {
            document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
        myInput.onblur = function() {
            document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
        myInput.onkeyup = function() {
  // Validate lowercase letters
            var lowerCaseLetters = /[a-z]/g;
        if(myInput.value.match(lowerCaseLetters)) {  
            letter.classList.remove("invalid");
            letter.classList.add("valid");
    } else {
        letter.classList.remove("valid");
        letter.classList.add("invalid");
  }
  
  // Validate capital letters
        var upperCaseLetters = /[A-Z]/g;
            if(myInput.value.match(upperCaseLetters)) {  
        capital.classList.remove("invalid");
            capital.classList.add("valid");
    } else {
        capital.classList.remove("valid");
            capital.classList.add("invalid");
  }

  // Validate numbers
        var numbers = /[0-9]/g;
            if(myInput.value.match(numbers)) {  
            number.classList.remove("invalid");
            number.classList.add("valid");
    } else {
        number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
