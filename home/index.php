<?php
session_start();
require '../config.php';
require '../lib/database.php';

if (isset($_SESSION['user'])) {
    header("Location: ".$config['web']['url']);
} else {

//Count Users
$total_pengguna = mysqli_num_rows($conn->query("SELECT * FROM users"));

//Total Pemesanan
$total_pemesanan = $conn->query("SELECT SUM(harga) AS total FROM pembelian_sosmed");
$data_pesanan = $total_pemesanan_sosmed->fetch_assoc();

//Total Layanan
$total_layanan = mysqli_num_rows($conn->query("SELECT * FROM layanan_sosmed"));

?>
<!DOCTYPE html>
<html lang="zxx">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
       
<meta name="description" content="Panel Sosial Media - Panel Sosmed - Social Media Marketing - SMM Panel terbaik dan termurah se-Indonesia. kami adalah penyedia jasa tambah followers instagram, jasa tambah followers twitter, jasa tambah followers tiktok, jasa tambah subscribers youtube, jasa tambah viewers youtube, jasa tambah followers shopee, jasa tambah followers tokopedia, jasa tambah followers bukalapak, jasa tambah likes instagram, jasa tambah likes fanpage facebook terpercaya dan aman tanpa password. Yuk gabung menjadi Reseller SMM Panel terlengkap dengan pelayanan fast dan responsif">
	<meta name="robots" content="index,nofollow">
	<meta name="author" content="<?php echo $data['short_title']; ?>">
	<meta name="keywords" content="social media marketing, smm panel indonesia, panel sosmed, panel social media, tambah followers instagram, panel sosial media, autolikes instagram, panel sosial media terbaik, panel sosial media termurah, jasa tambah followers">
	<meta name="language" content="ID">
	<meta name="coverage" content="Worldwide">
	<meta name="distribution" content="Global">
	<meta name="apple-mobile-web-app-title" content="<?php echo $data['short_title']; ?>">
	<meta name="apple-mobile-web-app-capable" content="yes">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       
       <title> <?php echo $data['short_title']; ?> | SMM Termurah </title>
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link rel="icon" href="../assets/images/favicon.ico">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/swiper.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/lity.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/gradient_colors/theme_color_5.css" id="color-option">
<style>
.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: relative;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 16px;
  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->  
    

<body data-spy="scroll" data-target="#bs-example-navbar-collapse-1" data-offset="5" class="scrollspy-example without_bg_images">

<!-- navbar
========================================-->
<nav class="navbar navbar-default navbar-fixed-top appsLand-navbar navBar__style-2">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <span class="menu-toggle">
                <i class="chart"></i>
                <i class="chart"></i>
                <i class="chart"></i>
            </span>
            <a class="navbar-brand" href="/">
                <img alt="" src="../assets/images/favicon.png">
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="app-links" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right appsLand-links">
                <li class="visible-xs-block text-center mobile-size-logo">
                    <a href="#">                        
                    </a>
                </li>
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>              
                <li><a href="#faq">FAQs</a></li>
                <li><a href="#pricing">Register</a></li>
                <li><a href="#testimonials">Testimonials</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="../halaman/daftar-harga">Daftar Harga</a></li>                
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<!-- Header
========================================-->
<header class="active-navbar appsLand-header cloud-bg" id="home">
    <div class="app-overlay">
        <div class="header-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-8">
                        <div class="site-intro-content">
                            <h1 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s"><?php echo $data['short_title']; ?></h1>
                            <h3>Social Media Marketing</h3>
                            <p class="lead wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                            Mari bergabung dengan kami dan mulailah bisnis anda sekarang juga, kami menyediakan banyak layanan Social Media dengan harga termurah dan terpercaya di indonesia, yuk raih CUANmu sekarang juga.
                            </p>
                            <br />
                            <br />
                            <ul class="list-inline list-unstyled header-links">
                                <li class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                                    <a href="../auth/login" class="appsLand-btn appsLand-btn-gradient btn-inverse scrollLink">
                                        <span><i class="fa fa-sign-in"></i> Login</span>
                                    </a>
                                </li>
                                <li class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.75s">
                                    <a href="../auth/register" class="appsLand-btn appsLand-btn-gradient btn-inverse scrollLink">
                                        <span><i class="fa fa-user-plus"></i> Register</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-lg-offset-1 col-md-4 hidden-xs hidden-sm">
                        <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">
                            <img alt="" src="../assets/images/favicon.png" class="img-responsive">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content
========================================-->
<main class="entry-main">

<!-- Mini Feature Section
========================================-->
    <section class="mini-feature__style-2 section-without-title">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                    <div class="mini-feature-box">
                        <div class="icon-box">
                            <img alt="" src="images/flat-icons/service.png">
                            <img alt="" src="images/flat-icons/service.png">
                        </div>
                        <div class="data-box">
                            <h3>Layanan Terbaik</h3>
                            <p>
                                Kami menyediakan berbagai layanan terbaik untuk kebutuhan Anda. 
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                    <div class="mini-feature-box">
                        <div class="icon-box">
                            <img alt="" src="images/flat-icons/rocket.png">
                            <img alt="" src="images/flat-icons/rocket.png">
                        </div>
                        <div class="data-box">
                            <h3>Proses Otomatis</h3>
                            <p>
                                Pesanan Di Proses Secara Otomatis dan Instant,langsung kepada Server kami
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                    <div class="mini-feature-box">
                        <div class="icon-box">
                            <img alt="" src="images/flat-icons/money.png">
                            <img alt="" src="images/flat-icons/money.png">
                        </div>
                        <div class="data-box">
                            <h3>Deposit Saldo</h3>
                            <p>
                                Deposit Otomatis 24 Jam,Memudahkan anda deposit kapan saja. 
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                    <div class="mini-feature-box">
                        <div class="icon-box">
                            <img alt="" src="images/flat-icons/support.png">
                            <img alt="" src="images/flat-icons/support.png">
                        </div>
                        <div class="data-box">
                            <h3>Pelayanan Bantuan</h3>
                            <p>
                                Kami menyediakan beberapa tempat bertanya atau komplain mulai dari tiket bantuan, telegram, whatsapp, facebook, Instagram.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                    <div class="mini-feature-box">
                        <div class="icon-box">
                            <img alt="" src="images/flat-icons/device.png">
                            <img alt="" src="images/flat-icons/device.png">
                        </div>
                        <div class="data-box">
                            <h3>Desain Responsive</h3>
                            <p>
                                Kami Menggunakan Desain Website Yang Dapat Diakses Dari Berbagai Device, Daik Smartphone Android Maupun Desktop. 
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                    <div class="mini-feature-box">
                        <div class="icon-box">
                            <img alt="" src="images/flat-icons/code.png">
                            <img alt="" src="images/flat-icons/code.png">
                        </div>
                        <div class="data-box">
                            <h3>Integritas Api</h3>
                            <p>
                                Kami Menyediakan / support pemesanan via API, Sangat Cocok Untuk Anda Pengguna H2H / operan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
<section class="about" id="about">
        <div class="container">
            <div class="section-title style-gradient wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
              <center><img src="../assets/images/SMM.png" class="img-responsive"></img></center>
                <h3>Tentang Kami</h3>
                <span><span></span></span>
                <p><?php echo $data['short_title']; ?> - Smm Panel Indonesia - Social Media Marketing terbaik di Indonesia adalah website social media marketing yang menyediakan layanan auto followers auto like.MURAH, CEPAT DAN TERPERCAYA di indonesia. 

smm panel adalah sebuah platform bisnis yang menyediakan berbagai layanan social media marketing yang bergerak terutama di Indonesia.

Dengan bergabung bersama kami, Anda dapat menjadi penyedia jasa social media atau reseller social media seperti jasa Followers, Likes, dll.

Saat ini tersedia berbagai layanan untuk social media terpopuler seperti Instagram, Facebook, Twitter, Youtube,Auto like,Auto Followers, dll. Semua.</p>
                <h3>Mengapa Memilih Kami</h3>
                <span><span></span></span>            
                 <p> ~Server sosmed murah dan lengkap.</p>
                 <p> ~Anda dapat memilih sendiri produk pulsa terbaik yang bergabung di <?php echo $data['short_title']; ?></p>
                 <p> ~Dapatkan harga layanan murah, dari berbagai Server smm Indonesia.</p>
                 <p> ~Success Rate, Jam Operasional Customer Service, dan Kecepatan Transaksi setiap penjual dapat dilihat secara jelas.</p>            
            </div>
        </div>
</section>


    

    <!-- Download Section
    ========================================-->
    <section class="download section-bg-img">
        <div class="app-overlay">
            <div class="container">
                <div class="section-title style-gradient white-color wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                    <h3>Data Statistik Kami</h3>
                    <span><span></span></span>
                    <br /><br /><center>
                    <p><h3><span><?php echo $total_pengguna; ?></span></h3> Total Pengguna</p><br />
                    <p><h3><span>Rp <?php echo number_format($data_pesanan,0,',','.'); ?></span></h3> Total Pemesanan</p><br />
                    <p><h3><span><?php echo $total_layanan; ?></span></h3> Total Layanan</p></center>
               </div>     
            </div>
        </div>
    </section>

    <!-- Pricing Section
    ========================================-->
    <section class="pricing" id="pricing">
        <div class="container">
            <div class="section-title style-gradient wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                <h2>
                    Register
                </h2>
                <span><span></span></span>
            </div>
            <div class="pricing-tables">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="pricing-table wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                            <div class="pricing-header">
                                <h2>Member</h2>
                            </div>
                            <div class="pricing-price">
                                <p><span class="sup">Rp.</span> <span class="price">0-,</span> <span class="sub"></span>
                                </p>
                            </div>
                            <ul class="pricing-feature list-unstyled">
                                <li><span>Bonus Saldo</span><span>Rp 0</span></li>
                                <li><span>Api Integration</span><span class="main-color-text"><i
                                        class="fa fa-check"></i></span></li>
                                <li><span>24/7 Support</span><span class="main-color-text"><i
                                        class="fa fa-check"></i></span></li>
                                <li><span>Akses Seluruh Layanan</span><span class="main-color-text"><i
                                        class="fa fa-check"></i></span></li>
                                <li><span>Transfer Saldo</span><span class="sec-color-text"><i
                                        class="fa fa-remove"></i>        
                                <li><span>Add User</span><span class="sec-color-text"><i
                                        class="fa fa-remove"></i>
                            </ul>
                            <div class="pricing-btn">
                                <a href="../auth/register" class="appsLand-btn appsLand-btn-gradient btn-inverse"><span>DAFTAR</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="pricing-table pricing-recommended wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                            <div class="pricing-header">
                                <h2>Reseller</h2>
                            </div>
                            <div class="pricing-price">
                                <p><span class="sup">Rp.</span> <span class="price">40.000-,</span> <span class="sub"></span>
                                </p>
                            </div>
                            <ul class="pricing-feature list-unstyled">
                                <li><span>Bonus Saldo</span><span>Rp 20.000</span></li>
                                <li><span>Api Integration</span><span class="main-color-text"><i
                                        class="fa fa-check"></i></span></li>
                                <li><span>24/7 Support</span><span class="main-color-text"><i
                                        class="fa fa-check"></i></span></li>
                                <li><span>Akses Seluruh Layanan</span><span class="main-color-text"><i
                                        class="fa fa-check"></i></span></li>
                                <li><span>Transfer Saldo</span><span class="main-color-text"><i
                                        class="fa fa-check"></i></span></li>        
                                <li><span>Add User</span><span class="main-color-text"><i
                                        class="fa fa-check"></i></span></li>
                            </ul>
                            <div class="pricing-btn">
                                <a href="https://api.whatsapp.com/send?phone=<?php echo $data_kontak['whatsapp']; ?>&text=Hallo%20Admin" class="appsLand-btn appsLand-btn-gradient"><span>DAFTAR</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <!-- Testimonials Section
    ========================================-->
    <section class="testimonials section-bg-img" id="testimonials">
        <div class="app-overlay">
            <div class="container">
                <div class="section-title style-gradient white-color wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                    <h2>
                        Testimonials
                    </h2>
                    <span><span></span></span>
                </div>
                <div class="testimonials-template">
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-1">
                            <div class="testimonials-slider-container wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide testimonials-slide">
                                        <div class="row table-row">
                                            <div class="col-lg-3 col-left table-cel">
                                                <div class="client-info text-center">
                                                    <div class="client-pic">
                                                        <img alt="" src="images/clients/01.png" class="center-block">
                                                    </div>
                                                    <h4 class="client-name">Dony Tri</h4>
                                                    <p class="client-career">Member</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-9 col-right table-cel">
                                                <div class="client-review">
                                                    <p>
                                                        Pelayanan nya baik fitur nya update respon cepat nanya slalu di jawab komplen order gk ribet deposit berbagai cara bisa simple dan praktis
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide testimonials-slide">
                                        <div class="row table-row">
                                            <div class="col-lg-3 col-left table-cel">
                                                <div class="client-info text-center">
                                                    <div class="client-pic">
                                                        <img alt="" src="images/clients/02.png" class="center-block">
                                                    </div>
                                                    <h4 class="client-name">Nis Nis </h4>
                                                    <p class="client-career">Agen</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-9 col-right table-cel">
                                                <div class="client-review">
                                                    <p>
                                                        Recomended nih Tiap Hari Ada orderan hehe
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide testimonials-slide">
                                        <div class="row table-row">
                                            <div class="col-lg-3 col-left table-cel">
                                                <div class="client-info text-center">
                                                    <div class="client-pic">
                                                        <img alt="" src="images/clients/03.jpg" class="center-block">
                                                    </div>
                                                    <h4 class="client-name">Arjuna</h4>
                                                    <p class="client-career">Reseller</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-9 col-right table-cel">
                                                <div class="client-review">
                                                    <p>
                                                        Website sangat mudah digunakan, tampilannya bagus, responsive, dan desain minimalis.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Add Arrows -->
                                <div class="testimonials-slider-button-prev swiper-button-prev"></div>
                                <div class="testimonials-slider-button-next swiper-button-next"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section
    ========================================-->
    <section class="team__style-2" id="contact">
        <div class="container">
            <div class="section-title style-gradient wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                <h2>
                    Kontak Kami
                </h2>
                <span><span></span></span>
            </div>
            <div class="row">
                
                
                <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="team-member wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.75s">
                        <div class="team-member-content">
                            <div class="member-pic">
                                <img alt="" src="../assets/images/admin.png" class="img-responsive" alt="Ceo & Developer"></img>
                            </div>
                            <div class="member-info">
                                <div class="info-content">
                                    <div class="name-career">
                                        <h4><?php echo $data_kontak['nama']; ?></h4>
                                        <span>Ceo & Founder</span>
                                    </div>
                                    <ul class="list-inline list-unstyled member-social">
                                        <li>
                                            <a href="https://www.facebook.com/<?php echo $data_kontak['facebook']; ?>"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a href="https://www.instagram.com/<?php echo $data_kontak['instagram']; ?>/"><i class="fa fa-instagram"></i></a>
                                        </li>
                                        <li>
                                            <a href="https://api.whatsapp.com/send?phone=<?php echo $data_kontak['whatsapp']; ?>&text=Hallo%20Admin"><i class="fa fa-whatsapp"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-telegram"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-linkedin"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </section>

    

    <!-- FAQ Section
    ========================================-->
    <section class="faq" id="faq">
        <div class="container">
            <div class="section-title style-gradient wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                <h2>
                    FAQ
                </h2>
                <span><span></span></span>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel-group questions-container" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a class="gradient-bg" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <span>Bagaimana cara melakukan pemesanan?</span>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <p>
                                        Untuk melakukan pemesanan Anda harus memiliki saldo yang cukup. Masuk ke halaman pemesanan, pilih kategori, pilih layanan, masukkan target, masukkan jumlah pemesanan, klik pemesanan. Maka akan muncul hasil proses berupa sukses pemesanan/gagal pemesanan. Jika pemesanan sukses silahkan menunggu hingga pemesanan selesai.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="collapsed gradient-bg" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <span>Bagaimana cara deposit saldo?</span>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body">
                                    <p>
                                        Caranya cukup mudah, anda tidak perlu deposite ke admin. Cukup anda klik menu deposit saldo, pilih deposite yg di inginkan (pulsa,gopay atupun ovo), lalu pilih metode deposite, isi nomor pengirim (nomor anda), isi jumlah deposit saldo, isi pin akun anda lalu klik submit. Setelah itu akan muncul status sukses, silahkan transfer ke nomor target di pesan sukses, isi sesuai nominal yg telah di tentukan. Jika sudah di transfer silahkan menuju ke menu deposi history, lalu scroll ke kanan dan konfirmasi maka saldo akan otomatis masuk
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    <a class="collapsed gradient-bg" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <span>Bagaimana jika orderan error/partial?</span>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="panel-body">
                                    <p>
                                        Jika status order Anda terjadi Error/Partial sistem akan otomatis mengembalikan saldo Anda, sesuai jumlah yang ditentukan.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                            <div class="panel-heading" role="tab" id="headingFour">
                                <h4 class="panel-title">
                                    <a class="collapsed gradient-bg" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                                        <span>Bagaimana jika orderan stuck/tidak ada status?</span>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                <div class="panel-body">
                                    <p>
                                        Mohon menunggu selama 2x24 jam, orderan stuck kemungkinan dikarenakan server yang sedang pending. Harap bersabar dan jika lebih dari 2x24 jam orderan tetap stuck, segera hubungi Admin.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-lg-offset-1 col-md-6 hidden-sm hidden-xs">
                    <img alt="" src="images/horizontal/01.png" class="img-responsive wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section
    ========================================-->
    <section class="contact contact__style-2 section-bg-img">
        <div class="app-overlay">
            <div class="container">
                <div class="section-title style-gradient white-color wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                    <h2>
                        Contact Us
                    </h2>
                    <span><span></span></span>
                </div>
                <div class="contact-form wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                    <div class="row">
                        <div class="col-md-4 col-lg-push-8 col-md-push-8">
                            <div class="contact-info">
                                <div class="info-box">
                                    <div class="icon-box">
                                        <i class="fa fa-phone white-color"></i>
                                    </div>
                                    <h5>Phone Number</h5>
                                    <p>
                                        <?php echo $data_kontak['whatsapp']; ?>
                                    </p>
                                </div>
                                <div class="info-box">
                                    <div class="icon-box">
                                        <i class="fa fa-envelope-o white-color"></i>
                                    </div>
                                    <h5>Email Address</h5>
                                    <p>
                                        support@kincaiseluler.store
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-pull-4 col-md-pull-4">
                            <form action="#" method="post" id="contact_form">
                                <div class="form-group">
                                    <input type="text" name="full_name" class="form-control" placeholder="Full Name" data-nameValidation>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control" placeholder="Email" data-emailValidation>
                                </div>
                                <div class="form-group">
                                    <textarea name="message" class="form-control" placeholder="Your Message" data-messageValidation></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="submit_contact_form" class="appsLand-btn appsLand-btn-gradient btn-inverse btn"><span><i class="fa fa-send"></i> Send Message</span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Client Logo Section
    ========================================-->
    <div class="clients-logo">
        <div class="container">
            <div class="clientLogos-slider-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <a href="#">
                            <img alt="" src="images/clients-logo/logo-1.png" class="img-responsive">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#">
                            <img alt="" src="images/clients-logo/logo-7.png" class="img-responsive">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#">
                            <img alt="" src="images/clients-logo/logo-2.png" class="img-responsive">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#">
                            <img alt="" src="images/clients-logo/logo-3.png" class="img-responsive">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#">
                            <img alt="" src="images/clients-logo/logo-4.png" class="img-responsive">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#">
                            <img alt="" src="images/clients-logo/logo-9.png" class="img-responsive">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#">
                            <img alt="" src="images/clients-logo/logo-5.png" class="img-responsive">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#">
                            <img alt="" src="images/clients-logo/logo-6.png" class="img-responsive">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Subscribe Section
    ========================================-->
    <section class="subscribe">
        <div class="container">
            <div class="section-title style-gradient wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                <h2>
                    News letter
                </h2>
                <span><span></span></span>
            </div>
            <form id="mc-form" class="en-form">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                        <div class="custom-input-group wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                            <input id="mc-email" type="email" class="form-control" placeholder="Email">
                            <button class="appsLand-btn appsLand-btn-gradient subscribe-btn"><span>Subscribe</span></button>
                            <div class="clearfix"></div>
                        </div>
                        <label for="mc-email"></label>
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>

<!-- Option Template Menu
========================================-->


<!-- Scroll To Top
========================================-->
<div class="scrollToTop appsLand-btn appsLand-btn-gradient"><span><i class="fa fa-angle-up"></i></span></div>



<!-- Footer
========================================-->
<footer class="apps-footer">
    <div class="footer-top">
        <div class="container">
            <div class="apps-short-info">
                
                </a>
            </div>
            
        </div>
    </div>
 <div class="footer-bottom">
        <div class="container">
            <p><?php echo $data['short_title']; ?> © 2022. All Rights Reserved.</p>
        </div>
    </div>
</footer>


<!-- start the script -->
<script src="js/jquery-2.2.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/swiper.jquery.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/jquery.countTo.min.js"></script>
<script src="js/lity.min.js"></script>

<script src="js/plugins.js"></script>

<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/jquery.ajaxchimp.langs.min.js"></script>
<script src="js/ajax.js"></script>
<!-- end the script -->
</body>

</html>
<?php } ?>