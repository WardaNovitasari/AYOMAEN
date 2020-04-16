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
    // $allowed_ext    = array('xls', 'xlsx');
    // $file_name      = $_FILES['file']['name'];
    // $fix_name       = explode('.', $file_name);
    // @$file_ext       = strtolower(end(explode('.', $file_name)));
    // $file_size      = $_FILES['file']['size'];
    // $file_tmp       = $_FILES['file']['tmp_name'];
    $tgl            = date("Y-m-d");

    // $allowed_ext2   = array('kmz','kml');
    // $file_name2     = $_FILES['files']['name'];
    // $fix_name2      = explode('.', $file_name2);
    // @$file_ext2      = strtolower(end(explode('.', $file_name2)));
    // $file_size2     = $_FILES['files']['size'];
    // $file_tmp2      = $_FILES['files']['tmp_name'];

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

    // if (in_array($file_ext11, $allowed_ext11)=== false) {
    //   # code...
      // if(in_array($file_ext, $allowed_ext) === true && in_array($file_ext2, $allowed_ext2) === true && in_array($file_ext3, $allowed_ext3)=== true && in_array($file_ext4, $allowed_ext4)=== true && in_array($file_ext7, $allowed_ext7)=== true && in_array($file_ext8, $allowed_ext8) === true){
      //   if($file_size < 1044070000 && $file_size2 < 1044070000 && $file_size3 < 1044070000 && $file_size4 < 1044070000 && $file_size7 < 1044070000 && $file_size8 < 1044070000){

          // $input=mysqli_query($config,"INSERT INTO tb_form_menara VALUES('','$id','Tidak','Tidak','Tidak','Tidak','Tidak','Tidak','Tidak','Tidak','Tidak','Tidak','Tidak','$tgl','pemeriksaan','$nomorsurat','$tgl_surat')");
          
          // if($input){
          $select = mysqli_query($config,"SELECT * FROM tb_form_menara WHERE id_perusahaan='$id' ORDER BY id_form DESC");
          $select2=mysqli_fetch_array($select);
          $id_form = $select2['id_form'];
          // $nama    = $fix_name[0].'-'.$tgl.'-'.$id_form;//excel
          // $nama2   = $fix_name[0].'-'.$tgl.'-'.$id_form;//kmz
          if (in_array($file_ext8, $allowed_ext8) === true && $file_size8 < 1044070000) {
              //echo '<div class="error">ERROR: File 1</div>';
              $nama8   = 'Surat 8'.'-'.$tgl.'-'.$id_form;//doc
              $lokasi8 ='../file/menara/doc/'.$nama8.'.'.$file_ext8;
              @chown($lokasi8, 0777);
              
              if (file_exists($lokasi8)) {
                unlink($lokasi8);
                move_uploaded_file($file_tmp8, $lokasi8);
                $up8 = mysqli_query($config, "UPDATE `download` SET `nama_file`='$nama8',`tipe_file`='$file_ext8',`ukuran_file`='$file_size8',`file`='$lokasi8' WHERE `id_form`='$id_form' AND `id_tipe`='8'");
              }
              else{
                 move_uploaded_file($file_tmp8, $lokasi8);
                $up8 = mysqli_query($config, "UPDATE `download` SET `nama_file`='$nama8',`tipe_file`='$file_ext8',`ukuran_file`='$file_size8',`file`='$lokasi8' WHERE `id_form`='$id_form' AND `id_tipe`='8'");
              }
              
          }
          if (in_array($file_ext3, $allowed_ext3) === true && $file_size3 < 1044070000) {
              $nama3   = 'Surat 3'.'-'.$tgl.'-'.$id_form;//doc
              $lokasi3 ='../file/menara/doc/'.$nama3.'.'.$file_ext3;
              @chown($lokasi3, 0777);
              
              if (file_exists($lokasi3)) {
                unlink($lokasi3);
                move_uploaded_file($file_tmp3, $lokasi3);
                $up3 = mysqli_query($config, "UPDATE `download` SET `nama_file`='$nama3',`tipe_file`='$file_ext3',`ukuran_file`='$file_size3',`file`='$lokasi3' WHERE `id_form`='$id_form' AND `id_tipe`='3'");
              }
              else{
                move_uploaded_file($file_tmp3, $lokasi3);
                $up3 = mysqli_query($config, "UPDATE `download` SET `nama_file`='$nama3',`tipe_file`='$file_ext3',`ukuran_file`='$file_size3',`file`='$lokasi3' WHERE `id_form`='$id_form' AND `id_tipe`='3'");
              }
          }
          if (in_array($file_ext4, $allowed_ext4) === true && $file_size4 < 1044070000) {
              $nama4   = 'Surat 4'.'-'.$tgl.'-'.$id_form;//doc
              $lokasi4 ='../file/menara/doc/'.$nama4.'.'.$file_ext4;
              @chown($lokasi4, 0777);
              
              if (file_exists($lokasi4)) {
                unlink($lokasi4);
                move_uploaded_file($file_tmp4, $lokasi4);
                $up4 = mysqli_query($config, "UPDATE `download` SET `nama_file`='$nama4',`tipe_file`='$file_ext4',`ukuran_file`='$file_size4',`file`='$lokasi4' WHERE `id_form`='$id_form' AND `id_tipe`='4'");
              }
              else{
                move_uploaded_file($file_tmp4, $lokasi4);
                $up4 = mysqli_query($config, "UPDATE `download` SET `nama_file`='$nama4',`tipe_file`='$file_ext4',`ukuran_file`='$file_size4',`file`='$lokasi4' WHERE `id_form`='$id_form' AND `id_tipe`='4'");
              }
          }
          if (in_array($file_ext7, $allowed_ext7) === true && $file_size7 < 1077070000) {
              $nama7   = 'Surat 7'.'-'.$tgl.'-'.$id_form;//doc
              $lokasi7 ='../file/menara/doc/'.$nama7.'.'.$file_ext7;
              @chown($lokasi7, 0777);
              
              if (file_exists($lokasi7)) {
                unlink($lokasi7);
                move_uploaded_file($file_tmp7, $lokasi7);
                $up7 = mysqli_query($config, "UPDATE `download` SET `nama_file`='$nama7',`tipe_file`='$file_ext7',`ukuran_file`='$file_size7',`file`='$lokasi7' WHERE `id_form`='$id_form' AND `id_tipe`='7'");
              }
              else{
                move_uploaded_file($file_tmp7, $lokasi7);
                $up7 = mysqli_query($config, "UPDATE `download` SET `nama_file`='$nama7',`tipe_file`='$file_ext7',`ukuran_file`='$file_size7',`file`='$lokasi7' WHERE `id_form`='$id_form' AND `id_tipe`='7'");
              }
          }
          if (in_array($file_ext11, $allowed_ext11) === true && $file_size11 < 1011110110000) {
              $nama11   = 'Surat 11'.'-'.$tgl.'-'.$id_form;//doc
              $lokasi11 ='../file/menara/doc/'.$nama11.'.'.$file_ext11;
              @chown($lokasi11, 0777);
              
              if (file_exists($lokasi11)) {
                unlink($lokasi11);
                move_uploaded_file($file_tmp11, $lokasi11);
                $up11 = mysqli_query($config, "UPDATE `download` SET `nama_file`='$nama11',`tipe_file`='$file_ext11',`ukuran_file`='$file_size11',`file`='$lokasi11' WHERE `id_form`='$id_form' AND `id_tipe`='11'");
              }
              else{
                move_uploaded_file($file_tmp11, $lokasi11);
                $up11 = mysqli_query($config, "UPDATE `download` SET `nama_file`='$nama11',`tipe_file`='$file_ext11',`ukuran_file`='$file_size11',`file`='$lokasi11' WHERE `id_form`='$id_form' AND `id_tipe`='11'");
              }
          }
          if($up11 || $up7 || $up4 || $up3 || $up8){
            $qupdate = mysqli_query($config, "UPDATE tb_tempat_menara SET status_tempat='pengajuan ulang berkas' WHERE id_form='$id_form'");
            $qupdate2 = mysqli_query($config, "UPDATE `tb_form_menara` SET `status_form`='pemeriksaan' WHERE id_form='$id_form'");
            echo '<script>alert("Data berhasil diubah ! ");window.location.href="riwayat.php"</script>';
          }
          else{
            echo '<script>alert("Tidak ada data yang diubah ! ");window.location.href="riwayat.php"</script>'; 
          }
          // $nama3   = 'Surat 3'.'-'.$tgl.'-'.$id_form;//doc
          // $nama4   = 'Surat 4'.'-'.$tgl.'-'.$id_form;//doc
          // $nama7   = 'Surat 7'.'-'.$tgl.'-'.$id_form;//doc
          // 
          // $nama11   = 'Surat 11'.'-'.$tgl.'-'.$id_form;//doc

          // $lokasi  ='../file/menara/excel/'.$nama.'.'.$file_ext;
          // $lokasi2 ='../file/menara/KMS/'.$nama.'.'.$file_ext2;

          // $lokasi3 ='../file/menara/doc/'.$nama3.'.'.$file_ext3;
          // $lokasi4 ='../file/menara/doc/'.$nama4.'.'.$file_ext4;
          // $lokasi7 ='../file/menara/doc/'.$nama7.'.'.$file_ext7;
          // 

          //$lokasi11 ='../file/menara/doc/'.$nama11.'.'.$file_ext11;
          // @chown($lokasi, 0777);
          // @chown($lokasi2, 0777);

          // @chown($lokasi3, 0777);
          // @chown($lokasi4, 0777);
          // @chown($lokasi7, 0777);
          // 
          // @chown($lokasi11, 0777);

          // move_uploaded_file($file_tmp2,$lokasi2);
          // move_uploaded_file($file_tmp, $lokasi);

          // move_uploaded_file($file_tmp3, $lokasi3);
          // move_uploaded_file($file_tmp4, $lokasi4);
          // move_uploaded_file($file_tmp7, $lokasi7);
          // 

          //move_uploaded_file($file_tmp11, $lokasi11);
          

          // $in2 = mysqli_query($config,"INSERT INTO download VALUES('','$id_form', '$tgl', '$nama2', '$file_ext2', '$file_size2', '$lokasi2',1)");
          

          // $in2 = mysqli_query($config,"INSERT INTO download VALUES('','$id_form', '$tgl', '$nama3', '$file_ext3', '$file_size3', '$lokasi3',3)");
          // $in2 = mysqli_query($config,"INSERT INTO download VALUES('','$id_form', '$tgl', '$nama4', '$file_ext4', '$file_size4', '$lokasi4',4)");
          // $in2 = mysqli_query($config,"INSERT INTO download VALUES('','$id_form', '$tgl', '$nama7', '$file_ext7', '$file_size7', '$lokasi7',7)");
          // $in2 = mysqli_query($config,"INSERT INTO download VALUES('','$id_form', '$tgl', '$nama8', '$file_ext8', '$file_size8', '$lokasi8',8)");



          //$in2 = mysqli_query($config,"INSERT INTO download VALUES('','$id_form', '$tgl', '$nama11', '$file_ext11', '$file_size11', '$lokasi11',11)");
          // }else{
          //   echo 'error';
          // }
      //   }else{
      //     echo '<div class="error">ERROR: Besar ukuran file (file size) maksimal 1 Mb!</div>';
      //   }
      // }else{
      //   echo '<div class="error">ERROR: Ekstensi file tidak di izinkan!</div>';
      // }

    // }
