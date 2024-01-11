
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
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-header mt-3 bg-white">
                  <h4 class="card-title">Data Pengaduan Masyarakat</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="example" class="table table-striped">
                      <thead>
                        <tr>
                              <th>No.</th>
                              <th>Nama Pengadu</th>
                              <th>Nomor Hp</th>
                              <th>Isi</th>
                              <th>Tanggal Aduan</th>
                              <th>Status</th>
                             </tr>
                      </thead>
                      <tbody>
                        <?php 
                            $no = 1;
                            $tampil ="SELECT * FROM tb_pengaduan
                            WHERE status = 'pending' ";
                            $result = mysqli_query($koneksi,$tampil);
                            while ($data = mysqli_fetch_array($result)){
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['no_hp'] ?></td>
                            <td><?= $data['isi'] ?></td>
                           <td><?= $data['tgl_aduan'] ?></td>
                            <!-- Button trigger modal -->
                            <td>
                              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                Kirim
                              </button>
                            </td>
                            <!-- Modal -->
                          <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Kirim Pengaduan Ormas</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <div align = left>
                                      <div style="display: flex; justify-content: space-between;">
                                      <div>
                                          <font size="1"><i><?= $data['tgl_aduan'] ?></i></font>
                                      </div>
                                      <div>
                                      <font size="1"><?= $data['status'] ?></font>
                                      </div>
                                      </div>
                                                   <h6><?= $data['nama'] ?></h6>
                                                    <h5><b><?= $data['jenis_pengaduan'] ?></b></h5>
                                                        <!-- Display isi_laporan here -->

                                                        <?= $data['isi'] ?> <!-- Display isi_laporan here -->
                                                        


                                                        </div>
                                                        <?php
                                        if (!empty($data['file'])) {
                                            echo '<br>';
                                            echo '<img src="../../../images/bukti_pengaduan/' . $data['file'] . '" alt="" height="210px" style="padding-top:10px">';
                                        }
                                        ?>
                                      <div align=left>
                                      <br>
                                      <?php 
                                      if($data['status'] =="pending"){ ?>
                                      <div class="col s12 m6">
                                        <form method="POST">
                                        <input type="hidden" name="kd_pengaduan" value="<?= $data['kd_pengaduan'] ?>">
                                        <div class="form-group">
                                            <span class="response-label">Ormas Tujuan : </span>
                                            <select class="form-control" name="id_pengguna" >
                                              <option>Silahkan Pilih</option>
                                              <?php
                                                include "../../setup/koneksi.php";
                                                $query = mysqli_query($koneksi, "SELECT id_pengguna, nama FROM tb_pengguna ") or die (mysqli_error($koneksi));
                                                while($data = mysqli_fetch_array($query)){
                                                  echo"<option value=$data[id_pengguna]> $data[nama] </option>";
                                                }
                                              ?>
                                            </select>
                                        </div>
                                        <div class="col s12 input-field">
                                      <input type="submit" name="kirim" value="Kirim" class="btn btn-primary btn">
                                    </div>
                                          </form>
                                      </div>
                                      <?php	}
                                      ?>

                                    <?php
                                    if(isset($_POST['kirim'])){
                                        $kd_pengaduan = $_POST['kd_pengaduan'];
                                        $id_pengguna = $_SESSION['id_pengguna'];
                                        $tanggal = date('Y-m-d');
                                        $jam = date('H:i:s');
                                        $current_time = date('Y-m-d H:i:s');

                                        // Update status 
                                        $queryUpdate = "UPDATE tb_pengaduan SET status = 'dikirim ke ormas', id_pengguna = '$id_pengguna', tgl_tanggapan = '$current_time' WHERE kd_pengaduan = '$kd_pengaduan'";
                                        
                                        if ($koneksi->query($queryUpdate) === TRUE) {
                                            echo "<script>
                                                document.location='verifikasi.php';
                                            </script>";
                                            exit();
                                        } else {
                                            echo "Gagal melakukan pembaruan: " . $koneksi->error;
                                        }
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

                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                    
                        </tr>
                        

                      </tbody>
                      
                        
                    </table>
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
</body>

</html>
