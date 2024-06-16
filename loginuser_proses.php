<?php
session_start();
include 'config/koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = $konek->prepare("SELECT * FROM tbl_user WHERE username = ?");
$query->bind_param("s", $username);
$query->execute();
$result = $query->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $user['role'];
        $_SESSION['status'] = "user";
        if ($_SESSION['role'] == 'role') {
            header("Location: menu.php");
        } else {
            header("Location: menu.php");
        }
    } else {
        header("Location: login_user.php?pesan=gagal");
    }
} else {
    header("Location: login_user.php?pesan=gagal");
}
