<?php
require '../../config/config.php';
require '../../config/koneksi.php';
session_start();
if (isset($_POST['simpan'])) {

    $username           = trim($_POST['username']);
    $password           = trim($_POST['password']);
    $role               = trim($_POST['role']);
    $status = 'inactive';

    $simpan = "INSERT INTO user (username,password,role,status) VALUES (
        ?,
        ?,
        ?,
        ?
        )";

    $stmt = mysqli_prepare($koneksi, $simpan);


    mysqli_stmt_bind_param($stmt, "ssss", $username, $hashed_password, $role, $status);

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_execute($stmt);
    // var_dump($simpan, $koneksi->error);
    // die;
    if (!$stmt) {
        // jika gagal tampilkan pesan kesalahan
        header('location: index.php?alert=1');
    } else {
        // jika berhasil tampilkan pesan berhasil insert data
        header('location: index.php?alert=2');
        // echo "<script>window.location.replace('../user/');</script>";
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($koneksi);
