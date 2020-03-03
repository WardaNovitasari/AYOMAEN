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
  if(isset($_POST['submit'])){
    $lsperusahaan = trim($_POST['perusahaan']);
    $_SESSION['pt']=$_POST['perusahaan'];
    if($_SESSION['pt']!='all'){
      $nmperusahaan=$_SESSION['pt'];
      $sql2 = "SELECT tb_tempat_menara.lat,tb_tempat_menara.lng,tb_tempat_menara.id_tempat,tb_tempat_menara.alamat, tb_tempat_menara.status_tempat FROM tb_perusahaan JOIN tb_form_menara ON tb_perusahaan.id_perusahaan=tb_form_menara.id_perusahaan JOIN tb_tempat_menara ON tb_form_menara.id_form=tb_tempat_menara.id_form WHERE tb_perusahaan.nm_perusahaan='$nmperusahaan'";
      $sql3 = "SELECT tb_tempat_fiber.lat,tb_tempat_fiber.lng,tb_tempat_fiber.id_tempat,tb_tempat_fiber.alamat, tb_tempat_fiber.status_tempat FROM tb_perusahaan JOIN tb_form_fiber ON tb_perusahaan.id_perusahaan=tb_form_fiber.id_perusahaan JOIN tb_tempat_fiber ON tb_form_fiber.id_form=tb_tempat_fiber.id_form WHERE tb_perusahaan.nm_perusahaan='$nmperusahaan'";
      $result2=mysqli_query($config,$sql2);
      $result3=mysqli_query($config,$sql3);
      $numb1 = mysqli_num_rows($result2);
      $numb2 = mysqli_num_rows($result3);
    }else{
     $sql2 = "SELECT tb_tempat_menara.lat,tb_tempat_menara.lng,tb_tempat_menara.id_tempat,tb_tempat_menara.alamat, tb_tempat_menara.status_tempat FROM tb_perusahaan JOIN tb_form_menara ON tb_perusahaan.id_perusahaan=tb_form_menara.id_perusahaan JOIN tb_tempat_menara ON tb_form_menara.id_form=tb_tempat_menara.id_form";
      $sql3 = "SELECT tb_tempat_fiber.lat,tb_tempat_fiber.lng,tb_tempat_fiber.id_tempat,tb_tempat_fiber.alamat, tb_tempat_fiber.status_tempat FROM tb_perusahaan JOIN tb_form_fiber ON tb_perusahaan.id_perusahaan=tb_form_fiber.id_perusahaan JOIN tb_tempat_fiber ON tb_form_fiber.id_form=tb_tempat_fiber.id_form";
      $result2=mysqli_query($config,$sql2);
      $result3=mysqli_query($config,$sql3);
      $numb1 = mysqli_num_rows($result2);
      $numb2 = mysqli_num_rows($result3);
    }
  } else {
    $sql2 = "SELECT tb_tempat_menara.lat,tb_tempat_menara.lng,tb_tempat_menara.id_tempat,tb_tempat_menara.alamat, tb_tempat_menara.status_tempat FROM tb_tempat_menara join tb_form_menara ON tb_tempat_menara.id_form=tb_form_menara.id_form";
    $sql3 = "SELECT tb_tempat_fiber.lat,tb_tempat_fiber.lng,tb_tempat_fiber.id_tempat,tb_tempat_fiber.alamat, tb_tempat_fiber.status_tempat FROM tb_tempat_fiber join tb_form_fiber ON tb_tempat_fiber.id_form=tb_form_fiber.id_form ";
    $result2=mysqli_query($config,$sql2);
    $result3=mysqli_query($config,$sql3);
    $numb1 = mysqli_num_rows($result2);
    $numb2 = mysqli_num_rows($result3);
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
          <li class="breadcrumb-item active">Home</li>
        </ol>

       <!-- Icon Cards ketetapan -->
 <?php
  $query1 = mysqli_query($config,"SELECT * FROM tb_akun WHERE status_akun='terkirim'");
  $count1 = mysqli_num_rows($query1);

  $query2   = mysqli_query($config,"SELECT * FROM tb_form_menara JOIN tb_tempat_menara ON tb_form_menara.id_form = tb_tempat_menara.id_form WHERE tb_tempat_menara.status_tempat='pengajuan' GROUP BY tb_tempat_menara.id_form");
  $count2   = mysqli_num_rows($query2);

  $query3 = mysqli_query($config,"SELECT * FROM tb_form_fiber JOIN tb_tempat_fiber ON tb_form_fiber.id_form=tb_tempat_fiber.id_form WHERE tb_tempat_fiber.status_tempat='pengajuan' GROUP BY tb_tempat_fiber.id_form");
  $count3=mysqli_num_rows($query3);
 ?>
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-user"></i>
                </div>
                <p><i class="fas fa-user"></i> User / Perusahaan</p>
                <div class="mr-5"><?php echo($count1) ?> Pesan!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="pengajuan_akun.php">
                <span class="float-left">Lihat Detail</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-broadcast-tower"></i>
                </div>
                <p><i class="fas fa-broadcast-tower"></i> Form Menara</p>
                <div class="mr-5"><?php echo $count2; ?> Pesan!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="pengajuan_menara.php">
                <span class="float-left">Lihat Detail</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-wave-square"></i>
                </div>
                <p><i class="fas fa-wave-square"></i> Form Fiber Optik</p>
                <div class="mr-5"><?php echo $count3; ?> Pesan!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="pengajuan_fiber.php">
                <span class="float-left">Lihat Detail</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>

      <?php
      $sqlperusahaan = mysqli_query($config,"SELECT * FROM tb_perusahaan GROUP BY nm_perusahaan");
  ?>
        <div class="container-fluid">
          <p class="text-primary">(Biru) Diterima</p>
          <p class="text-danger">(Merah) Pengajuan</p>
          <form action="" method="POST">
         <div class="form-group">
        <label for="sel1">List Perusahaan:</label>
          <select class="form-control-sm" id="sel1" name="perusahaan">
          
          <option>all</option>
          <?php while($querypt = mysqli_fetch_array($sqlperusahaan)){ ?>
          <option><?php echo $querypt['nm_perusahaan']?></option>
          <?php } ?>
          
          </select>
        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
        </div>
        </form> 
        <div id="mapid"></div>
        <script>

          //variable array untuk menyimpan marker menara dan fiber optik
          var arrmenara = [];
          var arrfiber  = [];
          var menara;
          var fiberoptik;


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
          if($rows2['status_tempat']=='cetak_rekom'){
        ?>
        <script>
          var marker = L.marker([<?php echo $rows2['lat']; ?>, <?php echo $rows2['lng']; ?>],{icon : iconmenara1});
          var circle = L.circle([<?php echo $rows2['lat']; ?>, <?php echo $rows2['lng']; ?>], {
            color: 'null',
            fillColor: '#f03',
            fillOpacity: 0.3,
            radius: 250
           });
          marker.bindPopup("<b data-toggle='modal' data-target='#exampleModal<?php echo $rows2['id_tempat']; ?>' class='point'><?php echo $rows2['alamat']; ?></b>",{closeOnClick: false, autoClose: false}).openPopup();
          arrmenara.push(marker,circle);//data marker dimasukkan didalam array menara
        </script>

        <script>
              menara=L.layerGroup(arrmenara); //pembuatan
        </script>
        <?php
        $id=$rows2['id_tempat'];
        $jenis='Menara';
$menara=mysqli_query($config,"SELECT * FROM tb_tempat_menara join tb_form_menara ON tb_tempat_menara.id_form=tb_form_menara.id_form WHERE tb_tempat_menara.id_tempat='$id'");
while($quisioner=mysqli_fetch_array($menara)){
        include 'modal/modal_map.php';
      }
          }else if($rows2['status_tempat']=='pengajuan' || $rows2['status_tempat']=='proses_rekom' || $rows2['status_tempat']=='hasil_survey'){
            ?>
            <script>
          var marker = L.marker([<?php echo $rows2['lat']; ?>, <?php echo $rows2['lng']; ?>],{icon : iconmenara2});
          var circle = L.circle([<?php echo $rows2['lat']; ?>, <?php echo $rows2['lng']; ?>], {
            color: 'null',
            fillColor: '#f03',
            fillOpacity: 0.3,
            radius: 250
           });
          marker.bindPopup("<b data-toggle='modal' data-target='#exampleModal<?php echo $rows2['id_tempat']; ?>' class='point'><?php echo $rows2['alamat']; ?></b>",{closeOnClick: false, autoClose: false}).openPopup();
          arrmenara.push(marker,circle);//data marker dimasukkan didalam array menara
        </script>

        <script>
              menara=L.layerGroup(arrmenara); //pembuatan
        </script>
        <?php
        $id=$rows2['id_tempat'];
        $jenis='Menara';
$menara=mysqli_query($config,"SELECT * FROM tb_tempat_menara join tb_form_menara ON tb_tempat_menara.id_form=tb_form_menara.id_form WHERE tb_tempat_menara.id_tempat='$id'");
while($quisioner=mysqli_fetch_array($menara)){
        include 'modal/modal_map.php';
      }
          }else{
            continue;
          }
        }
        ?>

