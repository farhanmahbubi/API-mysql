<?php

include "koneksi.php";

$email = $_GET['email'];
$password = $_GET['password'];

if (!empty($email) && !empty($password)) {
    // Perbaikan keamanan: Menggunakan prepared statement
    $query = "SELECT * FROM tb_user WHERE email = ? AND password = ?";
    $stmt = mysqli_prepare($koneksi, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $email, $password);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        $result = mysqli_stmt_num_rows($stmt);

        if ($result > 0) {
            echo "welcome";
        } else {
            echo "Email atau password salah";
        }
    } else {
        echo "Error in the prepared statement.";
    }

    mysqli_stmt_close($stmt);
} else {
    echo "Isi semua data";
}
?>
