<?php
require_once("koneksi.php");
 
$id_paket = $_GET['id_paket'];

$query = "DELETE FROM tabel_detail_paket WHERE id_paket=$id_paket";

if(mysqli_query($conn, $query)){
    $queryHapus = mysqli_query($conn, "DELETE FROM tabel_paket WHERE id_paket=$id_paket");

    if($queryHapus){
        echo "<script>alert('Success !!! Data Berhasil Terhapus')</script>";
        echo "<script>window.location.href='dashboard.php';</script>";
    }
    else{
        echo "<script>alert('Failed !!! Data Gagal Terhapus')</script>";
        echo "<script>window.location.href='dashboard.php';</script>";
    }
}
else{
    die ('Hapus Data Gagal!' .mysqli_error($conn));
}
?>