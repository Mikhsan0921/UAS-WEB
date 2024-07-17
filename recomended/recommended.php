<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recommended</title>
    <link rel="stylesheet" href="recommended.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
</head>
<body>
<script>
    // Check if session message exists and display it
    <?php
    if (isset($_SESSION['login_success'])) {
        echo "alert('" . $_SESSION['login_success'] . "');";
        unset($_SESSION['login_success']); // Clear the session message after displaying
    }
    ?>
    </script>
    <div>
        <nav class="navbar">
            <div>
                <a href="../recomended/recommended.html" class="brand">
                    <div class="teks1">SAN</div>
                    <div class="teks2">Cloth</div>
                </a>
            </div>
            <ul class="list">   
                <li>
                    <a href="../hot news/hotnews.html" class="item">
                        Hot News
                    </a>
                </li>
                <li>
                    <a href="../men/men.html" class="item">
                        Men
                    </a>
                </li>
                <li>
                    <a href="../women/women.html" class="item">
                        Women
                    </a>
                </li>
                <li>
                    <a href="../about/about.html" class="item">
                        About Me
                    </a>
                </li>
                <form role="search">
                    <input class="input" type="search" placeholder="Search">
                    <button class="cari" type="submit">Search</button>
                </form>
                <div class="dropdown">
                    <button class="material-icons">person</button>
                    <div class="dropdown-content">
                        <a href="../profile.php">Profile</a>
                        <a href="../login.php">Logout</a>
                    </div>
                </div>
            </ul>
        </nav>

        <script src="../recommended.js"></script>
    </div>
<!--Images Slide -->
    <!-- <div id="carouselExample" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExample" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExample" data-slide-to="1"></li>
          <li data-target="#carouselExample" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="https://wallpaperaccess.com/full/2489629.jpg" width="100%" height="500" alt="First slide">
          </div>
          <div class="carousel-item">
            <img src="https://i0.wp.com/www.kabarsumbar.com/wp-content/uploads/2022/02/ERIGO-2.jpg?w=1900&ssl=1" width="100%" height="500" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img src="http://www.soccercleats101.com/wp-content/uploads/2011/04/Adidas-Samba-Millennium.jpg" width="100%" height="500" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a> -->
