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

  <title>SB Admin - Login</title>

  <!-- Custom fonts for this template-->
  <link href="admin/boostrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="admin/boostrap/css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark"><!-- background halaman login -->

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form action="aksi/aksi_login.php" method="post">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="username" class="form-control" placeholder="Email address" required="required" autofocus="autofocus" name="username">
              <label for="username"><i class="fas fa-envelope"></i></label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="password" class="form-control" placeholder="Password" required="required" name="password">
              <label for="password"><i class="fas fa-lock"></i></label>
            </div>
          </div>
          <div class="form-group">
            <div class="checkbox">
            </div>
          </div>
          <button class="btn btn-primary btn-block" type="submit" name="submit">Login</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.php">Register an Account</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="admin/boostrap/vendor/jquery/jquery.min.js"></script>
  <script src="admin/boostrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="admin/boostrap/vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
