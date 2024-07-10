<?php
session_start();

// Periksa apakah pengguna sudah login atau belum
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Jika tidak, arahkan kembali ke halaman login
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
        /* body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #fff;
        }
        .brand{
            display: flex;
            justify-content:center;
            text-decoration: none;
            font-family: 'Gill Sans', 'Gill Sans MT', 'Trebuchet MS', sans-serif;
        }
        .navbar {
            background-color: #333;
            color: white;
            width: 100%;
            text-align: center;
            padding: 15px;
            font-size: 20px;
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
        .profil {
            text-align: center;
        }
        .profil h2 {
            margin-bottom: 20px;
            color: white;
        }
        .profil div {
            margin-bottom: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .profil label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: white;
        }
        .profil p {
            background-color: #f9f9f9;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin: 0;
            flex-grow: 1;
        }
        .profil .edit {
            margin-left: 10px;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .profil button {
            margin-left: 10px;
            padding: 10px;
            background-color: crimson;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .profil button:hover{
            background-color: #8a0e27;
        }
        .profil .edit:hover {
            background-color: #0056b3;
        } */
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
        <div class="profil">
            <h2>Selamat datang, <?php echo htmlspecialchars($username); ?>!</h2>
            <div class="label">
                <label for="Email">Email</label>
                <p><?php echo htmlspecialchars($email); ?></p>
            </div>
            <div class="label">
                <label for="Telepon">Telepon</label>
                <p><?php echo htmlspecialchars($telp); ?></p>
            </div>
            <div class="label">
                <label for="Password">Password</label>
                <p><?php echo htmlspecialchars($password); ?></p>
                <form action="update.php" method="post">
                    <button class="edit" type="submit">Edit</button>
                </form>
            </div>
            <div class="logout">
                <form action="login.php">
                    <button type="">Logout</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
