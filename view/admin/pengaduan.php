<?php 
require("../../config/fungsi.php");
$data = $_SESSION['data_petugas'];

auth_petugas();
if(isset($_GET['logout'])) {
  logout();
}
if(isset($_GET['proses_selesai'])){
  proses_selesai($_GET['proses_selesai'], $_GET['nik']);
}
if(isset($_GET['sedang_diproses'])){
  sedang_diproses($_GET['sedang_diproses'], $_GET['nik']);
}
if(isset($_GET['rejected'])){
  rejected($_GET['rejected'], $_GET['nik']);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Tabel Pengaduan</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

   <!-- Sidebar -->
    <ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar d-print-none" style="background-color:#1f1039;">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center my-5" href="#">
      <img src="img/logo.png" class="img-fluid">
        <div class="sidebar-brand-icon">
        
        </div>

      </a>

      <!-- Nav Item - User Information -->
      <li class="nav-item dropdown no-arrow justify-content-center">
              <a class="nav-link dropdown-toggle justify-content-center " href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                <span class="mr-2 animated--grow-in d-lg-inline text-gray-600 justify-content-center"><i class=" "></i> <?= $data['nama_petugas'];?></span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="profil.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Edit Profil
                </a>
            </li>

      <!-- Divider -->
        <hr class="sidebar-divider my-0">
      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Manajemen Pengaduan
      </div>

       <!-- Nav Item - Pages Collapse Menu -->
       <li class="nav-item">
        <a class="nav-link collapsed" href="pengaduan.php">
          <i class="fas fa-fw fa-cog"></i>
          <span>Pengaduan</span>
        </a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="tables.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Aspirasi</span></a>
      </li>

       <!-- Nav Item - Tables -->
       <li class="nav-item">
        <a class="nav-link" href="informasi.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Permintaan Informasi</span></a>
      </li>
<?php
if($data['level']=="admin"){
?>
      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Heading -->
      <div class="sidebar-heading">
        Petugas
      </div>
      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="petugas.php">
          <i class="fas fa-fw fa-user"></i>
          <span>Kelola Akun Petugas</span></a>
      </li>
<?php } ?>
      
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
      <!-- Nav Item - Tables -->
      <li class="nav-item mt-5">
          <a class="dropdown-item text-white " href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Keluar
          </a>
      </li>
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <!-- <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow"> -->

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form> -->

        <!-- Topbar Navbar -->
<?php include("header/topbar.php");?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid mt-5">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-primary-800">Data Pengaduan</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4 animated--grow-in">
            <div class="card-header py-3">
            <a href="print_report.php" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-table fa-sm text-white-50"></i> Lihat Laporan</a>
            </div>
            <div class="card-body">
<?php
if(isset($_GET['berhasil'])){
  if($_GET['berhasil']=="proses_oke"){
?>
                    <div class="form-group">
                      <div class="small">
                        <center><b align="center" class="text-success">Aksi telah Disimpan !</b></center>
                      </div>
                    </div>
<?php
  }
}
?>
              <div class="table-responsive">
              <table class="table" id="dataTable" width="95%" cellspacing="0">
                
                <thead>
                    <tr>
                      
                      <th>No</th>
                      <th>ID</th>
                      <th>Tanggal</th>
                      <th>NIK</th>
                      <th>Isi</th>
                      <th>Foto</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
            
                  <tbody>
                  <?php $i = 0; ?>
                  <?php
  $out = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE tujuan='1'");
  while($keluar = mysqli_fetch_array($out)){
    $i;
?>
<?php $i++; ?>

                    <tr>
                      <td><?php echo $i;?></td>
                      <td><?php echo $keluar['id_pengaduan'];?></td>
                      <td><?php echo $keluar['tgl_pengaduan'];?></td>
                      <td><?php echo $keluar['nik'];?></td>
                      <td><?php echo $keluar['isi_laporan'];?></td>
                      <!-- <td align="Center"><img src="../../file_upload/alert.png>" style="width: 100px;height: auto;"></td> -->
                      <?php
            if(isset($keluar['foto'])){?>
              <td align="Center"><img src="../../file_upload/<?php echo $keluar['foto'];?>" style="width: 100px;height: auto;"></td>
              <?php if($keluar['foto']=="gambar_null"){
          ?>
                                  <td align="Center"><img src="../../file_upload/<?php echo $keluar['foto'];?>" style="width: 100px;height: auto;"></td>
          <?php
              }
            }
          ?>

                      <!-- <td>
                        <?php echo $keluar['status'];?></td> -->
                        <?php
  if($keluar['status']=='Finish' ){?>
              <td class="text-success"><?php echo $keluar['status'];?></td>
              <?php               }
              else if ($keluar['status']=='On Going' ){
          ?>
              <td class="text-warning"><?php echo $keluar['status'];?></td>
          <?php

            }
            else if ($keluar['status']=='Rejected' ){
              ?>
                  <td class="text-danger"><?php echo $keluar['status'];?></td>
              <?php
                }
            else {?>
              <td class="text-primary"><?php echo $keluar['status'];?></td>
         <?php }
          ?>
                      <td>
                        <a onclick="return confirm('Konfirmasi untuk Menyimpan Aksi');" href="?rejected=<?php echo $keluar['id_pengaduan'];?>&nik=<?php echo $keluar['nik'];?>"  class="btn btn-danger">Rejected</a>
                        <a onclick="return confirm('Konfirmasi untuk Menyimpan Aksi');" href="?sedang_diproses=<?php echo $keluar['id_pengaduan'];?>&nik=<?php echo $keluar['nik'];?>" class="btn btn-warning">On Going</a>
                        <a onclick="return confirm('Konfirmasi untuk Menyimpan Aksi');" href="?proses_selesai=<?php echo $keluar['id_pengaduan'];?>&nik=<?php echo $keluar['nik'];?>" class="btn btn-success">Finish</a>

                      </td>
<?php
}
?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; ANY</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="?logout">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
