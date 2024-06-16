<?php
session_start();
include "config/koneksi.php";

if (empty($_SESSION['username'])) {
    header("location: login.php");
    exit;
}

// Cek apakah user adalah admin
if ($_SESSION['status'] != "admin") {
    echo "<script>
            alert('Maaf, Anda tidak memiliki akses ke halaman ini');
            window.location.href = 'tampil_barang.php';
          </script>";
    exit;
}

// Periksa apakah parameter id tersedia di URL
if (!isset($_GET['id'])) {
    echo "<script>
            alert('ID barang tidak ditemukan');
            window.location.href = 'tampil_barang.php';
          </script>";
    exit;
}

$idbarang = $_GET['id'];
$edit = mysqli_query($konek, "SELECT * FROM tbl_barang WHERE idbarang= '$idbarang'");
$row = mysqli_fetch_array($edit);

if (!$row) {
    echo "<script>
            alert('Data barang tidak ditemukan');
            window.location.href = 'tampil_barang.php';
          </script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BARANG</title>
    <link rel="stylesheet" href="assets/css/edit_barang.css">
</head>

<body>
    <div class="glass">
        <center>
            <h2 align="center">𝐄𝐃𝐈𝐓 𝐁𝐀𝐑𝐀𝐍𝐆</h2>
            <?php
            echo "<h5>Login Sebagai : ";
            echo $_SESSION['username'];
            ?>
            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
            <lottie-player src="https://lottie.host/f83189d7-1438-47a1-9ca8-c2426941c00d/0BkbPg6d2X.json" background="transparent" speed="1" style="width: 200px; height: 250px; margin-top: 10px;" loop autoplay>
            </lottie-player>
        </center>

        <center>
            <form action="update_barang.php" method="post" enctype="multipart/form-data">
                <table align="center" border="0" id="table1">
                    <?php echo "<input type=hidden name=id value=$row[idbarang]>
                    <tr><td valign=top>Nama Barang</td><td>
                    <input type=text name=barang size=30 value=\"$row[namabrg]\">
                    </td></tr>
                    <tr><td>Kategori</td><td><select name=kategori>";
                    $tampil = mysqli_query($konek, "SELECT * FROM tbl_kategori ORDER BY nama_kategori");
                    while ($c = mysqli_fetch_array($tampil)) {
                        if ($row['kategori'] == $c['nama_kategori']) {  // memperbaiki kategori untuk mencocokkan dengan nama_kategori
                            echo "<option value=\"$c[nama_kategori]\" selected>$c[nama_kategori]</option>";
                        } else {
                            echo "<option value=\"$c[nama_kategori]\">$c[nama_kategori]</option>";
                        }
                    }
                    echo "</select></td></tr>
                    <tr><td>Brand</td><td>
                    <input type=text value='$row[brand]' name=brand size=15></td></tr>
                    <tr><td>Jumlah</td><td>
                    <input type=number value='$row[jumlah]' name=jumlah size=15></td></tr>
                    <tr><td>Harga</td><td>
                    <input type=number value='$row[harga]' name=harga size=15></td></tr>
                    <tr><td>Gambar</td><td>
                    <img src='gambar/$row[gambar]' width=80 height=80></td></tr>
                    <tr><td>Ganti gambar</td><td>
                    <input type='file' name='fupload'></td></tr>
                    <tr><td></td><td>
                    <tr><td colspan=2>#abaikan saja jika tidak ada gambar yang diperbarui</td></tr>
                    </table>";
                    ?>
                    <div class="button-container">
                        <?php echo "<input id='update' type='submit' value='Perbarui'>"; ?>
                        <button formaction="menu.php">Menu Utama</button>
                        <button formaction="tampil_barang.php">Tampil Barang</button>
                    </div>
                </table>
                <br><br>
            </form>
        </center>
    </div>
</body>

</html>