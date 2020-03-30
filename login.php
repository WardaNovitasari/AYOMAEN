<?php
session_start();
if(@$_SESSION['status']==1){
  header("location:admin/index.php");
}elseif(@$_SESSION['status']==2){
  header("location:home.php");
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

  <title>SI Permen - Login</title>

  <!-- Custom fonts for this template-->
  <link href="admin/boostrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="bs/css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block">
                <a class="small" href="index.php">
                  <img src="bs/img/logo_permen.png" style="margin: 140px 50px 0px 60px;">
                </a>
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Selamat Datang <br>di SI PERMEN !</h1>
                  </div>
                  <form action="aksi/aksi_login.php" method="post">
                    <div class="form-group">
                      <input type="text" id="username" class="form-control" placeholder="Alamat Email" required="required" autofocus="autofocus" name="username" >
                    </div>
                    <div class="form-group">
                      <input type="password" id="password" class="form-control" placeholder="Password" required="required" name="password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Ingat saya</label>
                      </div>
                    </div>
                    <button class="btn btn-primary btn-block" type="submit" name="submit">Masuk</button>
                  </form>
                
                  <div class="text-center">
                    <a class="small" href="forgot-password.php">Lupa Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.php">Daftar Akun Baru!</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="index.php">Beranda</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="admin/boostrap/vendor/jquery/jquery.min.js"></script>
  <script src="admin/boostrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="admin/boostrap/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="admin/boostrap/js/sb-admin.js"></script>

</body>

</html>