<!--Slide-->
        <div class="container mt-4">
            <div class="judul">
                <h1>Clothing</h1>
                <a href="">View All</a>
            </div>
            <div class="barang">
                <div class="tabel">
                    <div class="produk">
                        <a class="link" href="https://id.shp.ee/eWL9tyF">
                            <img src="https://down-id.img.susercontent.com/file/id-11134207-7r98w-lltmk9qtua44a2" class="gambar" alt="Outfit 1">
                            <div class="card-body">
                                <h5 class="price">Rp130.000</h5>
                                <p class="deskripsi">PHOMPPHIESS Jacket Tracktop Jaket Vintage Pria Wanita Premium</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="tabel">
                    <div class="produk">
                        <a class="link" href="https://id.shp.ee/p4VtJ3N">
                            <img src="https://down-id.img.susercontent.com/file/453b9ccc527277263eb36c6f58e28ca9" class="gambar" alt="Outfit 2">
                            <div class="card-body">
                                <h5 class="price">Rp45.000 - Rp65.000</h5>
                                <p class="deskripsi">BELOUSE WANITA TERBARU AGATA BAJU ATASAN CEWEK POLOS KEKINIAN KOREAAN</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="tabel">
                    <div class="produk">
                        <a class="link" href="https://id.shp.ee/Ncrapia">
                        <img src="https://down-id.img.susercontent.com/file/id-11134207-7r98s-lsmqrmgrymo61a" class="gambar" alt="Outfit 3">
                        <div class="card-body">
                            <h5 class="price">Rp159.300</h5>
                            <p class="deskripsi">FROYEMUL - LIGHT GREY Trousers</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-4">
            <div class="judul">
                <h1>Shoes</h1>
                <a href="">View All</a>
            </div>
            <div class="barang">
                <div class="tabel">
                    <div class="produk">
                        <a class="link" href="https://id.shp.ee/cY99x6t">
                        <img src="https://down-id.img.susercontent.com/file/8b821167ec2c28f947738426d6b5b656" class="gambar" alt="Outfit 1">
                        <div class="card-body">
                            <h5 class="price">Rp107.900 - Rp113.980</h5>
                            <p class="deskripsi">Sepatu Thunderbear - Slip On Voltaire Off White CB</p>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="tabel">
                    <div class="produk">
                        <a class="link" href="https://id.shp.ee/Uy3Mu8L">
                        <img src="https://down-id.img.susercontent.com/file/id-11134207-7r98u-luiqhi23epf8f1" class="gambar" alt="Outfit 2">
                        <div class="card-body">
                            <h5 class="price">Rp87.000 - Rp109.200</h5>
                            <p class="deskripsi">Sepatu Docmart Wanita Boots Fashion Wanita Korean Style Premium</p>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="tabel">
                    <div class="produk">
                        <a class="link" href="https://id.shp.ee/MTLxhHi">
                            <img src="https://down-id.img.susercontent.com/file/id-11134207-7qukw-ljpbqv874a4jb3" class="gambar" alt="Outfit 3">
                        <div class="card-body">
                            <h5 class="price">Rp99.900</h5>
                            <p class="deskripsi">Cogen Sendal Slop Pria Sandal Basic Slide Leather Rubber Premium</p>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-4">
            <div class="judul">
                <h1>Accessories</h1>
                <a href="">View All</a>
            </div>
            <div class="barang">
                <div class="tabel">
                    <div class="produk">
                        <a class="link" href="https://id.shp.ee/YrdoHyB">
                        <img src="https://down-id.img.susercontent.com/file/id-11134207-7qul5-lidhsptjyzyob7" class="gambar" alt="Outfit 1">
                        <div class="card-body">
                            <h5 class="price">Rp10.000 - Rp16.000</h5>
                            <p class="deskripsi">Topi Pria dan Wanita Cap Hat Cotton Material Bordir 1989 NEW YORK AMERICAN Baseball</p>
                        </div>
                    </a>
                    </div>
                </div>
                <div class="tabel">
                    <div class="produk">
                        <a class="link" href="https://id.shp.ee/wshwuD9">
                            <img src="https://down-id.img.susercontent.com/file/id-11134207-7r990-llqawtsj1uecc8" class="gambar" alt="Outfit 2">
                        <div class="card-body">
                            <h5 class="price">Rp39.607</h5>
                            <p class="deskripsi">Bardian Kalung Titanium Steel Anti Karat Klavikula Multi Layers Hias Permata Hitam Unisex Udjastable Anti Karat Rantai</p>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="tabel">
                    <div class="produk">
                        <a class="link" href="https://id.shp.ee/YrdoHyB">
                            <img src="https://down-id.img.susercontent.com/file/id-11134207-7quky-lhmdw57fqdic32" class="gambar" alt="Outfit 3">
                        <div class="card-body">
                            <h5 class="price">Rp117.000</h5>
                            <p class="deskripsi">ELNIRO Gelang Rantai Pria GALLA Real Titanium Bracelets Pria Asli ANTI Karat & Pudar [B.1]</p>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <!-- CONTENT -->

    <!--footer-->
        <footer class="footer">
            <div class="containfoot">
                <section class="link">
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-facebook-f"></i>Facebook</a>
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-twitter">Twitter</i></a>
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-instagram"></i>Instagram</a>
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-linkedin-in"></i>Linkedlin</a>
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-github"></i>github</a>
                </section>
            </div>
            <div class="text-center" style="background-color: rgba(0, 0, 0, 0.2);">
                @2024 Recommended
            </div>
        </footer>
    <!--footer-->
    </div>
</body>
</html>