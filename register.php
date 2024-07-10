<?php
include('connect.php');

if(isset($_POST['register'])){
    $email = $_POST["email"];
    $username = $_POST["username"];
    $telp = $_POST["telp"];
    $password = $_POST["password"];
    $query = "INSERT INTO user (email, username, telp, password)
              VALUES ('$email', '$username', '$telp', '$password')";

    if (mysqli_query($connect, $query)) {
       header("Location: login.html");
    } else {
        echo "Gagal Mendaftar : " . mysqli_error($connect);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>