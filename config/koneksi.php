<?php
session_start();
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'sipen');

/* Attempt to connect to MySQL database */
$koneksi = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// cek koneksi
if (!$koneksi) {
    die('Koneksi Database Gagal : ' . mysqli_connect_error());
}
