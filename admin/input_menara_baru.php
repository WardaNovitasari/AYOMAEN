<?php
include '../koneksi/koneksi.php';

session_start();
  if(empty($_SESSION['username'])){
    header("location:../login.php");
  }elseif($_SESSION['status']!='admin'){
    header("location:../404.html");
  }

?>
<html lang="en" >
<head>
   <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SI PERMEN - Input Menara Baru</title>
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
    </label>  -->     
   
  <!-- </li>
</ul>
</nav> -->
<br /><br />

  <div class="container">
    <p><a href="pengajuan_menara.php" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a></p><br>
 <form action="../aksi/admin/aksi_input_menara_baru.php" class="was-validated" method="POST">
  <input type="hidden" name="id_tempat" value="<?php echo $id_tempat ?>">
  <div class="form-group">
    <label for="uname">Nomor Site ID :</label>
    <input type="text" class="form-control" id="nositeid" placeholder="Nomor Site ID" name="nositeid" required="">
     </div>
  <div class="form-group">
    <label for="alamat">Alamat :</label>
    <input type="text" class="form-control" id="alamat" placeholder="Alamat" name="alamat" required="">
  </div>
  <div class="form-group">
    <label for="alamat">Kelurahan :</label>
    <input type="text" class="form-control" id="kelurahan" placeholder="Kelurahan" name="kelurahan" required="">
  </div>
  <div class="form-group">
    <label for="alamat">Kecamatan :</label>
    <input type="text" class="form-control" id="kecamatan" placeholder="Kecamatan" name="kecamatan" required="">
  </div>
  <div class="form-group">
    <label for="alamat">Lattitude :</label>
    <input type="text" class="form-control" id="lattitude" placeholder="Lattitude" name="lat" required="">
  </div>
  <div class="form-group">
    <label for="alamat">Longtitude :</label>
    <input type="text" class="form-control" id="long" placeholder="Longtitude" name="long" required="">
  </div>
  <div class="form-group">
    <label for="alamat">Tipe Menara :</label>
    <input type="text" class="form-control" id="tipe_menara" placeholder="Tipe Menara" name="tipe_menara" required="">
  </div>
  <div class="form-group">
    <label for="alamat">Tinggi :</label>
    <input type="text" class="form-control" id="tinggi" placeholder="Tinggi" name="tinggi" required="">
  </div>
  <button type="submit" class="btn btn-primary" name="update" onclick="return confirm('Apakah Data Sudah Benar ?')">Submit</button>
</form> 

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
