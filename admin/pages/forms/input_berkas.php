
<?php
session_start();
  include('../../setup/koneksi.php');

  // proses simpan
  if(isset($_POST['simpan'])){
    $eks_boleh = array('pdf', 'docx');
    $nama = $_FILES['file']['name'];
    $x = explode('.', $nama);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['file']['size'];
    $file_temp = $_FILES['file']['tmp_name'];

    // Cek apakah berkas dengan nama yang sama sudah ada di database
    $cek_duplikat = mysqli_query($koneksi, "SELECT * FROM tb_berkas WHERE file = '$nama'");
    if(mysqli_num_rows($cek_duplikat) > 0) {
      echo "<script>
              alert('Berkas dengan nama yang sama sudah ada');
              document.location='../../pages/forms/input_berkas.php';
            </script>";
      exit;
    }

    if(in_array($ekstensi, $eks_boleh) === true){
      if($ukuran < 1044070){
        move_uploaded_file($file_temp, '../../pages/file/'.$nama);
        $simpan = mysqli_query($koneksi,"INSERT INTO tb_berkas (kd_berkas, nama_user,judul, file) VALUES 
        ('$_POST[kd_berkas]', '$_POST[nama_user]', '$_POST[judul]', '$nama')");
        
        if($simpan){
          echo "<script>
                  alert('Data Anda Berhasil Disimpan');
                  document.location='../../pages/forms/input_berkas.php';
                </script>";
        } else {
          echo "<script>
                  alert('Data Gagal disimpan');
                  document.location='../../pages/forms/input_berkas.php';
                </script>";
        }
      } else {
        echo "<script>
                alert('Ukuran file terlalu besar');
                document.location='../../pages/forms/input_berkas.php';
              </script>";
      }
    } else {
      echo "<script>
              alert('Perhatikan ekstensi');
              document.location='../../pages/forms/input_berkas.php';
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
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
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
           
          <li class="nav-item dropdown d-none d-lg-block user-dropdown">
            <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <img class="img-xs rounded-circle" src="../../images/faces/face8.jpg" alt="Profile image"> </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <div class="dropdown-header text-center">
                <img class="img-md rounded-circle" src="../../images/faces/face8.jpg" alt="Profile image">
                <p class="mb-1 mt-3 font-weight-semibold">Allen Moreno</p>
                
              </div>
              <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> Pengaturan</a>
             <a href="../../../logout.php" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Keluar</a>
            </div>
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
              <span class="menu-title">Input Data</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="../../pages/forms/input_pendaftaran.php">Form Pendaftaran</a></li>
              </ul>
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="../../pages/forms/input_publikasi.php">Form Publikasi</a></li>
              </ul>
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="../../pages/forms/input_berkas.php">Form Berkas</a></li>
              </ul>
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="../../pages/forms/input_pengguna.php">Pengguna Baru</a></li>
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
                <li class="nav-item"> <a class="nav-link" href="../../pages/tables/data_pendaftaran.php">Data Ormas Baru</a></li>
              </ul>
            </div>
            
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../../pages/tables/tambah_akunormas.php">Akun Baru Ormas</a></li>
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
                <li class="nav-item"> <a class="nav-link" href="../../pages/tables/data_aspirasi.php">Data Aspirasi</a></li>
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
                <li class="nav-item"> <a class="nav-link" href="../../pages/forms/verifikasi.php">Verifikasi</a></li>
              </ul>
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../../pages/forms/tanggapi.php">Tanggapi</a></li>
              </ul>
			       <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../../pages/forms/laporan.php">Aduan Selesai</a></li>
              </ul>
            </div>
          </li>
			</ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Input Berkas SKT</h4>
                  <?php
                      $auto = mysqli_query($koneksi, "Select max(kd_berkas) as max_code from tb_berkas");
                      $isi = mysqlI_fetch_array($auto);
                      $kode = $isi['max_code'];
                      $urutan = (int)substr($kode, 1, 2);
                      $urutan++;
                      $huruf = "B";
                      $kd_pend = $huruf . sprintf("%02s", $urutan);
                    ?>
                <form class="forms-sample" action="input_berkas.php" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Kode Berkas</label>
                    <input type="text" class="form-control " name="kd_berkas" value="<?= $kd_pend?>" readonly>
                  </div>
                  <div class="form-group">
                    <label>Nama User</label>
                    <input type="text" class="form-control" name="nama_user" autocomplete="off" >
                  </div>
                 <div class="form-group">
                    <label>Judul</label>
                    <input type="text" class="form-control" name="judul" autocomplete="off" >
                  </div>
                  <div class="form-group">
                      <label>Unggah Berkas</label>
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
                </div>
              </div>
            </div>
             </form>
            <div class="col-lg-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Data Berkas</h4>
                 <div class="table-responsive">
                    <table id="example" class="table table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Kode Berkas</th>
                          <th>Nama User</th>
                          <th>Judul</th>
                          <th>File</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                            $no = 1;
                            $tampil = mysqli_query($koneksi, "SELECT * FROM tb_berkas order by kd_berkas");
                            while ($data = mysqli_fetch_array($tampil)){
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['kd_berkas'] ?></td>
                            <td ><?= $data['nama_user'] ?></td>
                            <td ><?= $data['judul'] ?></td>
                            <td><?= $data['file'] ?></td>
                            <td>
                                <a href='edit_berkas.php?update=<?= $data['kd_berkas'] ?>' class="btn btn-primary btn-lg">Edit</a>
                                <a href="?hapus=<?= $data['kd_berkas'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');" 
                                class="btn btn-danger btn-lg ">Hapus</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    </table>
                    <?php
                      if(isset($_GET['hapus'])){
                        mysqli_query($koneksi, "Delete from tb_berkas where kd_berkas='$_GET[hapus]' ") or die (mysqli_error($koneksi));

                        echo "<script>
                            alert('Data Berkas Berhasil Dihapus');
                            document.location='../../pages/forms/input_berkas.php';
                            </script>";
                        echo "<meta http-equiv=refrsh content=2;URL='input_berkas.php'>";
                      }
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <?php include "../../footer.php"; ?>
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
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  <script>
    new DataTable('#example');
  </script>
</body>

</html>
