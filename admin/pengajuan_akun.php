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
            <a href="index.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Akun & Perusahaan</li>
        </ol>

       <!-- Icon Cards ketetapan -->
 <?php
 $nonaktiv  = mysqli_query($config,"SELECT * FROM tb_akun WHERE status_akun='pengajuan' OR status_akun='ditolak' AND level='user'");
  $count    = mysqli_num_rows($nonaktiv);

  $tempat   = mysqli_query($config,"SELECT * FROM tb_akun WHERE status_akun='belum_verifikasi' AND level='user'");
  $count2   = mysqli_num_rows($tempat);

  $tempat3  = mysqli_query($config,"SELECT * FROM tb_akun JOIN tb_perusahaan ON tb_akun.id_akun=tb_perusahaan.id_akun WHERE tb_perusahaan.status_aktif='terkirim' AND tb_akun.status_akun='terverifikasi' AND level='user' OR tb_perusahaan.status_aktif='ditolak' AND tb_akun.status_akun='terverifikasi' AND level='user'");
  $count3   = mysqli_num_rows($tempat3);

  $tempat4  = mysqli_query($config,"SELECT * FROM tb_akun JOIN tb_perusahaan ON tb_akun.id_akun=tb_perusahaan.id_akun WHERE tb_perusahaan.status_aktif='diterima' AND tb_akun.status_akun='terverifikasi' AND level='user'");
  $count4   = mysqli_num_rows($tempat4);
 ?>
        <div id="smartwizard">
            <ul>
                <li><a href="#step-1"><span class="badge badge-danger"><?php echo $count ?></span> Step 1<br /><small> Akun Baru</small></a></li>
                <li class=""><a href="#step-2"><span class="badge badge-warning"><?php echo $count2 ?></span> Step 2<br /><small> Menunggu Verifikasi</small></a></li>
                <li><a href="#step-3"><span class="badge badge-success"><?php echo $count3 ?></span> Step 3<br /><small> Terverifikasi</small></a></li>
                <li><a href="#step-4"><span class="badge badge-success"><?php echo $count4 ?></span> Step 4<br /><small> Perusahaan Aktif</small></a></li>
            </ul>

            <div>
               <div id="step-1" class="">
                  <!-- Table -->
                  <div class="card mb-3">
                  <div class="card-header">
                  <i class="fas fa-table"></i>
                  Data User yang Butuh diverifikasi</div>
                  <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th><center>No.</center></th>
                          <th><center>Nama</center></th>
                          <th><center>Alamat Email</center></th>
                          <th><center>Status</center></th>
                          <th colspan="3"><center>Aksi</center></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $no=1;
                          while($akun=mysqli_fetch_array($nonaktiv)){
                        ?>
                        <tr>
                          <td><center><?php echo $no++?></center></td>
                          <td><center><?php echo $akun['nm_user'] ?></center></td>
                          <td><center><?php echo $akun['email'] ?></center></td>
                          <td><center><?php echo $akun['status_akun'] ?></center></td>
                          <td><center><a href="../aksi/admin/acc_akun.php?id=<?php echo $akun['id_akun'];?>&acc=<?php echo $akun['status_akun'] ?>" class="btn btn-success btn-sm" onclick="return confirm('Anda yakin mau menerima data ini ?')"><i class="smaller fas fa-check"></i></a></center></td>
                           <td><center><a href="#" class="btn btn-primary btn-sm" title="edit" data-toggle="modal" data-target="#lihat<?php echo $akun['id_akun'];?>"><i class="fas fa-search"></i></a></center></td>
                          <td><center><a href="../aksi/admin/hapus_akun.php?id=<?php echo $akun['id_akun'];?>" class="btn btn-danger btn-sm"><i class="smaller fas fa-trash"></i></a></center></td>
                        </tr>
                        <?php
                        include 'modal/modal_perusahaan.php';
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                  </div>
                  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                  </div>
              </div>

                <div id="step-2" class="">
                  <!-- Table -->
                  <div class="card mb-3">
                  <div class="card-header">
                  <i class="fas fa-table"></i>
                  Data User yang Butuh diverifikasi</div>
                  <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th><center>No.</center></th>
                          <th><center>Nama</center></th>
                          <th><center>Alamat Email</center></th>
                          <th><center>Status</center></th>
                          <th colspan="2"><center>Aksi</center></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $no=1;
                          while($akun=mysqli_fetch_array($tempat)){
                        ?>
                        <tr>
                          <td><center><?php echo $no++?></center></td>
                          <td><center><?php echo $akun['nm_user'] ?></center></td>
                          <td><center><?php echo $akun['email'] ?></center></td>
                          <td><center><?php echo $akun['status_akun'] ?></center></td>
                          <td><center><a href="#" class="smaller btn btn-info" title="edit" data-toggle="modal" data-target="#lihat<?php echo $akun['id_akun'];?>"><i class="smaller fas fa-search"></i></a></center></td>
                          <td><center><a href="../aksi/admin/hapus_akun.php?id=<?php echo $akun['id_akun'];?>" class="smaller btn btn-danger" onclick="return confirm('Anda yakin mau menghapus data ini ?')"><i class="smaller fas fa-trash"></i></a></center></td>
                        </tr>
                        <?php
                         include 'modal/modal_perusahaan.php';
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                  </div>
                  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                  </div>
                </div>

                <div id="step-3" class="">
                  <!-- Table -->
                  <div class="card mb-3">
                  <div class="card-header">
                  <i class="fas fa-table"></i>
                  Data User yang Butuh diverifikasi</div>
                  <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th><center>No.</center></th>
                          <th><center>Nama</center></th>
                          <th><center>Alamat Email</center></th>
                          <th><center>Status</center></th>
                          <th colspan="2"><center>Aksi</center></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $no=1;
                          while($akun=mysqli_fetch_array($tempat3)){
                        ?>
                        <tr>
                          <td><center><?php echo $no++?></center></td>
                          <td><center><?php echo $akun['nm_user'] ?></center></td>
                          <td><center><?php echo $akun['email'] ?></center></td>
                          <td><center><?php echo $akun['status_akun'] ?></center></td>
                         <td><center><a href="#" class="smaller btn btn-info" title="edit" data-toggle="modal" data-target="#lihat<?php echo $akun['id_akun'];?>"><i class="smaller fas fa-search"></i></a></center></td>
                          <td><center><a href="../aksi/admin/hapus_akun.php?id=<?php echo $akun['id_akun'];?>" class="smaller btn btn-danger" onclick="return confirm('Anda yakin mau menghapus data ini ?')"><i class="smaller fas fa-trash"></i></a></center></td>
                        </tr>
                        <?php
                        include 'modal/modal_perusahaan.php';
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                  </div>
                  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                  </div>
                </div>

                <div id="step-4" class="">
                  <!-- Table -->
                  <div class="card mb-3">
                  <div class="card-header">
                  <i class="fas fa-table"></i>
                  Data User yang Butuh diverifikasi</div>
                  <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th><center>No.</center></th>
                          <th><center>Nama</center></th>
                          <th><center>Alamat Email</center></th>
                          <th><center>Status</center></th>
                          <th colspan="2"><center>Aksi</center></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $no=1;
                          while($akun=mysqli_fetch_array($tempat4)){
                        ?>
                        <tr>
                          <td><center><?php echo $no++?></center></td>
                          <td><center><?php echo $akun['nm_user'] ?></center></td>
                          <td><center><?php echo $akun['email'] ?></center></td>
                          <td><center><?php echo $akun['status_akun'] ?></center></td>
                          <td><center><a href="#" class="smaller btn btn-info" title="edit" data-toggle="modal" data-target="#lihat<?php echo $akun['id_akun'];?>"><i class="smaller fas fa-search"></i></a></center></td>
                          <td><center><a href="../aksi/admin/hapus_akun.php?id=<?php echo $akun['id_akun'];?>" class="smaller btn btn-danger" onclick="return confirm('Anda yakin mau menghapus data ini ?')"><i class="smaller fas fa-trash"></i></a></center></td>
                        </tr>
                        <?php
                         include 'modal/modal_perusahaan.php';
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                  </div>
                  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                  </div>
                </div>
            </div>
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
