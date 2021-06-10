<?php
error_reporting(0);
include "koneksi.php";
include "cekSession.php";

$cekLogin = mysqli_query($conn, "SELECT id_login FROM tabel_login WHERE username='$username'");
$info = mysqli_fetch_array($cekLogin);
$id_login = $info['id_login'];

date_default_timezone_set('Asia/Makassar');
$tanggal = date("Y-m-d H:i:sa");

$id_paket = $_POST['id_paket'];

$cekHarga = mysqli_query($conn, "SELECT biaya_paket FROM tabel_paket WHERE id_paket='$id_paket'");
$infoHarga = mysqli_fetch_array($cekHarga);
$total_biaya = $infoHarga['biaya_paket'];

$nama_kota = $_POST['nama_kota'];

if (isset($tanggal)) {
    if (isset($total_biaya)) {
        if (isset($id_login)) {
            if (isset($id_paket)) {
                $queryOrder = mysqli_query($conn, "INSERT INTO tabel_order (tanggal_pesan, total_biaya) VALUES ('$tanggal', '$total_biaya')");

                if ($queryOrder) {
                    //Mengambil id_order
                    $cekId = mysqli_query($conn, "SELECT id_order FROM tabel_order WHERE tanggal_pesan='$tanggal' AND total_biaya='$total_biaya'");
                    $infoOrder = mysqli_fetch_array($cekId);
                    $id_order = $infoOrder['id_order'];

                    $queryDetail = mysqli_query($conn, "INSERT INTO tabel_detail_order (id_order, id_login, id_paket) VALUES ('$id_order', '$id_login', '$id_paket')");

                    if ($queryDetail) {
                        echo "<script>alert('Pesanan Berhasil. Terima Kasih')</script>";
                        echo "<script>window.location.href='home.php';</script>";
                    } else {
                        die('Pesanan Gagal !' . mysqli_error($conn));
                    }
                } else {
                    die('Pesanan Gagal Dibuat!' . mysqli_error($conn));
                }
            } else {
                echo "<script>alert('Pesanan Gagal Paket. Harap Pesan Ulang')</script>";
                echo "<script>window.location.href='home.php';</script>";
            }
        } else {
            echo "<script>alert('Terjadi Kegagalan Login. Harap Pesan Ulang')</script>";
            echo "<script>window.location.href='home.php';</script>";
        }
    } else {
        echo "<script>alert('Pesanan Gagal Biaya. Harap Pesan Ulang')</script>";
        echo "<script>window.location.href='home.php';</script>";
    }
} else {
    echo "<script>alert('Terjadi Kegagalan Tanggal. Harap Pesan Ulang')</script>";
    echo "<script>window.location.href='home.php';</script>";
}
