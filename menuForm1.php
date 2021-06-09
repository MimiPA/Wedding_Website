<?php
include "cekSession.php";
include "koneksi.php";

$nama_kota = $_GET['nama_kota'];
$queryKota = mysqli_query($conn, "SELECT * FROM tabel_kota WHERE nama_kota='$nama_kota'");
$infoKota = mysqli_fetch_array($queryKota);
$id_kota = $infoKota['id_kota'];

$queryDetail = mysqli_query($conn, "SELECT tabel_detail_paket.id_paket FROM tabel_kota, tabel_detail_paket WHERE tabel_kota.id_kota=tabel_detail_paket.id_kota AND tabel_kota.id_kota='$id_kota'");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kota</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://kit.fontawesome.com/b4f4eda484.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="assets/js/radiobtn.js"></script>

</head>

<body>
    <div class="tpp-page">
        <aside class="tpp-navbar">
            <h1 class="tpp-logo">
                <a href="home.php"><?php echo $username; ?><i class="far fa-registered"></i></a>
            </h1>
            <nav class="tpp-listmenu">
                <ul>
                    <li><a href="#"> Photographer</a></li>
                    <li><a href="#"> Decoration</a></li>
                    <li><a href="#"> Sovernir</a></li>
                    <li><a href="#"> Package</a></li>
                    <li><a href="logout.php"> logout</a></li>
                </ul>
            </nav>
            <div class="tpp-footer">
                <h2>footer</h2>
                <div class="tpp-social">
                    <a href="#"><i class="fab fa-facebook-square"></i></a>
                    <a href="#"><i class="fab fa-twitter-square"></i></a>
                    <a href="#"><i class="fab fa-instagram-square"></i></a>
                    <a href="#"><i class="fab fa-pinterest-square"></i></a>
                </div>
            </div>


        </aside>
        <div class="tpp-main">
            <div class="tpp-categoryHeader">
                <span>Weddings</span>
                <h3>Our Services</h3>
            </div>
            <form action="menuForm.php" method="POST">
                <?php
                $paket = 0;
                ?>
                <div class="tpp-categoryContainer">
                    <div class="tpp-categoryBox">
                        <div class="tpp-radioButtons">
                            <?php
                            for ($i = 1; $i <= 3; $i++) {
                            ?>
                                <label class="custom-radio">
                                    <input type="radio" class="radioBtnClass" name="paket" value="<?= $i; ?>" id="1" />
                                    <div class="radio-btn">
                                        <h1>Makassar</h1>
                                        <img src="images/makassar<?=$i?>.jpg" alt="">
                                    </div>
                                </label>
                            <?php
                            }
                            for ($i = 1; $i <= 3; $i++) {
                                $queryPaket = mysqli_query($conn, "SELECT * FROM tabel_paket, tabel_detail_paket WHERE tabel_paket.id_paket=tabel_detail_paket.id_paket AND tabel_detail_paket.id_kota='$id_kota' AND tabel_paket.id_paket='$i'");
                                $infoPaket = mysqli_fetch_array($queryPaket);
                                $queryPhotographer = mysqli_query($conn, "SELECT * FROM tabel_photographer, tabel_detail_paket WHERE tabel_detail_paket.id_photographer=tabel_photographer.id_photographer AND tabel_detail_paket.id_paket='$i'");
                                $infoPhotographer = mysqli_fetch_array($queryPhotographer);
                                $queryDecoration = mysqli_query($conn, "SELECT * FROM tabel_decoration, tabel_detail_paket WHERE tabel_detail_paket.id_decoration=tabel_decoration.id_decoration AND tabel_detail_paket.id_paket='$i'");
                                $infoDecoration = mysqli_fetch_array($queryDecoration);
                                $querySovernir = mysqli_query($conn, "SELECT * FROM tabel_sovernir, tabel_detail_paket WHERE tabel_detail_paket.id_sovernir=tabel_sovernir.id_sovernir AND tabel_detail_paket.id_paket='$i'");
                                $infoSovernir = mysqli_fetch_array($querySovernir);
                            ?>
                                <div class="test22 <?= $i; ?>" style="background: pink;">
                                    <h1><?= $infoPaket['nama_paket']; ?></h1>
                                    <img src="images/<?= $infoPhotographer['gambar_photographer']; ?>" height="200px" />
                                    <ul>
                                        <li>Nama Photographer : <b><?= $infoPhotographer['nama_photographer']; ?></b></li>
                                        <li>Biaya Photographer : <b><?= $infoPhotographer['biaya_photographer']; ?></b></li>
                                    </ul>

                                    <img src="images/<?= $infoDecoration['gambar_decoration']; ?>" height="200px" />
                                    <ul>
                                        <li>Nama Decoration : <b><?= $infoDecoration['nama_decoration']; ?></b></li>
                                        <li>Biaya Decoration : <b><?= $infoDecoration['biaya_decoration']; ?></b></li>
                                    </ul>

                                    <img src="images/<?= $infoSovernir['gambar_sovernir']; ?>" height="200px" />
                                    <ul>
                                        <li>Nama Sovernir : <b><?= $infoSovernir['nama_sovernir']; ?></b></li>
                                        <li>Biaya Sovernir : <b><?= $infoSovernir['biaya_sovernir']; ?></b></li>
                                    </ul>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </form>
            <div class="tpp-footer2">
                <div class="tpp-contentFooter2">
                    <div>
                        <h2>Weddings</h2>
                    </div>
                    <div>
                        <h2>Footer</h2>
                    </div>
                    <div>
                        <h2>backup</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/owl.auto.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="assets/js/swipper.js"></script>

</html>