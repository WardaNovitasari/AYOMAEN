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
  <link rel="stylesheet" href="../leaflet/leaflet.css">
   <script src="../leaflet/leaflet.js"></script>

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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="boostrap/dist/style.css">
  <link href="../admin/boostrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
 <link href='https://fonts.googleapis.com/css?family=Alegreya+Sans:300,400|Source+Sans+Pro:400,300' rel='stylesheet' type='text/css'><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

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

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>

        <div class="container-fluid">
          <p class="text-primary">(Biru) Tidak Aktif</p>
          <p class="text-danger">(Merah) Aktif</p>
        <div id="mapid"></div>
        <script>
          //variable array untuk menyimpan marker menara dan fiber optik
          
           // variable icon untuk menara
           var iconmenara1 = L.icon({
            iconUrl : '../admin/boostrap/leaflet/images/fiber1.png',
            iconSize : [32, 40],
          });

          var iconmenara2 = L.icon({
            iconUrl : '../admin/boostrap/leaflet/images/fiber2.png',
            iconSize : [32, 40],
          });
          //variable map
          var map = L.map('mapid').setView([-7.872954, 110.1440841], 8);
          L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
          attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
          maxZoom: 18,
          id: 'mapbox.streets',
          accessToken: 'pk.eyJ1IjoicnJhYWlzcyIsImEiOiJjanpqcTJiNnUwYmpmM2xxbTRvcDh4MHp6In0.dU85N2s7PoKfLpUSARQUYQ'
          }).addTo(map);
        </script>
        <!--Pengambilan data menara dan ditampilkan di map -->
        <?php
        $query = mysqli_query($config,"SELECT * FROM tb_tempat_fiber JOIN tb_form_fiber ON tb_tempat_fiber.id_form=tb_form_fiber.id_form JOIN tb_perusahaan ON tb_form_fiber.id_perusahaan = tb_perusahaan.id_perusahaan WHERE tb_perusahaan.nm_perusahaan = '$perusahaan'");
        while ($result = mysqli_fetch_array($query)){
            if($result['status_tempat']=='cetak_rekom'){
        ?>
           <script>
          var marker = L.marker([<?php echo $result['lat']; ?>, <?php echo $result['lng']; ?>],{icon : iconmenara1}).addTo(map);
          var circle = L.circle([<?php echo $result['lat']; ?>, <?php echo $result['lng']; ?>], {
            color: 'null',
            fillColor: '#f03',
            fillOpacity: 0.3,
            radius: 250
           }).addTo(map);
          marker.bindPopup("<b data-toggle='modal' data-target='#exampleModal1<?php echo $result['id_tempat']; ?>' class='point'><?php echo $result['site_id']; ?></b>",{closeOnClick: false, autoClose: false}).openPopup();
        </script>
        <?php
        $id=$result['id_tempat'];
        $jenis='Fiber Optik';
$menara=mysqli_query($config,"SELECT * FROM tb_tempat_fiber join tb_form_fiber ON tb_tempat_fiber.id_form=tb_form_fiber.id_form WHERE tb_tempat_fiber.id_tempat='$id'");
while($quisioner=mysqli_fetch_array($menara)){
        include '../admin/modal/modal_map_fo.php';
      }
        }else if($result['status_tempat']=='pengajuan' || $result['status_tempat']=='proses_rekom' || $result['status_tempat']=='hasil_survey'){
            ?>
            <script>
          var marker = L.marker([<?php echo $result['lat']; ?>, <?php echo $result['lng']; ?>],{icon : iconmenara2}).addTo(map);
          var circle = L.circle([<?php echo $result['lat']; ?>, <?php echo $result['lng']; ?>], {
            color: 'null',
            fillColor: '#f03',
            fillOpacity: 0.3,
            radius: 250
           }).addTo(map);
          marker.bindPopup("<b data-toggle='modal' data-target='#exampleModal1<?php echo $result['id_tempat']; ?>' class='point'><?php echo $result['alamat']; ?></b>",{closeOnClick: false, autoClose: false}).openPopup();
        </script>
        <?php
        $id=$result['id_tempat'];
        $jenis='Fiber Optik';
$menara=mysqli_query($config,"SELECT * FROM tb_tempat_fiber join tb_form_fiber ON tb_tempat_fiber.id_form=tb_form_fiber.id_form WHERE tb_tempat_fiber.id_tempat='$id'");
while($quisioner=mysqli_fetch_array($menara)){
        include '../admin/modal/modal_map_fo.php';
      }
          }else{
            continue;
          }
        }
        ?>
       

<hr />

 <?php include '../modal/logoutmodal.php'; ?>
<!-- partial -->
  <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script><script  src="./script.js"></script>
   <script src="..admin/boostrap/vendor/jquery/jquery.min.js"></script>
  <script src="../admin/boostrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>