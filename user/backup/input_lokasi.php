<?php
include '../koneksi/koneksi.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
  if(empty($_SESSION['username'])){
    header("location:login.php");
  }elseif($_SESSION['status']!='user'){
    header("location:404.html");
  }
  $username=$_SESSION['username'];
  // require "excel_reader/excel_reader.php";
  if(isset($_POST['submit'])){
    $formmenara2 = mysqli_query($config,"SELECT * FROM tb_akun WHERE username='$username'");
    $query3      = mysqli_fetch_assoc($formmenara2);
    $idform2     = $query3['id_akun'];
                $allowed_ext    = array('xls', 'xlsx');
                $file_name      = $_FILES['files']['name'];
                $file_ext       = strtolower(end(explode('.', $file_name)));
                $file_size       = $_FILES['files']['size'];
                $file_tmp       = $_FILES['files']['tmp_name'];
                $tgl            = date("Y-m-d");
                $nama           = $tgl.'-'.$idform2;
                
 
                if(in_array($file_ext, $allowed_ext) === true){
                    if($file_size < 1044070000){
                        $lokasi = '../file/excel/'.$nama.'.'.$file_ext;
                        move_uploaded_file($file_tmp, $lokasi);
                        $in = mysqli_query($config,"INSERT INTO download VALUES('', '$tgl', '$nama', '$file_ext', '$file_size', '$lokasi')");
                        if($in){
                            echo '<div class="ok">SUCCESS: File berhasil di Upload!</div>';
                        }else{
                            echo '<div class="error">ERROR: Gagal upload file!</div>';
                        }
                    }else{
                        echo '<div class="error">ERROR: Besar ukuran file (file size) maksimal 1 Mb!</div>';
                    }
                }else{
                    echo '<div class="error">ERROR: Ekstensi file tidak di izinkan!</div>';
                }

   /* $soal1  = $_POST["soal[1]"];
    $soal2  = $_POST['soal_2'];
    $soal3  = $_POST['soal_3'];
    $soal4  = $_POST['soal_4'];
    $soal5  = $_POST['soal_5'];
    $soal6  = $_POST['soal_6'];
    $soal7  = $_POST['soal_7'];
    $soal8  = $_POST['soal_8'];
    $soal9  = $_POST['soal_9'];
    $soal10 = $_POST['soal_10'];
    $soal11 = $_POST['soal_11'];
    $data = new Spreadsheet_Excel_Reader($_FILES['filepegawaiall']['tmp_name'],false);*/
    
//    menghitung jumlah baris file xls   
  }if(isset($_POST['oke'])){
   
    $user   = mysqli_query($config,"SELECT * FROM tb_user WHERE username='$username'");
    $query  = mysqli_fetch_assoc($user);
    $iduser = $query['id_user'];
    $soal1  = $_POST['soal_1'];
    $soal2  = $_POST['soal_2'];
    $soal3  = $_POST['soal_3'];
    $soal4  = $_POST['soal_4'];
    $soal5  = $_POST['soal_5'];
    $soal6  = $_POST['soal_6'];
    $soal7  = $_POST['soal_7'];
    $soal8  = $_POST['soal_8'];
    $soal9  = $_POST['soal_9'];
    $soal10 = $_POST['soal_10'];
    $soal11 = $_POST['soal_11'];
    $nama=$_POST['nama'];
    $kecamatan=$_POST['kecamatan'];
    $kelurahan=$_POST['kelurahan'];
    $lat=$_POST['lat'];
    $lng=$_POST['lng'];
    $tinggi=$_POST['tinggi'];
    $tipe_file=$_POST['tipe_file'];
    $tipe_menara=$_POST['tipe_menara'];
    $tgl_pengajuan=date("Y-m-d H:i:s");


    mysqli_query($config,"INSERT INTO tb_form_menara (id_user,soal_1,soal_2,soal_3,soal_4,soal_5,soal_6,soal_7,soal_8,soal_9,soal_10,soal_11,tgl_pengajuan) VALUES ('$iduser','$soal1','$soal2','$soal3','$soal4','$soal5','$soal6','$soal7','$soal8','$soal9','$soal10','$soal11','$tgl_pengajuan')");
    
    $formmenara = mysqli_query($config,"SELECT * FROM tb_form_menara WHERE id_user='$iduser' ORDER BY id_form DESC");
    $query2     = mysqli_fetch_assoc($formmenara);
    $idform     = $query2['id_form'];
    echo $idform;
    $jumlah=count($nama);
    for($i=0;$i<$jumlah;$i++){
      mysqli_query($config,"INSERT INTO tb_tempat VALUES('','$idform','$nama[$i]','$kecamatan[$i]','$kelurahan[$i]','$lat[$i]','$lng[$i]','$tinggi[$i]','$tipe_file[$i]','$tipe_menara[$i]','terkirim','$tgl_pengajuan','','')");
    }
    echo '<script>alert("Form telah diajukan");history.go(-2);</script>';
 }
  
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Landing Page - Start Bootstrap Theme</title>

  <!-- Bootstrap core CSS -->
  <link href="boostrap/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="boostrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="boostrap/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="boostrap/css/landing-page.min.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">CLEON</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">Lihat Lokasi <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Input Lokasi</a>
      </li>
            <li class="nav-item">
        <a class="nav-link" href="#">Riwayat</a>
      </li>
      <li class="nav-item dropdown">
       
      </li>
    </ul>
     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="edit_password.php"><?php echo $_SESSION['username']; ?></a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Keluar</a>
        </div>
  </div>
