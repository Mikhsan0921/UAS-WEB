<?php
$localhost = "localhost";
$user = "root";
$pass = "";
$database = "toko_baju";

$konek = mysqli_connect($localhost, $user, $pass, $database);

if (!$konek) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>