<?php include '../koneksi/koneksi.php';
session_start();
  if(empty($_SESSION['username'])){
    header("location:../login.php");
  }elseif($_SESSION['status']!='admin'){
    header("location:../404.html");
  }
  $pengawas = mysqli_query($config,"SELECT * FROM tb_pegawai WHERE posisi='pengawas'");
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
            <a href="index.php">Beranda</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>
        <!-- DataTables Example -->
        <div class="card mb-3" id="form-tambah">
          <div class="card-header">
            <i class="fas fa-table"></i>
           Tambah Pengawas</div>
          <div class="card-body">
            <div class="table-responsive">
              <form action="../aksi/admin/tambah_pengawas.php" method="post"><!--multipart/form-data berfungsi supaya file dapat diambil -->
                <div class="form-group">
                  <label for="nama">Nama Pegawai</label>
                  <input type="text" name="nama" class="form-control" id="nama" aria-describedby="nama" placeholder="nama pengawas">
               
                  <label for="nip">NIP</label>
                  <input type="text" name="nip" class="form-control" id="nip" placeholder="NIP">

                  <label for="jabatan">Jabatan</label>
                  <input type="text" name="jabatan" class="form-control" id="jabatan" placeholder="Jabatan">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                <a href="#" class="btn btn-secondary" id="cancel">cancel</a>
              </form>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Fiber yang Belum dilakukan Tindakan</div>
          <div class="card-body">
            <div class="table-responsive">
              <button class="btn btn-primary" id="tambah-pengawas"><i class="fas fa-plus"></i>Tambah Data</button>
        </br><table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <td>NIP</td>
                    <td>Nama Pengawas</td>
                    <td>Jabatan</td>
                    <td colspan="2"><center>Action</center></td>
                  </tr>
                </thead>

                <tbody>
                  <?php
                    while($data = mysqli_fetch_array($pengawas)){
                  ?>
                  <tr id="<?php echo $data['id_pegawai'] ?>" class="edit_tr">
                  <td class="edit_td">
                    <span id="nip_<?php echo $data['id_pegawai']; ?>" class="text"><?php echo $data['nip']; ?></span>
                    <input type="text" name="nip" class="editbox" id="nip_input_<?php echo $data['id_pegawai'];?>" value="<?php echo $data['nip'] ?>">
                  </td>
                  <td>
                    <span id="nama_<?php echo $data['id_pegawai']; ?>" class="text"><?php echo $data['nama']; ?></span>
                    <input type="text" name="nama" class="editbox" id="nama_input_<?php echo $data['id_pegawai'];?>" value="<?php echo $data['nama'] ?>">
                  </td>
                  <td>
                     <span id="jabatan_<?php echo $data['id_pegawai']; ?>" class="text"><?php echo $data['jabatan']; ?></span>
                    <input type="text" name="nama" class="editbox" id="jabatan_input_<?php echo $data['id_pegawai'];?>" value="<?php echo $data['jabatan'] ?>">
                  </td>
                    <td><center><a href="#" class="btn btn-primary btn-sm"><i class="fas fa-pen"></i></a></center></td>
                    <td><center><a href="../aksi/admin/hapus_data_pengawas.php?id=<?php echo $data['id_pegawai'];?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a></center></td>
                  </tr>
                  <?php
                    }
                  ?>
                </tbody>
              </table>
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
  <script type="text/javascript">
    $(document).ready(function(){
    $(".editbox").hide();
  $(".edit_tr").click(function(){
    var ID=$(this).attr('id');
    $("#nip_"+ID).hide();
    $("#nip_input_"+ID).show();

    $("#nama_"+ID).hide();
    $("#nama_input_"+ID).show();

    $("#jabatan_"+ID).hide();
    $("#jabatan_input_"+ID).show();
    //$("#last_input_"+ID).show();
  }).change(function(){
    var ID=$(this).attr('id');
    var nip=$("#nip_input_"+ID).val();
    var nama=$("#nama_input_"+ID).val();
    var jabatan=$("#jabatan_input_"+ID).val();
    //var last=$("#last_input_"+ID).val();
    var dataString = 'id='+ ID +'&nip='+nip+'&nama='+nama+'&jabatan='+jabatan;
    //$("#first_"+ID).html('<img src="load.gif" />'); // Loading image

    if(nip.length>0){
      $.ajax({
      type: "POST",
      url: "../aksi/admin/update_pengawas.php",
      data: dataString,
      cache: false,
      success: function(html){
        $("#nip_"+ID).html(nip);
        $("#nama_"+ID).html(nama);
        $("#jabatan_"+ID).html(jabatan);
        //$("#last_"+ID).html(last);
      }
      });
    }else{
    alert('Enter something.');
    }
  });

// Edit input box click action
  $(".editbox").mouseup(function(){
    return false
  });

// Outside click action
  $(document).mouseup(function(){
    $(".editbox").hide();
    $(".text").show();
  });

   $("#tambah-pengawas").click(function(){
      $("#form-tambah").show("slow");
      });

      $("#form-tambah").hide();

      $("#cancel").click(function(){
        $("#form-tambah").hide("slow");
      });
  });
  </script>
</body>

</html>

 

      



