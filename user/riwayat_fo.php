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

  $step3 = mysqli_query($config,"SELECT * FROM tb_tempat_fiber JOIN tb_form_fiber ON tb_tempat_fiber.id_form=tb_form_fiber.id_form JOIN tb_perusahaan ON tb_form_fiber.id_perusahaan=tb_perusahaan.id_perusahaan JOIN tb_akun ON tb_perusahaan.id_akun=tb_akun.id_akun WHERE tb_akun.username='$username' AND tb_perusahaan.nm_perusahaan='$perusahaan' AND tb_tempat_fiber.status_tempat='pengajuan' OR tb_akun.username='$username' AND tb_perusahaan.nm_perusahaan='$perusahaan' AND tb_tempat_fiber.status_tempat='belum_dikirim' OR tb_akun.username='$username' AND tb_perusahaan.nm_perusahaan='$perusahaan' AND tb_tempat_fiber.status_tempat='ditolak' ORDER BY tb_tempat_fiber.status_tempat DESC");
  $count3 = mysqli_num_rows($step3);

 $step4 = mysqli_query($config,"SELECT * FROM tb_tempat_fiber JOIN tb_form_fiber ON tb_tempat_fiber.id_form=tb_form_fiber.id_form JOIN tb_perusahaan ON tb_form_fiber.id_perusahaan=tb_perusahaan.id_perusahaan JOIN tb_akun ON tb_perusahaan.id_akun=tb_akun.id_akun WHERE tb_akun.username='$username' AND tb_perusahaan.nm_perusahaan='$perusahaan' AND tb_tempat_fiber.status_tempat='hasil_survey' ORDER BY tb_tempat_fiber.status_tempat DESC");
  $count4 = mysqli_num_rows($step4);

  $step5 = mysqli_query($config,"SELECT * FROM tb_tempat_fiber JOIN tb_form_fiber ON tb_tempat_fiber.id_form=tb_form_fiber.id_form JOIN tb_perusahaan ON tb_form_fiber.id_perusahaan=tb_perusahaan.id_perusahaan JOIN tb_akun ON tb_perusahaan.id_akun=tb_akun.id_akun WHERE tb_akun.username='$username' AND tb_perusahaan.nm_perusahaan='$perusahaan' AND tb_tempat_fiber.status_tempat='proses_rekom'");
  $count5 = mysqli_num_rows($step5);

   $step6 = mysqli_query($config,"SELECT * FROM tb_tempat_fiber JOIN tb_form_fiber ON tb_tempat_fiber.id_form=tb_form_fiber.id_form JOIN tb_perusahaan ON tb_form_fiber.id_perusahaan=tb_perusahaan.id_perusahaan JOIN tb_akun ON tb_perusahaan.id_akun=tb_akun.id_akun WHERE tb_akun.username='$username' AND tb_perusahaan.nm_perusahaan='$perusahaan' AND tb_tempat_fiber.status_tempat='cetak_rekom'");
  $count6 = mysqli_num_rows($step6);


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

  <title>Admin - Cleon</title>

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
<nav class="navbar navbar-light bg-light static-top">
<ul class="nav-mobile check">
  <li>CLEON</li>        
  <li class="menu-container"> 
    <input id="menu-toggle" type="checkbox">
    <label for="menu-toggle" class="menu-button">  
      <svg class="icon-open" viewBox="0 0 24 24"><path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"></path></svg>
      <svg class="icon-close" viewBox="0 0 100 100">
        <path d="M83.288 88.13c-2.114 2.112-5.575 2.112-7.69 0L53.66 66.188c-2.113-2.112-5.572-2.112-7.686 0l-21.72 21.72c-2.114 2.113-5.572 2.113-7.687 0l-4.693-4.692c-2.114-2.114-2.114-5.573 0-7.688l21.72-21.72c2.112-2.115 2.112-5.574 0-7.687L11.87 24.4c-2.114-2.113-2.114-5.57 0-7.686l4.842-4.842c2.113-2.114 5.57-2.114 7.686 0l21.72 21.72c2.114 2.113 5.572 2.113 7.688 0l21.72-21.72c2.115-2.114 5.574-2.114 7.688 0l4.695 4.695c2.112 2.113 2.112 5.57-.002 7.686l-21.72 21.72c-2.112 2.114-2.112 5.573 0 7.686L88.13 75.6c2.112 2.11 2.112 5.572 0 7.687l-4.842 4.84z"/>
      </svg> 
    </label>      
    <?php include 'menu_user2.php'; ?>
  </li>
</ul>
</nav>
<br /><br />

  <div class="container-fluid">

        <!-- SmartWizard 1 html -->
        <div id="smartwizard">
            <ul>
                <li><a href="#step-1"><span class="badge badge-success"><?php echo $count3; ?></span> Step 1<br /><small>Pengajuan Tempat</small></a></li>
                <li><a href="#step-2"> <span class="badge badge-primary"><?php echo $count4; ?></span>Step 2<br /><small>Hasil Survey</small></a></li>
                <li><a href="#step-3"> <span class="badge badge-info"><?php echo $count5; ?></span>Step 3<br /><small>Proses Rekom</small></a></li>
                <li><a href="#step-4"> <span class="badge badge-info"><?php echo $count6; ?></span>Step 4<br /><small>Cetak Rekom</small></a></li>
            </ul>

            <div>
                <div id="step-1" class="">
                    <?php include 'riwayat/pengajuan.php'; ?>
                </div>
                <div id="step-2" class="">
                    <?php include 'riwayat/hasil_survey.php'; ?>
                </div>
                <div id="step-3" class="">
                  <?php include 'riwayat/proses_rekom.php'; ?>
                </div>
                <div id="step-4" class="">
                  <?php include 'riwayat/cetak_rekom.php'; ?>
                </div>
            </div>
        </div>

        <br />
    </div>

 <?php include '../modal/logoutmodal.php'; ?>
<!-- partial -->
  <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script><script  src="./script.js"></script>
   <script src="..admin/boostrap/vendor/jquery/jquery.min.js"></script>
  <script src="../admin/boostrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="boostrap2/dist/js/jquery.smartWizard.min.js"></script>
  <script type="text/javascript">
        $(document).ready(function(){

            // Step show event
            $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection, stepPosition) {
               //alert("You are on step "+stepNumber+" now");
               if(stepPosition === 'first'){
                   $("#prev-btn").addClass('disabled');
               }else if(stepPosition === 'final'){
                   $("#next-btn").addClass('disabled');
               }else{
                   $("#prev-btn").removeClass('disabled');
                   $("#next-btn").removeClass('disabled');
               }
            });

            // Toolbar extra buttons

            // Please note enabling option "showStepURLhash" will make navigation conflict for multiple wizard in a page.
            // so that option is disabling => showStepURLhash: false

            // Smart Wizard 1
            $('#smartwizard').smartWizard({
                    selected: 0,
                    theme: 'arrows',
                    transitionEffect:'fade',
                    showStepURLhash: false,
            });
        });
    </script>
    <script>
    function pilih(pilih){
      var cek = document.getElementsByName("cek[]");
      var jml = cek.length;
      
      for(var i=0; i<jml ; i++){
          cek[i].checked=pilih.checked;
        }
      }
    </script>

</body>
</html>