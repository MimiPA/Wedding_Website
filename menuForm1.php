<?php
error_reporting(0);
include "cekSession.php";
include "koneksi.php";

$nama_kota = $_GET['nama_kota'];
$queryKota = mysqli_query($conn, "SELECT * FROM tabel_kota WHERE nama_kota='$nama_kota'");
$infoKota = mysqli_fetch_array($queryKota);
$id_kota = $infoKota['id_kota'];

$paket_array = array();
$queryDetail = mysqli_query($conn, "SELECT tabel_detail_paket.id_paket FROM tabel_kota, tabel_detail_paket WHERE tabel_kota.id_kota=tabel_detail_paket.id_kota AND tabel_kota.id_kota='$id_kota'");
while ($infoPaket = mysqli_fetch_array($queryDetail)) {
    $id = $infoPaket['id_paket'];
    array_push($paket_array, $id);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kota</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/b4f4eda484.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.css" />
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css" />
    <script src="assets/js/jquery.min.js"></script>
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
                    <?php
                    $cekAdmin = mysqli_query($conn, "SELECT * FROM tabel_login, tabel_login_level WHERE username='$username' AND level='admin' AND tabel_login.id_login=tabel_login_level.id_login");
                    $cekLevel = mysqli_num_rows($cekAdmin);
                    if ($cekLevel > 0) {
                        echo '<li><a href="dashboard.php"> Dashboard</a></li>';
                    }
                    ?>
                    <li><a href="photographer.php"> Photographer</a></li>
                    <li><a href="decoration.php"> Decoration</a></li>
                    <li><a href="sovernir.php"> Sovernir</a></li>
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
            <form action="prosesOrder.php" method="POST">
                <div class="tpp-categoryContainer">
                    <div class="tpp-categoryBox">
                        <div class="tpp-radioButtons">
                            <?php
                            $x = 0;

                            for ($i = 0; $i < count($paket_array); $i++) {
                                $isi_array = $paket_array[$i];
                                $x++;
                            ?>
                                <label class="custom-radio">
                                    <input type="radio" class="radioBtnClass" name="id_paket" value="<?= $isi_array; ?>" />
                                    <div class="radio-btn">
                                        <h1><?= $nama_kota ?></h1>
                                        <?php
                                        if ($nama_kota == "Makassar") {
                                        ?>
                                            <img src="images/makassar<?= $x ?>.jpg" alt="">
                                        <?php
                                        } else if ($nama_kota == "Korea") {
                                        ?>
                                            <img src="images/korea<?= $x ?>.jpg" alt="">
                                        <?php
                                        } else if ($nama_kota == "Jepang") {
                                        ?>
                                            <img src="images/jepang<?= $x ?>.jpg" alt="">
                                        <?php
                                        } ?>
                                    </div>
                                </label>
                            <?php
                            }
                            for ($i = 0; $i < count($paket_array); $i++) {
                                $isi_array = $paket_array[$i];
                                $queryPaket = mysqli_query($conn, "SELECT * FROM tabel_paket, tabel_detail_paket WHERE tabel_paket.id_paket=tabel_detail_paket.id_paket AND tabel_detail_paket.id_kota='$id_kota' AND tabel_paket.id_paket='$isi_array'");
                                $infoPaket = mysqli_fetch_array($queryPaket);
                                $queryPhotographer = mysqli_query($conn, "SELECT * FROM tabel_photographer, tabel_detail_paket WHERE tabel_detail_paket.id_photographer=tabel_photographer.id_photographer AND tabel_detail_paket.id_paket='$isi_array'");
                                $infoPhotographer = mysqli_fetch_array($queryPhotographer);
                                $queryDecoration = mysqli_query($conn, "SELECT * FROM tabel_decoration, tabel_detail_paket WHERE tabel_detail_paket.id_decoration=tabel_decoration.id_decoration AND tabel_detail_paket.id_paket='$isi_array'");
                                $infoDecoration = mysqli_fetch_array($queryDecoration);
                                $querySovernir = mysqli_query($conn, "SELECT * FROM tabel_sovernir, tabel_detail_paket WHERE tabel_detail_paket.id_sovernir=tabel_sovernir.id_sovernir AND tabel_detail_paket.id_paket='$isi_array'");
                                $infoSovernir = mysqli_fetch_array($querySovernir);
                            ?>
                                <div class="test22 <?= $isi_array; ?>" style="background: pink;">
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
                                    <hr>

                                    <h2 style="text-align: right;">Total Biaya : Rp. <b><input type="text" name="biaya" value=<?= $infoPaket['biaya_paket']; ?> readonly /></b></h2>

                                    <input type="hidden" name="nama_kota" value=<?= $nama_kota; ?> />

                                    <button class="tpp-btnForm" type="submit" style="float: right;">
                                        <div>
                                            <h2>Order</h3>
                                        </div>
                                    </button>

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
<script src="assets/js/swiper-bundle.js"></script>
<script src="assets/js/swiper-bundle.min.js"></script>
<script src="assets/js/swipper.js"></script>

</html>