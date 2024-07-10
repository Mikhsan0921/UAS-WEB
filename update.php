<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

require 'connect.php';

$email = $_SESSION['email'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['new_password'])) {
    $new_password = mysqli_real_escape_string($konek, $_POST['new_password']);

    $query = "UPDATE user SET password = '$new_password' WHERE email = '$email'";
    if (mysqli_query($konek, $query)) {
        header("Location: profile.php?status=success");
        exit;
    } else {
        $error_message = "Error: " . mysqli_error($konek);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Password</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #fff;
        }
        .container {
            background-color: #333;
            padding: 20px;
            border: 2px solid white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        .container h2 {
            color: white;
            text-align: center;
            margin-bottom: 20px;
        }
        .container label {
            color: white;
            display: block;
            margin-bottom: 5px;
        }
        .container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .container button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .container button:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Update Password</h2>
        <?php
        if (isset($error_message)) {
            echo '<p class="error">' . $error_message . '</p>';
        }
        ?>
        <form action="update.php" method="post">
            <label for="new_password">Password Baru</label>
            <input type="password" id="new_password" name="new_password" required>
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
