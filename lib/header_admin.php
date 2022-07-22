<?php require 'database.php'; ?>

<!DOCTYPE html>
<html lang="en">


<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="google-site-verification" content="2frLBzHi9IILEo5lws3e5DV7s1do12vpBzCdYBAVQV8" />
    
    <meta name="keywords" content="gracepanel , grace-panel , grace panel ,smm panel reseller, smm panel indonesia, panel all sosmed, daftar panel all pulsa, smm reseller, smm reseller panel, smm panel, agen pulsa murah, grace panel, panel terbaik di Indonesia, gracepanel, pusat smm, followers instagram, panel termurah di Indonesia, termurah, terbaik, paling baik, layanan lengkap ,Distributor & H2H Pulsa Termurah, Server Pulsa dan Token PLN Terlengkap, termurah dan cepat,panel instant,best panel,smm resseler panel,instagram like,cara memperbanyak likes, kebutuhan sosial media ,sosmedpedia, Medanpedia, regram, irvankede, followers gratus, followers murah, otomatis, digital, se Indonesia, CV pulsa, auto, Recomended" />

    <meta name="description" content="Grace-panel Platform bisnis yang menyediakan berbagai kebutuhan sosial media seperti Instagram, Youtube, Facebook, Dll. Agen Pulsa & H2H Pulsa Termurah, Server Pulsa dan Token PLN Terlengkap">
    
    <title><?php echo $data['title']; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="<?php echo $data['deskripsi_web']; ?>" name="description" />
    <meta content="KangHL" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo $config['web']['url'] ?>assets/images/favicon.ico">
    <!-- App css -->
    <link href="<?php echo $config['web']['url'] ?>assets/v1/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $config['web']['url'] ?>assets/v1/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $config['web']['url'] ?>assets/v1/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $config['web']['url'] ?>assets/v1/select.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $config['web']['url'] ?>assets/v1/bootstrap.min.css" rel="stylesheet" type="text/css" />        
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

            <!-- LOGO -->
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
                            <h6 class="text-overflow m-0">Welcome !</h6>
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
            <!-- End Logo container-->


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

                        <li class="menu-title">Menu Utama</li>
                        <li>
                            <a href="<?php echo $config['web']['url'] ?>admin-dashboard/">
                                <i class="ri-dashboard-fill"></i>
                                <span>Admin Dashboards</span>
                            </a>
                        </li>
                        
                        <li>
                            <a href="<?php echo $config['web']['url'] ?>admin-dashboard/action-provider">
                                <i class="mdi mdi-server-security"></i>
                                <span>Action Provider</span>
                            </a>
                        </li>
                        
                        <li>
                            <a href="<?php echo $config['web']['url'] ?>admin-dashboard/pengguna">
                                <i class="ri-file-user-line"></i>
                                <span>Pengguna</span>
                            </a>
                        </li>
                        
                        <li>
                            <a href="<?php echo $config['web']['url'] ?>admin-dashboard/sosial-media">
                                <i class="ri-shopping-cart-line"></i>
                                <span>Pesanan</span>
                            </a>
                        </li>
                        
                    <li>
                        <a href="javascript: void(0);" class="waves-effect">
                            <i class="ti-wallet"></i>
                            <span>Deposit</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level nav" aria-expanded="false">
                        </li>                                        
                        <li>
                            <a href="<?php echo $config['web']['url'] ?>admin-dashboard/deposit">Kelola Deposit</a>
                        </li>
                        <li>
                            <a href="<?php echo $config['web']['url'] ?>admin-dashboard/metode-deposit">Metode Deposit</a>
                        </li>
                        <li>
                            <a href="<?php echo $config['web']['url'] ?>admin-dashboard/deposit-voucher">Kelola Voucher Deposit</a>
                        </li>
                    </ul>
                </li>
                
                <li class="menu-title">Menu Lainnya</li>
                
                <li>
                    <a href="<?php echo $config['web']['url'] ?>admin-dashboard/tiket"><i class="ri-mail-check-line"></i> <span>Tiket</span> <?php if (mysqli_num_rows($AllTiketUsers) !== 0) { ?><span class="badge badge-warning"><?php echo mysqli_num_rows($AllTiketUsers); ?></span><?php } ?>
                </a>
            </li>
            
            <li>
                <a href="<?php echo $config['web']['url'] ?>admin-dashboard/kategori-layanan">
                    <i class="mdi mdi-sitemap"></i>
                    <span>Kategori</span>
                </a>
            </li>
            
            <li>
            <a href="<?php echo $config['web']['url'] ?>admin-dashboard/layanan-sosmed">
                <i class="ri-server-line"></i>
                <span> Layanan </span>
            </a>
        </li>
        <li>
            <a href="<?php echo $config['web']['url'] ?>admin-dashboard/provider">
                <i class="ri-shield-keyhole-line"></i>
                <span> Provider </span>
            </a>
        </li>
        
        <li class="menu-title">Menu Website</li>
        
        <li>
            <a href="<?php echo $config['web']['url'] ?>admin-dashboard/berita">
                <i class="ri-newspaper-line"></i>
                <span>Kelola Berita</span>
            </a>
        </li>
        
        <li>
            <a href="<?php echo $config['web']['url'] ?>admin-dashboard/laporan">
                <i class="ri-book-3-line"></i>
                <span>Laporan Pemesanan</span>
            </a>
        </li>                                                                             
        
        <li>
            <a href="javascript: void(0);" class="waves-effect">
                <i class="mdi mdi-backup-restore"></i>
                <span>Aktifitas</span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level nav" aria-expanded="false">
            </li>                                        
            <li>
                <a href="<?php echo $config['web']['url'] ?>admin-dashboard/penggunaan-saldo">Saldo</a>
            </li>
            <li>
                <a href="<?php echo $config['web']['url'] ?>admin-dashboard/aktifitas-pengguna">Pengguna</a>
            </li>
            <li>
                <a href="<?php echo $config['web']['url'] ?>admin-dashboard/transfer-saldo">Transfer Saldo</a>
            </li>
        </ul>
    </li>
    
    <li class="menu-title mt-2"> Pengaturan Website</li>
    
    
    <li>
        <a href="<?php echo $config['web']['url'] ?>admin-dashboard/pengaturan-website">
            <i class="ri-code-box-line"></i>
            <span>Pengaturan Website</span>
        </a>
    </li>
    
    <li>
        <a href="<?php echo $config['web']['url'] ?>admin-dashboard/harga-pendaftaran">
            <i class="ri-user-star-line"></i>
            <span>Harga Pendaftaran</span>
        </a>
    </li>
    
    <li>
        <a href="<?php echo $config['web']['url'] ?>admin-dashboard/halaman-lain">
            <i class="ri-customer-service-2-line"></i>
            <span>Halaman Lainnya</span>
        </a>
    </li>             
    <!-- End navigation menu  -->
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
      </header>

      <!-- End Navigation Bar-->

      <div class="row">
        <div class="col-sm-12">
         <div class="btn-group pull-right m-t-20"><a href="<?php echo $config['web']['url'] ?>" class="btn btn-primary btn-block"><i class="fa fa-reply"></i> Dashboard Member / Utama</a><hr>
         </div>
     </div>
 </div>

 <!-- Page-Title -->

 <div class="row">
    <div class="col-md-12"><br />
    </div>
</div>

<!-- end row -->

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