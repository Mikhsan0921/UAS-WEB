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
        .container {
            margin: 0 auto;
            display: flex;
            align-items: center;
            flex-direction: column;
            background-color: white;
            padding: 20px;
            border: 2px solid white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            height: 100vh;
        }
        .isi{
            margin-top: 20px;
        }
        .profil {
            padding: 200px;
            text-align: center;
            margin-top: 10px;
            background-color: #333;
            border: 1px solid #ddd;
            border-radius: 30px;

        }
        .profil div {
            margin-bottom: 15px;
            justify-content: space-between;
            align-items: center;
        }
        .profil label {
            font-weight: bold;
            color: white;
        }
        .profil p {
            margin: 0 auto;
            background-color: #f9f9f9;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            width: 10cm;
            font-family: Arial, Helvetica, sans-serif;
        }
        .pass{
            display: flex;
            flex-direction: row;
        }
        .profil button {
            margin-left: 10px;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .logout {
            margin-top: 100px;
        }
        .profil .out {
            background-color: crimson;
            color: white;
            padding: 20px;
        }

        .profil .out:hover {
            background-color: #8a0e27;
        }
        .profil .edit {
            background-color: #007bff;
            color: white;
        }

        .profil .edit:hover {
            background-color: #0056b3;
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
            <h2>Selamat datang, <?php echo htmlspecialchars($username); ?>!</h2>
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
