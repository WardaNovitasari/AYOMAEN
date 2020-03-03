<?php
$id=$akun['id_akun'];
$kmz=mysqli_query($config,"SELECT * FROM tb_perusahaan JOIN tb_akun ON tb_perusahaan.id_akun=tb_akun.id_akun WHERE tb_perusahaan.id_akun ='$id'");
?>
<div class="modal fade" id="lihat<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form List pengajuan perusahaan</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          
    <section class="page-section" id="services">
      <div class="container">
      <hr class="divider my-4">
      <div class="row">
        <div class="col-lg-3 col-md-6 text-center">
         <p class="text-primary">Nama Perusahaan</p>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
         <p class="text-primary">Nama User</p>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
         <p class="text-primary">Status</p>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <p class="text-primary">Aksi</p> 
        </div>
      </div>
      <?php
            while($inc=mysqli_fetch_array($kmz)){
          ?>
      <hr class="divider my-4">
      <div class="row">
        <div class="col-lg-3 col-md-6 text-center">
          <?php echo $inc['nm_perusahaan'] ?>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <?php echo $inc['nm_user'] ?>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <?php echo $inc['status_aktif'] ?>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <?php if($inc['status_aktif']=='diterima' && $inc['status_akun']!='terverifikasi'){ ?>
          <a href="../aksi/admin/acc_perusahaan.php?id=<?php echo $inc['id_perusahaan'] ?>" class="btn btn-primary btn-sm disabled" onclick="return confirm('Anda yakin mau menerima data ini ?')"><i class="smaller fas fa-check"></i></a>
          <a href="../aksi/admin/tolak_perusahaan.php?id=<?php echo $inc['id_perusahaan'] ?>" class="btn btn-danger btn-sm disabled" onclick="return confirm('Anda yakin mau menolak data ini ?')"><i class="smaller fas fa-times"></i></a>
        <?php } else { ?>
            <a href="../aksi/admin/acc_perusahaan.php?id=<?php echo $inc['id_perusahaan'] ?>" class="btn btn-primary btn-sm" onclick="return confirm('Anda yakin mau menerima data ini ?')"><i class="smaller fas fa-check"></i></a>
          <a href="../aksi/admin/tolak_perusahaan.php?id=<?php echo $inc['id_perusahaan'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin mau menolak data ini ?')"><i class="smaller fas fa-times"></i></a>
        <?php } ?>
        </div>
        
      </div>
    
      <?php
        }
      ?>
      </div>
  </section>
  
          <!-- <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../aksi/action_logout.php">Logout</a> -->
        </div>
      </div>
    </div>
  </div>