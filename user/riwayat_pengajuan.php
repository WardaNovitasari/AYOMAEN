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
 $perusahaan = $_SESSION['perusahaan'];
  $riwayat = $_SESSION['riwayat'];

 $query = mysqli_query($config,"SELECT * FROM tb_form_menara JOIN tb_perusahaan ON tb_form_menara.id_perusahaan = tb_perusahaan.id_perusahaan WHERE tb_perusahaan.nm_perusahaan ='$perusahaan' ORDER BY status_form DESC");
  if($riwayat==1){
 $link = 'form_input_lokasi.php';//membuka form input menara
 $link2= "../aksi/user/aksi_kirim_menara.php";// aksi kirim menara
 $link3="../aksi/user/aksi_delete_menara.php";// aksi delete menara
 $link4 ="edit_menara.php";
 $link5 = "menara";
  }elseif($riwayat==2){
  $link = 'form_input_fo.php';//membuka form input menara
  $link2= "../aksi/user/aksi_kirim_fiber.php";//aksi kirim fiber
   $link3="../aksi/user/aksi_delete_menara.php";// aksi delete fiber
  $link4 ="edit_fo.php";
  $link5 = "fiber";
  }
?>
<!DOCTYPE html>
<html lang="en" >
<head>
   <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SIPERMEN - Riwayat Pengajuan</title>
  <link rel="shortcut icon" href="../dashboard/images/ico/ico.png">
  <!-- Custom fonts for this template-->
  <link href="../admin/boostrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="../admin/boostrap/leaflet/leaflet.css">

  <!-- Page level plugin CSS-->
  <link href="../admin/boostrap/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../admin/boostrap/css/sb-admin.css" rel="stylesheet">

  <style>
    #mapid{
    width: 100%;
    height: 600px;
    }
  </style>
 <!-- <script src="boostrap/leaflet/leaflet.js"></script>-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="boostrap/dist/style.css">
  <link href="../admin/boostrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Include SmartWizard CSS -->
    <link href="boostrap2/dist/css/smart_wizard.css" rel="stylesheet" type="text/css" />

    <!-- Optional SmartWizard theme -->
    <link href="boostrap2/dist/css/smart_wizard_theme_circles.css" rel="stylesheet" type="text/css" />
    <link href="boostrap2/dist/css/smart_wizard_theme_arrows.css" rel="stylesheet" type="text/css" />
    <link href="boostrap2/dist/css/smart_wizard_theme_dots.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
      .nonaktiv{
        pointer-events: none;
      }
    </style>
</head>
<body>
 
<!-- partial:index.partial.html -->

<!-- <nav class="navbar navbar-light bg-light static-top">

<ul class="nav-mobile check">
  <li>CLEON</li>        
  <li class="menu-container"> 
    <input id="menu-toggle" type="checkbox">
    <label for="menu-toggle" class="menu-button">  
      <svg class="icon-open" viewBox="0 0 24 24"><path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"></path></svg>
      <svg class="icon-close" viewBox="0 0 100 100">
        <path d="M83.288 88.13c-2.114 2.112-5.575 2.112-7.69 0L53.66 66.188c-2.113-2.112-5.572-2.112-7.686 0l-21.72 21.72c-2.114 2.113-5.572 2.113-7.687 0l-4.693-4.692c-2.114-2.114-2.114-5.573 0-7.688l21.72-21.72c2.112-2.115 2.112-5.574 0-7.687L11.87 24.4c-2.114-2.113-2.114-5.57 0-7.686l4.842-4.842c2.113-2.114 5.57-2.114 7.686 0l21.72 21.72c2.114 2.113 5.572 2.113 7.688 0l21.72-21.72c2.115-2.114 5.574-2.114 7.688 0l4.695 4.695c2.112 2.113 2.112 5.57-.002 7.686l-21.72 21.72c-2.112 2.114-2.112 5.573 0 7.686L88.13 75.6c2.112 2.11 2.112 5.572 0 7.687l-4.842 4.84z"/>
      </svg> 

    </label!-->      
    <?php include 'menu_user.php'; ?>
  <!--</li>
</ul>
</nav-->

<br /><br />

 <nav class="navbar navbar-light bg-light">
  <form class="form-inline">
    <button class="btn btn-outline-success" type="button">Menara</button>
    <button class="btn btn-outline-success" type="button">Fiber Optik</button>
  </form>
</nav>
  <div class="container-fluid">

    <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Form Pengajuan</div>
          <div class="card-body">

         <div class="table-responsive">
              
               <table class="table table-bordered">
        <tr>
            <th width="5%">Nomor</th>
            <th>Nomor Surat</th>
            <th>Jenis Surat</th>
            <th>Tanggal</th>
            <th>Status Form</th>
            <th>Ajukan Ulang</th>
        </tr>

        <?php
        $no = 1;
        while($data = mysqli_fetch_assoc($query)){
        ?>
                <tr>
                  <td><p><?php echo $no++ ?>. </p></td>
                  <td><p><?php echo $data['no_surat'] ?></p></td>
                  <?php if($data['status_form']=='tidak_lengkap'){ ?>
                  <td><b><p class="text-danger">Tidak Lengkap, Silahkan Dilengkapi !</p></b></td>
                <?php } ?>
                </tr>
        <?php
            //include 'modal/modal_info_menara.php';
            }
        ?>
    </table>
  
             </div>
          </div>
        </div>

         <!-- Sticky Footer -->

    </div>
    <!-- /.content-wrapper -->


 <?php include '../modal/logoutmodal.php'; ?>

<!-- partial -->
  <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script><script  src="./script.js"></script>
   <script src="..admin/boostrap/vendor/jquery/jquery.min.js"></script>
  <script src="../admin/boostrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>