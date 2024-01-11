<?php
session_start();
include('../../setup/koneksi.php');

if (isset($_POST['edit'])) {
    $kd_biodata = $_POST['kd_biodata'];
    $id_pengguna = $_SESSION['id_pengguna'];
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

    // Handle file upload
    $uploadDir = "../../../images/biodata/";  // Ganti dengan path yang sesuai
    $fotoName = $_FILES['foto']['name'];
    $fotoTempName = $_FILES['foto']['tmp_name'];

    // Variabel untuk menyimpan path foto
    $fotoPath = '';

    // Cek apakah ada file foto yang diunggah
    if (!empty($fotoName)) {
        // Cek apakah itu file gambar dengan ekstensi yang diizinkan
        $allowedExtensions = ['jpg', 'jpeg', 'png'];  // Ekstensi yang diizinkan
        $fotoExtension = strtolower(pathinfo($fotoName, PATHINFO_EXTENSION));

        if (in_array($fotoExtension, $allowedExtensions)) {
            // Jika foto baru diunggah dan ekstensinya sesuai, pindahkan file yang diunggah ke direktori yang diinginkan
            move_uploaded_file($fotoTempName, $uploadDir . $fotoName);
            $fotoPath = $fotoName;
        } else {
            // Jika ekstensi tidak diizinkan, gunakan foto yang sudah ada sebelumnya
            $queryGetFoto = "SELECT foto FROM tb_biodata WHERE kd_biodata = '$kd_biodata'";
            $resultGetFoto = mysqli_query($koneksi, $queryGetFoto);
            $rowGetFoto = mysqli_fetch_assoc($resultGetFoto);
            $fotoPath = $rowGetFoto['foto'];
        }
    } else {
        // Jika tidak ada file foto yang diunggah, gunakan foto yang sudah ada sebelumnya
        $queryGetFoto = "SELECT foto FROM tb_biodata WHERE kd_biodata = '$kd_biodata'";
        $resultGetFoto = mysqli_query($koneksi, $queryGetFoto);
        $rowGetFoto = mysqli_fetch_assoc($resultGetFoto);
        $fotoPath = $rowGetFoto['foto'];
    }

    // Masukkan data ke tb_biodata termasuk kolom foto
    $query = "UPDATE tb_biodata SET 
                id_pengguna = '$id_pengguna',
                nama = '$nama',
                nik = '$nik',
                agama = '$agama',
                kewarganegaraan = '$kewarganegaraan',
                jk = '$jk',
                tempat_lahir = '$tempat_lahir',
                tanggal_lahir = '$tanggal_lahir',
                status_perkawinan = '$status_perkawinan',
                alamat = '$alamat',
                no_telp = '$no_telp',
                pekerjaan = '$pekerjaan',
                nama_kantor = '$nama_kantor',
                alamat_kantor = '$alamat_kantor',
                jabatan = '$jabatan',
                foto = '$fotoPath'
            WHERE kd_biodata = '$kd_biodata'";

    if (mysqli_query($koneksi, $query)) {
        // Redirect setelah berhasil mengedit data
        header("Location: biodata.php");
        exit();
    } else {
        // Menampilkan pesan error dan kembali ke halaman edit
        echo "<script>
                  alert('Gagal menyimpan data. Periksa kembali data anda.');
                  window.location.href='edit_biodata.php?update=$kd_biodata';  // Perbarui halaman edit
                 </script>";
        exit();
    }
}
?>






<!-- Bagian HTML tetap sama seperti sebelumnya -->





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
                <h4 class="card-title">Edit Data Biodata</h4>
