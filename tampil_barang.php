<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location: login.php");
    exit;
}

require_once 'config/koneksi.php';

$barang = query("SELECT * FROM tbl_barang");

if (isset($_GET["cari"])) {
    $barang = cari($_POST["keyword"]);
}

// Generate a CSRF token if not already set
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Gudang</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <link rel="stylesheet" href="assets/css/tampil_.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
</head>

<body>
    <h2 align="center">𝐃𝐀𝐅𝐓𝐀𝐑 𝐁𝐀𝐑𝐀𝐍𝐆</h2>
    <center>
        <div class="button-group">
            <?php if ($_SESSION['status'] == "admin") : ?>
            <form action="form_barang.php" method="post">
                <button><i class="fas fa-plus"></i> Tambah Barang</button>
            </form>
            <?php endif; ?>
            <form action="menu.php" method="post">
                <button><i class="fas fa-home"></i> Menu Utama</button>
            </form>
            <form action="logout.php" method="post">
                <button><i class="fas fa-sign-out-alt"></i> Logout</button>
            </form>
        </div>
        <br>
        <form action="" method="post">
            <input type="text" name="keyword" size="40" autofocus placeholder="masukkan pencarian..." autocomplete="off"
                id="keyword">
        </form>
        <div id="container" class="table-container">
            <table class=" styled-table" border="0">
                <thead>
                    <tr class="judul">
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Brand</th>
                        <th>Kategori</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Gambar</th>
                        <?php if ($_SESSION['status'] == "admin") : ?>
                        <th>Action</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($barang as $row) : ?>
                    <tr class="isi">
                        <td align="center"><?= $i; ?></td>
                        <td align="left"><?= htmlspecialchars($row["namabrg"]); ?></td>
                        <td align="left"><?= htmlspecialchars($row["brand"]); ?></td>
                        <td align="left"><?= htmlspecialchars($row["kategori"]); ?></td>
                        <td align="center"><?= htmlspecialchars($row["jumlah"]); ?></td>
                        <td align="left">Rp. <?= htmlspecialchars($row["harga"]); ?></td>
                        <td align="center"><img src="gambar/<?= htmlspecialchars($row["gambar"]); ?>" width="70"
                                height="70"></td>
                        <?php if ($_SESSION['status'] == "admin") : ?>
                        <td align="center">
                            <form action="edit_barang.php" method="get">
                                <input type="hidden" name="id" value="<?= htmlspecialchars($row['idbarang']); ?>">
                                <button type="submit"><i class="fas fa-edit"></i> Edit</button>
                            </form>
                            <br>
                            <form action="hapus_barang.php" method="post">
                                <input type="hidden" name="id" value="<?= htmlspecialchars($row['idbarang']); ?>">
                                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
                                <button type="submit" onclick="return confirm('Yakin ingin menghapus data ini?')"><i
                                        class="fas fa-trash-alt"></i> Hapus</button>
                            </form>
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </center>
    <script src="assets/js/cari.js"></script>
    <footer>
        <p>Hak Cipta &copy; 2024 - @sahlanmufid</p>
    </footer>
</body>

</html>