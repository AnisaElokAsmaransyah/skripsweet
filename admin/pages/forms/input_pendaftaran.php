
<?php
  session_start();
  include('../../setup/koneksi.php');
  
  if(isset($_POST['simpan'])){
    $kd_pendaftaran = $_POST['kd_pendaftaran'];
  $nama = $_POST['nama_organisasi'];
  $ketua = $_POST['nama_ketua'];
  $sekre = $_POST['nama_sekretaris'];
  $bend = $_POST['nama_bendahara'];
  $alamat = $_POST['alamat'];
  $email = $_POST['email'];
  $bentuk = $_POST['bentukorganisasi'];
  $sifat = $_POST['sifat_organisasi'];

  $selec = "SELECT * from tb_pendaftaran where nama_organisasi = '$nama'";
  $result = mysqli_query($koneksi, $selec);

  if(mysqli_num_rows($result) > 0 ){
    echo "<script>
     alert('Data sudah ada !');
     document.location='../../pages/forms/input_pendaftaran.php';
    </script>";
  }else{
    $input = "INSERT INTO tb_pendaftaran (kd_pendaftaran, nama_organisasi, nama_ketua,nama_sekretaris,nama_bendahara,
            alamat,email,bentukorganisasi,sifat_organisasi,status) VALUES 
            ('$kd_pendaftaran','$nama','$ketua','$sekre','$bend','$alamat','$email','$bentuk','$sifat','pending')";
    mysqli_query($koneksi,$input);
    echo "<script>
    alert('Data anda berhasil dikirim !');
    document.location='../../pages/forms/input_pendaftaran.php';
   </script>";
}
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SiOrang </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/typicons/typicons.css">
  <link rel="stylesheet" href="../../vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../../vendors/select2/select2.min.css">
  <link rel="stylesheet" href="../../vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div>
          <a class="navbar-brand brand-logo" href="../../index.php">
            <img src="../../images/logo.svg" alt="logo" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="../../index.php">
            <img src="../../images/logo-mini.svg" alt="logo" />
          </a>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-top"> 
        <ul class="navbar-nav">
          <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
          <h1 class="welcome-text">Selamat Datang <span class="text-black fw-bold"><?php echo $_SESSION['nama'];?></span></h1>
            
           </li>
        </ul>
        <ul class="navbar-nav ms-auto">
           
          
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border me-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border me-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
    
      <!-- partial -->
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="../../index.php">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          
          <li class="nav-item nav-category">Fitur - fitur</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="menu-icon mdi mdi-card-text-outline"></i>
              <span class="menu-title">Input Data</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="input_pendaftaran.php">Pendaftaran</a></li>
              </ul>
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="input_publikasi.php">Publikasi</a></li>
              </ul>
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="input_pengguna.php">Pengguna Baru</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class="menu-icon mdi mdi-table"></i>
              <span class="menu-title" >Data Pendaftaran</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="data_pendaftaran.php">Data Ormas Baru</a></li>
              </ul>
            </div>
            
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="tambah_akunormas.php">Akun Baru Ormas</a></li>
              </ul>
            </div>

            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="biodata.php">Biodata Ormas</a></li>
              </ul>
            </div>

            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="input_berkas.php">Berkas</a></li>
              </ul>
            </div>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class="menu-icon mdi mdi-table"></i>
              <span class="menu-title" >Data Aspirasi</span>
              <i class="menu-arrow"></i>
            </a>
             <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="data_aspirasi.php">Data Aspirasi</a></li>
              </ul>
            </div>
          </li>
			
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="form-elements">
              <i class="menu-icon mdi mdi mdi-access-point"></i>
              <span class="menu-title">Pengaduan</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="verifikasi.php">Verifikasi</a></li>
              </ul>
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="balasan_ormas.php">Balasan Ormas</a></li>
              </ul>
			       <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="laporan.php">Aduan Selesai</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../../logout.php">
                <i class="menu-icon mdi mdi-account-circle-outline"></i>
                <span class="menu-title">Keluar</span>
                
            </a>
          </li>
        
          
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Form Pendaftaran Ormas Baru</h4>
                    <?php
                      $auto = mysqli_query($koneksi, "Select max(kd_pendaftaran) as max_code from tb_pendaftaran");
                      $isi = mysqlI_fetch_array($auto);
                      $kode = $isi['max_code'];
                      $urutan = (int)substr($kode, 1, 2);
                      $urutan++;
                      $huruf = "P";
                      $kd_pend = $huruf . sprintf("%02s", $urutan);
                    ?>
                  <form class="forms-sample" action="" method="POST">
                    <div class="form-group">
                      <label for = "kd_pendaftaran" >No Registrasi</label>
                      <input type="text" class="form-control" name="kd_pendaftaran" value="<?= $kd_pend?>" readonly>
                    </div>

                    <div class="form-group">
                      <label >Nama Organisasi</label>
                      <input type="text" class="form-control" name="nama_organisasi"  placeholder="Nama Organisasi" autocomplete="off">
                    </div>

                    <div class="form-group">
                      <label >Nama Ketua</label>
                      <input type="text" class="form-control" name="nama_ketua"  placeholder="Nama Ketua" autocomplete="off">
                    </div> 

                    <div class="form-group">
                      <label >Nama Sekretaris</label>
                      <input type="text" class="form-control" name="nama_sekretaris" placeholder="Nama Sekretaris" autocomplete="off">
                    </div> 

                    <div class="form-group">
                      <label >Nama Bendahara</label>
                      <input type="text" class="form-control" name="nama_bendahara"  placeholder="Nama Bendahara" autocomplete="off">
                    </div> 
                    
                    <div class="form-group">
                      <label >Alamat Sekretariat</label>
                      <input type="text" class="form-control" name="alamat" placeholder="Alamat" autocomplete="off">
                    </div>

                    <div class="form-group">
                      <label >Email</label>
                      <input type="email" class="form-control" name="email"  placeholder="Email" autocomplete="off">
                    </div>

                    <div class="form-group">
                      <label >Bentuk Organisasi</label>
                        <select class="form-control" name="bentukorganisasi" >
                          <option>Silahkan pilih</option>
                          <?php
                            include "../../setup/koneksi.php";
                            $query = mysqli_query($koneksi, "SELECT * FROM tb_bentukorganisasi") or die (mysqli_error($koneksi));
                            while($data = mysqli_fetch_array($query)){
                              echo"<option value=$data[kd_bentukorganisasi]> $data[bentukorganisasi] </option>";
                            }
                          ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                      <label >Sifat Organisasi</label>
                        <select class="form-control" name="sifat_organisasi" >
                        <option>Silahkan pilih</option>
                          <?php
                            include "../../setup/koneksi.php";
                            $query = mysqli_query($koneksi, "SELECT * FROM tb_sifatorganisasi") or die (mysqli_error($koneksi));
                            while($data = mysqli_fetch_array($query)){
                              echo"<option value=$data[kd_sifatorganisasi]> $data[sifat_organisasi] </option>";
                            }
                          ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-outline-primary btn-icon-text" name="simpan">
                          <i class="ti-file btn-icon-prepend"></i>Simpan
                    </button>
                    <button type="reset" class="btn btn-outline-warning btn-icon-text" name="reset">
                          <i class="ti-reload btn-icon-prepend"></i>Reset
                    </button>
                  </form>
                </div>
              </div>
            
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2023. Bakesbangpol Kab. Rembang.</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../../vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="../../vendors/select2/select2.min.js"></script>
  <script src="../../vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../js/file-upload.js"></script>
  <script src="../../js/typeahead.js"></script>
  <script src="../../js/select2.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
