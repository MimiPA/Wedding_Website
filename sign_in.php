<?php
error_reporting(0);
include "koneksi.php";
session_start();
if (isset($_POST['login'])) {
    $nama = $_POST['nama'];
    $password = $_POST['password'];

    if ($nama[0] != ' ') {
        if (preg_match("/^[a-zA-Z ]*$/", $nama)) {
            $cekLogin = mysqli_query($conn, "SELECT * FROM tabel_login WHERE username='$nama' AND password='$password'");
            // menghitung jumlah data yang ditemukan
            $cek = mysqli_num_rows($cekLogin);
            $info = mysqli_fetch_array($cekLogin);
            $id_login = $info['id_login'];

            if ($cek > 0) {
                //Cek Yang Login Admin or User
                $cekAdmin = mysqli_query($conn, "SELECT * FROM tabel_login_level WHERE id_login='$id_login' AND level='admin'");
                $cekLevel = mysqli_num_rows($cekAdmin);

                if ($cekLevel > 0) {
                    $_SESSION['username'] = $nama;
                    header("Location: dashboard.php");
                } else {
                    $_SESSION['username'] = $nama;
                    header("Location: home.php");
                }
            } else {
                $msg = "Login gagal! Username atau Password salah!";
            }
        } else {
            $msg = "Login gagal! Username Hanya Huruf";
        }
    } else {
        $msg = "Login gagal! Tidak Boleh Awalan Spasi";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/b4f4eda484.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.css" />
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css" />
</head>

<body>
    <div class="tpp-page">
        <aside class="tpp-navbar">
            <h1 class="tpp-logo">
                <a href="index.php">Home<i class="far fa-registered"></i></a>
            </h1>
            <nav class="tpp-listmenu">
                <ul>
                    <li><a href="#"> Photographer</a></li>
                    <li><a href="#"> Decoration</a></li>
                    <li><a href="#"> Sovernir</a></li>
                    <li><a href="#"> Package</a></li>
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
            <div class="tpp-signContainer">
                <div class="tpp-signHead">
                    <h1>Sign In</h1>
                    <?php
                    if (isset($msg)) {  // Check if $msg is not empty
                        echo '<h2 style="color:red;">' . $msg . '</h2>'; // Display our message
                    }
                    ?>
                    <div class="tpp-signBoxoutside">
                        <div class="tpp-signBoxinside">
                            <form style="margin-bottom: 1rem;" action="sign_in.php" method="POST">
                                <div class="tpp-boxInput">
                                    <label for="tpp-boxLabel">Nama :</label>
                                    <div class="tpp-boxInputinside">
                                        <input type="text" maxlength="30" name="nama" placeholder="Arnold Nasir" required>
                                    </div>
                                </div>
                                <div class="tpp-boxInput">
                                    <label for="tpp-boxLabel">Password :</label>
                                    <div class="tpp-boxInputinside">
                                        <input type="password" maxlength="10" name="password" placeholder="**********" required>
                                    </div>
                                </div>
                                <div class="tpp-boxBtn">
                                    <button class="tpp-btnForm" type="submit" name="login">
                                        <div>
                                            <h2>Sign In</h2>
                                        </div>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <h2>Belum Punya Akun ? <a href="register.php" style="color: blue;">Create Now</a></h2>
                </div>
            </div>
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