<!-- pengambilan data fiber optik dan ditampilkan di map -->
<?php while($rows3=mysqli_fetch_array($result3)){
        if($rows3['status_tempat']=='cetak_rekom'){   
        ?>
        <script>
          var marker = L.marker([<?php echo $rows3['lat']; ?>, <?php echo $rows3['lng']; ?>], {icon: iconfiber1});
          var circle = L.circle([<?php echo $rows3['lat']; ?>, <?php echo $rows3['lng']; ?>], {
            color: 'null',
            fillColor: '#000',
            fillOpacity: 0.3,
            radius: 250
           });
          marker.bindPopup("<b data-toggle='modal' data-target='#exampleModal1<?php echo $rows3['id_tempat']; ?>' class='point'><?php echo $rows3['alamat']; ?></b>",{closeOnClick: false, autoClose: false}).openPopup();
          arrfiber.push(marker,circle);
        </script>
        <script>
              fiberoptik=L.layerGroup(arrfiber); //pembuatan
        </script>
        <?php
         $id=$rows3['id_tempat'];
        $jenis='Fiber Optik';
          $fo=mysqli_query($config,"SELECT * FROM tb_tempat_fiber join tb_form_fiber ON tb_tempat_fiber.id_form=tb_form_fiber.id_form WHERE tb_tempat_fiber.id_tempat='$id'");
          while($quisioner=mysqli_fetch_array($fo)){
        include 'modal/modal_map_fo.php';
      }
    }else if($rows3['status_tempat']=='pengajuan' || $rows3['status_tempat']=='proses_rekom' || $rows3['status_tempat']=='hasil_survey'){
      ?>
      <script>
          var marker = L.marker([<?php echo $rows3['lat']; ?>, <?php echo $rows3['lng']; ?>], {icon: iconfiber2});
          var circle = L.circle([<?php echo $rows3['lat']; ?>, <?php echo $rows3['lng']; ?>], {
            color: 'null',
            fillColor: '#000',
            fillOpacity: 0.3,
            radius: 250
           });
          marker.bindPopup("<b data-toggle='modal' data-target='#exampleModal1<?php echo $rows3['id_tempat']; ?>' class='point'><?php echo $rows3['alamat']; ?></b>",{closeOnClick: false, autoClose: false}).openPopup();
          arrfiber.push(marker,circle);
        </script>
        <script>
              fiberoptik=L.layerGroup(arrfiber); //pembuatan
        </script>
        <?php
         $id=$rows3['id_tempat'];
        $jenis='Fiber Optik';
          $fo=mysqli_query($config,"SELECT * FROM tb_tempat_fiber join tb_form_fiber ON tb_tempat_fiber.id_form=tb_form_fiber.id_form WHERE tb_tempat_fiber.id_tempat='$id'");
          while($quisioner=mysqli_fetch_array($fo)){
        include 'modal/modal_map_fo.php';
      }
    }else{
      continue;
    }
      }
        ?>

        <script>
          if(menara != null && fiberoptik != null){
            var overlayMaps= {
              "Menara": menara,
                "Fiber Optik": fiberoptik
            };
             L.control.layers(null,overlayMaps).addTo(map);
          }else if(fiberoptik != null && menara == null){
            var overlayMaps= {
              "Fiber Optik": fiberoptik
            };
             L.control.layers(null,overlayMaps).addTo(map);
          }else if(menara != null && fiberoptik == null){
              var overlayMaps = {
                "Menara": menara
              };
               L.control.layers(null,overlayMaps).addTo(map);
          }
           
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