//     else{
//         if(in_array($file_ext, $allowed_ext) === true && in_array($file_ext2, $allowed_ext2) === true && in_array($file_ext3, $allowed_ext3)=== true && in_array($file_ext4, $allowed_ext4)=== true && in_array($file_ext7, $allowed_ext7)=== true && in_array($file_ext8, $allowed_ext8) === true && in_array($file_ext11, $allowed_ext11)=== true){
//         if($file_size < 1044070000 && $file_size2 < 1044070000 && $file_size3 < 1044070000 && $file_size4 < 1044070000 && $file_size7 < 1044070000 && $file_size8 < 1044070000 && $file_size11 < 1044070000){

//           // $input=mysqli_query($config,"INSERT INTO tb_form_menara VALUES('','$id','Tidak','Tidak','Tidak','Tidak','Tidak','Tidak','Tidak','Tidak','Tidak','Tidak','Tidak','$tgl','pemeriksaan','$nomorsurat','$tgl_surat')");
          
//           // if($input){
//           $select = mysqli_query($config,"SELECT * FROM tb_form_menara WHERE id_perusahaan='$id' ORDER BY id_form DESC");
//           $select2=mysqli_fetch_array($select);
//           $id_form = $select2['id_form'];
//           // $nama    = $fix_name[0].'-'.$tgl.'-'.$id_form;//excel
//           // $nama2   = $fix_name[0].'-'.$tgl.'-'.$id_form;//kmz
//           $nama3   = 'Surat 3'.'-'.$tgl.'-'.$id_form;//doc
//           $nama4   = 'Surat 4'.'-'.$tgl.'-'.$id_form;//doc
//           $nama7   = 'Surat 7'.'-'.$tgl.'-'.$id_form;//doc
//           $nama8   = 'Surat 8'.'-'.$tgl.'-'.$id_form;//doc
//           $nama11   = 'Surat 11'.'-'.$tgl.'-'.$id_form;//doc
//           // $lokasi  ='../file/menara/excel/'.$nama.'.'.$file_ext;
//           // $lokasi2 ='../file/menara/KMS/'.$nama.'.'.$file_ext2;
//           $lokasi3 ='../file/menara/doc/'.$nama3.'.'.$file_ext3;
//           $lokasi4 ='../file/menara/doc/'.$nama4.'.'.$file_ext4;
//           $lokasi7 ='../file/menara/doc/'.$nama7.'.'.$file_ext7;
//           $lokasi8 ='../file/menara/doc/'.$nama8.'.'.$file_ext8;
//           $lokasi11 ='../file/menara/doc/'.$nama11.'.'.$file_ext11;
//           // @chown($lokasi, 0777);
//           // @chown($lokasi2, 0777);
//           @chown($lokasi3, 0777);
//           @chown($lokasi4, 0777);
//           @chown($lokasi7, 0777);
//           @chown($lokasi8, 0777);
//           @chown($lokasi11, 0777);
//           // move_uploaded_file($file_tmp2,$lokasi2);
//           // move_uploaded_file($file_tmp, $lokasi);
//           move_uploaded_file($file_tmp3, $lokasi3);
//           move_uploaded_file($file_tmp4, $lokasi4);
//           move_uploaded_file($file_tmp7, $lokasi7);
//           move_uploaded_file($file_tmp8, $lokasi8);
//           move_uploaded_file($file_tmp11, $lokasi11);
          

