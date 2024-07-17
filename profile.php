<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

require 'connect.php';

$email = $_SESSION['email'];
$query = "SELECT * FROM user WHERE email = '$email'";
$result = mysqli_query($konek, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $username = $row['username'];
    $telp = $row['telp'];
    $password = $row['password'];
} else {
    echo "Error: " . mysqli_error($konek);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    <link rel="stylesheet" href="recomended/recommended.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #f0f0f0;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .navbar {
            background-color: #333;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            border-radius: 8px 8px 0 0;
        }
        .brand {
            text-decoration: none;
            color: white;
            font-size: 24px;
            font-weight: bold;
        }
        .list {
            list-style-type: none;
            display: flex;
            align-items: center;
            margin: 0;
            padding: 0;
        }
        .list li {
            margin-right: 20px;
        }
        .list li a {
            text-decoration: none;
            color: white;
            font-weight: bold;
        }
        .dropdown {
            position: relative;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            right: 0;
        }
        .dropdown-content a {
            color: #333;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        .material-icons {
            background: none;
            border: none;
            color: white;
            font-size: 24px;
            cursor: pointer;
        }
        .profil {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .profil h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }
        .profil .label {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        .profil label {
            font-weight: bold;
        }
        .profil p {
            background-color: #f9f9f9;
            padding: 10px;
            border-radius: 4px;
            margin: 0;
        }
        .pass {
            display: flex;
            align-items: center;
        }
        .pass p {
            margin-right: 10px;
        }
        .profil button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .profil button:hover {
            background-color: #0056b3;
        }
        .logout {
            margin-top: 20px;
        }
        .profil .out {
            background-color: crimson;
        }
        .profil .out:hover {
            background-color: #8a0e27;
        }
    </style>
</head>
<body>
    <div>
        <nav class="navbar">
            <div>
                <a href="recomended/recommended.html" class="brand">
                    <div class="teks1">SAN</div>
                    <div class="teks2">Cloth</div>
                </a>
            </div>
            <ul class="list">   
                <li>
                    <a href="hot news/hotnews.html" class="item">
                        Hot News
                    </a>
                </li>
                <li>
                    <a href="men/men.html" class="item">
                        Men
                    </a>
                </li>
                <li>
                    <a href="women/women.html" class="item">
                        Women
                    </a>
                </li>
                <li>
                    <a href="about/about.html" class="item">
                        About Me
                    </a>
                </li>
                <form role="search">
                    <input class="input" type="search" placeholder="Search">
                    <button class="cari" type="submit">Search</button>
                </form>
                <div class="dropdown">
                    <button class="material-icons">person</button>
                    <div class="dropdown-content">
                        <a href="profile.php">Profile</a>
                        <a href="login.php">Logout</a>
                    </div>
                </div>
            </ul>
        </nav>

        <script src="recommended.js"></script>
    </div>
    <div class="container">
        <h1>My Profile</h1>
        <div class="profil">
            <h2><?php echo htmlspecialchars($username); ?>!</h2>
            <div class="isi">
                <div class="label">
                    <label for="Email">Email</label>
                    <p><?php echo htmlspecialchars($email); ?></p>
                </div>
                <div class="label">
                    <label for="Telepon">Telepon</label>
                    <p><?php echo htmlspecialchars($telp); ?></p>
                </div>
                <div>
                    <label for="Password">Password</label>
                    <div class="pass">
                    <p><?php echo htmlspecialchars($password); ?></p>
                        <form action="update.php" method="post">
                            <button class="edit" type="submit">Edit</button>
                        </form>
                    </div>
                </div>
                <div class="logout">
                    <form action="login.php">
                        <button class="out" type="">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
