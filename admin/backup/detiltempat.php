<?php
$id=$_GET['id']; 
include '../koneksi/koneksi.php';
session_start();
  if(empty($_SESSION['username'])){
    header("location:../login.php");
  }elseif($_SESSION['status']!=1){
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
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Table Example</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
               <thead class="thead-light">
            <tr>
              <th>No</th>
              <th>Nama Tempat</th>
              <th>Latitude</th>
              <th>Longtitude</th>
              <th width="20">Status</th>
              <th>Status</th>
              <th>Map</th>
              <th colspan="2"><center>Aksi</center></th>
            </tr>
          </thead>
          <tbody>
         <?php 

              $result=mysqli_query($config,"SELECT * FROM tb_tempat WHERE id_form='$id'");
              $rows=mysqli_fetch_array($result); 
              $nomor=1;
              $count = mysqli_num_rows($result);
              $id1=$rows['id'];
              for ($i=0; $i < $count; $i++) {
                $bersinggungan=0;
                $id2=$rows['id'];
                $perulangan1=mysqli_query($config,"SELECT * FROM tb_tempat where id='$id1'");
                $rowsPer1=mysqli_fetch_array($perulangan1);
                $lokasi1_lat=$rowsPer1['lat'];
                $lokasi1_long=$rowsPer1['lng'];
                for ($j=0; $j < $count; $j++) { 
                  $perulangan2=mysqli_query($config,"SELECT * FROM tb_tempat where id='$id2'");
                  $rowsPer2=mysqli_fetch_array($perulangan2);
                  $lokasi2_lat=$rowsPer2['lat'];
                  $lokasi2_long=$rowsPer2['lng'];
                  $jarak=0;
                  if ($rowsPer1['id']!=$rowsPer2['id']) {
                    $jarak = (rad2deg(acos((sin(deg2rad($lokasi1_lat))*sin(deg2rad($lokasi2_lat))) + (cos(deg2rad($lokasi1_lat))*cos(deg2rad($lokasi2_lat))*cos(deg2rad($lokasi1_long-$lokasi2_long))))))*111.13384;
                    if($jarak<5)
                    {
                      $bersinggungan=1;
                      $lks_singgung=$rowsPer2['nama_tempat'];
                    }
                  } 
                $id2++;
                }
                if($rowsPer1['status']=='disetujui'){
                  $id1++;
                  continue;
                }
                ?>
            <tr>
              <td><?php echo $nomor++; ?></td>
              <td><?php echo $rowsPer1['nama_tempat']; ?></td>
              <td><?php echo $rowsPer1['lat']; ?></td>
              <td><?php echo $rowsPer1['lng']; ?></td>
              <td><?php if ($bersinggungan==0)  { ?> <p>Tidak Bersinggungan</p> <?php }  else  { ?> <b style='color: red;'>Bersinggungan </b><br><?php echo $lks_singgung ?> <?php } ?></td>
              <td><?php echo $rowsPer1['status'] ?></td>
              <td><a href="detail_map.php?id=<?php echo $rowsPer1['id']; ?>">Open Maps</a></td>
              <td>
                <center>
                  <a href="../aksi/acc_lokasi_menara.php?id=<?php echo $rowsPer1['id'];?>" class="smaller btn btn-success" title='terima' onclick="return confirm('Anda yakin mau menerima data ini ?')"><i class="fas fa-check"></i></a>&nbsp;

                  <a data-toggle='modal' data-target='#exampleModal<?php echo $rowsPer1['id']; ?>' class="smaller btn btn-secondary" title='tolak' ><i class="fas fa-times"></i></a>&nbsp;

                </center>
              </td>
              <td>
                <a href="edit_detil_tempat.php?id=<?php echo $rowsPer1['id'];?>" class="smaller btn btn-info" title='edit'><i class="fas fa-edit"></i></a>&nbsp;

                <a class="smaller btn btn-danger" href='../aksi/delete_lokasi_menara.php?id=<?php echo $rowsPer1['id'];?>' onclick="return confirm('Anda yakin mau menghapus tempat ini ?')"><i class="fas fa-trash"></i></a>
              </td>
            </tr>
                 <?php
                 include 'modal/modal_form_saran.php';
            $id1++;
            // close while loop
              //
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


