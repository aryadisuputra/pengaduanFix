<?php
require("../config/fungsi.php");
if(isset($_POST['login'])){
  login($_POST['username'], $_POST['password'], $_POST['ingatkan']);
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

  <title>Login</title>

  <!-- Custom fonts for this template-->
  <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <!-- <link href="admin/css/sb-admin-2.min.css" rel="stylesheet"> -->
  <link href="admin/css/sb-admin-2.css" rel="stylesheet">
  <link href="admin/css/depan.css" rel="stylesheet">

</head>
    

<body class="bg-login-image">
  <section id="header">
        <nav class="navbar navbar-expand-lg navbar-light "style="background-color: #d30404;">
              <img src="img/pengaduan_online.png" class="img-fluid" >
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
              </li>
              <li class="nav-item">
              </li>
              <li class="nav-item">
                </li>
            </ul>
                <a class="navbar-brand text-white" href="#">BANTUAN</a>
        </div>
        </nav>
  </section>

  <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 d-none d-md-block img-container">
                <div class="containertxt">
                    <h1>Selamat Datang Di</h1>
                    <h1>Portal Pelayanan</h1>
                    <h1>Pengaduan Online</h1>
                    <!-- <div class="tombol">
                      <a href="user/pengaduan.php" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn btn-danger shadow-sm"> Ajukan Pengaduan</a>
                    </div> -->
                </div>
                <div class="containertxt">
                </div>

                <div class="containerbxt">
                    <div class="container-fluid">
                        <div class="row cstumer">
                            <div class="col text-right cstt">
                                <img src="../vendor/support.svg" alt="">
                            </div>
                            <div class="col-6 cntact">
                              +628122930484
                              <br>
                              pengaduan-online@gmail.com
                            </div>
                            <div class="col">
                                
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>


            <div class="col-lg-6 col-md-4 form-container">
                <div class="col-lg-8 col-md-12 col-sm-9 col-xs-12 form-box text-center">
                    <div class="logo">
                        <img src="../vendor/Lambang_Kabupaten_Buleleng.png" alt="" style="width: 100px;">
                    </div> 
                    <form method="POST" action="">
                    <div class="container-box">
                        <h1 id="logitxt">LOGIN</h1>
                        <div class=" form-group inputan1">
                    <p class="h6">Username</p>
                      <input type="text" name="username" class="form-control form-control-user" id="exampleInputEmail" value="<?php if(isset($_COOKIE['ingatkan'])){ echo $_COOKIE['ingatkan']; }?>" aria-describedby="emailHelp" placeholder="Username">
                    </div>
                    <div class="form-group inputan2">
                    <p class="h6">Password</p>
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <div class="custom-control custom-checkbox small">
                        <input type="checkbox" name="ingatkan" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Ingatkan Saya</label>
                    </div>
<?php
  if(isset($_GET['validation'])){
    if($_GET['validation']=="failed"){
?>
                    <div class="form-group">
                      <div class="small">
                        <center><b align="center" class="text-danger">Username atau Password Salah !</b></center>
                      </div>
                    </div>
<?php
    }
  }
?>
<?php
  if(isset($_GET['validation'])){
    if($_GET['validation']=="token_error"){
?>
                    <div class="form-group">
                      <div class="small">
                        <center><b align="center" class="text-danger">Terdeteksi Kesalahan Token pada Akun anda !</b></center>
                      </div>
                    </div>
<?php
    }
  }
?>
<?php
  if(isset($_GET['validation'])){
    if($_GET['validation']=="akun_nonaktif"){
?> -->
                    <div class="form-group">
                      <div class="small">
                        <center><b align="center" class="text-danger">Akun anda sedang dinonaktifkan !</b></center>
                      </div>
                    </div>
<?php
    }
  }
?>
                    <input type="submit" name="login" value="LOGIN" class="mt-4 btn btn-primary btn-user btn-block">
                  </form>
                  <hr/>
                  <div class="text-center">
                    <!-- <a class="small" href="register.php">Buat Akun!</a> -->
                  </div>
                </div>
              </div>
            </div>
        </div>
        </div>



























<


    </div>
  </div>
    </div>

    </div>
  </div>
</div>
  

   

<!-- POP UP UPDATE PROGRAM (Hapus jika mengganggu) -->
<!-- <script type="text/javascript">window.onload = function(){document.getElementById('tombol').click();}</script>
<input id="tombol" data-toggle="modal" data-target="#p" type="hidden">
<div class="modal fade" id="p" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hai, Mari Kita Mulai !</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        - Update edit Profil.<br/>
        - Update Ubah Password.<br/>
        - Update Opsi Nonaktifkan Akun Petugas (KHUSUS ADMIN).<br/>
        - Update Print Laporan Petugas/Admin.<br/>
        <br/>
        <br/>
        (SILAHKAN GUNAKAN UNTUK REFERENSI)<br/>
        Jika ada Kesalahan Program Hubungi via Whatsapp 089650007015
      </div>
      <div class="modal-footer">
        Layanan Pengaduan Masyarakat Versi 6 (FINAL)
      </div>
    </div>
  </div>
</div>
<!-- AKHIR KODE POP UP UPDATE PROGRAM -->

  <!-- Bootstrap core JavaScript-->
  <script src="admin/vendor/jquery/jquery.min.js"></script>
  <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="admin/js/sb-admin-2.min.js"></script>

</body>

</html>