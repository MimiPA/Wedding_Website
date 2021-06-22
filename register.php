<?php
error_reporting(0);
include "koneksi.php";

if (isset($_POST['register'])) {
    if (isset($_POST['nama']) && isset($_POST['email']) && isset($_POST['confirEmail']) && isset($_POST['password']) && isset($_POST['confirPassword'])) {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $confirEmail = $_POST['confirEmail'];
        $password = $_POST['password'];
        $confirPassword = $_POST['confirPassword'];

        //Cek Apakah email nya sudah pernah terpakai
        $cekEmail = mysqli_query($conn, "SELECT email FROM tabel_login WHERE email='$email'");
        // menghitung jumlah data yang ditemukan
        $cek = mysqli_num_rows($cekEmail);

        //Cek Apakah username nya sudah pernah terpakai
        $cekUsername = mysqli_query($conn, "SELECT username FROM tabel_login WHERE username='$nama'");
        // menghitung jumlah data yang ditemukan
        $cekUser = mysqli_num_rows($cekUsername);

        if ($cekUser > 0) {
            $msg = "Username Sudah Ada. Harap Ganti";
        } else {
            if ($cek > 0) {
                $msg = "Email Anda sudah pernah terdaftar";
            } else {
                if ($nama[0] != ' ') {
                    if (preg_match("/^[a-zA-Z ]*$/", $nama)) {
                        if ($email == $confirEmail) {
                            if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", trim($email))) {
                                if ($password == $confirPassword) {
                                    $panjang = strlen($password);
                                    if ($panjang <= 10) {
                                        $queryBuat = mysqli_query($conn, "INSERT INTO tabel_login (username, password, email) VALUES ('$nama', '$password', '$email')");

                                        if ($queryBuat) {
                                            //Mengambil id_login
                                            $cekId = mysqli_query($conn, "SELECT id_login FROM tabel_login WHERE username='$nama' AND email='$email'");
                                            $info = mysqli_fetch_array($cekId);
                                            $id_login = $info['id_login'];

                                            $queryLevel = mysqli_query($conn, "INSERT INTO tabel_login_level (id_login, level) VALUES ('$id_login', 'user')");

                                            if ($queryLevel) {
                                                echo "<script>alert('Akun Berhasil dibuat. Silahkan Login')</script>";
                                                echo "<script>window.location.href='sign_in.php';</script>";
                                            } else {
                                                die('Level Gagal Dibuat!' . mysqli_error($conn));
                                            }
                                        } else {
                                            die('Akun Gagal Dibuat!' . mysqli_error($conn));
                                        }
                                    } else {
                                        $msg = "Buat Akun gagal! Password Max 10 digit";
                                    }
                                } else {
                                    $msg = "Buat Akun gagal! Password & Confirm Password tidak cocok";
                                }
                            } else {
                                $msg = "Buat Akun gagal! Bukan email";
                            }
                        } else {
                            $msg = "Buat Akun gagal! Email dan Confirm Email Tidak Cocok";
                        }
                    } else {
                        $msg = "Login gagal! Username Hanya Huruf";
                    }
                } else {
                    $msg = "Login gagal! Tidak Boleh Awalan Spasi";
                }
            }
        }
    } else {
        $msg = "Tidak Boleh kosong";
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
                    <h1>Sign Up</h1>
                    <?php
                    if (isset($msg)) {  // Check if $msg is not empty
                        echo '<h2 style="color:red;">' . $msg . '</h2>'; // Display our message
                    }
                    ?>
                    <div class="tpp-signBoxoutside">
                        <div class="tpp-signBoxinside">
                            <form style="margin-bottom: 1rem;" action="register.php" method="POST">
                                <div class="tpp-boxInput">
                                    <label for="tpp-boxLabel">Nama</label>
                                    <div class="tpp-boxInputinside">
                                        <input type="text" maxlength="30" name="nama" placeholder="Arnold Nasir" required>
                                    </div>
                                </div>
                                <div class="tpp-boxInput">
                                    <label for="tpp-boxLabel">Email</label>
                                    <div class="tpp-boxInputinside">
                                        <input type="email" maxlength="50" name="email" placeholder="arnold_nasir@lecturer.uajm.ac.id" required>
                                    </div>
                                </div>
                                <div class="tpp-boxInput">
                                    <label for="tpp-boxLabel">Confirm Email</label>
                                    <div class="tpp-boxInputinside">
                                        <input type="email" maxlength="50" name="confirEmail" placeholder="arnold_nasir@lecturer.uajm.ac.id" required>
                                    </div>
                                </div>
                                <div class="tpp-boxInput">
                                    <label for="tpp-boxLabel">Password</label>
                                    <div class="tpp-boxInputinside">
                                        <input type="password" maxlength="10" name="password" placeholder="**********" required>
                                    </div>
                                </div>
                                <div class="tpp-boxInput">
                                    <label for="tpp-boxLabel">Confirm Password</label>
                                    <div class="tpp-boxInputinside">
                                        <input type="password" maxlength="10" name="confirPassword" placeholder="**********" required>
                                    </div>
                                </div>
                                <div class="tpp-boxBtn">
                                    <button class="tpp-btnForm" type="submit" name="register">
                                        <div>
                                            <h2>Create Account</h3>
                                        </div>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <h2>Sudah Punya Akun ? <a href="sign_in.php" style="color: blue;">SignIn</a></h2>
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