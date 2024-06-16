<?php
if (isset($_GET['pesan'])) {            // cek apakah login benar / salah
    if ($_GET['pesan'] == "gagal") {
        echo '<script type ="text/JavaScript">';
        echo 'alert("Silahkan Masukkan username dan password dengan benar")';
        echo '</script>';
    }
}
require_once 'config/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- === CSS === -->
    <link rel="stylesheet" href="assets/css/loginuser.css">

    <!-- === BOX ICON ONLINE === -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <!-- === JAVACRIPT ANIMASI -->
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

    <title>Login</title>
</head>

<body>
    <div class="l-form">
        <div class="shape1"></div>
        <div class="shape2"></div>
        <div class="form">
            <!-- lottie belum diisi -->
            <lottie-player class=""></lottie-player>

            <form id="login" method="post" action="loginuser_proses.php" class="form__content">

                <h1 class="form__title">𝐋𝐎𝐆𝐈𝐍</h1>

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

                <br><br>
                <input name="login" type="submit" class="form__button" id="login" value="Login">
                <br>
                <div class="link_color">
                    <a href="register.php">Register?</a>
                    <a href="login.php">Login Admin?</a>
                    <a href="index.php"> -->Home</a>
                </div>
            </form>
        </div>
    </div>

    <!-- ===== MAIN JS ===== -->
    <script src="assets/js/main.js"></script>

</body>

</html>