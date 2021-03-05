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
  <div id="wrapper">
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content" mb-5>   
        <nav class="navbar navbar-expand-lg navbar-dark " style="background-color: #d30404;">
          <div class="container-fluid">
            <img src="img/pengaduan_online.png" class="img-fluid" >
            <img src="img/bantuan.png" class="img-fluid" >
          </div>
        </nav>
        <div class="row justify-content-center animated--grow-in">
          <div class="col-xl-7 col-lg-10 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
              <div class="card-body p-0">
                <div class="row ">
                  <div class="col-lg  mx-5 my-5">
                    <div class="p-5 ">
                      <div class="card">
                        <div class="card-body" style="background-color: #d30404;">
                          <h4 class=" text-white display-6"style="background-color: #d30404;">Sampaikan Laporan Anda</h4>
                        </div>
                      </div>       
                      <form method="post" action="" enctype="multipart/form-data">
                        <p class="text-dark">Pilih Tipe Laporan</p>
                        <td>
                          <label class="btn btn-outline-danger mr-5"required="required" for="danger-outlined" style="width: 25%;"><input type="radio" class="btn-check" name="tujuan" value="1" >Pengaduan</label>
                          <label class="btn btn-outline-danger mr-5" required="required"for="danger-outlined" style="width: 25%;"><input type="radio" class="btn-check" name="tujuan" value="2" >Aspirasi</label>
                          <label class="btn btn-outline-danger" required="required"for="danger-outlined" style="width: 30%;"><input type="radio" class="btn-check" name="tujuan" value="3" >Permintaan Informasi</label>
                        </td>
                        <h6 class="mt-3 mb-5">Perhatikan Cara Menyampaikan PENGADUAN Yang Baik dan Benar</h6>
                        <div class="form-group my-3">
                          <input type="text" required="required" name="nik" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp"  value="" placeholder="Ketik NIK Anda *">
                        </div>
                        <div class="form-group my-3">
                          <input type="text" required="required" name="judul" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp"  value="" placeholder="Ketik Judul Laporan Anda *">
                        </div>
                        <div class="form-group my-3">
                          <textarea type="text" required="required" name="isi" class="form-control form-control-user" id="exampleInputPassword" placeholder="Ketik Isi Laporan Anda *"></textarea>
                        </div>                      
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
                        <input type="submit"  onclick="return confirm('Kirim Pengaduan ini ?');" name="pengaduan" value="Lapor" class="btn btn-primary btn-user btn-block"style="background-color: #d30404; font-size:20px;">
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

</div>
<footer class="sticky-footer text-light pt-5"style="background-color: #d30404;">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; ANY 2021</span>
    </div>
  </div>
</footer>
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
