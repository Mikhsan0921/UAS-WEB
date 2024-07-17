<?php
session_start();
require 'connect.php'; // include your database connection

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    echo json_encode(['success' => false, 'message' => 'Pengguna belum login']);
    exit;
}

$email = $_SESSION['email'];
$data = json_decode(file_get_contents('php://input'), true);

$link = $data['link'];
$image = $data['image'];
$price = $data['price'];
$description = $data['description'];

// Dapatkan user_id berdasarkan email
$stmt = $konek->prepare("SELECT id FROM user WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($user_id);
$stmt->fetch();
$stmt->close();

if ($user_id) {
    $stmt = $konek->prepare("INSERT INTO mystyle (user_id, link, image, price, description) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $user_id, $link, $image, $price, $description);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Gagal menyimpan data']);
    }

    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Pengguna tidak ditemukan']);
}

$konek->close();
?>
