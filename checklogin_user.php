<?php
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("Location: login_user.php?pesan=belum_login");
    exit;
}
