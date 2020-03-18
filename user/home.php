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
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Cleon</title>
    

  <style>
    #mapid{
    width: 100%;
    height: 600px;
    }

    .force-scroll {

overflow-y: scroll;
width: 400px;
height: 350px;
}

.force-scroll::-webkit-scrollbar{
  width: 5px;
}

.force-scroll::-webkit-scrollbar-thumb{
  background: #c1c1c1;
}
.scrollable-menu {
    
    max-height: 500px;
    width: 300px;
    overflow-x: hidden;

}
  </style>
 <!-- <script src="boostrap/leaflet/leaflet.js"></script>-->
     <style type="text/css">
      .nonaktiv{
        pointer-events: none;
      }
    </style>

</head>
<body>

  


    <!-- Start: Navbar -->
     <?php include 'menu_user.php'; ?>
     <!-- End: Navbar White -->



<br /><br />
 <header class="masthead text-center">
    <div class="overlay"></div>
        <section class="page-section" id="services">
    <div class="container">
      <div class="col-xl-9 mx-auto">
          <h1 class="mb-5"><?php echo $_SESSION['perusahaan'] ?></h1>
        </div>
      <hr class="divider my-4">
      <div class="row">
        <div class="col-lg-4 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-broadcast-tower text-primary mb-4"></i>
            <h3 class="h4 mb-2">Menara</h3>
            <a href="home2.php?riwayat=1" class="btn btn-block btn-primary">Konfirmasi</a>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-wave-square text-primary mb-4"></i>
            <h3 class="h4 mb-2">Fiber Optik</h3>
           <a href="home2.php?riwayat=2" class="btn btn-block btn-primary btn-sm">Konfirmasi</a>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-book text-primary mb-4"></i>
            <h3 class="h4 mb-2">Riwayat Pengajuan</h3>
           <a href="riwayat_pengajuan.php" class="btn btn-block btn-primary btn-sm">Konfirmasi</a>
          </div>
        </div>
        <div class="col-lg-2 text-center">
        </div>
        <div class="col-lg-4 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-info text-primary mb-4"></i>
            <h3 class="h4 mb-2">Info</h3>
           <a href="#" class="btn btn-block btn-primary btn-sm" data-toggle="modal" data-target="#info">Konfirmasi</a>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-tools text-primary mb-4"></i>
            <h3 class="h4 mb-2">Services</h3>
            <p class="text-primary">Cooming Soon..</p>
          </div>
        </div>
        <div class="col-lg-2 text-center">
        </div>
      </div>
    </div>
  </section>


  <div class="modal fade" id="info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="text-center">
          <div class="mt-1">
            <i class="fas fa-4x fa-info-circle text-primary mb-4"></i>
            <h3 class="h4 mb-2">INFORMATION</h3>
            <br>
          </div>
        </div>
        <div class="text-left">
          <p>1. Fitur Menara digunakan untuk memanajement menara</p><br>
          <p>2. Fitur Fiber Optik digunakan untuk memanajement Fiber Optik</p>
        </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
       <!-- <section class="features-icons bg-light text-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
           <a href="riwayat.php#riwayat">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-energy m-auto text-primary"></i>
            </div>
            <h3>Menara</h3></a>
            <p class="lead mb-0">Menara</p>
          </div>
        </a>
        </div>
        <div class="col-lg-4">
           <a href="menara/index.php">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-power m-auto text-primary"></i>
            </div>
            <h3>Fiber Optik</h3></a>
            <p class="lead mb-0">Fiber Optik</p>
          </div>
        </a>
        </div>
        <div class="col-lg-4">
           <a href="menara/index.php">
          <div class="features-icons-item mx-auto mb-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-info m-auto text-primary"></i>
            </div>
           <h3>Info</h3></a>
            <p class="lead mb-0">Information</p>
          </div>
        </div>
      </div>
    </div>
  </section>-->
      
    
  </header>

<hr />

 <?php include '../modal/logoutmodal.php'; ?>
 <?php include '../modal/modal_perusahaan.php';?>
<!-- partial -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="/assets/js/script.min.js?h=9af5f655239f5ce4fa692ca1c1513d50"></script>


</body>
</html>