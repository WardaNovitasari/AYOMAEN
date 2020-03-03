<?php
 include '../koneksi/koneksi.php';
session_start();
  if(empty($_SESSION['username'])){
    header("location:../login.php");
  }elseif($_SESSION['status']!='admin'){
    header("location:../404.html");
  }
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
    $sql2 = "SELECT tb_tempat_menara.lat,tb_tempat_menara.lng,tb_tempat_menara.id_tempat,tb_tempat_menara.alamat FROM tb_tempat_menara join tb_form_menara ON tb_tempat_menara.id_form=tb_form_menara.id_form";
    $sql3 = "SELECT tb_tempat_fiber.lat,tb_tempat_fiber.lng,tb_tempat_fiber.id_tempat,tb_tempat_fiber.alamat FROM tb_tempat_fiber join tb_form_fiber ON tb_tempat_fiber.id_form=tb_form_fiber.id_form ";
    $result2=mysqli_query($config,$sql2);
    $result3=mysqli_query($config,$sql3);
  ?>
        <div class="container-fluid">
          <p class="text-primary">(Biru) Tidak Aktif</p>
          <p class="text-danger">(Merah) Aktif</p>
        <div id="mapid"></div>
        <script>
          //variable array untuk menyimpan marker menara dan fiber optik
          var arrmenara = [];
          var arrfiber  = [];
          //variabel icon untuk icon fiber optik
          var myIcon = L.icon({
              iconUrl: 'boostrap/leaflet/images/menarafo.png',
               iconSize: [32, 40], // size of the icon
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
        <?php while($rows2=mysqli_fetch_array($result2)){
        ?>
        <script>
          var marker = L.marker([<?php echo $rows2['lat']; ?>, <?php echo $rows2['lng']; ?>]);
          var circle = L.circle([<?php echo $rows2['lat']; ?>, <?php echo $rows2['lng']; ?>], {
            color: 'null',
            fillColor: '#f03',
            fillOpacity: 0.3,
            radius: 250
           }).addTo(map);
          marker.bindPopup("<b data-toggle='modal' data-target='#exampleModal<?php echo $rows2['id']; ?>' class='point'><?php echo $rows2['nama_tempat']; ?></b>",{closeOnClick: false, autoClose: false}).openPopup();
          arrmenara.push(marker);//data marker dimasukkan didalam array menara
        </script>

        <script>
              var menara=L.layerGroup(arrmenara); //pembuatan
        </script>
        <?php
        $id=$rows2['id_tempat'];
        $jenis='Menara';
$menara=mysqli_query($config,"SELECT * FROM tb_tempat_menara join tb_form_menara ON tb_tempat_menara.id_form=tb_form_menara.id_form WHERE tb_tempat_menara.id_form='$id'");
while($quisioner=mysqli_fetch_array($menara)){
        include 'modal/modal_map.php';
      }
          }
        ?>

        


<!-- pengambilan data fiber optik dan ditampilkan di map -->
<?php while($rows3=mysqli_fetch_array($result3)){
        if($rows3['status']=='disetujui'){
        ?>
        <script>
          var marker = L.marker([<?php echo $rows3['lat']; ?>, <?php echo $rows3['lng']; ?>], {icon: myIcon});
          var circle = L.circle([<?php echo $rows3['lat']; ?>, <?php echo $rows3['lng']; ?>], {
            color: 'null',
            fillColor: '#000',
            fillOpacity: 0.3,
            radius: 250
           }).addTo(map);
          marker.bindPopup("<b data-toggle='modal' data-target='#exampleModal1<?php echo $rows3['id']; ?>' class='point'><?php echo $rows3['nama_tempat']; ?></b>",{closeOnClick: false, autoClose: false}).openPopup();
          arrfiber.push(marker);
        </script>
        <?php
        }else{
          ?>
           <script>

          var marker = L.marker([<?php echo $rows3['lat']; ?>, <?php echo $rows3['lng']; ?>], {icon: myIcon});
          var circle = L.circle([<?php echo $rows3['lat']; ?>, <?php echo $rows3['lng']; ?>], {
            color: 'null',
            fillColor: '#fff',
            fillOpacity: 0.3,
            radius: 250
           }).addTo(map);
          marker.bindPopup("<b data-toggle='modal' data-target='#exampleModal1<?php echo $rows3['id']; ?>' class='point'><?php echo $rows3['nama_tempat']; ?></b>",{closeOnClick: false, autoClose: false}).openPopup();
          arrfiber.push(marker);
        </script>
          <?php 
        } 
        ?>
        <script>
              var fiberoptik=L.layerGroup(arrfiber); //pembuatan
        </script>
        <?php
         $id=$rows3['id'];
        $jenis='Fiber Optik';
          $fo=mysqli_query($config,"SELECT * FROM tb_tempat_fo join tb_form_fiber ON tb_tempat_fo.id_form=tb_form_fiber.id_form WHERE tb_tempat_fo.id='$id'");
          while($quisioner=mysqli_fetch_array($fo)){
        include 'modal/modal_map_fo.php';
      }
          }
        ?>

        <script>
           var overlayMaps = {
          "Menara": menara,
          "Fiber Optik": fiberoptik
          };
            L.control.layers(null,overlayMaps).addTo(map);
        </script>
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