//           // $in2 = mysqli_query($config,"INSERT INTO download VALUES('','$id_form', '$tgl', '$nama2', '$file_ext2', '$file_size2', '$lokasi2',1)");
//           $in2 = mysqli_query($config,"INSERT INTO download VALUES('','$id_form', '$tgl', '$nama3', '$file_ext3', '$file_size3', '$lokasi3',3)");
//           $in2 = mysqli_query($config,"INSERT INTO download VALUES('','$id_form', '$tgl', '$nama4', '$file_ext4', '$file_size4', '$lokasi4',4)");
//           $in2 = mysqli_query($config,"INSERT INTO download VALUES('','$id_form', '$tgl', '$nama7', '$file_ext7', '$file_size7', '$lokasi7',7)");
//           $in2 = mysqli_query($config,"INSERT INTO download VALUES('','$id_form', '$tgl', '$nama8', '$file_ext8', '$file_size8', '$lokasi8',8)");
//           $in2 = mysqli_query($config,"INSERT INTO download VALUES('','$id_form', '$tgl', '$nama11', '$file_ext11', '$file_size11', '$lokasi11',11)");
//           // $in = mysqli_query($config,"INSERT INTO download VALUES('','$id_form', '$tgl', '$nama', '$file_ext', '$file_size', '$lokasi',2)");
// //               if($in){
// //                 echo '<div class="ok">SUCCESS: File berhasil di Upload!</div>';
// //                 require '../file/excel_reader.php';
// //                 $data       = new Spreadsheet_Excel_Reader($lokasi,$nama);
// //                 $baris    = $data->rowcount($sheet_index=0);

