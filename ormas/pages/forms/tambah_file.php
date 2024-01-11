<?php
session_start();
include('../../setup/koneksi.php');

if (isset($_POST['simpan'])) {
    $kd_berkas = $_POST['kd_berkas'];
    $judul = $_POST['judul'];
    $id_pengguna = $_SESSION['id_pengguna']; // Menggunakan id_pengguna dari session

    $eks_boleh = array('pdf', 'docx');
    $file = $_FILES['file']['name'];
    $x = explode('.', $file);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['file']['size'];
    $file_temp = $_FILES['file']['tmp_name'];

    // Validasi apakah semua data terisi
    if (empty($kd_berkas) || empty($judul) || empty($file) || empty($id_pengguna)) {
        echo "<script>
            alert('Semua data harus diisi!');
            window.location.href='../../pages/forms/tambah_file.php';
        </script>";
    } else {
        // Check apakah judul berkas sudah terisi
        $check_query = "SELECT COUNT(*) AS count FROM tb_berkas WHERE judul = '$judul'";
        $check_result = mysqli_query($koneksi, $check_query);
        $check_data = mysqli_fetch_assoc($check_result);

        if ($check_data['count'] > 0) {
            echo "<script>
                alert('Judul Berkas sudah terisi');
                window.location.href='../../pages/forms/tambah_file.php';
            </script>";
        } else {
            // Periksa ekstensi file
            if (!in_array($ekstensi, $eks_boleh)) {
                echo "<script>
                    alert('Ekstensi file tidak diizinkan. Hanya file PDF dan DOCX yang diperbolehkan.');
                    window.location.href='../../pages/forms/tambah_file.php';
                </script>";
            } else {
                // Periksa ukuran file (dalam bytes)
                $ukuran_maksimal = 10 * 1024 * 1024; // 10 MB

                if ($ukuran > $ukuran_maksimal) {
                    echo "<script>
                        alert('Ukuran file terlalu besar. Maksimal 10 MB.');
                        window.location.href='../../pages/forms/tambah_file.php';
                    </script>";
                } else {
                    // Masukkan data ke tb_berkas
                    $input = "INSERT INTO tb_berkas (kd_berkas, judul, file, id_pengguna) VALUES 
                        ('$kd_berkas', '$judul', '$file', '$id_pengguna')";

                    if (mysqli_query($koneksi, $input)) {
                        // Unggah file
                        move_uploaded_file($file_temp, "../../../images/berkas/" . $file);

                        echo "<script>
                            alert('Berkas anda berhasil dikirim!');
                            window.location.href='../../pages/forms/file.php';
                        </script>";
                    } else {
                        echo "Error: " . $input . "<br>" . mysqli_error($koneksi);
                    }
                }
            }
        }
    }
}
?>

<!-- ... (HTML lainnya tetap sama) ... -->




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
              <span class="menu-title">Pemberkasan</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="biodata.php">Biodata Pengurus</a></li>
              </ul>
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="file.php">File</a></li>
              </ul>
              </div>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class="menu-icon mdi mdi-table"></i>
              <span class="menu-title" >Jadwal Kegiatan</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="rencana.php">Rencana</a></li>
              </ul>
            </div>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="terlaksana.php">Terlaksana</a></li>
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
                <li class="nav-item"> <a class="nav-link" href="tanggapi.php">Tanggapi</a></li>
              </ul>
			       <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="laporan.php">Laporan Selesai</a></li>
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
                <?php
                      $auto = mysqli_query($koneksi, "Select max(kd_berkas) as max_code from tb_berkas");
                      $isi = mysqli_fetch_array($auto);
                      $kode = $isi['max_code'];
                      $urutan = (int)substr($kode, 1, 2);
                      $urutan++;
                      $huruf = "F";
                      $kd_berkas= $huruf . sprintf("%02s", $urutan);
                    ?>
                     <!-- Formulir HTML disini -->
                    <form class="forms-sample" action="" method="POST" id="form-ketua" enctype="multipart/form-data">
                    <div>
                   <h4 class="card-title card-title-dash">Form Upload Berkas Persyaratan</h4>
                    </div>
                    <br>
                    <input type="hidden" name="kd_berkas" value="<?php echo $kd_berkas; ?>">
                   
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="text" class="form-control" name="judul" autocomplete="off">
                    </div>
                    <div class="form-group">
                      <label>Kelengkapan Berkas</label>
                      <input type="file" name="file" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" >
                        <span class="input-group-append mx-2" >
                          <button class="file-upload-browse btn btn-primary btn-sm" type="button">Upload</button>
                        </span>
                      </div>
                    </div>

                    <button type="submit" class="btn btn-outline-primary btn-icon-text" name="simpan">
                          <i class="ti-file btn-icon-prepend"></i>Simpan
                    </button>
                    <button type="reset" class="btn btn-outline-warning btn-icon-text" name="reset">
                          <i class="ti-reload btn-icon-prepend"></i>Reset
                    </button>
                  </form>
                <div>
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
