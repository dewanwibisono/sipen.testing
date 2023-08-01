<?php
$id_user = mysqli_real_escape_string($koneksi, $_POST['id_user']);
// status
$row = mysqli_fetch_assoc(mysqli_query($koneksi, "select * from user where id_user='$id_user'"));
$arr = array('status' => $row['status']);

if ($row['status'] == 1) {
    $_SESSION['IS_LOGIN'] = 'yes';
}
echo json_encode($arr);
