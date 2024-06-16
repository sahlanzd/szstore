<?php
session_start();
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


require_once 'config/koneksi.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barang</title>
    <link rel="stylesheet" href="assets/css/form_barang.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="glass">
        <center>

            <h2 align="center">𝐈𝐍𝐏𝐔𝐓 𝐃𝐀𝐓𝐀 𝐁𝐀𝐑𝐀𝐍𝐆</h2>
            <?php
            echo "<h5>Login Sebagai : ";
            echo $_SESSION['username'];
            ?>
            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
            <lottie-player src="https://lottie.host/4791efc2-6102-473b-b4a3-178b5f71aca2/JVPXKw7j7n.json" background="transparent" speed="1" style="width: 150px; height: 150px;" loop autoplay></lottie-player>
        </center>
        <center>

            <form action="input_barang.php" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td valign=top>Nama Barang</td>
                        <td> : <input type="text" name="barang" size="30"></td>
                    </tr>
                    <tr>
                        <td>Brand</td>
                        <td> : <input type="text" name="brand" size="15"></td>
                    </tr>
                    <tr>
                        <td>Kategori</td>
                        <td> :
                            <select name="kategori">
                                <option value="0" selected>--Pilih Kategori--</option>
                                <?php
                                include "config/koneksi.php";
                                $tampil = mysqli_query($konek, "SELECT * FROM tbl_kategori ORDER BY nama_kategori");
                                while ($r = mysqli_fetch_array($tampil)) {
                                    echo "<option value=$r[nama_kategori]>$r[nama_kategori]</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Jumlah</td>
                        <td> : <input type="number" name="jumlah" size="15"></td>
                    </tr>
                    <tr>
                        <td>Harga</td>
                        <td> : <input type="number" name="harga" size="15"></td>
                    </tr>
                    <tr>
                        <td>Gambar</td>
                        <td> : <input type="file" name="fupload" size="40"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input type="submit" name="submit" id="simpan" value="Simpan">
                        </td>
                    </tr>
                </table>
            </form>
            <br>
            <table>
                <form action="menu.php" method="post">
                    <button>Menu Utama</button>
                </form>
                <form action="tampil_barang.php" method="post">
                    <button>Tampil Barang</button>
                </form>
            </table>

        </center>
    </div>

</body>

</html>