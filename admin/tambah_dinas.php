<?php include '../koneksi/koneksi.php';
session_start();
  if(empty($_SESSION['username'])){
    header("location:../login.php");
  }elseif($_SESSION['status']!='admin'){
    header("location:../404.html");
  }
  $pengawas = mysqli_query($config,"SELECT * FROM tb_dinas");
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
           Tambah Dinas</div>
          <div class="card-body">
            <div class="table-responsive">
              <form action="../aksi/admin/tambah_dinas.php" method="post"><!--multipart/form-data berfungsi supaya file dapat diambil -->
                <div class="form-group">
                  <label for="nama">Nama Dinas</label>
                  <input type="text" name="nama_dinas" class="form-control" id="nama_dinas" aria-describedby="nama_dinas" placeholder="Nama Dinas">
               
                  <label for="pemimpin">Pemimpin</label>
                  <input type="text" name="pimpinan" class="form-control" id="pimpinan" placeholder="Pimpinan">

                  <label for="phone">Phone</label>
                  <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone">

                  <label for="email">Email</label>
                  <input type="text" name="email" class="form-control" id="phone" placeholder="Email">

                  <label for="keterangan_penugasan">Keterangan Penugasan</label>
                  <input type="text" name="keterangan_penugasan" class="form-control" id="keterangan_penugasan" placeholder="Keterangan Penugasan">
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
                    <td>ID Dinas</td>
                    <td>Nama Dinas</td>
                    <td>Pimpinan</td>
                    <td>Phone</td>
                    <td>Email</td>
                    <td>Keterangan Penugasan</td>
                    <td><center>Action</center></td>
                  </tr>
                </thead>

                <tbody>
                  <?php
                  $no=1;
                    while($data = mysqli_fetch_array($pengawas)){
                  ?>
                  <tr id="<?php echo $data['id_dinas'] ?>" class="edit_tr">
                  <td class="edit_td">
                    <?php echo $no++ ?>
                  </td>
                  <td>
                    <span id="nama_dinas_<?php echo $data['id_dinas']; ?>" class="text"><?php echo $data['nama_dinas']; ?></span>
                    <input type="text" name="nama_dinas" class="editbox" id="nama_dinas_input_<?php echo $data['id_dinas'];?>" value="<?php echo $data['nama_dinas'] ?>">
                  </td>
                  <td>
                     <span id="pimpinan_<?php echo $data['id_dinas']; ?>" class="text"><?php echo $data['pimpinan']; ?></span>
                    <input type="text" name="pimpinan" class="editbox" id="pimpinan_input_<?php echo $data['id_dinas'];?>" value="<?php echo $data['pimpinan'] ?>">
                  </td>
                  <td>
                     <span id="phone_<?php echo $data['id_dinas']; ?>" class="text"><?php echo $data['phone']; ?></span>
                    <input type="text" name="phone" class="editbox" id="phone_input_<?php echo $data['id_dinas'];?>" value="<?php echo $data['phone'] ?>">
                  </td>
                  <td>
                     <span id="email_<?php echo $data['id_dinas']; ?>" class="text"><?php echo $data['email']; ?></span>
                    <input type="text" name="nama" class="editbox" id="email_input_<?php echo $data['id_dinas'];?>" value="<?php echo $data['email'] ?>">
                  </td>
                  <td>
                     <span id="keterangan_penugasan_<?php echo $data['id_dinas']; ?>" class="text"><?php echo $data['keterangan_penugasan']; ?></span>
                    <input type="text" name="keterangan_penugasan" class="editbox" id="keterangan_penugasan_input_<?php echo $data['id_dinas'];?>" value="<?php echo $data['keterangan_penugasan'] ?>">
                  </td>
                    <td><center><a href="../aksi/admin/hapus_data_dinas.php?id=<?php echo $data['id_dinas'];?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a></center></td>
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
    $("#id_dinas_"+ID).hide();
    $("#id_dinas_input_"+ID).show();

    $("#nama_dinas_"+ID).hide();
    $("#nama_dinas_input_"+ID).show();

    $("#pimpinan_"+ID).hide();
    $("#pimpinan_input_"+ID).show();

    $("#phone_"+ID).hide();
    $("#phone_input_"+ID).show();

    $("#email_"+ID).hide();
    $("#email_input_"+ID).show();

    $("#keterangan_penugasan_"+ID).hide();
    $("#keterangan_penugasan_input_"+ID).show();
    //$("#last_input_"+ID).show();
  }).change(function(){
    var ID=$(this).attr('id');
    var nama_dinas=$("#nama_dinas_input_"+ID).val();
    var pimpinan=$("#pimpinan_input_"+ID).val();
    var phone=$("#phone_input_"+ID).val();
    var email=$("#email_input_"+ID).val();
    var keterangan_penugasan=$("#keterangan_penugasan_input_"+ID).val();
    //var last=$("#last_input_"+ID).val();
    var dataString = 'id='+ ID +'&nama_dinas='+nama_dinas+'&pimpinan='+pimpinan+'&phone='+phone+'&email='+email+'&keterangan_penugasan='+keterangan_penugasan;
    //$("#first_"+ID).html('<img src="load.gif" />'); // Loading image
      $.ajax({
      type: "POST",
      url: "../aksi/admin/update_dinas.php",
      data: dataString,
      cache: false,
      success: function(html){
        $("#nama_dinas_"+ID).html(nama_dinas);
        $("#pimpinan_"+ID).html(pimpinan);
        $("#phone_"+ID).html(phone);
        $("#email_"+ID).html(email);
        $("#keterangan_penugasan_"+ID).html(keterangan_penugasan);
        //$("#last_"+ID).html(last);
      }
      });
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

 

      



