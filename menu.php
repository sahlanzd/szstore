<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Utama</title>
    <link rel="stylesheet" href="assets/css/men.css">
</head>

<body>
    <div class="menu-container">
        <div class="menu-title">𝐌𝐄𝐍𝐔 𝐔𝐓𝐀𝐌𝐀</div>
        <?php
        echo "<h5> Selamat Datang : " . $_SESSION['username'] . "</h5>";
        ?>
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
        <div class="lottie-player-container">
            <lottie-player class="lottie-player-wrapper" src="https://lottie.host/f8058275-de78-4e6f-b555-7dd5ed3446bd/rawiEty0qU.json" background="transparent" speed="1" style="width: 150px; height: 150px;" loop autoplay></lottie-player>
        </div>
        <?php if ($_SESSION['status'] == 'admin') : ?>
            <form action="form_barang.php" method="post">
                <button>Tambah Barang</button>
            </form>
            <br>
        <?php endif; ?>
        <form action="tampil_barang.php" method="post">
            <button>Tampil Barang</button>
        </form>
        <br>

        <form action="logout.php" method="post">
            <button>LogOut</button>
        </form>
    </div>
</body>

</html>