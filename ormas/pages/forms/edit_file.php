<?php
session_start();
include('../../setup/koneksi.php');

if (isset($_POST['edit'])) {
    $kd_berkas = $_POST['kd_berkas'];
    $id_pengguna = $_SESSION['id_pengguna'];
    $judul = $_POST['judul'];

    // Handle file upload
    $uploadDir = "../../../images/berkas/";  // Ganti dengan path yang sesuai
    $fileName = $_FILES['file']['name'];
    $fileTempName = $_FILES['file']['tmp_name'];

    // Cek apakah ada file yang diunggah
    if (!empty($fileName)) {
        // Cek apakah itu file dengan ekstensi yang diizinkan
        $allowedExtensions = ['pdf', 'doc', 'docx'];  // Ekstensi yang diizinkan
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        // Jika ekstensi file tidak sesuai, tampilkan pesan dan kembali ke halaman edit
        if (!in_array($fileExtension, $allowedExtensions)) {
            echo "<script>
                  alert('Periksa ekstensi file anda.');
                  window.location.href='edit_file.php?update=$kd_berkas';  // Perbarui halaman edit
                 </script>";
            exit(); // Pastikan skrip berhenti setelah menampilkan alert
        }

        // Pindahkan file yang diunggah ke direktori yang diinginkan
        move_uploaded_file($fileTempName, $uploadDir . $fileName);
        $filePath = $fileName;  // Gunakan file yang baru diunggah
    } else {
        // Jika tidak ada file yang diunggah, ambil file yang sudah ada sebelumnya
        $queryGetFile = "SELECT file FROM tb_berkas WHERE kd_berkas = '$kd_berkas'";
        $resultGetFile = mysqli_query($koneksi, $queryGetFile);
        $rowGetFile = mysqli_fetch_assoc($resultGetFile);
        $filePath = $rowGetFile['file'];
    }

    // Masukkan data ke tb_berkas termasuk kolom file
    $query = "UPDATE tb_berkas SET 
                id_pengguna = '$id_pengguna',
                judul = '$judul',
                file = '$filePath'
            WHERE kd_berkas = '$kd_berkas'";

    if (mysqli_query($koneksi, $query)) {
        // Redirect setelah berhasil mengedit data
        header("Location: file.php");
        exit();
    } else {
        // Menampilkan pesan error dan kembali ke halaman edit
        echo "<script>
                  alert('Gagal menyimpan data. Periksa kembali data anda.');
                  window.location.href='edit_file.php?update=$kd_berkas';  // Perbarui halaman edit
                 </script>";
        exit();
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
                <h4 class="card-title">Edit Data Berkas</h4>
                    <?php
                    include('../../setup/koneksi.php');
                    if (isset($_GET['update'])) {
                        $query = mysqli_query($koneksi, "SELECT * FROM tb_berkas WHERE kd_berkas ='$_GET[update]'");
                        $data = mysqli_fetch_array($query);
                    }
                    ?>
                    <!-- Formulir HTML disini -->
                <form class="forms-sample" action="" method="POST" id="form-ketua" enctype="multipart/form-data">
                    <input type="hidden" name="kd_berkas" value="<?= isset($data['kd_berkas']) ? $data['kd_berkas'] : ''; ?>">
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="text" class="form-control" name="judul" value="<?= isset($data['judul']) ? $data['judul'] : ''; ?>" autocomplete="off">
                    </div>
                    
                    <div class="form-group">
                        <label>Unggah Berkas</label>
                        <input type="file" name="file" class="file-upload-default">
                        <div class="input-group col-xs-12">
                            <?php if (isset($data['file']) && !empty($data['file'])) : ?>
                                <input type="text" class="form-control file-upload-info" value="<?= $data['file']; ?>" readonly>
                            <?php else : ?>
                                <input type="text" class="form-control file-upload-info" readonly>
                            <?php endif; ?>
                            <span class="input-group-append mx-2">
                                <button class="file-upload-browse btn btn-primary btn-sm" type="button">Upload</button>
                            </span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-primary btn-icon-text" name="edit">
                          <i class="ti-file btn-icon-prepend"></i>Simpan
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
