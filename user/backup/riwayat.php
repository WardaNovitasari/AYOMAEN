<?php
include '../koneksi/koneksi.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
  if(empty($_SESSION['username'])){
    header("location:login.php");
  }elseif($_SESSION['status']!='user'){
    header("location:404.php");
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

</head>

<body id="page-top">

  <!-- Navigation -->
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="home.php">CLEON</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">Lihat Lokasi <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="input_lokasi.php">Input Lokasi</a>
      </li>
            <li class="nav-item">
        <a class="nav-link" href="#riwayat">Riwayat</a>
      </li>
      <li class="nav-item dropdown">
       
      </li>
    </ul>
     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="edit_password.php"><?php echo $_SESSION['username']; ?></a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Keluar</a>
        </div>
  </div>
</nav>

  <!-- Masthead -->
  <header class="masthead text-white text-center">
    <div class="overlay"></div>
    
      
        <div class="col-xl-9 mx-auto">
          <h1 class="mb-5"><?php echo $_SESSION['perusahaan'] ?></h1>
        </div>
      
    
  </header>

  <div id="wrapper">
  <div class="panel-body ">
        <div class="btn-group btn-group btn-block ">
            <a class="btn btn-primary" href="#"><span class="badge badge-light">4</span> Pengajuan</a>
            <a class="btn btn-success" href="#"><span class="badge badge-light">4</span> Hasil Survey</a>
            <a class="btn btn-info" href="#"><span class="badge badge-light">4</span> Proses Rekom</a>
            <a class="btn btn-warning" href="#"><span class="badge badge-light">4</span> Cetak Form</a>
        </div>
    </div>

  <!-- Icons Grid -->
 
   <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Beranda</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Menara yang Belum dilakukan Tindakan</div>
          <div class="card-body">
            <div class="table-responsive">
               <table class="table">
          <thead class="thead-light">
            <tr>
              <th><center>No</center></th>
              <th><center>ID Form</center></th>
              <th><center>Lihat File</center></th>
              <th><center>Status</center></th>
              <th><center>Tgl Pengajuan</center></th>
              <th><center>Tgl Disetujui</center></th>
              <th><center>Maps</center></th>
            </tr>
          </thead>
          <tbody>
            <?php
              
              $query=mysqli_query($config,"SELECT * FROM tb_tempat_menara JOIN tb_form_menara ON tb_tempat_menara.id_form = tb_form_menara.id_form JOIN tb_akun ON tb_form_menara.id_akun=tb_akun.id_akun JOIN tb_perusahaan ON tb_akun.id_akun=tb_perusahaan.id_akun WHERE tb_akun.username='$username'");
              $nomor=1;
              while($rowsPer1=mysqli_fetch_array($query)){
                $tgl_pengajuan=date('d F Y', strtotime($rowsPer1['tgl_pengajuan']));
                if($rowsPer1['tgl_disetujui']=='0000-00-00 00:00:00'){
                  $tgl_disetujui='data belum disetujui';
                }else{
                $tgl_disetujui=date('d F Y',strtotime($rowsPer1['tgl_disetujui']));
                }
                ?>
            <tr>
              <td><center><?php echo $nomor; ?></center></td>
              <td><center><?php echo $rowsPer1['id_form']; ?></center></td>
              <td><?php echo $rowsPer1['nama_tempat']; ?></td>
              <td><center><?php if($rowsPer1['status']=='disetujui'){
                echo '<font color="green">Disetujui</font>';}else if($rowsPer1['status']=='ditolak'){
                echo '<font color="orange">Ditolak</font>';
                }else if($rowsPer1['status']=='terkirim'){
                echo '<font color="orange">Belum dilakukan tindakan</font>';
                } ?></center></td>
              <td><center><?php echo $tgl_pengajuan; ?></center></td>
              <td><center><?php echo $tgl_disetujui; ?></center></td>
              <td><center><a href="detail_map?id=<?php echo $rowsPer1['id']; ?>">Open Maps</a></center></td>
            </tr>
          <?php
          $nomor++;
            //$id1++;
            // close while loop
            }

          ?>
          </tbody>
        </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

         <!-- Sticky Footer -->

    </div>
    <!-- /.content-wrapper -->

  </div>
</div>
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
  <!-- Footer -->
  
  <?php include '../modal/logoutmodal.php'; ?>
  <!-- Bootstrap core JavaScript -->
  <script src="boostrap/vendor/jquery/jquery.min.js"></script>
  <script src="boostrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../admin/boostrap/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="../admin/boostrap/vendor/chart.js/Chart.min.js"></script>
  <script src="../admin/boostrap/vendor/datatables/jquery.dataTables.js"></script>
  <script src="../admin/boostrap/vendor/datatables/dataTables.bootstrap4.js"></script>


  <!-- Custom scripts for all pages-->
  <script src="../admin/boostrap/js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="../admin/boostrap/js/demo/datatables-demo.js"></script>
  <script src="../admin/boostrap/js/demo/chart-area-demo.js"></script>

</body>

</html>
