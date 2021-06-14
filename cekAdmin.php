<?php
error_reporting(0);
include "cekSession.php";
include "koneksi.php";

$cekLogin = mysqli_query($conn, "SELECT * FROM tabel_login WHERE username='$username'");
$cek = mysqli_num_rows($cekLogin);
$info = mysqli_fetch_array($cekLogin);
$id_login = $info['id_login'];

$cekAdmin = mysqli_query($conn, "SELECT * FROM tabel_login_level WHERE id_login='$id_login' AND level='admin'");
$cekLevel = mysqli_num_rows($cekAdmin);

if ($cekLevel == 0) {
    echo "<script>alert('Anda Bukan Admin')</script>";
    echo "<script>window.location.href='home.php';</script>";
    exit;
}

?>