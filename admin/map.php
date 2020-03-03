<?php
 include '../koneksi/koneksi.php';
 ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

session_start();
  if(empty($_SESSION['username'])){
    header("location:../login.php");
  }elseif($_SESSION['status']!='admin'){
    header("location:../404.html");
  }
  $id_tempat1 = $_GET['id1'];
  $id_tempat2 = $_GET['id2'];
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'view/head.php'; ?>
<body id="page-top">

<?php include 'view/navbar.php'; ?>

  <div id="wrapper">

    <?php include 'view/sidebar.php'; ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Home</li>
        </ol>
        <div class="container-fluid">
          <p class="text-primary">(Biru) Aktif</p>
          <p class="text-danger">(Merah) Tidak Aktif</p>
        <div id="mapid"></div>
        <script>
          // variable icon untuk fiber optik
          var iconfiber1 = L.icon({
            iconUrl : 'boostrap/leaflet/images/fiber1.png',
            iconSize : [32, 40],
          });

          var iconfiber2 = L.icon({
            iconUrl : 'boostrap/leaflet/images/fiber2.png',
            iconSize : [32, 40],
          });
          // variable icon untuk menara
           var iconmenara1 = L.icon({
            iconUrl : 'boostrap/leaflet/images/menara1.png',
            iconSize : [32, 40],
          });

          var iconmenara2 = L.icon({
            iconUrl : 'boostrap/leaflet/images/menara2.png',
            iconSize : [32, 40],
          });
          //variable map
          var map = L.map('mapid').setView([-7.872910, 110.1440841], 13);
          L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
          attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
          maxZoom: 18,
          id: 'mapbox.streets',
          accessToken: 'pk.eyJ1IjoicnJhYWlzcyIsImEiOiJjanpqcTJiNnUwYmpmM2xxbTRvcDh4MHp6In0.dU85N2s7PoKfLpUSARQUYQ'
          }).addTo(map);
        </script>


        <!--Pengambilan data menara dan ditampilkan di map -->
        <?php
  $result2 = mysqli_query($config,"SELECT * FROM tb_tempat_menara WHERE id_tempat = '$id_tempat1' AND status_tempat='cetak_rekom'");
   while($rows2=mysqli_fetch_array($result2)){
        ?>
        <script>
          var marker = L.marker([<?php echo $rows2['lat']; ?>, <?php echo $rows2['lng']; ?>],{icon : iconmenara1}).addTo(map);
          var circle = L.circle([<?php echo $rows2['lat']; ?>, <?php echo $rows2['lng']; ?>], {
            color: 'null',
            fillColor: '#f03',
            fillOpacity: 0.3,
            radius: 250
           }).addTo(map);
          marker.bindPopup("<b data-toggle='modal' data-target='#exampleModal<?php echo $rows2['id_tempat']; ?>' class='point'><?php echo $rows2['alamat']; ?></b>",{closeOnClick: false, autoClose: false}).openPopup();
        </script>
        <?php
        $id=$rows2['id_tempat'];
        $jenis='Menara';
$menara=mysqli_query($config,"SELECT * FROM tb_tempat_menara join tb_form_menara ON tb_tempat_menara.id_form=tb_form_menara.id_form WHERE tb_tempat_menara.id_tempat='$id'");
while($quisioner=mysqli_fetch_array($menara)){
        include 'modal/modal_map.php';
      }
        }
        ?>
        <?php
  $result2 = mysqli_query($config,"SELECT * FROM tb_tempat_menara WHERE id_tempat = '$id_tempat2'");
   while($rows2=mysqli_fetch_array($result2)){
        ?>
        <script>
          var marker = L.marker([<?php echo $rows2['lat']; ?>, <?php echo $rows2['lng']; ?>],{icon : iconmenara1}).addTo(map);
          marker.bindPopup("<b data-toggle='modal' data-target='#exampleModal<?php echo $rows2['id_tempat']; ?>' class='point'><?php echo $rows2['alamat']; ?></b>",{closeOnClick: false, autoClose: false}).openPopup();
        </script>
        <?php
        $id=$rows2['id_tempat'];
        $jenis='Menara';
$menara=mysqli_query($config,"SELECT * FROM tb_tempat_menara join tb_form_menara ON tb_tempat_menara.id_form=tb_form_menara.id_form WHERE tb_tempat_menara.id_tempat='$id'");
while($quisioner=mysqli_fetch_array($menara)){
        include 'modal/modal_map.php';
      }
        }
        ?>



      
      </div>
      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <?php include 'view/footer.php'; ?>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <?php include 'view/scroll.php'; ?>

  <!-- Logout Modal-->
  <?php include 'modal/logoutmodal.php' ?>


  <!-- Bootstrap core JavaScript-->
 <?php include 'view/script.php'; ?>
 <!--<script>
     $('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var recipient = button.data('isi')
    var modal = $(this)
    modal.find('.modal-title').text('Submit Masukan Paket  ' + recipient)
    modal.find('<?php //echo $id ?>').val(recipient)
  })
  </script>-->



</body>

</html>
