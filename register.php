<?php
include('connect.php');
if(isset($_POST['register'])){
    $email = $_POST["email"];
    $username = $_POST["username"];
    $telp = $_POST["telp"];
    $password = $_POST["password"];
    
    // Validasi password
    if (!preg_match('/^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/', $password)) {
        echo "Gunakan 1 huruf kapital, angka, minimal 8 karakter";
        exit();
    }

    $query = "INSERT INTO user (email, username, telp, password)
              VALUES ('$email', '$username', '$telp', '$password')";

    if (mysqli_query($connect, $query)) {
       header("Location: login.html");
    } else {
        echo "Gagal Mendaftar : " . mysqli_error($connect);
    }
}
?>