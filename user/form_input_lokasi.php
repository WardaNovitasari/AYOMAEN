<?php
include '../koneksi/koneksi.php';
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/
session_start();
  if(empty($_SESSION['username'])){
    header("location:login.php");
  }elseif($_SESSION['status']!='user'){
    header("location:404.html");
  }
  $username=$_SESSION['username'];
  $perusahaan = $_SESSION['perusahaan'];
  // require "excel_reader/excel_reader.php";
  if(isset($_POST['submit'])){
    $user       = mysqli_query($config,"SELECT * FROM tb_akun JOIN tb_perusahaan ON tb_akun.id_akun=tb_perusahaan.id_akun WHERE tb_akun.username='$username' AND tb_perusahaan.nm_perusahaan='$perusahaan'");
    $akun       = mysqli_fetch_assoc($user);
    $id         = $akun['id_perusahaan'];
    $question   = $_POST['soal'];
    $nomorsurat = $_POST['no_surat'];
    $tgl_surat  = $_POST['tgl_surat'];
    //input fil
    $allowed_ext    = array('xls', 'xlsx');
    $file_name      = $_FILES['file']['name'];
    $fix_name       = explode('.', $file_name);
    @$file_ext       = strtolower(end(explode('.', $file_name)));
    $file_size      = $_FILES['file']['size'];
    $file_tmp       = $_FILES['file']['tmp_name'];
    $tgl            = date("Y-m-d");

    $allowed_ext2   = array('kmz','kml');
    $file_name2     = $_FILES['files']['name'];
    $fix_name2      = explode('.', $file_name2);
    @$file_ext2      = strtolower(end(explode('.', $file_name2)));
    $file_size2     = $_FILES['files']['size'];
    $file_tmp2      = $_FILES['files']['tmp_name'];

    $allowed_ext3   = array('doc','docx');
    $file_name3     = $_FILES['surat3']['name'];
    $fix_name3      = explode('.', $file_name3);
    @$file_ext3      = strtolower(end(explode('.', $file_name3)));
    $file_size3     = $_FILES['surat3']['size'];
    $file_tmp3      = $_FILES['surat3']['tmp_name'];

    $allowed_ext4   = array('doc','docx');
    $file_name4     = $_FILES['surat4']['name'];
    $fix_name4      = explode('.', $file_name4);
    @$file_ext4      = strtolower(end(explode('.', $file_name4)));
    $file_size4     = $_FILES['surat4']['size'];
    $file_tmp4      = $_FILES['surat4']['tmp_name'];

    $allowed_ext7   = array('doc','docx');
    $file_name7     = $_FILES['surat7']['name'];
    $fix_name7      = explode('.', $file_name7);
    @$file_ext7      = strtolower(end(explode('.', $file_name7)));
    $file_size7     = $_FILES['surat7']['size'];
    $file_tmp7      = $_FILES['surat7']['tmp_name'];

    $allowed_ext8   = array('doc','docx');
    $file_name8     = $_FILES['surat8']['name'];
    $fix_name8      = explode('.', $file_name8);
    @$file_ext8     = strtolower(end(explode('.', $file_name8)));
    $file_size8     = $_FILES['surat8']['size'];
    $file_tmp8      = $_FILES['surat8']['tmp_name'];

    $allowed_ext11   = array('doc','docx');
    $file_name11     = $_FILES['surat11']['name'];
    $fix_name11      = explode('.', $file_name11);
    @$file_ext11     = strtolower(end(explode('.', $file_name11)));
    $file_size11     = $_FILES['surat11']['size'];
    $file_tmp11      = $_FILES['surat11']['tmp_name'];

      if(in_array($file_ext, $allowed_ext) === true && in_array($file_ext2, $allowed_ext2) === true && in_array($file_ext3, $allowed_ext3)=== true && in_array($file_ext4, $allowed_ext4)=== true && in_array($file_ext7, $allowed_ext7)=== true && in_array($file_ext8, $allowed_ext8) === true && in_array($file_ext11, $allowed_ext11)=== true){
        if($file_size < 1044070000 && $file_size2 < 1044070000 && $file_size3 < 1044070000 && $file_size4 < 1044070000 && $file_size7 < 1044070000 && $file_size8 < 1044070000 && $file_size11 < 1044070000){

          $input=mysqli_query($config,"INSERT INTO tb_form_menara VALUES('','$id','Tidak','Tidak','Tidak','Tidak','Tidak','Tidak','Tidak','Tidak','Tidak','Tidak','Tidak','$tgl','pemeriksaan','$nomorsurat','$tgl_surat')");
          
          if($input){
          $select = mysqli_query($config,"SELECT * FROM tb_form_menara WHERE id_perusahaan='$id' ORDER BY id_form DESC");
          $select2=mysqli_fetch_array($select);
          $id_form = $select2['id_form'];
          $nama    = $fix_name[0].'-'.$tgl.'-'.$id_form;//excel
          $nama2   = $fix_name[0].'-'.$tgl.'-'.$id_form;//kmz
          $nama3   = 'Surat 3'.'-'.$tgl.'-'.$id_form;//doc
          $nama4   = 'Surat 4'.'-'.$tgl.'-'.$id_form;//doc
          $nama7   = 'Surat 7'.'-'.$tgl.'-'.$id_form;//doc
          $nama8   = 'Surat 8'.'-'.$tgl.'-'.$id_form;//doc
          $nama11   = 'Surat 11'.'-'.$tgl.'-'.$id_form;//doc
          $lokasi  ='../file/menara/excel/'.$nama.'.'.$file_ext;
          $lokasi2 ='../file/menara/KMS/'.$nama.'.'.$file_ext2;
          $lokasi3 ='../file/menara/doc/'.$nama3.'.'.$file_ext3;
          $lokasi4 ='../file/menara/doc/'.$nama4.'.'.$file_ext4;
          $lokasi7 ='../file/menara/doc/'.$nama7.'.'.$file_ext7;
          $lokasi8 ='../file/menara/doc/'.$nama8.'.'.$file_ext8;
          $lokasi11 ='../file/menara/doc/'.$nama11.'.'.$file_ext11;
          @chown($lokasi, 0777);
          @chown($lokasi2, 0777);
          @chown($lokasi3, 0777);
          @chown($lokasi4, 0777);
          @chown($lokasi7, 0777);
          @chown($lokasi8, 0777);
          @chown($lokasi11, 0777);
          move_uploaded_file($file_tmp2,$lokasi2);
          move_uploaded_file($file_tmp, $lokasi);
          move_uploaded_file($file_tmp3, $lokasi3);
          move_uploaded_file($file_tmp4, $lokasi4);
          move_uploaded_file($file_tmp7, $lokasi7);
          move_uploaded_file($file_tmp8, $lokasi8);
          move_uploaded_file($file_tmp11, $lokasi11);
          

          $in2 = mysqli_query($config,"INSERT INTO download VALUES('','$id_form', '$tgl', '$nama2', '$file_ext2', '$file_size2', '$lokasi2',1)");
          $in2 = mysqli_query($config,"INSERT INTO download VALUES('','$id_form', '$tgl', '$nama3', '$file_ext3', '$file_size3', '$lokasi3',3)");
          $in2 = mysqli_query($config,"INSERT INTO download VALUES('','$id_form', '$tgl', '$nama4', '$file_ext4', '$file_size4', '$lokasi4',4)");
          $in2 = mysqli_query($config,"INSERT INTO download VALUES('','$id_form', '$tgl', '$nama7', '$file_ext7', '$file_size7', '$lokasi7',7)");
          $in2 = mysqli_query($config,"INSERT INTO download VALUES('','$id_form', '$tgl', '$nama8', '$file_ext8', '$file_size8', '$lokasi8',8)");
          $in2 = mysqli_query($config,"INSERT INTO download VALUES('','$id_form', '$tgl', '$nama11', '$file_ext11', '$file_size11', '$lokasi11',11)");
          $in = mysqli_query($config,"INSERT INTO download VALUES('','$id_form', '$tgl', '$nama', '$file_ext', '$file_size', '$lokasi',2)");
              if($in){
                echo '<div class="ok">SUCCESS: File berhasil di Upload!</div>';
                require '../file/excel_reader.php';
                $data       = new Spreadsheet_Excel_Reader($lokasi,$nama);
                $baris    = $data->rowcount($sheet_index=0);

                if(!$baris){
      //echo '<script>window.location="javascript: history.go(-1)"</script>';
              }
        $nomor1      = [];
    $site_id1    = [];
 $alamat1     = [];
 $kelurahan1  = [];
 $kecamatan1  = [];
 $lat1    = [];
 $long1       = [];
 $tipe_menara1  = [];
 $tinggi1     = [];
 for ($i=3; $i<=$baris; $i++){
      $nomor            = $data->val($i, 1);
      $site_id          = $data->val($i, 2);
      $alamat          	= $data->val($i, 3);
      $kelurahan        = $data->val($i, 4);
      $kecamatan        = $data->val($i, 5);
      $lat              = $data->val($i, 6);
      $long             = $data->val($i, 7);
      $tipe_menara      = $data->val($i, 8);
      $tinggi           = $data->val($i, 9);
      if($nomor == ''){
            break;
      }else{
      array_push($nomor1    , $nomor);
      array_push($site_id1    , $site_id);
      array_push($alamat1   , $alamat);
      array_push($kelurahan1        , $kelurahan);
      array_push($kecamatan1        , $kecamatan);
      array_push($lat1      , $lat);
      array_push($long1     , $long);
      array_push($tipe_menara1  , $tipe_menara);
      array_push($tinggi1   , $tinggi);
}
}
$jumlah = count($nomor1);
for($j=0;$j<$jumlah;$j++){
  $insert = mysqli_query($config,"INSERT INTO tb_tempat_menara VALUES('','$id_form','$nomor1[$j]','$site_id1[$j]','$alamat1[$j]','$kelurahan1[$j]','$kecamatan1[$j]','$lat1[$j]','$long1[$j]','','','$tipe_menara1[$j]','','$tinggi1[$j]','pengajuan','','','','')");
}
    echo '<script>alert("Data berhasil diajukan ! ");window.location.href="riwayat.php"</script>';
              }else{
                echo '<div class="error">ERROR: Gagal upload file!</div>';
              }
          }else{
            echo 'error';
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
  }
  
?>
<!DOCTYPE html>
<html lang="en" >
<head>
   <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin - Cleon</title>

  <!-- Custom fonts for this template-->
  <link href="../admin/boostrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="../admin/boostrap/leaflet/leaflet.css">

  <!-- Page level plugin CSS-->
  <link href="../admin/boostrap/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../admin/boostrap/css/sb-admin.css" rel="stylesheet">

  <style>
    #mapid{
    width: 100%;
    height: 600px;
    }
  </style>
 <!-- <script src="boostrap/leaflet/leaflet.js"></script>-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="boostrap/dist/style.css">
  <link href="../admin/boostrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Include SmartWizard CSS -->
    <link href="boostrap2/dist/css/smart_wizard.css" rel="stylesheet" type="text/css" />

    <!-- Optional SmartWizard theme -->
    <link href="boostrap2/dist/css/smart_wizard_theme_circles.css" rel="stylesheet" type="text/css" />
    <link href="boostrap2/dist/css/smart_wizard_theme_arrows.css" rel="stylesheet" type="text/css" />
    <link href="boostrap2/dist/css/smart_wizard_theme_dots.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!-- partial:index.partial.html -->

    </label-->      
    <?php include 'menu_user2.php'; ?>
  <!--</li>
</ul>
</nav-->
<!-- <br /><br /> -->


 <section class="features-icons bg-light" id="input_lokasi">
    <div class="container">
      <h1 class="mb-5 text-center"><?php echo $_SESSION['perusahaan'] ?></h1>
      <h2 class="mb-5 text-center">Form Input Menara</h2>
      <div class="row">  
          <div class="container-fluid">
             <form name="myForm" id="myForm" action="" method="post" enctype="multipart/form-data">
            <p>Silahkan download format file excel disini <a href="../Upload.xls" required="">Download</a></p>
        <table class="table">
          <thead class="thead-light">
            <tr>
              <th><center>No</center></th>
              <th><center>Pertanyaan</center></th>
            </tr>
          </thead>
         
          <tbody>
            <?php
              $query=mysqli_query($config,"SELECT * FROM tb_soal WHERE kategori='menara'");
              $query3=mysqli_query($config, "SELECT nm_file FROM tb_soal JOIN tb_contoh_surat ON tb_soal.id = tb_contoh_surat.id WHERE tb_contoh_surat.id=3");
              $data3 = mysqli_fetch_assoc($query3);
              $query4=mysqli_query($config, "SELECT nm_file FROM tb_soal JOIN tb_contoh_surat ON tb_soal.id = tb_contoh_surat.id WHERE tb_contoh_surat.id=4");
              $data4 = mysqli_fetch_assoc($query4);
              $query7=mysqli_query($config, "SELECT nm_file FROM tb_soal JOIN tb_contoh_surat ON tb_soal.id = tb_contoh_surat.id WHERE tb_contoh_surat.id=7");
              $data7 = mysqli_fetch_assoc($query7);
              $query8=mysqli_query($config, "SELECT nm_file FROM tb_soal JOIN tb_contoh_surat ON tb_soal.id = tb_contoh_surat.id WHERE tb_contoh_surat.id=8");
              $data8 = mysqli_fetch_assoc($query8);
              $query11=mysqli_query($config, "SELECT nm_file FROM tb_soal JOIN tb_contoh_surat ON tb_soal.id = tb_contoh_surat.id WHERE tb_contoh_surat.id=11");
              $data11 = mysqli_fetch_assoc($query11);
              //print_r($data2);
              $no = 1;
              while($soal=mysqli_fetch_array($query)){
              ?>
            <tr>
              <td><center><?php echo $no++ ?></center></td>
              <td>
                <?php if($soal['id_tipe']==1){?>
                  <h5><?php echo $soal['soal']; ?></h5>
                  <p class="text-primary">File KMZ</p>
                  <input type="file" name="files" required="">  
              <?php }elseif($soal['id_tipe']==2){ ?>
                  <h5><?php echo $soal['soal']; ?></h5>
                  <label>No Surat</label>
                  <input type="text" name="no_surat" required="">
                   <label>Tgl Surat</label>
                    <input type="date" name="tgl_surat" required="">
                  <p class="text-primary">File Excel</p>
                  <input type="file" name="file" required="">
              <?php } elseif($soal['id']==3){ ?>
                <h5><?php echo $soal['soal'];?></h5>
                <p>Download contoh surat pernyataan disini <a href="../file/<?php echo $data3['nm_file']?>" required="">Download</a></p>
                  <input type="file" name="surat3" required="">
              <?php }elseif($soal['id']==4){ ?>
                <h5><?php echo $soal['soal'];?></h5>
                <p>Download contoh surat pernyataan disini <a href="../file/<?php echo $data4['nm_file']?>" required="">Download</a></p>
                  <input type="file" name="surat4" required="">
              <?php }elseif($soal['id']==7){ ?>
                <h5><?php echo $soal['soal'];?></h5>
                <p>Download contoh surat pernyataan disini <a href="../file/<?php echo $data7['nm_file']?>" required="">Download</a></p>
                  <input type="file" name="surat7" required="">
              <?php }elseif($soal['id']==8){ ?>
                <h5><?php echo $soal['soal'];?></h5>
                <p>Download contoh surat pernyataan disini <a href="../file/<?php echo $data8['nm_file']?>" required="">Download</a></p>
                  <input type="file" name="surat8" required="">
              <?php }elseif($soal['id']==11){ ?>
                <h5><?php echo $soal['soal'];?></h5>
                <p>Download contoh surat pernyataan disini <a href="../file/<?php echo $data11['nm_file']?>" required="">Download</a></p>
                  <input type="file" name="surat11" required="">
              <?php }else{ ?>
              <h5><?php echo $soal['soal'];  ?></h5>
            <?php } ?>
              </td>
             
            </tr>

          <?php
           }?>
            <tr>
              <td colspan="2"><input type="checkbox" name="soal[]" value="Tidak" title="Tidak" required=""  onchange="document.getElementById('submit').disabled = !this.checked;" <?php  ?>> Bahwa berkas-berkas diatas telah di lengkapi.</td>
            </tr>
            <tr>
              <td colspan="2">
              <!-- <p>Atau Import dari Excel</p> -->
              <button type="submit" class="btn btn-primary" name="submit" id="submit" disabled="true">Submit</button>
              
              </td>
            </tr>
          </tbody>
        </form>
        </table>
      </div>
      </div>
    </div>
  </section>
 <?php include '../modal/logoutmodal.php'; ?>
<!-- partial -->
  <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script><script  src="./script.js"></script>
   <script src="..admin/boostrap/vendor/jquery/jquery.min.js"></script>
  <script src="../admin/boostrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="boostrap2/dist/js/jquery.smartWizard.min.js"></script>
</body>
</html>