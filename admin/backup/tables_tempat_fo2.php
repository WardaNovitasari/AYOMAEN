<?php include '../koneksi/koneksi.php';
session_start();
  if(empty($_SESSION['username'])){
    header("location:../login.php");
  }elseif($_SESSION['status']!='admin'){
    header("location:../404.html");
  }
  $query=mysqli_query($config,"SELECT tb_user.nama,tb_user.nm_perusahaan,tb_user.email,tb_form_fiber.id_form,tb_form_fiber.status FROM tb_user JOIN tb_form_fiber ON tb_user.id_user=tb_form_fiber.id_user JOIN tb_tempat_fo ON tb_form_fiber.id_form=tb_tempat_fo.id_form WHERE tb_form_fiber.status='disetujui' AND tb_user.level=2 AND tb_tempat_fo.status='disetujui' GROUP BY tb_form_fiber.id_form ORDER BY tb_form_fiber.id_form DESC");
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
            <a href="#">Beranda</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>

       <?php include 'view/iconcards.php'; ?>
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Menara yang Sudah diterima</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th><center>No.</center></th>
                    <th><center>Nama</center></th>
                    <th><center>Nama Perusahaan</center></th>
                    <th><center>Email</center></th>
                    <th><center>Status</center></th>
                    <th><center>Preview Form</center></th>
                    <th><center>Lihat Menara</center></th>
                  </tr>
                </thead>
                <!-- <tfoot>
                  <tr>
                    <th>Nama</th>
                    <th>Nama Perusahaan</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Preview Form</th>
                    <th>Lihat Menara</th>
                  </tr>
                </tfoot> -->
                <tbody>
                  <?php
                    $no=1;
                while(@$menara=mysqli_fetch_array($query)) {
                ?>
                  <tr>
                    <td><center><?php echo $no; ?></center></td>
                    <td><?php echo $menara['nama']; ?></td>
                    <td><?php echo $menara['nm_perusahaan']; ?></td>
                    <td>email</td>
                    <td><?php echo $menara['status']; ?></td>
                    <td><center><button type="button" class='btn btn-primary' data-toggle='modal' data-target='#exampleModal<?php echo $menara['id_form']; ?>'>Lihat</button></center></td>
                    <td><center><a href="detiltempat_fo2.php?id=<?php echo $menara['id_form']; ?>"><button type="button" class='btn btn-primary' >Detail</button></a></center></td>
                  </tr>

                  <?php
                  $no++;
                  include 'modal/modal_form_fo.php';
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

 

      



