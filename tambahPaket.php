<?php
error_reporting(0);
include "cekSession.php";
include "koneksi.php";
include "cekAdmin.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Paket</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://kit.fontawesome.com/b4f4eda484.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
            </div>
            <form action="prosesTambah.php" method="POST">
                <div class="tpp-boxInput">
                    <h1 style="text-align: center;">Nama Paket</h1>
                    <div class="tpp-boxInputinside">
                        <input type="text" maxlength="20" name="nama_paket" placeholder="Glowing Package" required>
                    </div>
                </div>

                <div class="tpp-categoryContainer">
                    <div class="tpp-categoryBox">
                        <div class="tpp-radioButtons">
                            <h1 style="text-align: center;">Kota Pilihan</h1>
                            <?php
                            $i = 1;
                            $dataKota = mysqli_query($conn, "SELECT * FROM tabel_kota");
                            while ($dKota = mysqli_fetch_array($dataKota)) {
                            ?>
                                <label class="custom-radio">
                                    <input type="radio" class="radioBtnClass" name="id_kota" value="<?= $dKota['id_kota']; ?>" />
                                    <div class="radio-btn">
                                        <h1><?= $dKota['nama_kota'] ?></h1>
                                        <img src="assets/img/kota<?= $i; ?>.jpg" alt="">
                                    </div>
                                </label>
                            <?php
                                $i++;
                            } ?>

                            <hr>
                            <h1 style="text-align: center;">Our Photographer</h1>
                            <?php
                            $data = mysqli_query($conn, "SELECT * FROM tabel_photographer");
                            while ($d = mysqli_fetch_array($data)) {
                            ?>
                                <label class="custom-radio">
                                    <input type="radio" class="radioBtnClass" name="id_photographer" value="<?= $d['id_photographer']; ?>" />
                                    <div class="radio-btn">
                                        <h1><?= $d['nama_photographer'] ?><br>Biaya : <?= $d['biaya_photographer'] ?></h1>
                                        <img src="images/<?= $d['gambar_photographer'] ?>" alt="">
                                    </div>
                                </label>
                            <?php
                            } ?>

                            <hr>
                            <h1 style="text-align: center;">Our Decoration</h1>
                            <?php
                            $dataDecor = mysqli_query($conn, "SELECT * FROM tabel_decoration");
                            while ($dDecor = mysqli_fetch_array($dataDecor)) {
                            ?>
                                <label class="custom-radio">
                                    <input type="radio" class="radioBtnClass" name="id_decoration" value="<?= $dDecor['id_decoration']; ?>" />
                                    <div class="radio-btn">
                                        <h1><?= $dDecor['nama_decoration'] ?><br>Biaya : <?= $dDecor['biaya_decoration'] ?></h1>
                                        <img src="images/<?= $dDecor['gambar_decoration'] ?>" alt="">
                                    </div>
                                </label>
                            <?php
                            } ?>

                            <hr>
                            <h1 style="text-align: center;">Our Sovernir</h1>
                            <?php
                            $dataSovernir = mysqli_query($conn, "SELECT * FROM tabel_sovernir");
                            while ($dSovernir = mysqli_fetch_array($dataSovernir)) {
                            ?>
                                <label class="custom-radio">
                                    <input type="radio" class="radioBtnClass" name="id_sovernir" value="<?= $dSovernir['id_sovernir']; ?>" />
                                    <div class="radio-btn">
                                        <h1><?= $dSovernir['nama_sovernir'] ?><br>Biaya : <?= $dSovernir['biaya_sovernir'] ?></h1>
                                        <img src="images/<?= $dSovernir['gambar_sovernir'] ?>" alt="">
                                    </div>
                                </label>
                            <?php
                            } ?>


                        </div>
                    </div>
                    <button class="tpp-btnForm" type="submit" style="display:block; width: 100%; background:greenyellow;">
                        <div>
                            <h2>Tambah Paket</h3>
                        </div>
                    </button>
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