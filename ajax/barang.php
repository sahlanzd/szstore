<?php
require '../config/koneksi.php';

session_start();

$keyword = $_GET["keyword"];

$query = "SELECT * FROM tbl_barang WHERE
namabrg LIKE '%$keyword%' OR
brand LIKE '%$keyword%' OR
kategori LIKE '%$keyword%' OR
jumlah LIKE '%$keyword%' OR
harga LIKE '%$keyword%'
";
$barang = query($query);
?>
<div id="container" class="table-container">
    <table class="styled-table" border="0">
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
        <?php $i = 1; ?>
        <?php foreach ($barang as $row) : ?>
            <tr class="isi">
                <td align="center"><?= $i; ?></td>
                <td align="left"><?= htmlspecialchars($row["namabrg"]); ?></td>
                <td align="left"><?= htmlspecialchars($row["brand"]); ?></td>
                <td align="left"><?= htmlspecialchars($row["kategori"]); ?></td>
                <td align="center"><?= htmlspecialchars($row["jumlah"]); ?></td>
                <td align="left">Rp. <?= htmlspecialchars($row["harga"]); ?></td>
                <td align="center"><img src="gambar/<?= htmlspecialchars($row["gambar"]); ?>" width="70" height="70"></td>
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
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fas fa-trash-alt"></i> Hapus</button>
                        </form>
                    </td>
                    </td>
                <?php endif; ?>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</div>