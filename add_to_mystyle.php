<?php
session_start();
require 'connect.php'; // include your database connection

header('Content-Type: application/json'); // Set header

error_log("add_to_mystyle.php dipanggil"); // Log when the script is called

try {
    // Check if the user is logged in
    if (!isset($_SESSION['email'])) {
        error_log("Pengguna belum login");
        echo json_encode(['success' => false, 'message' => 'Pengguna belum login']);
        exit;
    }

    $email = $_SESSION['email'];
    $data = json_decode(file_get_contents('php://input'), true);

    if (!$data) {
        error_log("Data JSON tidak valid");
        echo json_encode(['success' => false, 'message' => 'Data JSON tidak valid']);
        exit;
    }

    $url = $data['link'];
    $image = $data['image'];
    $price = $data['price'];
    $description = $data['description'];

    error_log("Data diterima: " . print_r($data, true));

    // Get user_id based on email
    $stmt = $konek->prepare("SELECT id FROM user WHERE email = ?");
    if (!$stmt) {
        throw new Exception("Prepare statement gagal: " . $konek->error);
    }
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 0) {
        throw new Exception("Pengguna tidak ditemukan");
    }
    $row = $result->fetch_assoc();
    $user_id = $row['id'];
    $stmt->close();

    error_log("user_id ditemukan: " . $user_id);

    // Insert product into the database
    $stmt = $konek->prepare("INSERT INTO produk (user_id, link, gambar, harga, deskripsi) VALUES (?, ?, ?, ?, ?)");
    if (!$stmt) {
        throw new Exception("Prepare statement gagal: " . $konek->error);
    }
    $stmt->bind_param("issss", $user_id, $url, $image, $price, $description);
    if (!$stmt->execute()) {
        throw new Exception("Execute statement gagal: " . $stmt->error);
    }

    error_log("Produk berhasil ditambahkan untuk user_id: " . $user_id);

    echo json_encode(['success' => true, 'message' => 'Produk berhasil ditambahkan ke MyStyle']);
} catch (Exception $e) {
    error_log("Terjadi kesalahan: " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
?>
