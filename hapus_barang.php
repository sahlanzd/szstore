<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}

require 'config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verify CSRF token
    if (hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        $id = mysqli_real_escape_string($konek, $_POST["id"]);

        if (hapus($id) > 0) {
            echo "
                <script>
                alert('Data Berhasil Dihapus');
                document.location.href = 'tampil_barang.php';
                </script>
                ";
        } else {
            echo "
                <script>
                alert('Data Gagal Dihapus');
                document.location.href = 'tampil_barang.php';
                </script>
                ";
        }
    } else {
        echo "
            <script>
            alert('Permintaan tidak sah!');
            document.location.href = 'tampil_barang.php';
            </script>
            ";
    }
} else {
    echo "
        <script>
        alert('Permintaan tidak valid!');
        document.location.href = 'tampil_barang.php';
        </script>
        ";
}
