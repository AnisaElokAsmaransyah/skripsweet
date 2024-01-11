
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
            <h1 class="welcome-text">Good Morning, <span class="text-black fw-bold"></span></h1>
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
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Data Publikasi</h4>
                  <?php
                    include('../../setup/koneksi.php');
                    if(isset($_GET['update'])){
                      $query = mysqli_query($koneksi,"SELECT * FROM tb_informasi, tb_kategoriinformasi
                      WHERE tb_informasi.kategori_informasi = tb_kategoriinformasi.kd_kategori and kd_informasi='$_GET[update]'");
                      $data=mysqli_fetch_array($query);
                    }
                   
                    
                  ?>
                <form class="forms-sample" action="" method="POST">
                  <div class="form-group">
                    <label>Kode Informasi</label>
                    <input type="text" class="form-control " name="kd_informasi" value="<?= isset($data['kd_informasi']) ? $data['kd_informasi'] : ''; ?>"  readonly>
                  </div>
                  <div class="form-group">
                    <label>Isi</label>
                    <input type="text" class="form-control form-control-lg" name="isi" value="<?= isset($data['isi']) ? $data['isi'] : ''; ?>" placeholder="Silahkan Ketik" >
                  </div>
                  <div class="form-group">
                        <label>Kategori Informasi</label>
                        <select class="form-control" name="kategori_informasi">
                            <?php
                            echo "<option value={$data['kd_kategori']}> {$data['kategori_informasi']} </option>";
                            $query = mysqli_query($koneksi, "SELECT * FROM tb_kategoriinformasi") or die(mysqli_error($koneksi));
                            while ($row = mysqli_fetch_array($query)) {
                                echo "<option value={$row['kd_kategori']}> {$row['kategori_informasi']} </option>";
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-outline-primary btn-icon-text" name="edit" value="edit">
                      <i class="ti-file btn-icon-prepend"></i>Edit
                  </button>
                    
                </div>
              </div>
            </div>
             </form>
             <?php
              if (isset($_POST['edit'])) {
                  // Enkapsulasi nilai $_GET['update'] menggunakan mysqli_real_escape_string
                  $updateValue = mysqli_real_escape_string($koneksi, $_GET['update']);

                  mysqli_query($koneksi, "UPDATE tb_informasi SET
                      kd_informasi = '$_POST[kd_informasi]',
                      isi = '$_POST[isi]',
                      kategori_informasi = '$_POST[kategori_informasi]' WHERE kd_informasi = '$updateValue'")
                      or die(mysqli_error($koneksi));

                  echo "<script>
                      alert('Data Anda Berhasil Diubah');
                      document.location='../../pages/forms/input_publikasi.php';
                      </script>";
              }
              ?>

            <div class="col-lg-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Data Publikasi</h4>
                 <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Kode Informasi</th>
                          <th>Isi</th>
                          <th>Kategori Informasi</th>
                          <th>Status</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                            $no = 1;
                            $tampil = mysqli_query($koneksi, "SELECT * FROM tb_informasi, tb_kategoriinformasi
                             WHERE tb_informasi.kategori_informasi = tb_kategoriinformasi.kd_kategori order by kd_informasi ");
                            while ($data = mysqli_fetch_array($tampil)){
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['kd_informasi'] ?></td>
                            <td ><?= $data['isi'] ?></td>
                            <td><?= $data['kategori_informasi'] ?></td>
                            <td>
                            <a href='edit_publikasi.php?update=<?= $data['kd_informasi'] ?>' class="btn btn-primary btn-sm">Edit</a>
                            <a href="?hapus=<?= $data['kd_informasi'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');" 
                                class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    </table>
                    <?php
                      if(isset($_GET['hapus'])){
                        mysqli_query($koneksi, "Delete from tb_informasi where kd_informasi='$_GET[hapus]' ") or die (mysqli_error($koneksi));

                        echo "<script>
                        alert('Data Anda Berhasil Dihapus');
                        document.location='../../pages/forms/input_publikasi.php';
                        </script>";
                        echo "<meta http-equiv=refrsh content=2;URL='input_publikasi.php'>";
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
</body>

</html>