// //                 if(!$baris){
// //       //echo '<script>window.location="javascript: history.go(-1)"</script>';
// //               }
// //         $nomor1      = [];
// //     $site_id1    = [];
// //  $alamat1     = [];
// //  $kelurahan1  = [];
// //  $kecamatan1  = [];
// //  $lat1    = [];
// //  $long1       = [];
// //  $tipe_menara1  = [];
// //  $tinggi1     = [];
// //  for ($i=3; $i<=$baris; $i++){
// //       $nomor            = $data->val($i, 1);
// //       $site_id          = $data->val($i, 2);
// //       $alamat           = $data->val($i, 3);
// //       $kelurahan        = $data->val($i, 4);
// //       $kecamatan        = $data->val($i, 5);
// //       $lat              = $data->val($i, 6);
// //       $long             = $data->val($i, 7);
// //       $tipe_menara      = $data->val($i, 8);
// //       $tinggi           = $data->val($i, 9);
// //       if($nomor == ''){
// //             break;
// //       }else{
// //       array_push($nomor1    , $nomor);
// //       array_push($site_id1    , $site_id);
// //       array_push($alamat1   , $alamat);
// //       array_push($kelurahan1        , $kelurahan);
// //       array_push($kecamatan1        , $kecamatan);
// //       array_push($lat1      , $lat);
// //       array_push($long1     , $long);
// //       array_push($tipe_menara1  , $tipe_menara);
// //       array_push($tinggi1   , $tinggi);
// // }
// // }
// // $jumlah = count($nomor1);
// // for($j=0;$j<$jumlah;$j++){
// //   $insert = mysqli_query($config,"INSERT INTO tb_tempat_menara VALUES('','$id_form','$nomor1[$j]','$site_id1[$j]','$alamat1[$j]','$kelurahan1[$j]','$kecamatan1[$j]','$lat1[$j]','$long1[$j]','','','$tipe_menara1[$j]','','$tinggi1[$j]','pengajuan','','','','','','')");
// // }
// //     echo '<script>alert("Data berhasil diajukan ! ");window.location.href="riwayat.php"</script>';
// //               }else{
// //                 echo '<div class="error">ERROR: Gagal upload file!</div>';
// //               }
// //           }else{
// //             echo 'error';
// //           }
//         }else{
//           echo '<div class="error">ERROR: Besar ukuran file (file size) maksimal 1 Mb!</div>';
//         }
//       }else{
//         echo '<div class="error">ERROR: Ekstensi file tidak di izinkan!</div>';
//       }

