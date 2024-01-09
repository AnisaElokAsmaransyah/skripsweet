<?php
session_start();
include('../../setup/koneksi.php');

if (isset($_POST['simpan'])) {
    // Validasi kolom lainnya dan tangani kesalahan jika diperlukan.
    $kd_biodata = $_POST['kd_biodata'];
    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $agama = $_POST['agama'];
    $kewarganegaraan = $_POST['kewarganegaraan'];
    $jk = $_POST['jk'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $status_perkawinan = $_POST['status_perkawinan'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $pekerjaan = $_POST['pekerjaan'];
    $nama_kantor = $_POST['nama_kantor'];
    $alamat_kantor = $_POST['alamat_kantor'];
    $jabatan = $_POST['jabatan'];
    $eks_boleh = array('jpg', 'jpeg','png');
    $foto = $_FILES['foto']['name'];
    $x = explode('.', $foto);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['foto']['size'];
    $file_temp = $_FILES['foto']['tmp_name'];

    // Validasi apakah semua data terisi
    if (empty($kd_biodata) || empty($nama) || empty($nik) || empty($agama) || empty($kewarganegaraan) || empty($jk) ||
        empty($tempat_lahir) || empty($tanggal_lahir) || empty($status_perkawinan) || empty($alamat) || empty($no_telp) ||
        empty($pekerjaan) || empty($nama_kantor) || empty($alamat_kantor) || empty($jabatan) || empty($foto)) {

        echo "<script>
            alert('Semua data harus diisi!');
            window.location.href='../../pages/forms/tambah_biodata.php';
        </script>";
    } else {
        // Check apakah jabatan sudah terisi
        $check_query = "SELECT COUNT(*) AS count FROM tb_biodata WHERE jabatan = '$jabatan'";
        $check_result = mysqli_query($koneksi, $check_query);
        $check_data = mysqli_fetch_assoc($check_result);

        if ($check_data['count'] > 0) {
            echo "<script>
                alert('Posisi Jabatan sudah terisi');
                window.location.href='../../pages/forms/tambah_biodata.php';
            </script>";
        } else {
            // Masukkan data ke tb_biodata
            $input = "INSERT INTO tb_biodata (kd_biodata, nama, nik, agama, kewarganegaraan, jk, tempat_lahir, tanggal_lahir,
                status_perkawinan, alamat, no_telp, pekerjaan, nama_kantor, alamat_kantor, jabatan, foto) VALUES 
                ('$kd_biodata', '$nama', '$nik', '$agama', '$kewarganegaraan', '$jk', '$tempat_lahir', '$tanggal_lahir',
                '$status_perkawinan', '$alamat', '$no_telp', '$pekerjaan', '$nama_kantor', '$alamat_kantor',
                '$jabatan', '$foto')";
            
            if (mysqli_query($koneksi, $input)) {
                // Unggah file
                move_uploaded_file($file_temp, "../../../images/biodata/" . $foto);

                echo "<script>
                    alert('Data anda berhasil dikirim!');
                    window.location.href='../../pages/forms/biodata.php';
                </script>";
            } else {
                echo "Error: " . $input . "<br>" . mysqli_error($koneksi);
            }
        }
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
                <li class="nav-item"><a class="nav-link" href="../../pages/forms/biodata.php">Biodata Pengurus</a></li>
              </ul>
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="../../pages/forms/file.php">File</a></li>
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
                <li class="nav-item"> <a class="nav-link" href="pages/tables/rencana.php">Rencana</a></li>
              </ul>
            </div>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/tables/terlaksana.php">Terlaksana</a></li>
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
                <li class="nav-item"> <a class="nav-link" href="pages/forms/tanggapi.php">Tanggapi</a></li>
              </ul>
			       <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/forms/laporan.php">Laporan Selesai</a></li>
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
                      $auto = mysqli_query($koneksi, "Select max(kd_biodata) as max_code from tb_biodata");
                      $isi = mysqli_fetch_array($auto);
                      $kode = $isi['max_code'];
                      $urutan = (int)substr($kode, 1, 2);
                      $urutan++;
                      $huruf = "B";
                      $kd_biodata = $huruf . sprintf("%02s", $urutan);
                    ?>
                     <!-- Formulir HTML disini -->
                    <form class="forms-sample" action="" method="POST" id="form-ketua" enctype="multipart/form-data">
                    <input type="hidden" name="kd_biodata" value="<?php echo $kd_biodata; ?>">
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" autocomplete="off">
                        </div>
                    <div class="form-group">
                      <label >NIK</label>
                      <input type="number" class="form-control" name="nik"   autocomplete="off">
                    </div>

                    <div class="form-group">
                      <label >Agama</label>
                      <select class="form-control" name="agama" >
                      <option>---Silahkan Pilih---</option>
                          <option>Islam</option>
                          <option>Kristen</option>
                          <option>Budha</option>
                          <option>Hindu</option>
                          <option>Konghucu</option>
                          <option>Katolik</option>
                      <select>
                    </div> 

                    <div class="form-group">
                      <label >Kewarganegaraan</label>
                      <select class="form-control" name="kewarganegaraan" >
                      <option>---Silahkan Pilih---</option>
                          <option>WNI</option>
                          <option>WNA</option>
                        </select>
                    </div> 

                    <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <div class="form-check">
                          <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="jk" value="Laki-laki" checked>
                              Laki-laki
                          </label>
                      </div>
                      <div class="form-check">
                          <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="jk" value="Perempuan">
                              Perempuan
                          </label>
                      </div>
                  </div>

                    <div class="form-group">
                      <label >Tempat Lahir</label>
                      <input type="text" class="form-control" name="tempat_lahir" autocomplete="off">
                    </div> 
                    
                    <div class="form-group">
                      <label >Tanggal Lahir</label>
                      <input type="date" class="form-control" name="tanggal_lahir" autocomplete="off">
                    </div>

                    <div class="form-group">
                      <label >Status Perkawinan</label>
                      <select class="form-control" name="status_perkawinan" >
                      <option>---Silahkan Pilih---</option>
                          <option>Sudah</option>
                          <option>Belum</option>
                          <option>Cerai</option>
                      <select>
                    </div> 

                    <div class="form-group">
                      <label >Alamat</label>
                      <input type="alamat" class="form-control" name="alamat"  autocomplete="off">
                    </div>

                    <div class="form-group">
                      <label >No Hp.</label>
                      <input type="number" class="form-control" name="no_telp"  autocomplete="off">
                    </div>

                    <div class="form-group">
                      <label >Pekerjaan</label>
                      <input type="text" class="form-control" name="pekerjaan"  autocomplete="off">
                    </div>

                    <div class="form-group">
                      <label >Nama Kantor</label>
                      <input type="text" class="form-control" name="nama_kantor" autocomplete="off">
                    </div>

                    <div class="form-group">
                      <label >Alamat Kantor</label>
                      <input type="text" class="form-control" name="alamat_kantor"  autocomplete="off">
                    </div>
                    <div class="form-group">
                      <label >Jabatan</label>
                      <select class="form-control" name="jabatan" >
                      <option>---Silahkan Pilih---</option>
                          <option>Ketua</option>
                          <option>Sekretaris</option>
                          <option>Bendahara</option>
                      <select>
                    </div> 

                    <div class="form-group">
                      <label>Unggah Berkas</label>
                      <input type="file" name="foto" class="file-upload-default">
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
