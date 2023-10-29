<?php

include "koneksi.php";

$nama = $_POST['nama'];
$email = $_POST['email'];
$password = $_POST['password'];
$nohp = $_POST['no_hp'];

$queryRegister = "SELECT * FROM tb_user WHERE nama = '".$nama."'";

$result = mysqli_query($koneksi, $queryRegister);

if (!empty($nama) && !empty($email) && !empty($password) && !empty($nohp)) {
    if (mysqli_num_rows($result) == 0) {
        $regis = "INSERT INTO tb_user(nama, email, password, no_hp) VALUES ('$nama', '$email', '$password', '$nohp')";
        $msqlRegis = mysqli_query($koneksi, $regis);

        if ($msqlRegis) {
            echo "Daftar Berhasil";
        } else {
            echo "Gagal mendaftar: " . mysqli_error($koneksi);
        }
    } else {
        echo "Nama sudah digunakan";
    }
} else {
    echo "Semua data harus diisi";
}

?>
