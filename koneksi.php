<?php

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "try";

$koneksi = mysqli_connect($hostname, $username, $password, $dbname);

if(!$koneksi){
    echo "koneksi gagal";
}else {
    echo "koneksi berhasil";
}
?>