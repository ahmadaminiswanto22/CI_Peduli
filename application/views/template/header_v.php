<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?=$halaman;?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url()?>assets/img/logo.png" rel="icon">
    <link href="<?= base_url()?>assets/img/logo.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url()?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url()?>assets/css/style.css" rel="stylesheet">

</head>

<body>

    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-flex align-items-center fixed-top">
        <div class="container d-flex justify-content-center">
            <div class="contact-info d-flex align-items-center text-white">
                <i class="bi bi-activity text-white"></i>
                <h6>Selalau Lakukan Catatan Perjalanan Setiap Berkunjung Ke Area Publik</h6>
            </div>
        </div>
    </div>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">
            <a class="navbar-brand" href="<?=base_url()?>home">
                <img src="<?=base_url()?>assets/img/logo.png" alt="logo" width="30" height="28">
            </a>
            <h1 class="logo me-auto"><a href="<?=base_url()?>home">Peduli Diri</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto" href="<?=base_url()?>home">Home</a></li>
                    <li><a class="nav-link scrollto" href="<?=base_url()?>data_perjalanan">Catatan Perjalanan</a></li>
                    <li><a class="nav-link scrollto" href="<?=base_url()?>isi_catatan">Isi Data</a></li>
                    <li><a class="nav-link scrollto" href="<?=base_url()?>login/logout">Logout</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
        </div>
    </header><!-- End Header -->