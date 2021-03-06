<?php include '../koneksi/koneksi.php';
session_start();
  if(empty($_SESSION['username'])){
    header("location:../login.php");
  }elseif($_SESSION['status']!=1){
    header("location:../404.html");
  }
  $nonaktiv = mysqli_query($config,"SELECT * FROM tb_user WHERE status=0");
  $count    = mysqli_num_rows($nonaktiv);
  $tempat   = mysqli_query($config,"SELECT * FROM tb_tempat");
  $count2   = mysqli_num_rows($tempat);
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
          <li class="breadcrumb-item active">Overview</li>
        </ol>

       <?php include 'view/iconcards.php'; ?>
       <?php
    $sql2 = "SELECT * FROM `tb_tempat`";
    $result2=mysqli_query($config,$sql2);
    
  ?>
        <div class="container-fluid">
          <p class="text-primary">(Biru) Tidak Aktif</p>
          <p class="text-danger">(Merah) Aktif</p>
        <div id="mapid"></div>
        <script>
          var map = L.map('mapid').setView([-7.872954, 110.1440841], 8);
          L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
          attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
          maxZoom: 18,
          id: 'mapbox.streets',
          accessToken: 'pk.eyJ1IjoicnJhYWlzcyIsImEiOiJjanpqcTJiNnUwYmpmM2xxbTRvcDh4MHp6In0.dU85N2s7PoKfLpUSARQUYQ'
          }).addTo(map);
        </script>
        <?php while($rows2=mysqli_fetch_array($result2)){
        if($rows2['status']=='disetujui'){
        ?>
        <script>
          var marker = L.marker([<?php echo $rows2['lat']; ?>, <?php echo $rows2['lng']; ?>]).addTo(map);
          var circle = L.circle([<?php echo $rows2['lat']; ?>, <?php echo $rows2['lng']; ?>], {
            color: 'null',
            fillColor: '#f03',
            fillOpacity: 0.3,
            radius: 2500
           }).addTo(map);
          marker.bindPopup("<b><?php echo $rows2['nama_tempat']; ?></b>",{closeOnClick: false, autoClose: false}).openPopup();
        </script>
        <?php
        }else{
          ?>
           <script>
          var marker = L.marker([<?php echo $rows2['lat']; ?>, <?php echo $rows2['lng']; ?>]).addTo(map);
          var circle = L.circle([<?php echo $rows2['lat']; ?>, <?php echo $rows2['lng']; ?>], {
            color: 'null',
            fillColor: '#200599',
            fillOpacity: 0.3,
            radius: 2500
           }).addTo(map);
          marker.bindPopup("<b><?php echo $rows2['nama_tempat']; ?></b>",{closeOnClick: false, autoClose: false}).openPopup();
        </script>
          <?php 
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
