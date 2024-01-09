
<?php
session_start();
    include('../../setup/koneksi.php');
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SiOrang</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/typicons/typicons.css">
  <link rel="stylesheet" href="../../vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
  <!-- CSS PRINT -->
  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css"> -->



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
              <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> Pengaturan </a>
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
                <li class="nav-item"> <a class="nav-link" href="../../pages/forms/balasan_ormas.php">Balasan Ormas</a></li>
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
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-header mt-3 bg-white">
                  <h4 class="card-title">Balasan Ormas</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="example" class="table table-striped" style="width:100%">
                      <thead>
                        <tr>
                              <th>No.</th>
                              <th>Nama Pengadu</th>
                              <th>Nomor Hp</th>
                              <th>Alamat</th>
                              <th>Jenis Pengaduan</th>
                              <th>Isi</th>
                              <th>Status</th>
                              <th>Tanggapan</th>
                              <th>Aksi</th>
                             </tr>
                      </thead>
                      <tbody>
                        <?php 
                            $no = 1;
                            $tampil ="SELECT * FROM tb_pengaduan
                            WHERE status = 'validasi ormas' ";
                            $result = mysqli_query($koneksi,$tampil);
                            while ($data = mysqli_fetch_array($result)){
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['no_hp'] ?></td>
                            <td><?= $data['alamat'] ?></td>
                            <td><?= $data['jenis_pengaduan'] ?></td>
                            <td><?= $data['isi'] ?></td>
                            <td><?= $data['status'] ?></td>
                            <td><?= $data['tanggapan']?></td>
                            <?php 
                                if ($data['status'] == 'validasi ormas') {
                              ?>
                            <td>
                                <form action="balasan_ormas.php" method="POST">
                                  <input type="hidden" name="kd_pengaduan" value="<?= $data['kd_pengaduan']; ?>"/>
                                  <input type="submit" class="btn btn-primary btn-sm" name="selesai" value="Selesai" />
                                  <input type="submit" class="btn btn-success btn-sm" name="kirim" value="Kirim" />
                                </form>
                            </td>
                            <?php
                                }else if($data['status'] == 'selesai'){
                              ?>
                              <td>Selesai</td>
                              <?php
                              }elseif ($data['status'] == 'kirim') {
                            ?>
                                <td>Tindak Lanjut</td>
                            <?php
                              }
                              ?>
                            
                        </div>
                    </div>
                    </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                    <?php
                      if(isset($_POST['selesai'])){
                        $kd_pengaduan = $_POST['kd_pengaduan'];

                        $select = "UPDATE tb_pengaduan SET status ='selesai' WHERE kd_pengaduan = '$kd_pengaduan' ";
                        $result = mysqli_query($koneksi,$select);
                        echo "<script>
                        document.location='../../pages/forms/balasan_ormas.php';
                       </script>";
                      }
                      if(isset($_POST['kirim'])){
                        $kd_pengaduan = $_POST['kd_pengaduan'];

                        $select = "UPDATE tb_pengaduan SET status ='tindak lanjut' WHERE kd_pengaduan = '$kd_pengaduan' ";
                        $result = mysqli_query($koneksi,$select);
                        echo "<script>
                        alert('Berhasil Dikirim !');
                        document.location='../../pages/forms/balasan_ormas.php';
                       </script>";
                      }
                    ?>
                
                            </div>
                          </div>
                        </div>
                      </div>
                      </div>   
                  </div>
                </div>
              </div>
            </div>
			</div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="">
            <span align="center">Copyright © 2023. Bakesbangpol Kab. Rembang.</span>
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
  <!-- End custom js for this page-->
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  <script>
    new DataTable('#example');
  </script>

  <!--jquery print--->
  <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script> -->

<!-- <script>
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copy',
                title: 'Data Copy'
            },
            {
                extend: 'csv',
                title: 'Data CSV'
            },
            {
                extend: 'excel',
                title: 'Data Excel'
            },
            {
                extend: 'pdf',
                title: 'Data PDF'
            },
            {
                extend: 'print',
                title: 'Data Print'
            }
        ]
    } );
} );
</script> -->

</body>

</html>
