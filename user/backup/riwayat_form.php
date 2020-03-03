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
  $form1 = mysqli_query($config,"SELECT * FROM tb_akun JOIN tb_form_menara ON tb_akun.id_akun=tb_form_menara.id_akun JOIN download ON tb_form_menara.id_form=download.id_form WHERE tb_akun.username='$username' AND tb_form_menara.status='terkirim' OR tb_form_menara.status='ditolak'");
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
</head>
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

  <div class="container">

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
              <th colspan="3"><center>Aksi</center></th>
            </tr>
          </thead>
          <tbody>
            <?php
              $nomor=1;
              while($rowsPer1=mysqli_fetch_array($form1)){
                $tgl_pengajuan=date('d F Y', strtotime($rowsPer1['tgl_pengajuan']));
                if($rowsPer1['tgl_disetujui']=='0000-00-00 00:00:00'){
                  $tgl_disetujui='data belum disetujui';
                }else{
                $tgl_disetujui=date('d F Y',strtotime($rowsPer1['tgl_disetujui']));
                }
                ?>
            <tr>
              <td><center><?php echo $nomor; ?></center></td>
              <td><center><a href="riwayat.php?id=<?php echo $rowsPer1['id_form']; ?>"><?php echo $rowsPer1['id_form']; ?></a></center></td>
              <td><?php echo '<a href="'.$rowsPer1['file'].'">'.$rowsPer1['nama_file'].'</a>' ?></td>
              <td><center><?php echo $rowsPer1['status'];?></center></td>
              <td><center><?php echo $tgl_pengajuan; ?></center></td>
              <td><center><?php echo $tgl_disetujui; ?></center></td>
              <td><a href="../aksi/user/aksi_kirim_menara.php?id=<?php echo $rowsPer1['id_form'] ?>" class="btn btn-success btn-sm" title="kirim"><i class="fas fa-envelope"></i></a></td>
              <td><a href="#" class="btn btn-primary btn-sm" title="edit"><i class="fas fa-pen"></i></a></td>
              <td><a href="#" class="btn btn-danger btn-sm" title="hapus"><i class="fas fa-trash"></i></a></td>
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
            var btnFinish = $('<button></button>').text('Finish')
                                             .addClass('btn btn-info')
                                             .on('click', function(){ alert('Finish Clicked'); });
            var btnCancel = $('<button></button>').text('Cancel')
                                             .addClass('btn btn-danger')
                                             .on('click', function(){ $('#smartwizard').smartWizard("reset"); });

            // Please note enabling option "showStepURLhash" will make navigation conflict for multiple wizard in a page.
            // so that option is disabling => showStepURLhash: false

            // Smart Wizard 1
            $('#smartwizard').smartWizard({
                    selected: 0,
                    theme: 'arrows',
                    transitionEffect:'fade',
                    showStepURLhash: false,
                    toolbarSettings: {toolbarPosition: 'both',
                                      toolbarExtraButtons: [btnFinish, btnCancel]
                                    }
            });
        });
    </script>

</body>
</html>