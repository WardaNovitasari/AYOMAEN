<?php
$id=$_GET['id']; 
include '../koneksi/koneksi.php';
session_start();
  if(empty($_SESSION['username'])){
    header("location:../login.php");
  }elseif($_SESSION['status']!=1){
    header("location:../404.html");
  }
  $nonaktiv=mysqli_query($config,"SELECT * FROM tb_user WHERE status=0");
  $count=mysqli_num_rows($nonaktiv);
  $tempat = mysqli_query($config,"SELECT * FROM tb_tempat");
  $count2=mysqli_num_rows($tempat);
$query=mysqli_query($config,"SELECT * FROM tb_user");
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
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Table Example</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               <thead class="thead-light">
            <tr>
              <th>No</th>
              <th>Nama Tempat</th>
              <th>Latitude</th>
              <th>Longtitude</th>
              <th>Status</th>
              <th>Status</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
         <?php 
              $result=mysqli_query($config,"SELECT * FROM tb_form_menara JOIN tb_tempat ON tb_form_menara.id_form=tb_tempat.id_form WHERE tb_form_menara.id_user='$id' AND tb_tempat.status='0'");
              $rows=mysqli_fetch_array($result); 
              $nomor=1;
              $count = mysqli_num_rows($result);
              $id1=$rows['id'];
              for ($i=0; $i < $count; $i++) {
                $bersinggungan=0;
                $id2=$rows['id'];
                $perulangan1=mysqli_query($config,"SELECT * FROM `tb_tempat` where id='$id1'");
                $rowsPer1=mysqli_fetch_array($perulangan1);
                $lokasi1_lat=$rowsPer1['lat'];
                $lokasi1_long=$rowsPer1['lng'];
                for ($j=0; $j < $count; $j++) { 
                  $perulangan2=mysqli_query($config,"SELECT * FROM `tb_tempat` where id='$id2'");
                  $rowsPer2=mysqli_fetch_array($perulangan2);
                  $lokasi2_lat=$rowsPer2['lat'];
                  $lokasi2_long=$rowsPer2['lng'];
                  $jarak=0;
                  if ($rowsPer1['id']!=$rowsPer2['id']) {
                    $jarak = (rad2deg(acos((sin(deg2rad($lokasi1_lat))*sin(deg2rad($lokasi2_lat))) + (cos(deg2rad($lokasi1_lat))*cos(deg2rad($lokasi2_lat))*cos(deg2rad($lokasi1_long-$lokasi2_long))))))*111.13384;
                    if($jarak<10)
                    {
                      $bersinggungan=1;
                    }
                  } 
                $id2++;
                }?>
            <tr>
              <td><?php echo $nomor++; ?></td>
              <td><?php echo $rowsPer1['nama_tempat']; ?></td>
              <td><?php echo $rowsPer1['lat']; ?></td>
              <td><?php echo $rowsPer1['lng']; ?></td>
              <td><?php if ($bersinggungan==0)  { ?> <p>Tidak Bersinggungan</p> <?php }  else  { ?> <b style='color: red;'>Bersinggungan </b><?php echo $rowsPer2['nama_tempat'] ?> <?php } ?></td>
              <td><a href="index.php?id=<?php echo $rowsPer1['id']; ?>">Open Maps</a></td>
              <td><center><a href="../aksi/acc_lokasi_menara.php?id=<?php echo $rowsPer1['id'];?>" class="small btn btn-success"><i class="fas fa-check"></i></a>&nbsp;<a class="small btn btn-danger" href='../aksi/delete_lokasi_menara.php?id=<?php echo $rowsPer1['id'];?>'><i class="fas fa-trash"></i></a></center></td>
            </tr>
                 <?php
            $id1++;
            // close while loop
            }
          ?>
          </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

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


