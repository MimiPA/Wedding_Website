<?php
error_reporting(0);
include "cekAdmin.php";
include "koneksi.php";
include "cekSession.php";
?>

<?php
if (isset($_GET['cari'])) {
    $cari = $_GET['cari'];
    $msg = $cari;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
                                <select name="kunci" required>
                                    <option>Pilih Kunci Cari</option>
                                    <option value="nama_paket">Nama Paket</option>
                                    <option value="biaya_paket">Biaya Paket</option>
                                    <option value="nama_photographer">Nama Photographer</option>
                                    <option value="nama_decoration">Nama Decoration</option>
                                </select>
                                <input type="text" placeholder="Search" name="cari" required>
                                <button class="btn btn-success" type="submit">Go</button>
                            </form>

                            <button type="button"><a href="tambahPaket.php"><i class='fas fa-download'> New Package</i></a></button>

                            <?php
                            if (isset($msg)) {  // Check if $msg is not empty
                                echo '<br>Hasil Cari : <b style="color:red;">' . $msg . '</b>'; // Display our message
                            }
                            ?>
                            <table border="1">
                                <thead>
                                    <tr>
                                        <th>Id_Paket</th>
                                        <th>Nama Paket</th>
                                        <th>Biaya Paket</th>
                                        <th>Nama Photographer</th>
                                        <th>Biaya Photographer</th>
                                        <th>Nama Decoration</th>
                                        <th>Biaya Decoration</th>
                                        <th>Nama Sovernir</th>
                                        <th>Biaya Sovernir</th>
                                        <th colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($_GET['cari'])) {
                                        $kunci = $_GET['kunci'];
                                        $cari = $_GET['cari'];
                                        $data = mysqli_query($conn, "SELECT * FROM tabel_paket, tabel_detail_paket, tabel_photographer, tabel_decoration, tabel_sovernir WHERE tabel_paket.id_paket=tabel_detail_paket.id_paket AND tabel_photographer.id_photographer=tabel_detail_paket.id_photographer AND tabel_decoration.id_decoration=tabel_detail_paket.id_decoration AND tabel_sovernir.id_sovernir=tabel_detail_paket.id_sovernir AND $kunci LIKE '%$cari%'");
                                        $cek = mysqli_num_rows($data);

                                        if ($cek <= 0) {
                                            echo "<td colspan='11'><h1>Data Tidak Ditemukan</h1></td>";
                                        }
                                    } else {
                                        $data = mysqli_query($conn, "SELECT * FROM tabel_paket, tabel_detail_paket, tabel_photographer, tabel_decoration, tabel_sovernir WHERE tabel_paket.id_paket=tabel_detail_paket.id_paket AND tabel_photographer.id_photographer=tabel_detail_paket.id_photographer AND tabel_decoration.id_decoration=tabel_detail_paket.id_decoration AND tabel_sovernir.id_sovernir=tabel_detail_paket.id_sovernir");
                                    }
                                    while ($d = mysqli_fetch_array($data)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $d['id_paket']; ?></td>
                                            <td><?php echo $d['nama_paket']; ?></td>
                                            <td><?php echo $d['biaya_paket']; ?></td>
                                            <td>
                                                <?php echo $d['nama_photographer']; ?>
                                                <img src="images/<?= $d['gambar_photographer']; ?>" height="100px" />
                                            </td>
                                            <td><?php echo $d['biaya_photographer']; ?></td>
                                            <td>
                                                <?php echo $d['nama_decoration']; ?>
                                                <img src="images/<?= $d['gambar_decoration']; ?>" height="100px" />
                                            </td>
                                            <td><?php echo $d['biaya_decoration']; ?></td>
                                            <td>
                                                <?php echo $d['nama_sovernir']; ?>
                                                <img src="images/<?= $d['gambar_sovernir']; ?>" height="100px" />
                                            </td>
                                            <td><?php echo $d['biaya_sovernir']; ?></td>
                                            <td><button type="button"><a href="edit.php?id_paket=<?php echo $d['id_paket']; ?>"><i class="fa fa-edit"></i> Edit</a></button></td>
                                            <td><button type="button"><a href="hapus.php?id_paket=<?php echo $d['id_paket']; ?>"><i class="fa fa-trash-o"></i> Hapus</a></button></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
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