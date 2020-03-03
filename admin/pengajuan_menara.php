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
          <li class="breadcrumb-item active">Menara</li>
        </ol>

       <!-- Icon Cards ketetapan -->
 <?php
$step1  = mysqli_query($config,"SELECT * FROM tb_perusahaan JOIN tb_form_menara ON tb_perusahaan.id_perusahaan = tb_form_menara.id_perusahaan JOIN tb_tempat_menara ON tb_form_menara.id_form=tb_tempat_menara.id_form JOIN tb_akun ON tb_perusahaan.id_akun = tb_akun.id_akun WHERE tb_form_menara.status_form='pemeriksaan' OR tb_form_menara.status_form='tidak_lengkap' GROUP BY tb_form_menara.id_form");
  $count1    = mysqli_num_rows($step1);

 $step2  = mysqli_query($config,"SELECT * FROM tb_perusahaan JOIN tb_form_menara ON tb_perusahaan.id_perusahaan = tb_form_menara.id_perusahaan JOIN tb_tempat_menara ON tb_form_menara.id_form=tb_tempat_menara.id_form JOIN tb_akun ON tb_perusahaan.id_akun = tb_akun.id_akun WHERE tb_form_menara.status_form='lengkap' AND tb_tempat_menara.status_tempat='pengajuan' GROUP BY tb_form_menara.id_form");
  $count2    = mysqli_num_rows($step2);

  $step3   = mysqli_query($config,"SELECT * FROM tb_perusahaan JOIN tb_form_menara ON tb_perusahaan.id_perusahaan = tb_form_menara.id_perusahaan JOIN tb_tempat_menara ON tb_form_menara.id_form=tb_tempat_menara.id_form WHERE tb_form_menara.status_form='lengkap' AND tb_tempat_menara.status_tempat='proses_survey' OR tb_form_menara.status_form='lengkap' AND tb_tempat_menara.status_tempat='revisi' GROUP BY tb_form_menara.id_form");
  $count3   = mysqli_num_rows($step3);

  $step4  = mysqli_query($config,"SELECT * FROM tb_perusahaan JOIN tb_form_menara ON tb_perusahaan.id_perusahaan = tb_form_menara.id_perusahaan JOIN tb_tempat_menara ON tb_form_menara.id_form=tb_tempat_menara.id_form WHERE tb_form_menara.status_form='lengkap' AND tb_tempat_menara.status_tempat='proses_rekom' GROUP BY tb_form_menara.id_form");
  $count4   = mysqli_num_rows($step4);

  $step5  = mysqli_query($config,"SELECT * FROM tb_perusahaan JOIN tb_form_menara ON tb_perusahaan.id_perusahaan = tb_form_menara.id_perusahaan JOIN tb_tempat_menara ON tb_form_menara.id_form=tb_tempat_menara.id_form WHERE tb_form_menara.status_form='lengkap' AND tb_tempat_menara.status_tempat='cetak_rekom' GROUP BY tb_form_menara.id_form");
  $count5   = mysqli_num_rows($step5);
 ?>
         <div id="smartwizard">
            <ul>
            	<li><a href="#step-1"><span class="badge badge-danger"><?php echo $count1; ?></span> Step 1<br /><small>Pemeriksaan berkas</small></a></li>
                <li><a href="#step-2"><span class="badge badge-danger"><?php echo $count2; ?></span> Step 2<br /><small>Pengajuan Tempat</small></a></li>
                <li><a href="#step-3"><span class="badge badge-warning"><?php echo $count3; ?></span> Step 3<br /><small>Proses survey</small></a></li>
                <li><a href="#step-4"><span class="badge badge-success"><?php echo $count4; ?></span> Step 4<br /><small>Proses_Rekom</small></a></li>
                <li><a href="#step-5"> <span class="badge badge-primary"><?php echo $count5; ?></span>Step 5<br /><small>Cetak Rekom</small></a></li>
            </ul>

            <div>

              <div id="step-1" class="">
                <!-- Table -->
                <div class="card mb-3">
                <div class="card-header">
                <i class="fas fa-table"></i>Data User yang Butuh diverifikasi</div>
                <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th><center>No.</center></th>
                        <th><center>Nomor Urut</center></th>
                        <th><center>Nama Perusahaan</center></th>
                        <th><center>Nama Pengaju</center></th>
                        <th><center>Status</center></th>
                        <th colspan="2"><center>Aksi</center></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      $no=1;
                      while($menara=mysqli_fetch_array($step1)){
                    ?>
                    <tr>
                      <td><center><?php echo $no++; ?></center></td>
                      <td><center><?php echo $menara['id_form']; ?></center></td>
                      <td><center><?php echo $menara['nm_perusahaan'] ?></center></td>
                      <td><center><?php echo $menara['nm_user'] ?></center></td>
                      <td><center><?php echo $menara['status_form'] ?></center></td>
                      <td><a href="pemeriksaan_berkas.php?id=<?php echo $menara['id_form'] ?>" class="smaller btn btn-primary"><i class="fas fa-clipboard-check"></i></a></td>
                      <td><a href="../aksi/admin/hapus_form_menara.php?id=<?php echo $menara['id_form'] ?>" class="smaller btn btn-danger"  onclick="return confirm('Anda yakin mau menghapus form ini ?')"><i class="smaller fas fa-trash"></i></a></td>
                    </tr>
                    <?php 
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
                <i class="fas fa-table"></i>Data User yang Butuh diverifikasi</div>
                <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th><center>No.</center></th>
                        <th><center>Nomor Urut</center></th>
                        <th><center>Nama Perusahaan</center></th>
                        <th><center>Nama Pengaju</center></th>
                        <th><center>Status</center></th>
                        <th colspan="2"><center>Aksi</center></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      $no=1;
                      while($menara=mysqli_fetch_array($step2)){
                    ?>
                    <tr>
                      <td><center><?php echo $no++; ?></center></td>
                      <td><center><?php echo $menara['id_form']; ?></center></td>
                      <td><center><?php echo $menara['nm_perusahaan'] ?></center></td>
                      <td><center><?php echo $menara['nm_user'] ?></center></td>
                      <td><center><?php echo $menara['status_form'] ?></center></td>
                      <td><a href="tables_tempat.php?id=<?php echo $menara['id_form'] ?>&step=1" class="btn btn-primary btn-sm"><i class="fas fa-search"></i></a></td>
                      <td><a href="../aksi/admin/hapus_form_menara.php?id=<?php echo $menara['id_form'] ?>" class="smaller btn btn-danger"  onclick="return confirm('Anda yakin mau menghapus form ini ?')"><i class="smaller fas fa-trash"></i></a></td>
                    </tr>
                    <?php 
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
                <i class="fas fa-table"></i>Data User yang Butuh diverifikasi</div>
                <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th><center>No.</center></th>
                        <th><center>Nomor Urut</center></th>
                        <th><center>Nama Perusahaan</center></th>
                        <th><center>Nama Pengaju</center></th>
                        <th><center>Status</center></th>
                        <th colspan="2"><center>Aksi</center></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      $no=1;
                      while($menara=mysqli_fetch_array($step3)){
                    ?>
                    <tr>
                      <td><center><?php echo $no++; ?></center></td>
                      <td><center><?php echo $menara['id_form']; ?></center></td>
                      <td><center><?php echo $menara['nm_perusahaan'] ?></center></td>
                      <td><center><?php echo $menara['nm_user'] ?></center></td>
                      <td><center><?php echo $menara['status'] ?></center></td>
                      <td><a href="format_berita_menara.php?id=<?php echo $menara['id_form'] ?>" class="btn btn-primary btn-sm"><i class="fas fa-search"></i></a></td>
                      <td><a href="../aksi/admin/hapus_form_menara.php?id=<?php echo $menara['id_form'] ?>" class="smaller btn btn-danger"  onclick="return confirm('Anda yakin mau menghapus form ini ?')"><i class="smaller fas fa-trash"></i></a></td>
                    </tr>
                    <?php 
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
                <i class="fas fa-table"></i>Data User yang Butuh diverifikasi</div>
                <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th><center>No.</center></th>
                        <th><center>Nomor Urut</center></th>
                        <th><center>Nama Perusahaan</center></th>
                        <th><center>Nama Pengaju</center></th>
                        <th><center>Status</center></th>
                        <th colspan="2"><center>Aksi</center></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      $no=1;
                      while($menara=mysqli_fetch_array($step4)){
                    ?>
                    <tr>
                      <td><center><?php echo $no++; ?></center></td>
                      <td><center><?php echo $menara['id_form']; ?></center></td>
                      <td><center><?php echo $menara['nm_perusahaan'] ?></center></td>
                      <td><center><?php echo $menara['nm_user'] ?></center></td>
                      <td><center><?php echo $menara['status'] ?></center></td>
                      <td><a href="tables_tempat.php?id=<?php echo $menara['id_form'] ?>&step=3" class="btn btn-primary btn-sm"><i class="fas fa-search"></i></a></td>
                      <td><a href="../aksi/admin/hapus_form_menara.php?id=<?php echo $menara['id_form'] ?>" class="smaller btn btn-danger"  onclick="return confirm('Anda yakin mau menghapus form ini ?')"><i class="smaller fas fa-trash"></i></a></td>
                    </tr>
                    <?php 
                      } 
                    ?>
                    </tbody>
                  </table>
                </div>
                </div>
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                </div>
              </div>
              <div id="step-5" class="">
                   <!-- Table -->
                <div class="card mb-3">
                <div class="card-header">
                <i class="fas fa-table"></i>Data User yang Butuh diverifikasi</div>
                <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th><center>No.</center></th>
                        <th><center>Nomor Urut</center></th>
                        <th><center>Nama Perusahaan</center></th>
                        <th><center>Nama Pengaju</center></th>
                        <th><center>Status</center></th>
                        <th colspan="2"><center>Aksi</center></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      $no=1;
                      while($menara=mysqli_fetch_array($step5)){
                    ?>
                    <tr>
                      <td><center><?php echo $no++; ?></center></td>
                      <td><center><?php echo $menara['id_form']; ?></center></td>
                      <td><center><?php echo $menara['nm_perusahaan'] ?></center></td>
                      <td><center><?php echo $menara['nm_user'] ?></center></td>
                      <td><center><?php echo $menara['status'] ?></center></td>
                      <td><a href="tables_tempat.php?id=<?php echo $menara['id_form'] ?>&step=4" class="btn btn-primary btn-sm"><i class="fas fa-search"></i></a></td>
                      <td><a href="../aksi/admin/hapus_form_menara.php?id=<?php echo $menara['id_form'] ?>" class="smaller btn btn-danger disabled" onclick="return confirm('Anda yakin mau menghapus form ini ?')"><i class="smaller fas fa-trash"></i></a></td>
                    </tr>
                    <?php 
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
 <script src="boostrap/vendor/jquery/jquery.min.js"></script>
  <script src="boostrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="boostrap/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="boostrap/vendor/chart.js/Chart.min.js"></script>
  <script src="boostrap/vendor/datatables/jquery.dataTables.js"></script>
  <script src="boostrap/vendor/datatables/dataTables.bootstrap4.js"></script>


  <!-- Custom scripts for all pages-->
  <script src="boostrap/js/sb-admin.min.js"></script>
  <script src="boostrap/js/jquery.tabledit.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="boostrap/js/demo/datatables-demo.js"></script>
  <script src="boostrap/js/demo/chart-area-demo.js"></script>

   <script type="text/javascript" src="../user/boostrap2/dist/js/jquery.smartWizard.min.js"></script>
  <script type="text/javascript">
        $(document).ready(function(){

            // Step show event
            $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection, stepPosition) {
               //alert("You are on step "+stepNumber+" now");
               if(stepPosition === 'first'){
                   $("#prev-btn").addClass('disabled');
               }else if(stepPosition === 'final'){
                   $("#next-btn").addClass('disabled');
               }else{
                   $("#prev-btn").removeClass('disabled');
                   $("#next-btn").removeClass('disabled');
               }
            });

            // Toolbar extra buttons

            // Please note enabling option "showStepURLhash" will make navigation conflict for multiple wizard in a page.
            // so that option is disabling => showStepURLhash: false

            // Smart Wizard 1
            $('#smartwizard').smartWizard({
                    selected: 4,
                    theme: 'arrows',
                    transitionEffect:'fade',
                    showStepURLhash: false,
            });
        });
    </script>
    <script type="text/javascript">
    $('.update').editable({
           url: '../aksi/admin/edit.php',
           type: 'text',
           pk: 1,
           name: 'tipe_menara',
           title: 'Edit Tipe Menara'
    });

    $(function(){
            $(document).on('click','.delete-menara',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('hasil.php',
                    {id:$(this).attr('data-id') }
                );
            });
    });
</script>
 <!--<script>
     $('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var recipient = button.data('isi')
    var modal = $(this)
    modal.find('.modal-title').text('Submit Masukan Paket  ' + recipient)
    modal.find('<?php //echo $id ?>').val(recipient)
  })
  </script>-->
  <script>  
    $(document).ready(function(){  
      $('#editable_table').Tabledit({
        url:'action.php',
        columns:{
          identifier:[0, "id"],
          editable:[[1, 'nama_lengkap'], [2, 'alamat'], [3, 'jenkel'], [4, 'jabatan'], [5, 'umur']]
        },
        restoreButton:true,
        onSuccess:function(data, textStatus, jqXHR){
          if(data.action == 'delete'){
            $('#'+data.id).remove();
          }
        }
      });
    });
  </script>



</body>

</html>
