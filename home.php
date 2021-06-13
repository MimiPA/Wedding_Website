<?php
include "cekSession.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://kit.fontawesome.com/b4f4eda484.js" crossorigin="anonymous"></script>
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
        
        <div class="tpp-main" id="home">
            <aside class="tpp-slider">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="assets/img/1.jpg" alt="">
                            <div class="tpp-desc">
                                <h5>Wedding</h5>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Mollitia, ex!</p>
                                <div class="tpp-btn"><a href="">Read More</a> </div>
                            </div>
                        </div>
                        <div class="swiper-slide"><img src="assets/img/2.jpg" alt="">
                            <div class="tpp-desc">
                                <h5>Wedding</h5>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Mollitia, ex!</p>
                                <div class="tpp-btn"><a href="">Read More</a> </div>
                            </div>
                        </div>
                        <div class="swiper-slide"><img src="assets/img/3.jpg" alt="">
                            <div class="tpp-desc">
                                <h5>Wedding</h5>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Mollitia, ex!</p>
                                <div class="tpp-btn"><a href="">Read More</a> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
            <div class="tpp-services">
                <div class="tpp-headService">
                    <span>Weddings</span>
                    <h3>Our Services</h3>
                </div>
                <div class="owl-carousel">
                    <div class="tpp-items">
                        <a href="menuForm1.php?nama_kota=Makassar">
                            <div><img src="assets/img/kota1.jpg" alt=""></div>
                            <div class="tpp-itemsBtn">
                                <h2>Makassar</h2>
                                <span>Indahnya Pantai Losari Makassar</span>
                            </div>
                        </a>
                    </div>
                    <div class="tpp-items">
                        <a href="menuForm1.php?nama_kota=Korea">
                            <div><img src="assets/img/kota2.jpg" alt=""></div>
                            <div class="tpp-itemsBtn">
                                <h2>Korea</h2>
                                <span>Indahnya Hanbok Kota Seoul</span>
                            </div>
                        </a>
                    </div>
                    <div class="tpp-items">
                        <a href="menuForm1.php?nama_kota=Jepang">
                            <div><img src="assets/img/kota3.jpg" alt=""></div>
                            <div class="tpp-itemsBtn">
                                <h2>Jepang</h2>
                                <span>Indahnya Bunga Sakura Tokyo</span>
                            </div>
                        </a>
                    </div>
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
<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="assets/js/swipper.js"></script>

</html>