<?php
include('../../setup/koneksi.php');
if (isset($_GET['update'])) {
    $query = mysqli_query($koneksi, "SELECT * FROM tb_biodata WHERE kd_biodata ='$_GET[update]'");
    $data = mysqli_fetch_array($query);
}
?>
<!-- Formulir HTML disini -->
<form class="forms-sample" action="" method="POST" id="form-ketua" enctype="multipart/form-data">
    <input type="hidden" name="kd_biodata" value="<?= isset($data['kd_biodata']) ? $data['kd_biodata'] : ''; ?>">
    <div class="form-group">
        <label>Nama Lengkap</label>
        <input type="text" class="form-control" name="nama" value="<?= isset($data['nama']) ? $data['nama'] : ''; ?>" autocomplete="off">
    </div>
    <div class="form-group">
        <label>NIK</label>
        <input type="number" class="form-control" name="nik" value="<?= isset($data['nik']) ? $data['nik'] : ''; ?>" autocomplete="off">
    </div>
    <div class="form-group">
        <label>Agama</label>
        <select class="form-control" name="agama">
            <option value="">---Silahkan Pilih---</option>
            <option value="Islam" <?= ($data['agama'] == 'Islam') ? 'selected' : ''; ?>>Islam</option>
            <option value="Kristen" <?= ($data['agama'] == 'Kristen') ? 'selected' : ''; ?>>Kristen</option>
            <option value="Budha" <?= ($data['agama'] == 'Budha') ? 'selected' : ''; ?>>Budha</option>
            <option value="Hindu" <?= ($data['agama'] == 'Hindu') ? 'selected' : ''; ?>>Hindu</option>
            <option value="Konghucu" <?= ($data['agama'] == 'Konghucu') ? 'selected' : ''; ?>>Konghucu</option>
            <option value="Katolik" <?= ($data['agama'] == 'Katolik') ? 'selected' : ''; ?>>Katolik</option>
        </select>
    </div>
    <div class="form-group">
        <label>Kewarganegaraan</label>
        <select class="form-control" name="kewarganegaraan">
            <option value="">---Silahkan Pilih---</option>
            <option value="WNI" <?= ($data['kewarganegaraan'] == 'WNI') ? 'selected' : ''; ?>>WNI</option>
            <option value="WNA" <?= ($data['kewarganegaraan'] == 'WNA') ? 'selected' : ''; ?>>WNA</option>
        </select>
    </div>
                    <div class="form-group">
    <label>Jenis Kelamin</label>
    <div class="form-check">
        <label class="form-check-label">
            <input type="radio" class="form-check-input" name="jk" value="Laki-laki" <?= (isset($data['jk']) && $data['jk'] == 'Laki-laki') ? 'checked' : ''; ?>>
            Laki-laki
        </label>
    </div>
    <div class="form-check">
        <label class="form-check-label">
            <input type="radio" class="form-check-input" name="jk" value="Perempuan" <?= (isset($data['jk']) && $data['jk'] == 'Perempuan') ? 'checked' : ''; ?>>
            Perempuan
        </label>
    </div>
</div>

                    <div class="form-group">
                      <label >Tempat Lahir</label>
                      <input type="text" class="form-control" name="tempat_lahir" value="<?= isset($data['tempat_lahir']) ? $data['tempat_lahir'] : ''; ?>" autocomplete="off">
                    </div> 
                    
                    <div class="form-group">
                      <label >Tanggal Lahir</label>
                      <input type="date" class="form-control" name="tanggal_lahir" value="<?= isset($data['tanggal_lahir']) ? $data['tanggal_lahir'] : ''; ?>" autocomplete="off">
                    </div>

                    <div class="form-group">
                      <label >Status Perkawinan</label>
                      <select class="form-control" name="status_perkawinan" >
                      <option >---Silahkan Pilih---</option>
                          <option value="Sudah" <?= ($data['status_perkawinan'] == 'Sudah') ? 'selected' : ''; ?>>Sudah</option>
                          <option value="Belum" <?= ($data['status_perkawinan'] == 'Belum') ? 'selected' : ''; ?>>Belum</option>
                          <option value="Cerai" <?= ($data['status_perkawinan'] == 'Cerai') ? 'selected' : ''; ?>>Cerai</option>
                      <select>
                    </div> 

                    <div class="form-group">
                      <label >Alamat</label>
                      <input type="alamat" class="form-control" name="alamat" value="<?= isset($data['alamat']) ? $data['alamat'] : ''; ?>"  autocomplete="off">
                    </div>

                    <div class="form-group">
                      <label >No Hp.</label>
                      <input type="number" class="form-control" name="no_telp" value="<?= isset($data['no_telp']) ? $data['no_telp'] : ''; ?>" autocomplete="off">
                    </div>

                    <div class="form-group">
                      <label >Pekerjaan</label>
                      <input type="text" class="form-control" name="pekerjaan" value="<?= isset($data['pekerjaan']) ? $data['pekerjaan'] : ''; ?>"  autocomplete="off">
                    </div>

                    <div class="form-group">
                      <label >Nama Kantor</label>
                      <input type="text" class="form-control" name="nama_kantor" value="<?= isset($data['nama_kantor']) ? $data['nama_kantor'] : ''; ?>" autocomplete="off">
                    </div>

                    <div class="form-group">
                      <label >Alamat Kantor</label>
                      <input type="text" class="form-control" name="alamat_kantor" value="<?= isset($data['alamat_kantor']) ? $data['alamat_kantor'] : ''; ?>"  autocomplete="off">
                    </div>
                    <div class="form-group">
                      <label >Jabatan</label>
                      <select class="form-control" name="jabatan" >
                      <option>---Silahkan Pilih---</option>
                          <option value="Ketua" <?= ($data['jabatan'] == 'Ketua') ? 'selected' : ''; ?>>Ketua</option>
                          <option value="Sekretaris" <?= ($data['jabatan'] == 'Sekretaris') ? 'selected' : ''; ?>>Sekretaris</option>
                          <option value="Bendahara" <?= ($data['jabatan'] == 'Bendahara') ? 'selected' : ''; ?>>Bendahara</option>
                      <select>
                    </div> 

                    <div class="form-group">
                        <label>Unggah Foto</label>
                        <input type="file" name="foto" class="file-upload-default">
                        <div class="input-group col-xs-12">
                            <?php if (isset($data['foto']) && !empty($data['foto'])) : ?>
                                <input type="text" class="form-control file-upload-info" value="<?= $data['foto']; ?>" readonly>
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
