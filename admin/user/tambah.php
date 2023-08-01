<?php
require '../../config/config.php';
require '../../config/koneksi.php';
session_start();

function cek_token()
{
    if (!isset($_POST['csrf_token'])) {
        return false;
    }
    if (!isset($_SESSION['csrf_token'])) {
        return false;
    }
    return ($_POST['csrf_token'] === $_SESSION['csrf_token']);
}

$username = $password = $role = "";

$username_err = $password_err = $role_err = "";

if (cek_token()) {

    if (isset($_POST['simpan'])) {

        $simpan = "INSERT INTO user (username,password,role,status) VALUES (
            ?,
            ?,
            ?,
            ?
            )";

        mysqli_real_escape_string($koneksi, $username);
        mysqli_real_escape_string($koneksi, $password);
        mysqli_real_escape_string($koneksi, $role);

        $param_username           = trim($_POST['username']);
        $param_password           = trim($_POST['password']);
        $param_role               = trim($_POST['role']);

        $stmt = mysqli_prepare($koneksi, $simpan);
        mysqli_stmt_bind_param($stmt, "sss", $username, $hashed_password, $role);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        mysqli_stmt_execute($stmt);
        var_dump($simpan, $koneksi->error);
        die;
        if (!$stmt) {
            // jika gagal tampilkan pesan kesalahan
            die();
        } else {
            //set session sukses
            $_SESSION["sukses"] = 'Data Berhasil Disimpan';
            // jika berhasil tampilkan pesan berhasil insert data
            header('location: index.php');
            // echo "<script>window.location.replace('../user/');</script>";

        }

        mysqli_stmt_close($stmt);
    }
} else {
    echo "Request tidak valid.<br>";
}

mysqli_close($koneksi);
