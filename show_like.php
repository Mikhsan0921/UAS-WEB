<?php
session_start();
require 'connect.php';

if (isset($_SESSION['loggedin'])) {
    $userId = $_SESSION['email']; // Ganti dengan ID user yang sesuai
    
    // Ambil data produk yang dilike oleh user dari tabel likes
    $query = "SELECT p.* FROM products p
              INNER JOIN likes l ON p.id = l.product_id
              WHERE l.user_id = '$userId'";
    
    $result = mysqli_query($konek, $query);
    
    // Tampilkan produk yang dilike
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="product">';
        echo '<h3>' . $row['product_name'] . '</h3>';
        echo '<p>Harga: ' . $row['price'] . '</p>';
        echo '<img src="' . $row['image_url'] . '" alt="' . $row['product_name'] . '">';
        echo '</div>';
    }
} else {
    echo 'Anda belum login.';
}
?>
