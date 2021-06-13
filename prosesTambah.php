<?php
error_reporting(0);
include "koneksi.php";
$nama_paket = $_POST['nama_paket'];
$id_kota = $_POST['id_kota'];
$id_photographer = $_POST['id_photographer'];
$id_decoration = $_POST['id_decoration'];
$id_sovernir = $_POST['id_sovernir'];

if (isset($id_kota)) {
    if (isset($id_photographer)) {
        if (isset($id_decoration)) {
            if (isset($id_sovernir)) {
                $total;
                $data = mysqli_query($conn, "SELECT tabel_photographer.biaya_photographer, tabel_decoration.biaya_decoration, tabel_sovernir.biaya_sovernir FROM tabel_photographer, tabel_decoration, tabel_sovernir WHERE id_photographer=$id_photographer AND id_decoration=$id_decoration AND id_sovernir=$id_sovernir");
                $info = mysqli_fetch_array($data);
                $biaya_photographer = $info['biaya_photographer'];
                $biaya_decoration = $info['biaya_decoration'];
                $biaya_sovernir = $info['biaya_sovernir'];
                $total = $biaya_photographer + $biaya_decoration + $biaya_sovernir;

                $queryTambah = mysqli_query($conn, "INSERT INTO tabel_paket (nama_paket, biaya_paket) VALUES ('$nama_paket', '$total')");

                if ($queryTambah) {
                    //Mengambil id_paket
                    $cekId = mysqli_query($conn, "SELECT id_paket FROM tabel_paket WHERE nama_paket='$nama_paket' AND biaya_paket='$total'");
                    $info = mysqli_fetch_array($cekId);
                    $id_paket = $info['id_paket'];

                    $queryDetail = mysqli_query($conn, "INSERT INTO tabel_detail_paket (id_paket, id_kota, id_photographer, id_decoration, id_sovernir) VALUES ('$id_paket', '$id_kota', '$id_photographer', '$id_decoration', '$id_sovernir')");

                    if ($queryDetail) {
                        echo "<script>alert('Berhasil Menambah Paket')</script>";
                        echo "<script>window.location.href='dashboard.php';</script>";
                    } else {
                        echo "<script>alert('Gagal Menambah Paket')</script>";
                        echo "<script>window.location.href='tambahPaket.php';</script>";
                    }
                } else {
                    echo "<script>alert('Gagal Menambah Paket')</script>";
                    echo "<script>window.location.href='tambahPaket.php';</script>";
                }
            } else {
                echo "<script>alert('Mohon Pilih Sovernir')</script>";
                echo "<script>window.location.href='tambahPaket.php';</script>";
            }
        } else {
            echo "<script>alert('Mohon Pilih Decoration')</script>";
            echo "<script>window.location.href='tambahPaket.php';</script>";
        }
    } else {
        echo "<script>alert('Mohon Pilih Photographer')</script>";
        echo "<script>window.location.href='tambahPaket.php';</script>";
    }
} else {
    echo "<script>alert('Mohon Pilih Kota')</script>";
    echo "<script>window.location.href='tambahPaket.php';</script>";
}

?>