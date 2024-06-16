<?php
session_start();
include 'config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    try {
        $stmt = $dbh->prepare("SELECT * FROM tbl_login WHERE username = :username AND password = :password");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $count = $stmt->rowCount();

        if ($count == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['status'] = "login";
            header("location: menu.php");
        } else {
            header("location: login.php?pesan=gagal");
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        die();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- === CSS === -->
    <link rel="stylesheet" href="assets/css/login_admin.css">

    <!-- === BOX ICON ONLINE === -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <!-- === JAVACRIPT ANIMASI -->
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

    <title>Login</title>
</head>
<script>
    function validateForm() {
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        if (username == "" || password == "") {
            alert("Username dan Password harus diisi");
            return false;
        }
    }
</script>

<body>
    <div class="l-form">
        <div class="shape1"></div>
        <div class="shape2"></div>
        <div class="form">
            <form id="login" method="post" action="login_proses.php" class="form__content">
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
                    <a href="login_user.php">Login User?</a>
                    <a href="index.php"> -->Home</a>
                </div>
            </form>
        </div>
    </div>
    <!-- ===== MAIN JS ===== -->
    <script src="assets/js/main.js"></script>
</body>

</html>