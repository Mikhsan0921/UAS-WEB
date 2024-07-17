<?php
session_start();
require 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['loggedin'])) {
    $userId = $_SESSION['email']; // Ganti dengan ID user yang sesuai
    $productId = $_POST['productId']; // Ambil ID produk dari permintaan
    
    // Simpan data like ke dalam tabel like
    $query = "INSERT INTO likes (user_id, product_id) VALUES ('$userId', '$productId')";

    if (mysqli_query($konek, $query)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => mysqli_error($konek)]);
    }
} else {
    // Handle jika tidak ada sesi login atau tidak ada POST request
    echo json_encode(['success' => false, 'error' => 'Unauthorized']);
}
?>
