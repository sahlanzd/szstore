<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location: login.php");
    exit; // Pastikan skrip berhenti setelah header location
}

include "config/koneksi.php";

if (isset($_POST['submit'])) {
    $lokasi_file = $_FILES['fupload']['tmp_name'];
    $nama_file = $_FILES['fupload']['name'];
    $tipe_file = $_FILES['fupload']['type'];
    $barang = isset($_POST['barang']) ? $_POST['barang'] : '';
    $brand = isset($_POST['brand']) ? $_POST['brand'] : '';
    $kategori = isset($_POST['kategori']) ? $_POST['kategori'] : '';
    $jumlah = isset($_POST['jumlah']) ? $_POST['jumlah'] : '';
    $harga = isset($_POST['harga']) ? $_POST['harga'] : '';

    // Allowed file types
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];

    // Cek apakah inputan lengkap
    if (!empty($barang) && !empty($brand) && !empty($kategori) && !empty($jumlah) && !empty($harga) && !empty($lokasi_file)) {
        if (in_array($tipe_file, $allowed_types)) {
            move_uploaded_file($lokasi_file, "gambar/$nama_file");
            $a = mysqli_query($konek, "INSERT INTO tbl_barang (namabrg, brand, kategori, jumlah, harga, gambar) VALUES ('$barang', '$brand', '$kategori', '$jumlah', '$harga', '$nama_file')");

            if ($a) {
                echo '<script>
                    alert("Data berhasil disimpan");
                    window.location = "tampil_barang.php";
                </script>';
            } else {
                echo '<h1 align="center">Terjadi kesalahan saat menyimpan data.</h1>';
            }
        } else {
            echo '<script>
            alert("Tipe file tidak diizinkan. Hanya gambar (JPEG, PNG, GIF) yang diperbolehkan.");
            window.location = "form_barang.php";
        </script>';
        }
    } else {
        echo '<script>
            alert("Data yang anda masukkan tidak lengkap. Silakan kembali dan lengkapi data.");
            window.location = "form_barang.php";
        </script>';
    }
}
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
            echo "<h5>Login Sebagai : " . $_SESSION['username'] . "</h5>";
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
                                $tampil = mysqli_query($konek, "SELECT * FROM tbl_kategori ORDER BY nama_kategori");
                                while ($r = mysqli_fetch_array($tampil)) {
                                    echo "<option value='$r[nama_kategori]'>$r[nama_kategori]</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Jumlah</td>
                        <td> : <input type="text" name="jumlah" size="15"></td>
                    </tr>
                    <tr>
                        <td>Harga</td>
                        <td> : <input type="text" name="harga" size="15"></td>
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