<?php
include '../koneksi/koneksi.php';

session_start();
  if(empty($_SESSION['username'])){
    header("location:../login.php");
  }elseif($_SESSION['status']!='admin'){
    header("location:../404.html");
  }

  if (isset($_GET['id'])) {
    $idform = $_GET['id'];
    # code...
  }
  elseif (isset($_POST['submit'])) {
    $id_form = $_POST['id_form'];
    $siteid = $_POST['nositeid'];
    $alamat = $_POST['alamat'];
    $kelurahan = $_POST['kelurahan'];
    $kecamatan = $_POST['kecamatan'];
    $lat = $_POST['lat'];
    $long = $_POST['long'];
    $tipe_menara = $_POST['tipe_menara'];
    $tinggi = $_POST['tinggi'];
    $query = mysqli_query($config, "INSERT INTO tb_tempat_menara VALUES('','$id_form','','$siteid','$alamat','$kelurahan','$kecamatan','$lat','$long','','','$tipe_menara','','$tinggi','proses_survey','','','','','','')");
    # code...
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
 

<br /><br />

  <div class="container">
    <p><a href="pengajuan_menara.php" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a></p><br>
 <form action="input_menara_baru.php" class="was-validated" method="POST">
  <input type="hidden" name="id_form" value="<?php echo $idform ?>">
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
  <button type="submit" class="btn btn-primary" name="submit" onclick="return confirm('Apakah Data Sudah Benar ?')">Submit</button>
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
