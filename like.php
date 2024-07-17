<?php
session_start();
require 'connect.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['loggedin'])) {
    $userId = $_SESSION['email'];
    $productId = $_POST['productId'];

    // Simpan data like ke dalam tabel likes
    $query = "INSERT INTO likes (user_id, product_id) VALUES ('$userId', '$productId')";

    if (mysqli_query($konek, $query)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => mysqli_error($konek)]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Unauthorized']);
}
?>
