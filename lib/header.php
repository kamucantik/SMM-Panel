<?php
require 'session_login.php';
require 'database.php';
require 'csrf_token.php';
?>

<!DOCTYPE html>
<html lang="ID">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta name="description" content="Panel Sosial Media - Panel Sosmed - Social Media Marketing - SMM Panel terbaik dan termurah se-Indonesia. kami adalah penyedia jasa tambah followers instagram, jasa tambah followers twitter, jasa tambah followers tiktok, jasa tambah subscribers youtube, jasa tambah viewers youtube, jasa tambah followers shopee, jasa tambah followers tokopedia, jasa tambah followers bukalapak, jasa tambah likes instagram, jasa tambah likes fanpage facebook terpercaya dan aman tanpa password. Yuk gabung menjadi Reseller SMM Panel terlengkap dengan pelayanan fast dan responsif">
    <meta name="robots" content="index,nofollow">
    <meta name="author" content="Warriors Media">
    <meta name="keywords" content="social media marketing, smm panel indonesia, panel sosmed, panel social media, tambah followers instagram, panel sosial media, autolikes instagram, panel sosial media terbaik, panel sosial media termurah, jasa tambah followers">
    <meta name="language" content="ID">
    <meta name="coverage" content="Worldwide">
    <meta name="distribution" content="Global">
    <meta name="apple-mobile-web-app-title" content="Warriors Media">
    <meta name="apple-mobile-web-app-capable" content="yes">
    
    <title><?php echo $data['title']; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="<?php echo $data['deskripsi_web']; ?>" name="description" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo $config['web']['url'] ?>assets/images/favicon.ico">
    <!-- App css -->
    <link href="<?php echo $config['web']['url'] ?>assets/v1/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $config['web']['url'] ?>assets/v1/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $config['web']['url'] ?>assets/v1/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $config['web']['url'] ?>assets/v1/select.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $config['web']['url'] ?>assets/v1/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $config['web']['url'] ?>assets/v1/style_operator.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $config['web']['url'] ?>assets/css/show.css" rel="stylesheet" type="text/css" />        
    <link href="<?php echo $config['web']['url'] ?>assets/v1/app.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $config['web']['url'] ?>assets/css/newicons.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://cdn.materialdesignicons.com/5.3.45/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
    <script src="https://kit.fontawesome.com/c99b6aebd1.js" crossorigin="anonymous"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    
</head>


