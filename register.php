<?php
session_start();
require 'config/koneksi.php';

function registrasi($data)
{
    global $konek;

    // $username = strtolower(trim($data["username"])); trim --> menghapus dpasi awal dan akhir
    $username = strtolower(($data["username"]));
    $password = mysqli_real_escape_string($konek, $data["password"]);
    $password2 = mysqli_real_escape_string($konek, $data["password2"]);

    // Cek apakah semua field diisi
    if (empty($username) || empty($password) || empty($password2)) {
        echo "<script>
                alert('Semua field harus diisi!');
              </script>";
        return 0;
    }

    // Cek apakah username mengandung spasi
    if (strpos($username, ' ') !== false) {
        echo "<script>
                alert('Username tidak boleh mengandung spasi!');
              </script>";
        return 0;
    }

    // Cek apakah username sudah ada di database
    $result = mysqli_query($konek, "SELECT username FROM tbl_user WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('Username sudah terdaftar!');
              </script>";
        return 0;
    }

    // Cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
                alert('Konfirmasi password tidak sesuai!');
              </script>";
        return 0;
    }

    // Enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Tambahkan user baru ke database
    $query = "INSERT INTO tbl_user (username, password) VALUES ('$username', '$password')";
    mysqli_query($konek, $query);

    // Login otomatis setelah registrasi berhasil
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    $_SESSION['type'] = "user";

    return mysqli_affected_rows($konek);
}

if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
                alert('User baru berhasil ditambahkan!');
                window.location.href='login_user.php';
              </script>";
    } else {
        echo "<script>
                alert('Registrasi gagal!');
              </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/registrasi.css">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <title>Registrasi</title>
</head>

<body>
    <div class="l-form">
        <div class="shape1"></div>
        <div class="shape2"></div>
        <div class="form">
            <form method="post" action="" class="form__content">
                <h1 class="form__title">Registrasi</h1>

                <div class="form__div form__div-one">
                    <div class="form__icon">
                        <i class='bx bx-user-circle'></i>
                    </div>
                    <div class="form__div-input">
                        <label for="username" class="form__label">Username</label>
                        <input name="username" required type="text" class="form__input" id="username">
                    </div>
                </div>

                <div class="form__div">
                    <div class="form__icon">
                        <i class='bx bx-lock'></i>
                    </div>
                    <div class="form__div-input">
                        <label for="password" class="form__label">Password</label>
                        <input name="password" required type="password" class="form__input" id="password">
                    </div>
                </div>

                <div class="form__div">
                    <div class="form__icon">
                        <i class='bx bx-lock'></i>
                    </div>
                    <div class="form__div-input">
                        <label for="password2" class="form__label">Konfirmasi Password</label>
                        <input name="password2" required type="password" class="form__input" id="password2">
                    </div>
                </div>

                <br><br>
                <input name="register" type="submit" class="form__button" value="Register">
                <br>
                <div class="link_color">
                    <a href="login.php">Login Admin? </a>
                    <a href="login_user.php">Login User?</a>
                    <a href="index.php"> -->Home</a>
                </div>
            </form>
        </div>
    </div>
    <script src="assets/js/main.js"></script>
    <!-- <script src="assets/js/register.js"></script> -->
</body>

</html>