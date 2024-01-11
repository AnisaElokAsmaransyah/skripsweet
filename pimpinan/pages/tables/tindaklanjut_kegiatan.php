
<?php
session_start();
   
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
            <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class="menu-icon mdi mdi-table"></i>
              <span class="menu-title" >Data Pendaftaran</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="verifikasi_pendaftaran.php">Data Ormas Baru</a></li>
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
                <li class="nav-item"> <a class="nav-link" href="tindakan.php">Tindak Lanjut</a></li>
              </ul>
              </div>
              <div class="collapse" id="icons">
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
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-header mt-3 bg-white">
                  <h4 class="card-title">Data Pengajuan Kegiatan</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="example" class="table table-striped">
                      <thead>
                        <tr>
                                        <th>No</th>
                                        <th>Nama Organisasi</th>
                                        <th>Deskripsi</th>
                                        <th>Tanggal Kegiatan</th>
                                        <th>Lokasi</th>
                                        <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          include('../../setup/koneksi.php');
                            $no = 1;
                            $id_pengguna = $_SESSION['id_pengguna'];
                            $tampil = mysqli_query($koneksi, "SELECT tb_pengguna.nama as nama_pengguna,tb_kegiatan.kd_kegiatan as kd_kegiatan, tb_kegiatan.deskripsi as deskripsi, tb_kegiatan.tgl_kegiatan as tgl_kegiatan, tb_kegiatan.lokasi as lokasi,
                            tb_kegiatan.tgl_ajuan as tgl_ajuan, tb_kegiatan.file as file, tb_kegiatan.status as status from tb_kegiatan INNER JOIN tb_pengguna ON 
                            tb_pengguna.id_pengguna = tb_kegiatan.id_pengguna where tb_kegiatan.status = 'tindak lanjut'  ORDER BY kd_kegiatan");
                            

                             while ($data = mysqli_fetch_array($tampil)){?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data['nama_pengguna'] ?></td>
                                <td><?= $data['deskripsi'] ?></td>
                                <td><?= $data['tgl_kegiatan'] ?></td>
                                <td><?= $data['lokasi'] ?></td>
                          <td>
                          <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#terima<?=$data['kd_kegiatan']?>">
                            Terima
                          </button>
                          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#tolak<?=$data['kd_kegiatan']?>">
                            Tolak
                          </button>
                          </td>

                          <div class="modal fade" id="terima<?=$data['kd_kegiatan']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Beri Tanggapan</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <?php 
                                      if($data['status'] =="tindak lanjut"){ ?>
                                      <div class="col s12 m6">
                                  <form method="POST">
                                  <input type="hidden" name="kd_kegiatan" value="<?= $data['kd_kegiatan'] ?>">
                                  <div class="form-group">
                                      <label for="file_tindakan">Upload Berkas</label>
                                      <input type="file" name="file_tindakan" class="form-control-file">
                                  </div>
                                    <div class="col s12 input-field">
                                      <input type="submit" name="terima" value="Kirim" class="btn btn-primary btn">
                                    </div>
                                  </form>
                                  </div>
                                    <?php	}
                                      ?>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="modal fade" id="tolak<?=$data['kd_kegiatan']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Beri Tanggapan</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                             <?php 
                                      if($data['status'] =="tindak lanjut"){ ?>
                                      <div class="col s12 m6">
                                  <form method="POST">
                                  <input type="hidden" name="kd_kegiatan" value="<?= $data['kd_kegiatan'] ?>">
                                  <div class="form-group">
                                  <span class="response-label">Beri Tanggapan : </span>
                                      <textarea class="form-control" id="tanggapan" name="tanggapan" rows="5" required></textarea>
                                  </div>
                                    <div class="col s12 input-field">
                                      <input type="submit" name="kirim" value="Kirim" class="btn btn-primary btn">
                                    </div>
                                  </form>
                                      </div>
                                    <?php	}
                                      ?>

<?php
if (isset($_POST['kirim'])) {
    $kd_kegiatan = $_POST['kd_kegiatan'];
    $status_kegiatan = isset($_POST['status']) ? $_POST['status'] : '';
    $current_time = date('Y-m-d H:i:s');

    if ($status_kegiatan == 'setuju') {
        $fileSuratIzin = $_FILES['file_tindakan'];

        // Periksa apakah file surat izin diunggah
        if (!empty($fileSuratIzin['file_tindakan'])) {
            // Periksa ekstensi file
            $allowedExtensions = ['pdf', 'doc', 'docx'];
            $fileExtension = strtolower(pathinfo($fileSuratIzin['file_tindakan'], PATHINFO_EXTENSION));

            if (in_array($fileExtension, $allowedExtensions)) {
                // Unggah file ke direktori yang diinginkan
                $uploadDir = "../../../images/kegiatan/";
                $uploadPath = $uploadDir . $fileSuratIzin['file_tindakan'];

                move_uploaded_file($fileSuratIzin['tmp_name'], $uploadPath);

                // Update status menjadi "selesai" dan file_tindakan
                $queryUpdate = "UPDATE tb_kegiatan SET status = 'selesai', file_tindakan = '$fileSuratIzin[file_tindakan]', tgl_tindakan = '$current_time' WHERE kd_kegiatan = '$kd_kegiatan'";
            } else {
                echo "<script>
                    alert('Ekstensi file tidak valid. Hanya diperbolehkan PDF, DOC, atau DOCX.');
                    window.location.href='tindaklanjut_kegiatan.php';
                </script>";
                exit();
            }
        } else {
            echo "<script>
                alert('File surat izin harus diunggah jika menyetujui.');
                window.location.href='tindaklanjut_kegiatan.php';
            </script>";
            exit();
        }
    } elseif ($status_kegiatan == 'tidak_setuju') {
        // Jika tombol tidak setuju diklik
        // Update status menjadi "ditolak" dan tanggapan
        $tanggapan = isset($_POST['tanggapan']) ? $_POST['tanggapan'] : '';
        $queryUpdate = "UPDATE tb_kegiatan SET status = 'ditolak', tanggapan = '$tanggapan', tgl_tindakan = '$current_time' WHERE kd_kegiatan = '$kd_kegiatan'";
    } else {
        echo "<script>
            alert('Pilihan status kegiatan tidak valid.');
            window.location.href='tindaklanjut_kegiatan.php';
        </script>";
        exit();
    }

    // Eksekusi query
    if ($koneksi->query($queryUpdate) === TRUE) {
        echo "<script>
            alert('Data berhasil dikirim. Status kegiatan: $status_kegiatan, Tanggapan: $tanggapan');
            window.location.href='tindaklanjut_kegiatan.php';
        </script>";
        exit();
    } else {
        echo "<script>
            alert('Gagal melakukan pembaruan: " . $koneksi->error . "');
            window.location.href='tindaklanjut_kegiatan.php';
        </script>";
        exit();
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

                        </tr>
                        <?php } ?>
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
