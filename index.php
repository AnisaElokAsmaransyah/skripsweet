<?php
session_start();
include('setup/koneksi.php');
   

// Proses simpan
if (isset($_POST['kirim'])) {
    
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $aspirasi = $_POST['aspirasi'];

    // Menggunakan prepared statement untuk menghindari SQL Injection
    $query = "INSERT INTO tb_aspirasi ( nama, no_hp, aspirasi, status) VALUES (?, ?, ?, 'pending')";
    $statement = mysqli_prepare($koneksi, $query);

    // Bind parameter ke prepared statement
    mysqli_stmt_bind_param($statement, "sss", $nama, $no_hp, $aspirasi);

    // Eksekusi prepared statement
    $result = mysqli_stmt_execute($statement);

    // Periksa hasil eksekusi
    if ($result) {
        echo "<script>
            alert('Terimakasih atas Aspirasi Yang anda kirimkan!');
            document.location='index.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal menyimpan aspirasi. Silakan coba lagi.');
            document.location='index.php';
        </script>";
    }

    // Tutup statement
    mysqli_stmt_close($statement);
}

// Tutup koneksi
mysqli_close($koneksi);
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
    <title>Bakesbangpol Kab.Rembang</title>
    
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link href="css/swiper.css" rel="stylesheet">
	<link href="css/magnific-popup.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
	
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
                        <a class="nav-link page-scroll" href="#header">Beranda<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#dataormas">Data Ormas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#features">Informasi</a>
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
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle page-scroll" href="" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">Pengaduan </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="pengaduan.php"><span class="item-text">Pengaduan Masyarakat</span></a>
                            <div class="dropdown-items-divide-hr"></div>
                            <a class="dropdown-item" href="cek_pengaduan.php"><span class="item-text">Cek Pengaduan</span></a>
                            
                        </div>
                    </li>
                   
                    <!-- <li class="nav-item">
                        <a class="nav-link page-scroll" href="pengaduan.php">Pengaduan</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#kotaksaran">Saran</a>
                    </li>
                  
                </ul>
                <span class="nav-item">
                    <a class="btn-outline-sm" href="login.php">LOG IN</a>
                </span>
            </div>
        </div> <!-- end of container -->
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->


    <!-- Header -->
    <header id="header" class="header">
        <div class="header-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-xl-5">
                        <div class="text-container">
                            <h1>SI-ORANG</h1>
                            <p class="p-large">Aplikasi Pendataan Ormas Kab. Rembang</p>
                            <a class="btn-solid-lg page-scroll" href="login.php">Login</a>
                        </div> <!-- end of text-container -->
                    </div> <!-- end of col -->
                    <div class="col-lg-6 col-xl-7">
                        <div class="image-container">
                            <div class="img-wrapper">
                                <img class="img-fluid" src="images/header-software-app.png" alt="alternative">
                            </div> <!-- end of img-wrapper -->
                        </div> <!-- end of image-container -->
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div> <!-- end of header-content -->
    </header> <!-- end of header -->
    <svg class="header-frame" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1920 310"><defs><style>.cls-1{fill:#5f4def;}</style></defs><title>header-frame</title><path class="cls-1" d="M0,283.054c22.75,12.98,53.1,15.2,70.635,14.808,92.115-2.077,238.3-79.9,354.895-79.938,59.97-.019,106.17,18.059,141.58,34,47.778,21.511,47.778,21.511,90,38.938,28.418,11.731,85.344,26.169,152.992,17.971,68.127-8.255,115.933-34.963,166.492-67.393,37.467-24.032,148.6-112.008,171.753-127.963,27.951-19.26,87.771-81.155,180.71-89.341,72.016-6.343,105.479,12.388,157.434,35.467,69.73,30.976,168.93,92.28,256.514,89.405,100.992-3.315,140.276-41.7,177-64.9V0.24H0V283.054Z"/></svg>
    <!-- end of header -->


    <!-- Customers -->
    <div class="slider-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    
                    <!-- Image Slider -->
                    <div class="slider-container">
                        <div class="swiper-container image-slider">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                        <img class="img-fluid" src="images/customer-logo-1.png" alt="alternative">
                                </div>
                                <div class="swiper-slide">
                                        <img class="img-fluid" src="images/customer-logo-2.png" alt="alternative">
                                </div>
                                <div class="swiper-slide">
                                        <img class="img-fluid" src="images/customer-logo-3.png" alt="alternative">
                                </div>
                                <div class="swiper-slide">
                                        <img class="img-fluid" src="images/customer-logo-4.png" alt="alternative">
                                </div>
                                <div class="swiper-slide">
                                        <img class="img-fluid" src="images/customer-logo-5.png" alt="alternative">
                                </div>
                                <div class="swiper-slide">
                                        <img class="img-fluid" src="images/customer-logo-6.png" alt="alternative">
                                </div>
                            </div> <!-- end of swiper-wrapper -->
                        </div> <!-- end of swiper container -->
                    </div> <!-- end of slider-container -->
                    <!-- end of image slider -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of slider-1 -->
    <!-- end of customers -->


    <!-- Description -->
    <div id="dataormas" class="cards-1">
        <div class="container">
        <?php
            include('setup/koneksi.php');
        ?>
         <div class="card-body">
                  <h4 class="card-title">Data Ormas</h4>
                  <div class="table-responsive">
                    <table id="" class="table table-striped">
                        <tr>
							<th>No.</th>
							<th>Lambang</th>
							<th>Nama Ormas</th>
							<th>Alamat</th>
							<th>Bidang</th>
							<th>No. Telp</th>
                        </tr>
                      <tbody>
                        <tr>
                            <td></td>
							<td></td>
							<td ></td>
							<td></td>
							<td></td>
							<td></td>
                        </tr>
                      </tbody>
                    </table>
                 </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of cards-1 -->
    <!-- end of description -->


    <!-- Features -->
    <div id="features" class="tabs">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="above-heading">Informasi</div>
                    <h2 class="h2-heading">Organisasi Masyarakat</h2>
                    <p class="p-heading">
                    organisasi yang didirikan dan dibentuk oleh masyarakat secara sukarela berdasarkan kesamaan aspirasi, 
                    kehendak, kebutuhan, kepentingan, kegiatan, dan tujuan untuk berpartisipasi dalam pembangunan demi 
                    tercapainya tujuan Negara Kesatuan Republik Indonesia yang berdasarkan Pancasila.
                    </p>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">

                    <!-- Tabs Links -->
                    <ul class="nav nav-tabs" id="argoTabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="nav-tab-1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true"><i class="fas fa-list"></i>Pengajuan SKT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="nav-tab-2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false"><i class="fas fa-envelope-open-text"></i>Dasar Hukum</a>
                        </li>
                    </ul>
                    <!-- end of tabs links -->

                    <!-- Tabs Content -->
                    <div class="tab-content" id="argoTabsContent">

                        <!-- Tab -->
                        <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab-1">
                            <div class="row">
                                    <div class="text-container">
                                        <?php
                                            $tampil = mysqli_query($koneksi, "SELECT * FROM tb_informasi, tb_kategoriinformasi
                                                WHERE tb_informasi.kategori_informasi = tb_kategoriinformasi.kd_kategori AND
                                                tb_kategoriinformasi.kategori_informasi LIKE '%Pengajuan SKT%' 
                                                ORDER BY tb_informasi.kd_informasi");
                                            while ($data = mysqli_fetch_array($tampil)) {
                                                ?>
                                                <li><?= $data['isi'] ?></li>
                                            <?php } ?>
                                        </div> <!-- end of text-container -->
                            </div> <!-- end of row -->
                        </div> <!-- end of tab-pane -->
                        <!-- end of tab -->

                        <!-- Tab -->
                        <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab-2">
                        <div class="row">
                                    <div class="text-container">
                                        <?php
                                            $tampil = mysqli_query($koneksi, "SELECT * FROM tb_informasi, tb_kategoriinformasi
                                                WHERE tb_informasi.kategori_informasi = tb_kategoriinformasi.kd_kategori AND
                                                tb_kategoriinformasi.kategori_informasi LIKE '%Dasar Hukum%' 
                                                ORDER BY tb_informasi.kd_informasi");
                                            while ($data = mysqli_fetch_array($tampil)) {
                                                ?>
                                                <li><?= $data['isi'] ?></li>
                                            <?php } ?>
                                        </div> <!-- end of text-container -->
                            </div><!-- end of row -->
                        </div> <!-- end of tab-pane -->
                        <!-- end of tab -->
                        <!-- end of tab -->
                        
                    </div> <!-- end of tab content -->
                    <!-- end of tabs content -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of tabs -->
    <!-- end of features -->


    <!-- Details Lightboxes -->
    <!-- Details Lightbox 1 -->
	<div id="details-lightbox-1" class="lightbox-basic zoom-anim-dialog mfp-hide">
        <div class="container">
            <div class="row">
                <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                <div class="col-lg-8">
                    <div class="image-container">
                        <img class="img-fluid" src="images/details-lightbox.png" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
                <div class="col-lg-4">
                    <h3>List Building</h3>
                    <hr>
                    <h5>Core service</h5>
                    <p>It's very easy to start using Tivo. You just need to fill out and submit the Sign Up Form and you will receive access to the app.</p>
                    <ul class="list-unstyled li-space-lg">
                        <li class="media">
                            <i class="fas fa-square"></i><div class="media-body">List building framework</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i><div class="media-body">Easy database browsing</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i><div class="media-body">User administration</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i><div class="media-body">Automate user signup</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i><div class="media-body">Quick formatting tools</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i><div class="media-body">Fast email checking</div>
                        </li>
                    </ul>
                   </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of lightbox-basic -->
    <!-- end of details lightbox 1 -->

    <!-- Details Lightbox 2 -->
	<div id="details-lightbox-2" class="lightbox-basic zoom-anim-dialog mfp-hide">
        <div class="container">
            <div class="row">
                <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                <div class="col-lg-8">
                    <div class="image-container">
                        <img class="img-fluid" src="images/details-lightbox.png" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
                <div class="col-lg-4">
                    <h3>Campaign Monitoring</h3>
                    <hr>
                    <h5>Core service</h5>
                    <p>It's very easy to start using Tivo. You just need to fill out and submit the Sign Up Form and you will receive access to the app.</p>
                    <ul class="list-unstyled li-space-lg">
                        <li class="media">
                            <i class="fas fa-square"></i><div class="media-body">List building framework</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i><div class="media-body">Easy database browsing</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i><div class="media-body">User administration</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i><div class="media-body">Automate user signup</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i><div class="media-body">Quick formatting tools</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i><div class="media-body">Fast email checking</div>
                        </li>
                    </ul>
                    <a class="btn-solid-reg mfp-close" href="sign-up.html">SIGN UP</a> <a class="btn-outline-reg mfp-close as-button" href="#screenshots">BACK</a>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of lightbox-basic -->
    <!-- end of details lightbox 2 -->

    <!-- Details Lightbox 3 -->
	<div id="details-lightbox-3" class="lightbox-basic zoom-anim-dialog mfp-hide">
        <div class="container">
            <div class="row">
                <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                <div class="col-lg-8">
                    <div class="image-container">
                        <img class="img-fluid" src="images/details-lightbox.png" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
                <div class="col-lg-4">
                    <h3>Analytics Tools</h3>
                    <hr>
                    <h5>Core service</h5>
                    <p>It's very easy to start using Tivo. You just need to fill out and submit the Sign Up Form and you will receive access to the app.</p>
                    <ul class="list-unstyled li-space-lg">
                        <li class="media">
                            <i class="fas fa-square"></i><div class="media-body">List building framework</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i><div class="media-body">Easy database browsing</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i><div class="media-body">User administration</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i><div class="media-body">Automate user signup</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i><div class="media-body">Quick formatting tools</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i><div class="media-body">Fast email checking</div>
                        </li>
                    </ul>
                    <a class="btn-solid-reg mfp-close" href="sign-up.html">SIGN UP</a> <a class="btn-outline-reg mfp-close as-button" href="#screenshots">BACK</a>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of lightbox-basic -->
    <!-- end of details lightbox 3 -->
    <!-- end of details lightboxes -->
   <!-- Testimonials -->
    <div class="slider-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">      
                    
                    <!-- Text Slider -->
                    <div class="slider-container">
                        <div class="swiper-container text-slider">
                            <div class="swiper-wrapper">
                                <?php
                                include('setup/koneksi.php');
                                $tampil = mysqli_query($koneksi, "SELECT * FROM tb_aspirasi where status = 'setuju'");
                                while ($data = mysqli_fetch_array($tampil)) {
                                ?>
                                    <!-- Slide -->
                                    <div class="swiper-slide">
                                        <div class="image-wrapper">
                                            <img class="img-fluid" src="images/testimonial-1.jpg" alt="alternative">
                                        </div> 
                                        <div class="text-wrapper">
                                            <div class="testimonial-text"><?= $data['aspirasi'] ?></div>
                                            <div class="testimonial-author"><?= $data['nama'] ?></div>
                                        </div>
                                    </div> <!-- end of swiper-slide -->
                                    <!-- end of slide -->
                                <?php } ?>
                            </div> <!-- end of swiper-wrapper -->

                            <!-- Add Arrows -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            <!-- end of add arrows -->

                        </div> <!-- end of swiper-container -->
                    </div>

                    <!-- end of text slider -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of slider-2 -->
    <!-- end of testimonials -->

    <?php
        include('setup/koneksi.php');

        // Ambil nilai maksimum dari kolom kd_aspirasi
        $query_max_kode = mysqli_query($koneksi, "SELECT MAX(kd_aspirasi) AS max_code FROM tb_aspirasi");
        $data_max_kode = mysqli_fetch_array($query_max_kode);
        $kode_terakhir = $data_max_kode['max_code'];

        // Proses pembuatan kode baru
        if ($kode_terakhir) {
            // Jika ada kode sebelumnya, ambil angka di belakang huruf
            $urutan = (int)substr($kode_terakhir, 2, 2);
            $urutan++;
        } else {
            // Jika tidak ada kode sebelumnya, mulai dari 1
            $urutan = 1;
        }

        $huruf = "AS";
        $kd_aspirasi = $huruf . sprintf("%02s", $urutan);
    ?>
                                   
    <!-- Newsletter -->
    <div class="form">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-container">
                       <h2>Kotak Saran Masyarakat</h2>
                        <!-- Newsletter Form -->
                        <form id="kotaksaran"  method="POST">
                        <input type="hidden" class="form-control"  name="kd_aspirasi" value="AUTO_GENERATE_OR_ANY_DEFAULT_VALUE">
                         <div class="form-group">
                                 <label  >Nama</label>
                                <input type="text" class="form-control" name="nama" autocomplete="off" >
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label >No.Hp</label>
                                <input type="text" class="form-control" name="no_hp" autocomplete="off" >
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label >Aspirasi</label>
                                <input type="text" class="form-control" name="aspirasi" autocomplete="off"  required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control-submit-button" name="kirim">Kirim</button>
                            </div>
                            <div class="form-message">
                                <div id="nmsgSubmit" class="h3 text-center hidden"></div>
                            </div>
                        </form>
                        <!-- end of newsletter form -->

                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="icon-container">
                        <span class="fa-stack">
                            <a href="https://www.facebook.com/profile.php?id=100071423787276&mibextid=ZbWKwL">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-facebook-f fa-stack-1x"></i>
                            </a>
                        </span>
                       <span class="fa-stack">
                            <a href="https://www.instagram.com/bakesbangpolrembang?igsh=MW0wenU3cGF3ZHpuOA==" target="blank">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-instagram fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="https://youtube.com/@bakesbangpolrembang802?si=wNzM-_OrXYorLDlF" target="blank">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-youtube fa-stack-1x"></i>
                            </a>
                        </span>
                    </div> <!-- end of col -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of form -->
    <!-- end of newsletter -->


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
    </div> <!-- end of footer -->  
    <!-- end of footer -->


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
    <!-- Include Swiper JS -->
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

        <!-- Initialize Swiper -->
        <script>
            var swiper = new Swiper('.text-slider', {
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });
        </script>

    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        new DataTable('#example');
    </script>
</body>
</html>