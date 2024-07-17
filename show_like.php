<?php
session_start();
require 'connect.php';

if (isset($_SESSION['loggedin'])) {
    $userId = $_SESSION['email']; // Ganti dengan ID user yang sesuai
    
    // Query untuk mengambil produk yang dilike oleh user
    $query = "SELECT p.* FROM produk p
              INNER JOIN likes l ON p.produk_id = l.produk_id
              WHERE l.user_id = '$userId'";
    
    $result = mysqli_query($konek, $query);

    // Periksa apakah query berhasil dieksekusi
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            // Tampilkan produk yang dilike
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="product">';
                echo '<h3>' . $row['product_name'] . '</h3>';
                echo '<p>Harga: ' . $row['price'] . '</p>';
                echo '<img src="' . $row['image_url'] . '" alt="' . $row['product_name'] . '">';
                echo '</div>';
            }
        } else {
            echo 'Belum ada produk yang Anda sukai.';
        }
    } else {
        echo 'Query error: ' . mysqli_error($konek);
    }
} else {
    echo 'Anda belum login.';
}
?>