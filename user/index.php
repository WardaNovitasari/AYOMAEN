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
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin - Cleon</title>

  <!-- Custom fonts for this template-->
  <link href="../admin/boostrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="../admin/boostrap/leaflet/leaflet.css">

  <!-- Page level plugin CSS-->
  <link href="../admin/boostrap/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../admin/boostrap/css/sb-admin.css" rel="stylesheet">

    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css?h=9cbc0924ce97a7266bf70ef7dd6f47d4">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/typicons/2.0.9/typicons.min.css">
    <link rel="stylesheet" href="/assets/fonts/fontawesome5-overrides.min.css?h=03ab36d1dde930b7d44a712f19075641">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="/assets/css/styles.min.css?h=caf0e66302acd59bc37078e71bfa5f04">

  <style>
    #mapid{
    width: 100%;
    height: 600px;
    }

    .scrollable-menu {
    overflow-y: scroll;

    height: 215px;
    }
  </style>
 <!-- <script src="boostrap/leaflet/leaflet.js"></script>-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="boostrap/dist/style.css">
 <link href="../admin/boostrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
</head>

<body>
     <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
        <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
            <h1 class="d-md-flex" style="font-size: 24px;font-weight: bold;color: #4e73df;">CLEON</h1>
            <ul class="nav navbar-nav flex-nowrap ml-auto">
                <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-search"></i></a>
                    <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" role="menu" aria-labelledby="searchDropdown">
                        <form class="form-inline mr-auto navbar-search w-100">
                            <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                            </div>
                        </form>
                    </div>
                </li>
                <li class="nav-item dropdown no-arrow" role="presentation">
                    <li class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="typcn typcn-th-large-outline" style="font-size: 32px;color: #2c3e50;"></i></a>
                        <div
                            class="dropdown-menu shadow dropdown-menu-right animated--grow-in scrollable-menu" role="menu" style="width: 215px;"><i class="far fa-user-circle d-flex d-lg-flex justify-content-center justify-content-lg-center" style="font-size: 49px;padding-top: 18px;padding-bottom: 10px;color: #4e73df;"></i>
                            <h1 class="d-flex d-lg-flex justify-content-center justify-content-lg-center"
                                style="color: #2c3e50;font-size: 24px;">user</h1>
                            <div class="dropdown-divider"></div><a class="dropdown-item" role="presentation" href="#" style="color: rgb(78,115,223);font-weight: bold;"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400" style="color: #4e73df;"></i>&nbsp;SIGN OUT</a>
                            <div
                                class="dropdown-divider"></div><a class="dropdown-item" role="presentation" href="#" style="color: #2c3e50;font-weight: bold;font-size: 15px;"><i class="fas fa-user-circle fa-sm fa-fw mr-2 text-gray-400" style="color: #4e73df;font-size: 15px;"></i>&nbsp;User1</a></div>
        </li>
        </li>
        </ul>
        </div>
    </nav>
    <!-- End: Navbar White -->

<br /><br /><br />
<div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <center><h1>Hai <?php echo $_SESSION['username'] ?></h1></center>
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
     <?php include '../modal/logoutmodal.php'; ?>
  <?php include '../modal/modal_perusahaan.php';?>
<!-- partial -->
  <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script><script  src="./script.js"></script>
   <script src="..admin/boostrap/vendor/jquery/jquery.min.js"></script>
  <script src="../admin/boostrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>