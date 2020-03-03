<?php
include '../koneksi/koneksi.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
  if(empty($_SESSION['username'])){
    header("location:login.php");
  }elseif($_SESSION['status']!='user'){
    header("location:404.html");
  }
  $username=$_SESSION['username'];
  
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Landing Page - Start Bootstrap Theme</title>

  <!-- Bootstrap core CSS -->
  <link href="boostrap/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="boostrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="boostrap/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="boostrap/css/landing-page.min.css" rel="stylesheet">

  <link href="boostrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="boostrap/leaflet/leaflet.css">

  <!-- Page level plugin CSS-->
  <link href="boostrap/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="boostrap/css/sb-admin.css" rel="stylesheet">
  <script type="text/javascript">
    window.history.forward();
    function noBack() { window.history.forward(); }
</script>

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand navbar-light bg-light static-top">
  <!--<nav class="navbar navbar-light bg-light static-top">-->
    <div class="container">
      <a class="navbar-brand" href="#">CLEON</a>
    </div>
      <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="edit_password.php"><?php echo $_SESSION['username']; ?></a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Keluar</a>
        </div>
      </li>
    </ul>
    
  </nav>

  <!-- Masthead -->
  <header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h1 class="mb-5">Hai <?php echo $_SESSION['username'] ?> </h1>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
          <form action="../aksi/user/beranda.php" method="post">
            <div class="form-row">
              <div class="col-12 col-md-9 mb-2 mb-md-0">
                <select name="nmperusahaan" class="form-control form-control-lg">
                  <?php
                    $query=mysqli_query($config,"SELECT * FROM tb_perusahaan JOIN tb_akun ON tb_perusahaan.id_akun = tb_akun.id_akun WHERE tb_akun.username = '$username' AND status_aktif='diterima'");
                    while($tempat=mysqli_fetch_array($query)){ ?>
                      <option><?php echo $tempat['nm_perusahaan'] ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-12 col-md-3">
                <button type="submit" class="btn btn-block btn-lg btn-primary" name="submit">Konfirmasi</button>
                <a class="btn btn-block btn-lg btn-primary" href="#" data-toggle="modal" data-target="#tambahperusahaan">Tambah</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </header>

  
  
  <!-- Footer -->
  <footer class="footer bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
          <ul class="list-inline mb-2">
            <li class="list-inline-item">
              <a href="#">About</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Contact</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Terms of Use</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Privacy Policy</a>
            </li>
          </ul>
          <p class="text-muted small mb-4 mb-lg-0">&copy; Your Website 2019. All Rights Reserved.</p>
        </div>
        <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
          <ul class="list-inline mb-0">
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-facebook fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-twitter-square fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-instagram fa-2x fa-fw"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <?php include '../modal/logoutmodal.php'; ?>
  <?php include '../modal/modal_perusahaan.php';?>

  <!-- Bootstrap core JavaScript -->
  <script src="boostrap/vendor/jquery/jquery.min.js"></script>
  <script src="boostrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
