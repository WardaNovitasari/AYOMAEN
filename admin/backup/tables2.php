<?php include '../koneksi/koneksi.php';
session_start();
  if(empty($_SESSION['username'])){
    header("location:../login.php");
  }elseif($_SESSION['status']!='admin'){
    header("location:../404.html");
  }
  $nonaktiv=mysqli_query($config,"SELECT * FROM tb_akun WHERE status_akun='terverifikasi'");
  $count=mysqli_num_rows($nonaktiv);
  // $tempat = mysqli_query($config,"SELECT * FROM tb_tempat");
  // $count2=mysqli_num_rows($tempat);
$query=mysqli_query($config,"SELECT * FROM tb_akun,tb_perusahaan WHERE tb_akun.id_akun=tb_perusahaan.id_akun");
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
            Data User yang Sudah Aktif</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th><center>No.</center></th>
                    <!-- <th>Email</th>
                    <th>Username</th>
                    <th>Nama</th> -->
                    <th><center>Nama Perusahaan</center></th>
                    <th><center>Alamat</center></th>
                    <th><center>Status</center></th>
                    <th><center>Aksi</center></th>
                  </tr>
                </thead>
                <!-- <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Nama Perusahaan</th>
                    <th>Alamat</th>
                    <th>Status</th>
                    <th>Kode</th>
                    <th>Hapus</th>
                  </tr>
                </tfoot> -->
                <tbody>
                  <?php
                    $no=1;
                while ($user=mysqli_fetch_array($query)) {
                  if($user['status_akun']=='terverifikasi' && $user['level']=='user'){ 
                ?>
                  <tr>
                    <td><center><?php echo $no ?></center></td>
                    <td><?php echo $user['nm_perusahaan']; ?></td>
                    <td><?php echo $user['alamat_perusahaan']; ?></td>
                    <td><p class="text-success">Aktif</p></td>
                    <td><center><a href="../aksi/acc.php?id=<?php echo $user['email'];?>" class="smaller btn btn-success"><i class="fas fa-check"></i></a>&nbsp;<a class="smaller btn btn-danger" href='../aksi/delete.php?id=<?php echo $user['id_user'];?>' onclick="return confirm('Anda yakin mau menghapus akun ini ?')"><i class="fas fa-trash"></i></a></center></td>
                  </tr>
                <?php 
                 $no++;
                  } 
                } ?>
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