//     }

      
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
  elseif (isset($_GET['id'])) {
    $idedit = $_GET['id'];
    $getidform = mysqli_query($config, "SELECT * FROM tb_tempat_menara JOIN tb_form_menara ON tb_tempat_menara.id_form=tb_form_menara.id_form JOIN tb_perusahaan ON tb_form_menara.id_perusahaan=tb_perusahaan.id_perusahaan JOIN tb_akun ON tb_perusahaan.id_akun=tb_akun.id_akun WHERE tb_akun.username='$username' AND tb_perusahaan.nm_perusahaan='$perusahaan' AND tb_tempat_menara.status_tempat='berkas tidak lengkap' AND tb_tempat_menara.id_form=(SELECT tb_tempat_menara.id_form FROM tb_tempat_menara JOIN tb_form_menara ON tb_tempat_menara.id_form=tb_form_menara.id_form JOIN tb_perusahaan ON tb_form_menara.id_perusahaan=tb_perusahaan.id_perusahaan JOIN tb_akun ON tb_perusahaan.id_akun=tb_akun.id_akun WHERE tb_akun.username='$username' AND tb_perusahaan.nm_perusahaan='$perusahaan' AND tb_tempat_menara.status_tempat='berkas tidak lengkap' AND tb_tempat_menara.id_tempat='$idedit')");
    $idformhasil = mysqli_fetch_array($getidform);
    $nomorsurat = $idformhasil['no_surat'];
    $tgl_surat = $idformhasil['tgl_surat'];
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

  <title>SI PERMEN</title>

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

<!-- AJAX 10 dan 11 -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> 
<script type='text/javascript'>
$(window).load(function(){
  $("#showhide1").css("display","none");
 
$('#clickme').change(function(){
  if (this.checked) {
    $('#showhide1').fadeIn('slow');
  } 
  else {
    $('#showhide1').fadeOut('slow');
  }  
});
  $("#showhide2").css("display","none");
 
$('#clickme').change(function(){
  if (this.checked) {
    $('#showhide2').fadeIn('slow');
  } 
  else {
    $('#showhide2').fadeOut('slow');
  }  
});
});
</script>

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
      <?php
        $idedit = $_GET['id'];
        $pdf = mysqli_query($config,"SELECT * FROM download WHERE id_form=(SELECT tb_tempat_menara.id_form FROM tb_tempat_menara JOIN tb_form_menara ON tb_tempat_menara.id_form=tb_form_menara.id_form JOIN tb_perusahaan ON tb_form_menara.id_perusahaan=tb_perusahaan.id_perusahaan JOIN tb_akun ON tb_perusahaan.id_akun=tb_akun.id_akun WHERE tb_akun.username='$username' AND tb_perusahaan.nm_perusahaan='$perusahaan' AND tb_tempat_menara.status_tempat='berkas tidak lengkap' AND tb_tempat_menara.id_tempat='$idedit') ORDER BY id_tipe ASC");
            $check = array();
            while($ini = mysqli_fetch_array($pdf)){
              array_push($check, $ini);
            }
      ?>
      <div class="row">
          <div class="container-fluid">
             <form name="myForm" id="myForm" action="" method="post" enctype="multipart/form-data">
            
        <table class="table">
          <thead class="thead-light">
            <tr>
              <th><center>No</center></th>
              <th><center>Persyaratan</center></th>
            </tr>
          </thead>
         
          <tbody>
<!-- SOAL 1 -->
              <td><center>1</center></td>
                <td>
           
                  <?php
                    $query=mysqli_query($config,"SELECT * FROM tb_soal WHERE kategori='menara' AND id='1' ");
                    $soal=mysqli_fetch_array($query);
                    // QUERY SOAL 1
                    $query8=mysqli_query($config, "SELECT nm_file FROM tb_soal JOIN tb_contoh_surat ON tb_soal.id = tb_contoh_surat.id WHERE tb_contoh_surat.id=8");
                    $data8 = mysqli_fetch_assoc($query8);
                    // 
                  ?>

                  <h5><?php echo $soal['soal']; ?></h5>
                  <p>Download contoh surat pernyataan disini <a href="../file/<?php echo $data8['nm_file']?>" required="">Download</a> dan Format data lampiran dalam bentuk File Excel disini <a href="../Upload.xls" required="">Download</a></p>
                  <label>No Surat</label>
                  <input type="text" name="no_surat" value="<?php echo $nomorsurat?>" required="" readonly>
                   <label>Tgl Surat</label>
                    <input type="date" name="tgl_surat" value="<?php echo $tgl_surat?>" required="">
                  <!-- <p class="text-primary">File Excel</p>
                  <div class="row">
                    <div class="col">
                      <input type="file" name="file" required="">
                    </div>
                    <div class="col">
                      <a href="">asdkjhasdkjhasd</a>
                    </div>                    
                  </div> -->
                  <p class="text-primary">File Surat</p>
                  <div class="row">
                    <div class="col">
                      <input type="file" name="surat8">
                    </div>
                    <div class="col">
                      <b>Berkas Lama : </b><a href="<?php echo $check[5]['file'] ?>">Disini</a>
                    </div>
                  </div>

                </td>
              </tr>

<!-- SOAL 2 -->
              <tr>
              <td><center>2</center></td>
                <td>
                  <?php
                    $query=mysqli_query($config,"SELECT * FROM tb_soal WHERE kategori='menara' AND id='2' ");
                    $soal=mysqli_fetch_array($query);
                  ?>
                    <h5><?php echo $soal['soal']; ?></h5>
                </td>
              </tr>

<!-- SOAL 3 -->
              <tr>
              <td><center>3</center></td>
                <td>
                  <?php
                    $query=mysqli_query($config,"SELECT * FROM tb_soal WHERE kategori='menara' AND id='3' ");
                    $soal=mysqli_fetch_array($query);
                    // QUERY SOAL 3
                    $query3=mysqli_query($config, "SELECT nm_file FROM tb_soal JOIN tb_contoh_surat ON tb_soal.id = tb_contoh_surat.id WHERE tb_contoh_surat.id=3");
                    $data3 = mysqli_fetch_assoc($query3);
                    // QUERY SOAL 3
                  ?>
                  <h5><?php echo $soal['soal'];?></h5>
                  <p>Download contoh surat pernyataan disini <a href="../file/<?php echo $data3['nm_file']?>" required="">Download</a></p>
                  <div class="row">
                    <div class="col">
                      <input type="file" name="surat3">    
                    </div>
                    <div class="col">
                      <b>Berkas Lama : </b><a href="<?php echo $check[2]['file'] ?>">Disini</a>
                    </div>
                  </div>
                </td>
              </tr>

<!-- SOAL 4 -->
              <tr>
              <td><center>4</center></td>
                <td>
                  <?php
                    $query=mysqli_query($config,"SELECT * FROM tb_soal WHERE kategori='menara' AND id='4' ");
                    $soal=mysqli_fetch_array($query);
                    // QUERY SOAL 4
                    $query4=mysqli_query($config, "SELECT nm_file FROM tb_soal JOIN tb_contoh_surat ON tb_soal.id = tb_contoh_surat.id WHERE tb_contoh_surat.id=4");
                    $data4 = mysqli_fetch_assoc($query4);
                    // QUERY SOAL 4
                  ?>
                  <h5><?php echo $soal['soal'];?></h5>
                    <p>Download contoh surat pernyataan disini <a href="../file/<?php echo $data4['nm_file']?>" required="">Download</a></p>
                    <div class="row">
                      <div class="col">
                        <input type="file" name="surat4" >
                      </div>                      
                      <div class="col">
                        <b>Berkas Lama : </b><a href="<?php echo $check[3]['file'] ?>">Disini</a>
                      </div>
                    </div>
                </td>
              </tr>

<!-- SOAL 5 -->
              <tr>
              <td><center>5</center></td>
                <td>
                  <?php
                    $query=mysqli_query($config,"SELECT * FROM tb_soal WHERE kategori='menara' AND id='5' ");
                    $soal=mysqli_fetch_array($query);
                  ?>
                    <h5><?php echo $soal['soal']; ?></h5>
                </td>
              </tr>

<!-- SOAL 6 -->
              <tr>
              <td><center>6</center></td>
                <td>
                  <?php
                    $query=mysqli_query($config,"SELECT * FROM tb_soal WHERE kategori='menara' AND id='6' ");
                    $soal=mysqli_fetch_array($query);
                  ?>
                    <h5><?php echo $soal['soal']; ?></h5>
                </td>
              </tr>

<!-- SOAL 7 -->
              <tr>
              <td><center>7</center></td>
                <td>
                  <?php
                    $query=mysqli_query($config,"SELECT * FROM tb_soal WHERE kategori='menara' AND id='7' ");
                    $soal=mysqli_fetch_array($query);
                    // QUERY SOAL 7
                    $query7=mysqli_query($config, "SELECT nm_file FROM tb_soal JOIN tb_contoh_surat ON tb_soal.id = tb_contoh_surat.id WHERE tb_contoh_surat.id=7");
                    $data7 = mysqli_fetch_assoc($query7);
                    // QUERY SOAL 7
                  ?>
                  <h5><?php echo $soal['soal'];?></h5>
                    <p>Download contoh surat pernyataan disini <a href="../file/<?php echo $data7['nm_file']?>" required="">Download</a></p>
                  <div class="row">
                    <div class="col">
                      <input type="file" name="surat7">    
                    </div>                    
                    <div class="col">
                      <b>Berkas Lama : </b><a href="<?php echo $check[4]['file'] ?>">Disini</a>
                    </div>
                  </div>
                </td>
              </tr>

<!-- SOAL 8 -->
              <tr>
              <td><center>8</center></td>
                <td>
                  <?php
                    $query=mysqli_query($config,"SELECT * FROM tb_soal WHERE kategori='menara' AND id='8' ");
                    $soal=mysqli_fetch_array($query);
                  ?>
                    <h5><?php echo $soal['soal']; ?></h5>
                </td>
              </tr>

<!-- SOAL 9 -->
              <tr>
              <td><center>9</center></td>
                <td>
                  <?php
                    $query=mysqli_query($config,"SELECT * FROM tb_soal WHERE kategori='menara' AND id='9' ");
                    $soal=mysqli_fetch_array($query);
                  ?>
                  <h5><?php echo $soal['soal']; ?></h5>
                  <!-- <p class="text-primary">File KMZ</p>
                  <input type="file" name="files" required="">   -->
                </td>
              </tr>



<tr>
<td colspan="2" style="color: red;">
<input type="checkbox" name="clickme" id="clickme"> *Centang jika tinggi menara lebih dari 6 meter.
</td>
</tr>

 <!-- SOAL 10 -->
              <tr id="showhide1">
              <td><center>10</center></td>
                <td>
                  <div id="showhide1">
                  <?php
                    $query=mysqli_query($config,"SELECT * FROM tb_soal WHERE kategori='menara' AND id='10' ");
                    $soal=mysqli_fetch_array($query);
                  ?>
                    <h5><?php echo $soal['soal']; ?></h5>
                </td>
              </tr>

<!-- SOAL 11 -->
              <tr id="showhide2">
              <td><center>11</center></td>
                <td>
                  <?php
                    $query=mysqli_query($config,"SELECT * FROM tb_soal WHERE kategori='menara' AND id='11' ");
                    $soal=mysqli_fetch_array($query);
                    // QUERY SOAL 11
                    $query11=mysqli_query($config, "SELECT nm_file FROM tb_soal JOIN tb_contoh_surat ON tb_soal.id = tb_contoh_surat.id WHERE tb_contoh_surat.id=11");
                    $data11 = mysqli_fetch_assoc($query7);
                    // QUERY SOAL 11
                  ?>
                  <h5><?php echo $soal['soal'];?></h5>
                    <p>Download contoh surat pernyataan disini <a href="../file/<?php echo $data11['nm_file']?>" required="">Download</a></p>
                  <div class="row">
                    <div class="col">
                      <input type="file" name="surat11" >
                    </div>
                    <div class="col">
                      <b>Berkas Lama : </b><a href="<?php echo $check[6]['file'] ?>">Disini</a>
                    </div>
                  </div>
                </td>
              </tr>


          <!-- Centang Berkas Lengkap -->  
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