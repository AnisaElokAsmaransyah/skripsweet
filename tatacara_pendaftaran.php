<?PHP
    include('setup/koneksi.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="Tivo is a HTML landing page template built with Bootstrap to help you crate engaging presentations for SaaS apps and convert visitors into users.">
    <meta name="author" content="Inovatik">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
	<meta property="og:site_name" content="" /> <!-- website name -->
	<meta property="og:site" content="" /> <!-- website link -->
	<meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
	<meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
	<meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
	<meta property="og:url" content="" /> <!-- where do you want your post to link to -->
	<meta property="og:type" content="article" />

    <!-- Website Title -->
    <title>Bakesbangpol Kab. Rembang</title>
    
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link href="css/swiper.css" rel="stylesheet">
	<link href="css/magnific-popup.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
	
	<!-- Favicon  -->
    <link rel="icon" href="images/kabrembang.png">
</head>
<body data-spy="scroll" data-target=".fixed-top">
    
    <!-- Preloader -->
	<div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <!-- end of preloader -->
    

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <div class="container">

            <!-- Text Logo - Use this if you don't have a graphic logo -->
            <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Tivo</a> -->

            <!-- Image Logo -->
            <a class="navbar-brand " href="index.html"><img src="images/kabrembang.png" height="90" width="90" alt="alternative"></a> 
            
            <!-- Mobile Menu Toggle Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-awesome fas fa-bars"></span>
                <span class="navbar-toggler-awesome fas fa-times"></span>
            </button>
            <!-- end of mobile menu toggle button -->

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="index.php#header">Beranda<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="index.php#dataormas">Data Ormas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="index.php#features">Informasi</a>
                    </li>

                    <!-- Dropdown Menu -->  
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle page-scroll" href="" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">Pendaftaran Ormas</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="tatacara_pendaftaran.php"><span class="item-text">Tata Cara Pendaftaran</span></a>
                            <div class="dropdown-items-divide-hr"></div>
                            <a class="dropdown-item" href="input_pendaftaran.php"><span class="item-text">Form Pendaftaran Akun</span></a>
                            
                        </div>
                    </li>        
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle page-scroll" href="#video" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">Informasi</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#features"><span class="item-text">Persyaratan SKT</span></a>
                            <div class="dropdown-items-divide-hr"></div>
                            <a class="dropdown-item" href="terms-conditions.html"><span class="item-text">Dasar Hukum</span></a>
                            
                        </div>
                    </li> -->
                    <!-- end of dropdown menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle page-scroll" href="" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">Pengaduan </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="pengaduan.php"><span class="item-text">Pengaduan Masyarakat</span></a>
                            <div class="dropdown-items-divide-hr"></div>
                            <a class="dropdown-item" href="cek_pengaduan.php"><span class="item-text">Cek Pengaduan</span></a>
                            
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#newsletterForm">Saran</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link page-scroll" href="#pricing">PRICING</a>
                    </li> -->
                </ul>
                <span class="nav-item">
                    <a class="btn-outline-sm" href="login.php">LOG IN</a>
                </span>
            </div>
        </div> <!-- end of container -->
    </nav>
    <!-- end of navbar -->
    <!-- end of navigation -->


    <!-- Header -->
    <header id="header" class="ex-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Tata Cara Pendaftaran Ormas Kabupaten Rembang</h1>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of ex-header -->
    <!-- end of header -->


    <!-- Breadcrumbs -->
    <div class="ex-basic-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs">
                        <a href="index.php">Beranda</a><i class="fa fa-angle-double-right"></i><span>Tata Cara Pendaftaran</span>
                    </div> <!-- end of breadcrumbs -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of ex-basic-1 -->
    <!-- end of breadcrumbs -->


    <!-- Privacy Content -->
    <div class="ex-basic-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="image-container-large">
                        <img class="img-fluid" src="images/Alur SKT ormas.jpg" alt="alternative">
                    </div> <!-- end of image-container-large -->
                    <div class="text-container">
                        <div class="">
                            <h4>TATA CARA PENDAFTARAN ORMAS BARU</h4>
                            <div class="">
                            <ul class="list-unstyled li-space-lg indent">
                                    <li class="media">
                                        <?php
                                        $tampil = mysqli_query($koneksi, "SELECT * FROM tb_informasi, tb_kategoriinformasi
                                            WHERE tb_informasi.kategori_informasi = tb_kategoriinformasi.kd_kategori AND
                                            tb_kategoriinformasi.kategori_informasi LIKE '%Tata Cara Pendaftaran%' 
                                            ORDER BY tb_informasi.kd_informasi");
                                        while ($data = mysqli_fetch_array($tampil)) {
                                            ?>
                                            <li><?= $data['isi'] ?></li>
                                        <?php } ?>
                                        
                                    </li>
                            </ul>  
                            </div> <!-- end of col -->

                           
                        </div> <!-- end of row -->
                    </div> <!-- end of text-container-->
                    <a class="btn-outline-reg" href="index.php">Kembali</a>
                </div> <!-- end of col-->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of ex-basic-2 -->
    <!-- end of privacy content -->


    <!-- Breadcrumbs -->
    <div class="ex-basic-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs">
                        <a href="index.php">Beranda</a><i class="fa fa-angle-double-right"></i><span>Tata Cara Pendaftaran</span>
                    </div> <!-- end of breadcrumbs -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of ex-basic-1 -->
    <!-- end of breadcrumbs -->

    
    <!-- Footer -->
    <svg class="footer-frame" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1920 79"><defs><style>.cls-2{fill:#5f4def;}</style></defs><title>footer-frame</title><path class="cls-2" d="M0,72.427C143,12.138,255.5,4.577,328.644,7.943c147.721,6.8,183.881,60.242,320.83,53.737,143-6.793,167.826-68.128,293-60.9,109.095,6.3,115.68,54.364,225.251,57.319,113.58,3.064,138.8-47.711,251.189-41.8,104.012,5.474,109.713,50.4,197.369,46.572,89.549-3.91,124.375-52.563,227.622-50.155A338.646,338.646,0,0,1,1920,23.467V79.75H0V72.427Z" transform="translate(0 -0.188)"/></svg>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="footer-col first">
                        <h4>Bakesbangpol Kab. Rembang</h4>
                        <p class="p-small">
                        Badan Kesatuan Bangsa dan Politik dipimpin oleh Kepala Badan Kesatuan Bangsa dan Politik 
                        yang berkedudukan dibawah dan bertanggung jawab kepada Bupati melalui Sekretaris Daerah.
                        </p>
                    </div>
                </div> <!-- end of col -->
                
                <div class="col-md-4">
                    <div class="footer-col last">
                        <h4>Alamat</h4>
                        <ul class="list-unstyled li-space-lg p-small">
                            <li class="media">
                                <i class="fas fa-map-marker-alt"></i>
                                <div class="media-body">
                                Jalan Doktor Sutomo No.16 A, Leteh, Kutoharjo, Kec. Rembang, Kabupaten Rembang, Jawa Tengah 59211
                                </div>
                            </li>
                            </ul>
                    </div> 
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> 


    <!-- Copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="p-small">Copyright © 2023 Bakesbangpol Kab. Rembang</a><br>
                       
                    </p>
                </div> <!-- end of col -->
            </div> <!-- enf of row -->
        </div> <!-- end of container -->
    </div> <!-- end of copyright --> 
    <!-- end of copyright -->
    
    	
    <!-- Scripts -->
    <script src="js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="js/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
    <script src="js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
    <script src="js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
    <script src="js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
    <script src="js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="js/scripts.js"></script> <!-- Custom scripts -->
</body>
</html>