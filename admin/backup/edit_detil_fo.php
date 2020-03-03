<?php

include '../koneksi/koneksi.php';
session_start();
  if(empty($_SESSION['username'])){
    header("location:../login.php");
  }elseif($_SESSION['status']!=1){
    header("location:../404.html");
  }
  $id=$_GET['id'];
  $fiber_optik = mysqli_query($config,"SELECT * FROM tb_tempat_fo WHERE id='$id'");
  while($rowsPer1 = mysqli_fetch_array($fiber_optik)){
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
            <a href="index.php">Dashboard</a>
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
              <form action="../aksi/edit_lokasi_fo.php" method="post" name="myform">
              <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                <input type="hidden" name="id" value="<?php echo $rowsPer1['id'];?>">
            <tr>
              <td>Nama Tempat</td><td>:</td><td><input type="text" name="nm_tempat" value="<?php echo $rowsPer1['nama_tempat']; ?>"></td>
            </tr>
            <tr>
              <td>Latitude</td><td>:</td><td><input type="text" name="lat" value="<?php echo $rowsPer1['lat'] ?>"></td>
            </tr>
            <tr>
              <td>Longtitude</td><td>:</td><td><input type="text" name="lng" value="<?php echo $rowsPer1['lng'] ?>"></td>
            </tr>
            <tr>
              <td colspan="3" align="right"><input type="submit" class="smaller btn btn-success" title='terima' name="submit" value="Submit"></td>
            <?php
            }
          ?>
        </form>
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