<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <div class="navbar-custom">
            
            <?php
            if (isset($_SESSION['user'])) {
                ?>
                <ul class="list-unstyled topnav-menu float-right mb-0">
                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="/assets/images/user.png" alt="user-image" class="rounded-circle">
                            <span class="pro-user-name ml-1">
                                <font color ='white'><?php echo $sess_username; ?> <i class="mdi mdi-chevron-down"></i></font>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome <span class="text-primary"><?php echo $sess_username; ?></span> !</h6>
                            </div>

                            <!-- item-->
                            <a href="<?php echo $config['web']['url']; ?>user/" class="dropdown-item notify-item">
                                <i class="mdi mdi-account-card-details"></i>
                                <span>Profil Saya</span>
                            </a>

                            <!-- item-->
                            <a href="<?php echo $config['web']['url']; ?>user/pemakaian-saldo" class="dropdown-item notify-item">
                                <i class="ti-wallet"></i>
                                <span>Mutasi Saldo</span>
                            </a> 
                            
                            <!-- item-->
                            <a href="<?php echo $config['web']['url']; ?>user/log" class="dropdown-item notify-item">
                                <i class="mdi mdi-tumblr-reblog"></i>
                                <span>Catatan Aktifitas</span>
                            </a>

                            <div class="dropdown-divider"></div>

                            <!-- item-->
                            <a href="<?php echo $config['web']['url'] ?>logout" class="dropdown-item notify-item">
                                <i class="ri-logout-box-line"></i>
                                <span>Logout</span>
                            </a>

                        </div>
                    </li>
                </ul>
            <?php } ?>
            <div class="logo-box">
                <a href="<?php echo $config['web']['url'] ?>" class="logo text-center">
                    <span class="logo-lg">
                        <img src="/assets/images/favicon.ico" alt="" height="45">
                    </span>
                    <span class="logo-sm">
                        <img src="/assets/images/favicon.ico" alt="" height="40">
                    </span>
                </a>
            </div>

            <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                <li>
                    <button class="button-menu-mobile waves-effect waves-light">
                        <i class="ri-menu-2-fill"></i>
                    </button>
                </li>
            </ul>
        </div>

        <div class="left-side-menu">
            <div class="slimscroll-menu">
                <div id="sidebar-menu">
                    <ul class="metismenu" id="side-menu">
                        <?php
                        if (isset($_SESSION['user'])) {
                            ?>    
                            <?php
                            if ($data_user['level'] == "Developers") {
                                ?>            
                                <li class="menu-title">Menu Developer</li>
                                <li>
                                    <a href="<?php echo $config['web']['url'] ?>admin-dashboard">
                                        <i class="ri-database-line"></i>
                                        <span> Menu Developer </span>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php
                            if ($data_user['level'] != "Member") {
                                ?> 
                                <li class="menu-title">Menu Staff</li>
                                <li>
                                    <a href="javascript: void(0);" class="waves-effect">
                                        <i class="ri-menu-2-line"></i>
                                        <span> Menu </span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul class="nav-second-level nav" aria-expanded="false">
                                    </li>
                                    <li>
                                        <a href="<?php echo $config['web']['url'] ?>staff/tambah-pengguna">Tambah Pengguna</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $config['web']['url'] ?>staff/transfer-saldo">Transfer Saldo</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $config['web']['url'] ?>riwayat/transfer-saldo">Riwayat Transfer Saldo</a>
                                    </li>
                                </ul>
                            </li>
                        <?php } ?>                            
                        <li class="menu-title">Menu Utama</li>
                        <li>
                            <a href="<?php echo $config['web']['url'] ?>">
                                <i class="ri-dashboard-fill"></i>
                                <span> Dashboards </span>
                            </a>
                        </li>
                        
                        <li>
                            <a href="javascript: void(0);" class="waves-effect">
                                <i class="ri-shopping-cart-line"></i>
                                <span> Pemesanan </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level nav" aria-expanded="false">
                            </li>                                        
                            <li>
                                <a href="<?php echo $config['web']['url'] ?>pemesanan/sosial-media">Order Baru</a>
                            </li>
                            <li>
                                <a href="<?php echo $config['web']['url'] ?>riwayat/pemesanan-sosmed">Riwayat Order</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li>
                            <a href="javascript: void(0);" class="waves-effect">
                                <i class="ti-wallet"></i>
                                <span> Deposit </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level nav" aria-expanded="false">
                            </li>                                        
                            <li>
                                <a href="<?php echo $config['web']['url'] ?>pay/">Deposit Baru</a>
                            </li>
                            <li>
                                <a href="<?php echo $config['web']['url'] ?>riwayat/deposit-saldo">Riwayat Deposit</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="<?php echo $config['web']['url'] ?>hof">
                            <i class="ti-medall"></i>
                            <span> Top 5 Pengguna </span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo $config['web']['url'] ?>halaman/daftar-harga">
                            <i class="ri-list-unordered"></i>
                            <span> Daftar Harga </span>                                       
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo $config['web']['url'] ?>tiket">                      
                            <i class="ri-mail-send-line"></i>
                            <span> Tiket Bantuan </span>
                            <?php if (mysqli_num_rows($CallDBTiket) !== 0) { ?><span class="badge badge-warning badge-pill notif-tiket"><?php echo mysqli_num_rows($CallDBTiket); ?></span><?php } ?>
                        </a>
                    </li>                                                                             
                    
                    
                    <li class="menu-title mt-2">Halaman & Bantuan</li>
                    
                    <li>
                        <a href="<?php echo $config['web']['url'] ?>halaman/kontak-kami">
                            <i class="ri-customer-service-2-line"></i>
                            <span> Kontak Admin </span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="javascript: void(0);" class="waves-effect">
                            <i class="ri-shuffle-line"></i>
                            <span> Dokumentasi Api </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level nav" aria-expanded="false">
                        </li>     
                        <li>
                            <a href="<?php echo $config['web']['url'] ?>halaman/api-dokumentasi-profile">Profile</a>
                        </li>                                  
                        <li>
                            <a href="<?php echo $config['web']['url'] ?>halaman/api-dokumentasi-sosmed">Sosial Media</a>
                        </li>
                    </ul>
                </li>
                
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="ri-file-mark-line"></i>
                        <span> Halaman Lainnya </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level nav" aria-expanded="false">
                    </li>
                    <li>
                        <a href="<?php echo $config['web']['url'] ?>halaman/FAQ&TOS">FAQs & TOS</a>
                    </li>                                        
                    <li>
                        <a href="<?php echo $config['web']['url'] ?>halaman/cara-deposit">Cara Deposit</a>
                    </li>
                    <li>
                        <a href="<?php echo $config['web']['url'] ?>halaman/cara-transaksi">Cara Transaksi</a>
                    </li>
                    <li>
                        <a href="<?php echo $config['web']['url'] ?>halaman/info">Penjelasan Status</a>
                    </li>
                </ul>
            </li>                                                         
            <?php
        } else {
            ?>
            <li class="menu-title">Menu Utama</li>
            <li>
                <a href="<?php echo $config['web']['url'] ?>">
                    <i class="ri-home-2-line"></i>
                    <span> Halaman Utama </span>
                </a>
            </li>
            
            <li>
                <a href="<?php echo $config['web']['url'] ?>auth/login">
                    <i class="ri-login-box-line "></i>
                    <span> Masuk </span>
                </a>
            </li>
            
            <li>
                <a href="<?php echo $config['web']['url'] ?>auth/register">
                    <i class="ri-user-add-line "></i>
                    <span> Daftar </span>
                </a>
            </li>
            
            <li>
                <a href="<?php echo $config['web']['url'] ?>auth/lupa-password">
                    <i class="ri-lock-unlock-line "></i>
                    <span> Lupa Password </span>
                </a>
            </li>
            
            <li>
                <a href="<?php echo $config['web']['url'] ?>halaman/daftar-harga">
                    <i class="ri-list-unordered"></i>
                    <span> Daftar Harga </span>                                       
                </a>
            </li>                                                                
            
            <li>
                <a href="javascript: void(0);" class="waves-effect">
                    <i class="ri-file-mark-line"></i>
                    <span> Halaman Lainnya </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level nav" aria-expanded="false">
                </li>
                <li>
                    <a href="<?php echo $config['web']['url'] ?>halaman/kontak-kami">Kontak Admin</a>
                </li>
                <li>
                    <a href="<?php echo $config['web']['url'] ?>halaman/FAQ&TOS">FAQs & TOS</a>
                </li>
            </ul>
        </li>                  
    <?php } ?>

</ul>

</div>

<div class="clearfix"></div>

</div>

</div>

<div class="content-page">
  <div class="content">
    <div class="container-fluid">
        <br />
        <script type="text/javascript" src="https://cdn.ywxi.net/js/1.js" async></script>
        
        <?php
        if (isset($_SESSION['hasil'])) {
            ?>
            <div class="alert alert-<?php echo $_SESSION['hasil']['alert'] ?> alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Respon : </strong><?php echo $_SESSION['hasil']['judul'] ?><br /> <strong>Pesan : </strong> <?php echo $_SESSION['hasil']['pesan'] ?>
            </div>
            <?php
            unset($_SESSION['hasil']);
        }
        ?>
        <?php
        $time = microtime();
        $time = explode(' ', $time);
        $time = $time[1] + $time[0];
        $start = $time;
        ?>
        


