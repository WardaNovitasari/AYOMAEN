<?php include '../koneksi/koneksi.php';
session_start();
  if(empty($_SESSION['username'])){
    header("location:../login.php");
  }elseif($_SESSION['status']!='admin'){
    header("location:../404.html");
  }
$query=mysqli_query($config,"SELECT * FROM tb_form_fiber,tb_perusahaan,tb_akun WHERE tb_form_fiber.id_perusahaan=tb_perusahaan.id_perusahaan AND tb_perusahaan.id_akun=tb_akun.id_akun");
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
            Data Fiber yang Belum dilakukan Tindakan</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th><center>No.</center></th>
                    <th><center>Nama</center></th>
                    <th><center>Nama Perusahaan</center></th>
                    <th><center>Email</center></th>
                    <th><center>Preview Form</center></th>
                    <th><center>Preview Tempat</center></th>
                  </tr>
                </thead>
                <!-- <tfoot>
                  <tr>
                    <th>Nama</th>
                    <th>Nama Perusahaan</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Preview Form</th>
                    <th>Detil Tempat</th>
                  </tr>
                </tfoot> -->
                <tbody>
                  <?php
                    $no=1;
                while(@$menara=mysqli_fetch_array($query)) {
                ?>
                  <tr>
                    <td><center><?php echo $no;?></center></td>
                    <td><?php echo $menara['nm_user']; ?></td>
                    <td><?php echo $menara['nm_perusahaan']; ?></td>
                    <td><?php echo $menara['email'] ?></td>
                    <td><center><?php if ($menara['status']=='disetujui')  { ?> <b class="text-primary point" title="lihat" data-toggle='modal' data-target='#exampleModal<?php echo $menara['id_form']; ?>' >Diterima</b> <?php } 
                    else  if ($menara['status']=='terkirim'){ ?> <b class="text-success point" title="lihat" data-toggle='modal' data-target='#exampleModal<?php echo $menara['id_form']; ?>'>Belum Diterima </b><?php } ?></center></td>
                    <td><center><a href="detiltempat_fo.php?id=<?php echo $menara['id_form']; ?>"><button type="button" class='btn btn-primary' data-target='#detilModal<?php echo $menara['id_form']; ?>' >Detail</button></a></center></td>
                  </tr>

                  <?php
                  $no++;
                  include 'modal/modal_form_fo.php';
                  //include 'modal/modal_form2.php';
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

 

      



