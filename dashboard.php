<?php
error_reporting(0);
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://kit.fontawesome.com/b4f4eda484.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-circle-progress/1.2.2/circle-progress.min.js"></script>
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
</head>

<body>
    <div class="tpp-page">
        <aside class="tpp-navbar">
            <h1 class="tpp-logo">
                <a href="home.php">AAA<i class="far fa-registered"></i></a>
            </h1>
            <nav class="tpp-listmenu">
                <ul>
                    <li><a href="#"> Photographer</a></li>
                    <li><a href="#"> Decoration</a></li>
                    <li><a href="#"> Sovernir</a></li>
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

        <!-- main page -->
        <div class="tpp-main">
            <div class="tpp-bannerDashboard">
                <h1>Dashboard</h1>
            </div>
            <div class="tpp-contentDashboard">
                <form action="">
                    <div class="tpp-boxDcontainer">
                        <div class="tpp-boxA tpp-outerBox">
                            <i class="fas fa-users"></i>
                            <div class="tpp-textBoxD">
                                <h2>Pengguna</h2>
                                <h1>
                                    <?php
                                    $queryPengguna = mysqli_query($conn, "SELECT COUNT(id_login) AS total_pengguna FROM tabel_login;");
                                    $infoPengguna = mysqli_fetch_array($queryPengguna);
                                    $totalPengguna = $infoPengguna['total_pengguna'];
                                    echo $totalPengguna;
                                    ?>
                                </h1>
                            </div>
                        </div>
                        <div class="tpp-boxB tpp-outerBox">
                            <i class="far fa-file-alt"></i>
                            <div class="tpp-textBoxD">
                                <h2>Pesanan</h2>
                                <h1>
                                    <?php
                                    $queryPesanan = mysqli_query($conn, "SELECT COUNT(id_paket) AS total_pesanan FROM tabel_detail_order;");
                                    $infoPesanan = mysqli_fetch_array($queryPesanan);
                                    $totalPesanan = $infoPesanan['total_pesanan'];
                                    echo $totalPesanan;
                                    ?>
                                </h1>
                            </div>
                        </div>
                        <div class="tpp-boxC tpp-outerBox">
                            <i class="fas fa-gift"></i>
                            <div class="tpp-textBoxD">
                                <h2>No. Paket Terlaris</h2>
                                <h1>
                                    <?php
                                    $queryPaket = mysqli_query($conn, "SELECT id_paket, COUNT(id_paket) AS total_paket FROM tabel_detail_order GROUP BY id_paket ORDER BY total_paket DESC LIMIT 1");
                                    $infoPaket = mysqli_fetch_array($queryPaket);
                                    $totalPaket = $infoPaket['id_paket'];
                                    echo $totalPaket;
                                    ?>
                                </h1>
                            </div>
                        </div>
                        <div class="tpp-boxD tpp-outerBox">
                            <i class="far fa-heart"></i>
                            <div class="tpp-textBoxD">
                                <h2>Paket Tersedia</h2>
                                <h1>
                                    <?php
                                    $queryTersedia = mysqli_query($conn, "SELECT COUNT(id_paket) AS total_paket FROM tabel_paket");
                                    $infoTersedia = mysqli_fetch_array($queryTersedia);
                                    $totalTersedia = $infoTersedia['total_paket'];
                                    echo $totalTersedia;
                                    ?>
                                </h1>
                            </div>
                        </div>
                    </div>
                    <div class="tpp-listContainer">
                        <div class="tpp-listViewBox">
                            <form action="dashboard.php" method="GET">
                                <input type="text" placeholder="Search" name="cari" required>
                                <button class="btn btn-success" type="submit">Go</button>
                            </form>
                            <button class="btn btn-success" type="submit"><a href=""><i class='fas fa-download'> New Package</i></a></button>
                        </div>
                    </div>
                    <div class="tpp-chartContainer">
                        <div class="tpp-chartCard">
                            <div class="tpp-chartCirlce">
                                <div class="tpp-chartBar"></div>
                                <div class="tpp-chartBox"><span></span></div>
                            </div>
                            <div class="tpp-chartText">Paket 1</div>
                        </div>
                        <div class="tpp-chartCard chartB">
                            <div class="tpp-chartCirlce">
                                <div class="tpp-chartBar"></div>
                                <div class="tpp-chartBox"><span></span></div>
                            </div>
                            <div class="tpp-chartText">Paket 2</div>
                        </div>
                        <div class="tpp-chartCard chartC">
                            <div class="tpp-chartCirlce">
                                <div class="tpp-chartBar"></div>
                                <div class="tpp-chartBox"><span></span></div>
                            </div>
                            <div class="tpp-chartText">Paket 3</div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="assets/js/chart.js"></script>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/owl.auto.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="assets/js/swipper.js"></script>

</html>