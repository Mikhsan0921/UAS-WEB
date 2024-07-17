<?php
session_start();
require_once 'connect.php'; // Pastikan nama dan path file sudah benar

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit;
}

$email = $_SESSION['email'];

// Dapatkan user_id berdasarkan email
$stmt = $konek->prepare("SELECT id FROM user WHERE email = ?");
if (!$stmt) {
    die("Prepare statement gagal: " . $konek->error);
}
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($user_id);
$stmt->fetch();
$stmt->close();

if ($user_id) {
    $stmt = $konek->prepare("SELECT url, image, price, nama_produk FROM produk WHERE id_user = ?");
    if (!$stmt) {
        die("Prepare statement gagal: " . $konek->error);
    }
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $mystyle_items = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
} else {
    $mystyle_items = [];
}

$konek->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyStyle</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>MyStyle</h1>
    <div class="mystyle-container">
        <?php if (!empty($mystyle_items)): ?>
            <?php foreach ($mystyle_items as $item): ?>
                <div class="mystyle-item">
                    <a href="<?= htmlspecialchars($item['link']) ?>" target="_blank">
                        <img src="<?= htmlspecialchars($item['image']) ?>" alt="Product Image">
                    </a>
                    <h5 class="price"><?= htmlspecialchars($item['price']) ?></h5>
                    <p class="description"><?= htmlspecialchars($item['description']) ?></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Tidak ada item di MyStyle Anda.</p>
        <?php endif; ?>
    </div>
</body>
</html>
