<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "szstore.com"; // Pastikan nama database benar
$konek = mysqli_connect($server, $username, $password, $database,);

// Cek koneksi
if (!$konek) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Cek apakah fungsi sudah dideklarasikan
if (!function_exists('query')) {
    function query($sql)
    {
        global $konek;
        $result = mysqli_query($konek, $sql);

        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }
}

if (!function_exists('hapus')) {
    function hapus($id)
    {
        global $konek;
        mysqli_query($konek, "DELETE FROM tbl_barang WHERE idbarang = $id");

        return mysqli_affected_rows($konek);
    }
}

if (!function_exists('cari')) {
    function cari($keyword)
    {
        global $konek; // Pastikan untuk menggunakan koneksi global
        $query = "SELECT * FROM tbl_barang
                  WHERE
                  namabrg LIKE '%$keyword%' OR
                  brand LIKE '%$keyword%' OR
                  kategori LIKE '%$keyword%' OR
                  jumlah LIKE '%$keyword%' OR
                  harga LIKE '%$keyword%'";
        return query($query);
    }
}


// function registrasi($data)
// {
//     global $konek;

//     $username = strtolower(stripslashes($data["username"]));
//     $password = mysqli_real_escape_string($konek, $data["password"]);
//     $password2 = mysqli_real_escape_string($konek, $data["password2"]);

//     // Cek username sudah ada atau belum
//     $result = mysqli_query($konek, "SELECT username FROM tbl_user WHERE username = '$username'");
//     if (mysqli_fetch_assoc($result)) {
//         echo "
//         <script>
//         alert('Nama yang Anda masukkan sudah terdaftar!');
//         </script>
//         ";
//         return false;
//     }

//     // Cek konfirmasi password
//     if ($password !== $password2) {
//         echo "
//         <script>
//         alert('Konfirmasi Password Tidak Sesuai!');
//         </script>
//         ";
//         return false;
//     }

//     // Enkripsi password
//     $passwordHash = password_hash($password, PASSWORD_DEFAULT);

//     // Tambahkan username ke database
//     $query = "INSERT INTO tbl_user (username, password) VALUES ('$username', '$passwordHash')";
//     $result = mysqli_query($konek, $query);

//     if ($result) {
//         return mysqli_affected_rows($konek);
//     } else {
//         echo mysqli_error($konek);
//         return false;
//     }
// }