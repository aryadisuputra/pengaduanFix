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
          <!-- <nav class="navbar navbar-expand-lg navbar-dark " style="background-color: red;">
            <div class="container-md">
              <a class="navbar-brand" href="#">PENGADUAN ONLINE</a>
            </div> -->
          <!-- </nav> -->
   
<nav class="navbar navbar-expand-lg navbar-dark " style="background-color: #d30404;">
  <div class="container-fluid">
    <h1><span class="navbar-brand mb-0 h1">PENGADUAN ONLINE</span></h1>
    <span class="navbar-brand mb-0 h1">BANTUAN</span>
  </div>
</nav>

  



        

  <div class="container">
  
  


      <div class="col-xl col-lg col-md">
        <div class="card o-hidden border-0">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
                <div class="p-5">
                <span class="d-block p-2 text-white"style="background-color: #d30404;">Sampaikan Laporan Anda</span>
                  <div class="text-center">
                  </div>
                  <form method="post" action="" enctype="multipart/form-data">
                  <h6>Pilih Tipe Laporan</h6>
                  <td>
                    <label class="btn btn-outline-danger" for="danger-outlined"><input type="radio" class="btn-check" name="tujuan" value="1" >Pengaduan</label>
                    <label class="btn btn-outline-danger" for="danger-outlined"><input type="radio" class="btn-check" name="tujuan" value="2" >Aspirasi</label>
                    <label class="btn btn-outline-danger" for="danger-outlined"><input type="radio" class="btn-check" name="tujuan" value="3" >Permintaan Informasi</label>
                  </td>
                  <h6>Perhatikan Cara Menyampaikan PENGADUAN Yang Baik dan Benar</h6>
                    <div class="form-group">
                      <input type="text" required="required" name="nik" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp"  value="" placeholder="Ketik NIK Anda *">
                    </div class="form-group">
                    <div>
                      <input type="text" required="required" name="judul" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp"  value="" placeholder="Ketik Judul Laporan Anda *">
                    </div>
                    <div class="form-group">
                      <textarea type="text" required="required" name="isi" class="form-control form-control-user" id="exampleInputPassword" placeholder="Ketik Isi Laporan Anda *"></textarea>
                    </div>
                    <hr/>
                    
                    <div class="form-group">
                     <input required="required" type="file" name="gambar" class="btn btn-secondary" />
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
                    <input type="submit"  onclick="return confirm('Kirim Pengaduan ini ?');" name="pengaduan" value="Lapor" class="btn btn-primary btn-user btn-block"style="background-color: #d30404;">
                  </form>
                  <hr>
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
      <footer class="sticky-footer"style="background-color: #d30404;">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; ANY 2021</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  

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
