<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location: login.php");
    exit;
}

include "config/koneksi.php";

$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file = $_FILES['fupload']['name'];
$tipe_file = $_FILES['fupload']['type'];
$id = $_POST['id'];

$allowed_types = array('image/jpeg', 'image/png', 'image/gif', 'image/jpg');

// Memastikan jenis file yang diunggah adalah gambar
if (!empty($lokasi_file) && !in_array($tipe_file, $allowed_types)) {
    echo "<script>
            alert('File yang diunggah harus berupa gambar (jpeg, png, gif, jpg)');
            window.location.href = 'edit_barang.php?id=$id';
          </script>";
    exit;
}

if (empty($lokasi_file)) {
    $query = "UPDATE tbl_barang SET
    namabrg = '$_POST[barang]',
    brand = '$_POST[brand]',
    kategori = '$_POST[kategori]',
    jumlah = '$_POST[jumlah]',
    harga = '$_POST[harga]'
    WHERE idbarang = '$_POST[id]'";
} else {
    move_uploaded_file($lokasi_file, "gambar/$nama_file");
    $query = "UPDATE tbl_barang SET
    namabrg = '$_POST[barang]',
    brand = '$_POST[brand]',
    kategori = '$_POST[kategori]',
    jumlah = '$_POST[jumlah]',
    harga = '$_POST[harga]',
    gambar = '$nama_file'
    WHERE idbarang = '$_POST[id]'";
}

if (mysqli_query($konek, $query)) {
    echo "<script>
            alert('Data barang berhasil diperbarui');
            window.location.href = 'tampil_barang.php';
          </script>";
} else {
    echo "<script>
            alert('Data barang gagal diperbarui');
            window.location.href = 'edit_barang.php?id=$id';
          </script>";
}