<?php
session_start();
require 'config/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <link rel="stylesheet" href="assets/css/indexs_style.css">
    <!-- <link rel="stylesheet" href="assets/css/utama.css"> -->

</head>

<body>
    <header>
        <div class="logo">
            <div class="logo-icon"><i class="fas fa-s">§</i><i class="fas fa-z">ž</i></div>
        </div>
        <h1 class="header-title">Selamat Datang di Situs Kami!</h1>
    </header>


    <div class="button-container">
        <button onclick="window.location.href='register.php'"><i class="fas fa-user-plus"></i>
            Registrasi</button>
        <button onclick="window.location.href='login_user.php'"><i class="fas fa-sign-in-alt"></i> Login
            User</button>
        <button onclick="window.location.href='login.php'"><i class="fas fa-user-shield"></i> Login
            Admin</button>
    </div>

    <main>
        <section class="product-info">
            <h2><i class="fas fa-info-circle"></i> Informasi Produk</h2>
            <p>Toko ini menjual berbagai macam produk termasuk handphone, aksesoris handphone, dan banyak lagi. Kami
                menyediakan produk berkualitas dengan harga yang terjangkau untuk memenuhi kebutuhan teknologi Anda.</p>
        </section>

        <section class="latest-news">
            <h2><i class="fas fa-newspaper"></i> Berita Terbaru</h2>
            <ul>
                <li><strong>Update Produk Baru:</strong> Kami baru saja menambahkan koleksi terbaru handphone dari
                    berbagai merek terkenal.</li>
                <li><strong>Diskon Spesial:</strong> Dapatkan diskon hingga 50% untuk aksesoris handphone selama bulan
                    ini!</li>
                <li><strong>Event Mendatang:</strong> Ikuti acara launching produk terbaru kami di akhir bulan ini.</li>
            </ul>
        </section>

        <section class="customer-testimonials">
            <h2><i class="fas fa-comments"></i> Testimoni Pelanggan</h2>
            <ul>
                <li><strong>John Doe:</strong> "Saya sangat puas dengan pelayanan dan produk yang ditawarkan. Handphone
                    yang saya beli sangat berkualitas ⭐⭐⭐⭐⭐."</li>
                <li><strong>Jane Smith:</strong> "Aksesoris handphone yang dijual sangat lengkap dan harganya
                    terjangkau. Saya pasti akan berbelanja lagi ⭐⭐⭐⭐⭐."</li>
                <li><strong>Michael Brown:</strong> "Pengiriman sangat cepat dan barang diterima dalam kondisi baik.
                    Terima kasih! ⭐⭐⭐⭐⭐."</li>
            </ul>
        </section>

        <section class="contact">
            <h2><i class="fas fa-envelope"></i> Kontak Kami</h2>
            <form action="contact_process.php" method="POST">
                <input type="text" name="name" placeholder="Nama Anda" required>
                <input type="email" name="email" placeholder="Email Anda" required>
                <textarea name="message" rows="5" placeholder="Pesan Anda" required></textarea>
                <input type="submit" value="Kirim Pesan">
            </form>
        </section>
        <?php include 'layout/map.php' ?>
    </main>

    <footer>
        <p>Hak Cipta &copy; 2024 - @sahlanmufid</p>
    </footer>
    <script src="layout/map.php"></script>
</body>

</html>