</nav>

  <!-- Masthead -->
  <header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h1 class="mb-5"><?php echo $_SESSION['perusahaan'] ?></h1>
        </div>
      </div>
    </div>
  </header>

  <!-- Icons Grid -->
  <section class="features-icons bg-light" id="input_lokasi">
    <div class="container">
      <h1 class="mb-5 text-center"><?php echo $_SESSION['perusahaan'] ?></h1>
      <h2 class="mb-5 text-center">RIWAYAT</h2>
      <div class="row">  
          <div class="container-fluid">
        <table class="table">
          <thead class="thead-light">
            <tr>
              <th><center>No</center></th>
              <th><center>Pertanyaan</center></th>
              <th><center>Status</center></th>
            </tr>
          </thead>
          <form name="myForm" id="myForm" action="" method="post" enctype="multipart/form-data">
          <tbody>
            <?php
              $query=mysqli_query($config,"SELECT * FROM tb_soal WHERE kategori='menara'");
              $no = 1;
              while($soal=mysqli_fetch_array($query)){
              ?>
            <tr>
              <td><center><?php echo $no++ ?></center></td>
              <td>
                <?php if($soal['id_tipe']==1){
                  ?>
                 <h5><?php echo $soal['soal']; ?></h5>
                <input type="file" name="files" required="">
              <?php }else if($soal['id_tipe']==2){ ?>
                 <h5><?php echo $soal['soal']; ?></h5>
                <input type="file" name="files2" required="">  
              <?php } ?>
              <h5><?php echo $soal['soal'];  ?></h5>
              </td>
              <td><center><input type="checkbox" name="soal[]" value="Ada" title="Ada" required=""></center></td>
            </tr>

          <?php
           }?>
            <tr>
              <td colspan="4">
              <!-- <p>Atau Import dari Excel</p> -->
              <input type="file"  id="filepegawaiall" name="filepegawaiall" required="" /><br/><br/>
              <button type="submit" class="btn btn-primary" name="submit">Submit</button>
              <input type="button" value="Preview" <?php if (!(isset($_POST['submit']))){ ?> disabled <?php   } ?>data-toggle='modal' data-target='#exampleModal' />
              <td><?php echo $nama?></td>
              </td>
            </tr>
          </tbody>
        </form>
        </table>
      </div>
      </div>
    </div>
  </section>
  <?php include '../modal/logoutmodal.php' ?>
       
     
  <!-- Footer -->
  <footer class="footer bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
          <ul class="list-inline mb-2">
            <li class="list-inline-item">
              <a href="#">About</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Contact</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Terms of Use</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Privacy Policy</a>
            </li>
          </ul>
          <p class="text-muted small mb-4 mb-lg-0">&copy; Your Website 2019. All Rights Reserved.</p>
        </div>
        <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
          <ul class="list-inline mb-0">
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-facebook fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-twitter-square fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-instagram fa-2x fa-fw"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="boostrap/vendor/jquery/jquery.min.js"></script>
  <script src="boostrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
