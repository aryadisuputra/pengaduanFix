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
if(isset($_GET['hapus_pengaduan'])){
  hapus_pengaduan($_GET['hapus_pengaduan']);
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
    <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>

      </a>

      <!-- Nav Item - User Information -->
      <li class="nav-item dropdown no-arrow justify-content-center">
              <a class="nav-link dropdown-toggle " href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 animated--grow-in d-lg-inline text-gray-600 justify-content-center"><i class="fas fa-user fa-fw mr-2 text-gray-400"></i> <?= $data['nama_petugas'];?></span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="profil.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profil
                </a>
                <a onclick="dark();" class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Tema Gelap (Beta)
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Keluar
                </a>
              </div>
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
        <a class="nav-link" href="tables.php">
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
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-primary-800">Diproses</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4 animated--grow-in">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tabel Pengaduan Diproses</h6>
            </div>
            <div class="card-body">
<?php
if(isset($_GET['berhasil'])){
  if($_GET['berhasil']=="proses_oke"){
?>
                    <div class="form-group">
                      <div class="small">
                        <center><b align="center" class="text-success">1 Pengaduan telah Selesai !</b></center>
                      </div>
                    </div>
<?php
  }
}
?>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Tanggal</th>
                      <th>NIK</th>
                      <th>Isi</th>
                      <th>Foto</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Tanggal</th>
                      <th>NIK</th>
                      <th>Isi</th>
                      <th>Foto</th>
                    </tr>
                  </tfoot>
                  <tbody>
<?php
  $out = mysqli_query($koneksi, "SELECT * FROM pengaduan where status='proses'");
  while($keluar = mysqli_fetch_array($out)){
?>

                    <tr>
                      <td><?php echo $keluar['id_pengaduan'];?></td>
                      <td><?php echo $keluar['tgl_pengaduan'];?></td>
                      <td><?php echo $keluar['nik'];?></td>
                      <td><?php echo $keluar['isi_laporan'];?></td>
                      <td align="Center"><img src="../../file_upload/<?php echo $keluar['foto'];?>" style="width: 100px;height: auto;"></td>
                      <td><a onclick="return confirm('Konfirmasi untuk Melanjutkan Proses Penyelesaian');" href="?proses_selesai=<?php echo $keluar['id_pengaduan'];?>&nik=<?php echo $keluar['nik'];?>" class="btn btn-success">Proses Selesai</a></td>
                    </tr>
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
<hr/>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-success-800">Selesai</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4 animated--grow-in">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-success">Tabel Pengaduan Telah Selesai</h6>
            </div>
            <div class="card-body">
<?php
if(isset($_GET['berhasil'])){
  if($_GET['berhasil']=="proses_hapus"){
?>
                    <div class="form-group">
                      <div class="small">
                        <center><b align="center" class="text-warning">1 Pengaduan berhasil dihapus !</b></center>
                      </div>
                    </div>
<?php
  }
}
?>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Tanggal</th>
                      <th>NIK</th>
                      <th>Isi</th>
                      <th>Foto</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Tanggal</th>
                      <th>NIK</th>
                      <th>Isi</th>
                      <th>Foto</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
<?php
  $out = mysqli_query($koneksi, "SELECT * FROM pengaduan where status='selesai'");
  while($keluar = mysqli_fetch_array($out)){
?>

                    <tr>
                      <td><?php echo $keluar['id_pengaduan'];?></td>
                      <td><?php echo $keluar['tgl_pengaduan'];?></td>
                      <td><?php echo $keluar['nik'];?></td>
                      <td><?php echo $keluar['isi_laporan'];?></td>
                      <td align="Center"><img src="../../file_upload/<?php echo $keluar['foto'];?>" style="width: 100px;height: auto;"></td>
                      <td><p class="text-success"><b>SELESAI</b></p></td>
                      <td><a onclick="return confirm('Yakin ingin Menghapus Pengaduan ? \n ID Pengaduan : <?php echo $keluar['id_pengaduan'];?>');" href="?hapus_pengaduan=<?php echo $keluar['id_pengaduan'];?>" class="btn btn-danger"><span class="fas fa-fw fa-trash"></span></a></td>
                    </tr>
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

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
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
