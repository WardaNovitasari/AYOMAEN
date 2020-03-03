<?php include '../koneksi/koneksi.php';
session_start();
  if(empty($_SESSION['username'])){
    header("location:login.php");
  }elseif($_SESSION['status']!='admin'){
    header("location:404.html");
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
       
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Forgot Password</title> 

  <!-- Custom fonts for this template-->
 <link href="boostrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> 

  <!-- Custom styles for this template-->
 <link href="boostrap/css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-light"> 

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Ubah Password</div>
      <div class="card-body">
        <form action="../aksi/edit_password.php" method="post">
          <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="inputEmail" class="form-control" placeholder="Password Baru" required="required" name="pw_baru">
                <label for="inputEmail">Password Baru</label>
              </div>
            </div>
           <button class="btn btn-primary btn-block" type="submit" name="submit" onclick="return confirm('Apakah data sudah benar ?')">Submit</button>
        </form>
      </div>
    </div>
  </div>

<!-- </body>

</html> -->


      </div>
      <!-- /.container-fluid -->

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