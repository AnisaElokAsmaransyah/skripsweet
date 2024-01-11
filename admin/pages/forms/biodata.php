
<?php
session_start();
include('../../setup/koneksi.php');

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
                <a href="tambah_biodata.php" class="btn btn-primary btn-sm text-white mb-0 me-0" type="button">
                    <i class="mdi mdi-account-plus"></i>Tambah Data</a>
                    <br>
                <div class="table-responsive">
                    <table id="example" class="table table-striped">
                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Organisasi</th>
                                        <th>Nama Lengkap</th>
                                        <th>NIK</th>
                                        <th>Jenis Kelamin</th>
                                        <th>TTL</th>
                                        <th>Jabatan</th>
                                        <th>Aksi</th>
                                    </tr>
                      </thead>
                      <tbody>
                      <?php 
                            $no = 1;
                            $id_pengguna = $_SESSION['id_pengguna'];
                            $tampil = mysqli_query($koneksi, "SELECT tb_pengguna.nama as nama_pengguna, tb_biodata.jk as jk, tb_biodata.nama_kantor as nama_kantor,
                            tb_biodata.pekerjaan as pekerjaan,tb_biodata.nama as nama, tb_biodata.nik as nik, tb_biodata.tempat_lahir as tempat_lahir,tb_biodata.kewarganegaraan as kewarganegaraan,tb_biodata.tanggal_lahir as tanggal_lahir, 
                            tb_biodata.id_pengguna as id_pengguna, tb_biodata.kd_biodata as kd_biodata,tb_biodata.alamat as alamat, tb_biodata.alamat_kantor as alamat_kantor, tb_biodata.foto as foto,
                            tb_biodata.no_telp as no_telp, tb_biodata.agama as agama,tb_biodata.status_perkawinan as status_perkawinan, tb_biodata.jabatan as jabatan from tb_biodata INNER JOIN tb_pengguna ON tb_pengguna.id_pengguna = tb_biodata.id_pengguna ORDER BY kd_biodata");
                            

                             while ($data = mysqli_fetch_array($tampil)){
                            ?>
                            <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $data['nama_pengguna'] ?></td>
                                        <td><?= $data['nama'] ?></td>
                                        <td><?= $data['nik'] ?></td>
                                        <td><?= $data['jk'] ?></td>
                                        <td><?= $data['tempat_lahir'] . ' ' . $data['tanggal_lahir'] ?></td>
                                        <td><?= $data['jabatan'] ?></td>
                                        <td>
                                            <button type="button" class="btn btn-warning btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $data['kd_biodata'] ?>">
                                                Detail
                                            </button>
                                            <!-- <a href='edit_biodata.php?update=<?= $data['kd_biodata'] ?>' class="btn btn-primary btn-lg">Edit</a>
                                            <a href="?hapus=<?= $data['kd_biodata'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');" class="btn btn-danger btn-lg">Hapus</a> -->
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="exampleModal<?= $data['kd_biodata'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-l">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="detailModalLabel">Detail Informasi Biodata</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="text-center">
                                                        <?php
                                                        if (!empty($data['foto'])) {
                                                            echo '<img src="../../../images/biodata/' . $data['foto'] . '" alt="" class="img-fluid " style="max-height: 200px; max-width: 200px;">';
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="mt-3">
                                                        <h5 class="text-center"><b><?= $data['jabatan'] ?></b></h5>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <p><strong>Agama:</strong> <?= $data['agama'] ?></p>
                                                                <p><strong>Kewarganegaraan:</strong> <?= $data['kewarganegaraan'] ?></p>
                                                                <p><strong>Status Perkawinan:</strong> <?= $data['status_perkawinan'] ?></p>
                                                                <p><strong>Alamat:</strong> <?= $data['alamat'] ?></p>
                                                             </div>
                                                            <div class="col-md-6">
                                                                <p><strong>Pekerjaan:</strong> <?= $data['pekerjaan'] ?></p>
                                                                <p><strong>Nama Kantor:</strong> <?= $data['nama_kantor'] ?></p>
                                                                <p><strong>Alamat Kantor:</strong> <?= $data['alamat_kantor'] ?></p>
                                                            </div>
                                                        </div>
                                                        <!-- Tambahkan informasi lainnya sesuai kebutuhan -->
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                  </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Modal -->
                                    <?php } ?> 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

                    <?php
                      if(isset($_GET['hapus'])){
                        mysqli_query($koneksi, "Delete from tb_biodata where kd_biodata='$_GET[hapus]' ") or die (mysqli_error($koneksi));

                        echo "<script>
                            document.location='../../pages/forms/biodata.php';
                            </script>";
                        echo "<meta http-equiv=refrsh content=2;URL='biodata.php'>";
                      }
                    ?>

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
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  <script>
    new DataTable('#example');
  </script>
 

</body>

</html>
