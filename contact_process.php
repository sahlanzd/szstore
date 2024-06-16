<?php
// Pastikan formulir kontak telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data yang dikirim dari formulir kontak
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Kirim pesan ke email Anda atau simpan di database
    // Di sini Anda dapat menambahkan logika untuk mengirim email atau menyimpan pesan di database
    // Contoh sederhana untuk mencetak pesan ke layar
    echo "<h2>Pesan yang Diterima:</h2>";
    echo "<p>Nama: $name</p>";
    echo "<p>Email: $email</p>";
    echo "<p>Pesan: $message</p>";
} else {
    // Jika halaman ini diakses langsung, kembalikan pengguna ke halaman kontak
    header("Location: contact.php");
    exit;
}
