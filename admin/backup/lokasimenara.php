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

       <?php include 'iconcards.php'; ?>
<?php
//include '../koneksi/koneksi.php';
session_start();
  if(empty($_SESSION['username'])){
    header("location:../login.php");
  }elseif($_SESSION['status']!=1){
    header("location:../404.html");
  }
  $id=$_GET['id'];
$query=mysqli_query($config,"SELECT * FROM tb_form_menara JOIN tb_tempat ON tb_form_menara.id_form=tb_tempat.id_form WHERE tb_form_menara.id_user='$id'");
?>
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Table Example</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                      <th>No</th>
                      <th>Nama Tempat</th>
                      <th>Latitude</th>
                      <th>Longtitude</th>
                      <th>Status</th>
                    <th>Maps</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>No</th>
                      <th>Nama Tempat</th>
                      <th>Latitude</th>
                      <th>Longtitude</th>
                      <th>Status</th>
                    <th>Maps</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php
              $result=mysqli_query($config,$query); 
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
                    $jarak = (rad2deg(acos((sin(deg2rad($lokasi1_lat))*sin(deg2rad($lokasi2_lat))) + (cos(deg2rad($lokasi1_lat))*cos(deg2rad($lokasi2_lat))*cos(deg2rad($lokasi1_long-$lokasi2_long))))))*55.56692;
                    if($jarak<10)
                    {
                      $bersinggungan=1;
                    }
                  } 
                $id2++;
                }
                ?>
                  <tr>
                    <td><?php echo $menara['nama']; ?></td>
                    <td><?php echo $menara['nm_perusahaan']; ?></td>
                    <td>email</td>
                    <td>Status</td>
                    <td><button type="button" class='btn btn-primary' data-toggle='modal' data-target='#exampleModal<?php echo $menara['id_user']; ?>'>Lihat</button></td>
                    <td><a href="index.php?halaman=tempat"><button type="button" class='btn btn-primary'>Detil</button></a></td>
                  </tr>

                  <?php
                  $no++;
                  include 'modal/modal_form.php';
                }
                  ?>
                </tbody>
              </table>
            </div>
          </d50
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
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

 

      



