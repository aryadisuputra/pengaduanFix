<?php 
require("../../config/fungsi.php");
if(isset($_POST['pengaduan'])){
  $pathh = $_FILES['gambar']['tmp_name'];
  $target = '../../file_upload/'.$_FILES['gambar']['name'];
  if(isset($_FILES['gambar'])){
      move_uploaded_file($pathh, $target);
      ajukan($_POST['nik'], $_FILES['gambar']['tmp_name'], $_FILES['gambar']['name'], $_POST['isi'], $_POST['tujuan'], $_POST['judul']);
    }else{
      header("Location:?berhasil=gambar_null");
    }
}
if(isset($_GET['logout'])) {
  logout();
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

  

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-6 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

  


        <!-- Topbar Navbar -->
<?php include("header/topbar.php");?>
        <!-- End of Topbar -->

        

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center animated--grow-in">

      <div class="col-xl col-lg col-md">

        <div class="card o-hidden border-0">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Buat Pengaduan !</h1>
                  </div>
                  <form method="post" action="" enctype="multipart/form-data">
                  <td>
                    <label><input type="radio" name="tujuan" value="1" >Pengaduan</label>
                    <label><input type="radio" name="tujuan" value="2" >Aspirasi</label>
                    <label><input type="radio" name="tujuan" value="3" >Permintaan Informasi</label>
                  </td>
                    <div class="form-group">
                    
                    <small>NIK</small>
                      <input type="text" required="required" name="nik" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp"  value="" placeholder="NIK">
                    </div>
                    <small>Judul</small>
                      <input type="text" required="required" name="judul" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp"  value="" placeholder="judul">
                    </div>
                    <hr/>
                    <div class="form-group">
                      <small>Unggah Bukti Gambar (Wajib) &nbsp;</small><input required="required" type="file" name="gambar" class="btn btn-primary" />
                    </div>
                    <div class="form-group">
                      <small>*Anda hanya bisa mengajukan satu Pengaduan dalam sehari</small>
                      <textarea type="text" required="required" name="isi" class="form-control form-control-user" id="exampleInputPassword" placeholder="Isi Masalah"></textarea>
                    </div>
<?php
  if(isset($_GET['berhasil'])){
    if($_GET['berhasil']=="ajukan"){
?>
                    <div class="form-group">
                      <div class="small">
                        <center><b align="center" class="text-primary">Pengaduan anda Berhasil diajukan !</b></center>
                      </div>
                    </div>
<?php
    }
  }
?>
<?php
  if(isset($_GET['berhasil'])){
    if($_GET['berhasil']=="maxsend"){
?>
                    <div class="form-group">
                      <div class="small">
                        <center><b align="center" class="text-danger">Pengaduan dibatalkan secara Otomatis, anda hanya dapat mengajukan Pengaduan sekali dalam sehari !</b></center>
                      </div>
                    </div>
<?php
    }
  }
?>
<?php
  if(isset($_GET['berhasil'])){
    if($_GET['berhasil']=="gambar_null"){
?>
                    <div class="form-group">
                      <div class="small">
                        <center><b align="center" class="text-danger">Wajib Masukan Bukti Gambar !</b></center>
                      </div>
                    </div>
<?php
    }
  }
?>
                    <input type="submit" onclick="return confirm('Kirim Pengaduan ini ?');" name="pengaduan" value="Kirim" class="btn btn-primary btn-user btn-block">
                  </form>
                  <hr>
                </div>
              </div>
              <div class="col-lg-3 bg-light container">
                <div class="p-3">
                      <div class="small mt-5">
                        <p align="left" class="text-grey mt-4"><li>Gunakanlah Kalimat yang baku dan benar.</li></p>
                        <p align="left" class="text-grey"><li>Pengaduan Wajib menyertakan Bukti Gambar.</li></p>
                        <p align="left" class="text-grey"><li>Pengaduan hanya bisa dikirim satu kali dalam 24 Jam.</li></p>
                        <p align="left" class="text-grey mb-4"><li>Pengaduan yang tidak valid, tidak akan diproses oleh petugas.</li></p>
                        <p align="left" class="text-grey"><li>Pastikan Pengaduan yang anda kirim adalah masalah yang Valid.</li></p>
                        <p align="left" class="text-grey mb-4"><li>Berikanlah Keterangan yang Jelas sebelum mengirim Pengaduan.</li></p>
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
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Sutan Kumala 2019</span>
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
