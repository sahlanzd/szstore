<?php
session_start();

if (isset($_SESSION['status'])) {
    $status = $_SESSION['status'];
    session_destroy();

    if ($status == "admin") {
        header("Location: login.php");
    } elseif ($status == "user") {
        header("Location: login_user.php");
    }
    exit;
} else {
    header("Location: login.php");
    exit;
}
