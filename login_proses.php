<?php
session_start();
require_once 'config/koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = $konek->prepare("SELECT * FROM tbl_login WHERE username = ? AND password = ?");
$query->bind_param("ss", $username, $password);
$query->execute();
$result = $query->get_result();
$cek = $result->num_rows;

if ($cek > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['username'] = $row['username'];
    $_SESSION['status'] = "admin";
    header("location: menu.php");
} else {
    echo '<script type="text/javascript">
            alert("Silahkan Masukkan username dan password dengan benar");
            window.location.href = "login.php";
          </script>';
}
