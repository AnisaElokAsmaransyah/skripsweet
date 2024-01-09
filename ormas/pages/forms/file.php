
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
                <p class="fw-light text-muted mb-0">allenmoreno@gmail.com</p>
              </div>
              <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> Pengaturan</a>
             <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Keluar</a>
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
              <span class="menu-title">Pendaftaran Ormas</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="">Tata Cara Pendaftaran</a></li>
              </ul>
			  <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="../../pages/forms/input_pendaftaran.php">Form Pendaftaran</a></li>
              </ul>
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="../../pages/forms/input_publikasi.php">Form Publikasi</a></li>
              </ul>
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="../../pages/forms/input_berkas.php">Form Berkas</a></li>
              </ul>
            </div>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class="menu-icon mdi mdi-table"></i>
              <span class="menu-title" >Organisasi</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../../pages/tables/data_ormas.php">Data Ormas</a></li>
              </ul>
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../../pages/tables/data_pendaftaran.php">Data pendaftaran</a></li>
              </ul>
            </div>
          </li>
			
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="form-elements">
              <i class="menu-icon mdi mdi mdi-access-point"></i>
              <span class="menu-title">Informasi</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../../pages/tables/dasarhukum.php">Dasar Hukum</a></li>
              </ul>
			  <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../../pages/tables/pengajuan_skt.php">Persyaratan SKT</a></li>
              </ul>
            </div>
          </li>
			
          <li class="nav-item nav-category">Akun</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="menu-icon mdi mdi-account-circle-outline"></i>
              <span class="menu-title">Akses</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../../pages/samples/login.html"> Login </a></li>
              </ul>
            </div>
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
                <div class="d-sm-flex justify-content-between align-items-start">
                    <div>
                   <h4 class="card-title card-title-dash">Data Berkas Ormas</h4>
                    
                    </div>
                                  <div>
                                    <a href="tambah_file.php" class="btn btn-primary btn-sm text-white mb-0 me-0" type="button">
                                        <i class="mdi mdi-account-plus"></i>Tambah Data</a>
                                  </div>
                                </div>
                                <div class="table-responsive  mt-1">
                                  <table class="table select-table">
                                    <thead>
                                      <tr>
                                      
                                        <th>No</th>
                                        <th>Nama Berkas</th>
                                        <th>File</th>
                                       <th>Aksi</th>
                                      </tr>
                                    </thead>
                      <tbody>
                      <?php 
                        $no = 1;
                        
                        // Assuming $_SESSION['id_pengguna'] contains the logged-in user's id_pengguna value
                        $id_pengguna = $_SESSION['id_pengguna'];

                        $tampil = mysqli_query($koneksi, "SELECT * FROM tb_berkas WHERE id_pengguna = '$id_pengguna' ORDER BY kd_berkas");

                        while ($data = mysqli_fetch_array($tampil)){
                        ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= $data['judul'] ?></td>
                          <td><?= $data['file'] ?></td>
                          <td>
                            <a href="" class="btn btn-warning btn-sm">Detail</a>
                            <a href='edit_berkas.php?update=<?= $data['kd_berkas'] ?>' class="btn btn-primary btn-sm">Edit</a>
                            <a href="?hapus=<?= $data['kd_berkas'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');" 
                              class="btn btn-danger btn-sm">Hapus</a>
                          </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    </table>
                    <?php
                      if(isset($_GET['hapus'])){
                        mysqli_query($koneksi, "Delete from tb_berkas where kd_berkas='$_GET[hapus]' ") or die (mysqli_error($koneksi));

                        echo "<script>
                            document.location='../../pages/forms/file.php';
                            </script>";
                        echo "<meta http-equiv=refrsh content=2;URL='file.php'>";
                      }
                    ?>
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
