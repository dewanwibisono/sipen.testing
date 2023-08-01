<?php
require '../../config/config.php';
require '../../config/koneksi.php';
?>


<?php
if (isset($_POST['simpan'])) {
    if (isset($_POST['username'])) {
        //sql statement untuk update data ke tabel
        $simpan = "UPDATE user set username = ?,
                                   password = ?,
                                   role     = ?
                                   WHERE username = ?";

        //membuat prepared statement
        $stmt = mysqli_prepare($koneksi, $simpan);

        //hubungkan "data: dengan prepared statement
        mysqli_stmt_bind_param($stmt, "sss", $username, $password, $role);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        //ambil data hasil submit dari form
        $param_username           = trim($_POST['username']);
        $param_password           = trim($_POST['password']);
        $param_role               = trim($_POST['role']);

        //jalankan query:execute
        mysqli_stmt_execute($stmt);

        //cek hasil query
        if (!$stmt) {
            //jika gagal tampilkan pop up error
            header('location: index.php');
        } else {
            //jika berhasil tampilkan popup berhasil
            header('location: index.php');
        }
    }
    // tutup statement
    mysqli_stmt_close($stmt);
}
// tutup koneksi
mysqli_close($koneksi);
?>
