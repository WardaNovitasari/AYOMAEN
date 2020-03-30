<?php
include '../koneksi/koneksi.php';


session_start();
  if(empty($_SESSION['username'])){
    header("location:login.php");
  }elseif($_SESSION['status']!='user'){
    header("location:404.html");
  }
  $username=$_SESSION['username'];
 $perusahaan = $_SESSION['perusahaan'];
  // $riwayat = $_SESSION['riwayat'];

 if(isset($_GET['id'])){

  $id = $_GET['id'];
  $ajukan1 = mysqli_query($config,"SELECT * FROM tb_tempat_menara JOIN tb_form_menara ON tb_tempat_menara.id_form=tb_form_menara.id_form JOIN tb_perusahaan ON tb_form_menara.id_perusahaan=tb_perusahaan.id_perusahaan JOIN tb_akun ON tb_perusahaan.id_akun=tb_akun.id_akun WHERE tb_akun.username='$username' AND tb_perusahaan.nm_perusahaan='$perusahaan' AND tb_tempat_menara.status_tempat='rekom_expired' AND tb_tempat_menara.id_tempat='$id'");
  $hasil1 = mysqli_fetch_assoc($ajukan1);
  $idtempat = $hasil1['id_tempat'];
  $idfrom = $hasil1['id_form'];
  $nomor = $hasil1['nomor'];
  $site_id = $hasil1['site_id'];
  $alamat = $hasil1['alamat'];
  $kelurahan = $hasil1['kelurahan'];
  $kecamatan = $hasil1['kecamatan'];
  $lat = $hasil1['lat'];
  $lng = $hasil1['lng'];
  $lat_hasil = $hasil1['lat_hasil'];
  $lng_hasil = $hasil1['lng_hasil'];
  $tipe_menara = $hasil1['tipe_menara'];
  $tipe_site = $hasil1['tipe_site'];
  $tinggi = $hasil1['tinggi'];
  $status_tempat = $hasil1['status_tempat'];
  $alasan = $hasil1['alasan'];
  $tgl_disetujui = $hasil1['tgl_disetujui'];
  $aset_lokasi = $hasil1['aset_lokasi'];
  $site_id_hasil = $hasil1['site_id_hasil'];

  $cek_data1 = mysqli_query($config,"SELECT * FROM tb_tempat_menara JOIN tb_form_menara ON tb_tempat_menara.id_form=tb_form_menara.id_form JOIN tb_perusahaan ON tb_form_menara.id_perusahaan=tb_perusahaan.id_perusahaan JOIN tb_akun ON tb_perusahaan.id_akun=tb_akun.id_akun WHERE tb_akun.username='$username' AND tb_perusahaan.nm_perusahaan='$perusahaan' AND tb_tempat_menara.status_tempat='rekom_expired' OR tb_tempat_menara.status_tempat='pengajuan_ulang' AND tb_form_menara.id_form='$idfrom'");
  $jml_pengajuan = mysqli_num_rows($cek_data1);
  if($jml_pengajuan >= 2){
      echo "<script>alert('Anda telah melakukan pengajuan ulang')</script>";
  }
  else{
    // echo "jajaja";  
      $ajukan2 = mysqli_query($config, "INSERT INTO `tb_tempat_menara` (`id_tempat`, `id_form`, `nomor`, `site_id`, `alamat`, `kelurahan`, `kecamatan`, `lat`, `lng`, `lat_hasil`, `lng_hasil`, `tipe_menara`, `tipe_site`, `tinggi`, `status_tempat`, `alasan`, `tgl_disetujui`, `aset_lokasi`, `site_id_hasil`) VALUES ('','$idfrom','$nomor','$site_id','$alamat','$kelurahan','$kecamatan','$lat','$lng','$lat_hasil','$lng_hasil','$tipe_menara','$tipe_site','$tinggi','pengajuan_ulang','$alasan','$tgl_disetujui','$aset_lokasi','$site_id_hasil')");
  }

  
 };

 $query = mysqli_query($config,"SELECT * FROM tb_tempat_menara JOIN tb_form_menara ON tb_tempat_menara.id_form=tb_form_menara.id_form JOIN tb_perusahaan ON tb_form_menara.id_perusahaan=tb_perusahaan.id_perusahaan JOIN tb_akun ON tb_perusahaan.id_akun=tb_akun.id_akun JOIN tb_rekomendasi ON tb_tempat_menara.id_tempat=tb_rekomendasi.id_tempat WHERE tb_akun.username='$username' AND tb_perusahaan.nm_perusahaan='$perusahaan' AND tb_tempat_menara.status_tempat='cetak_rekom'");
 // echo print_r($query);
 //  if($riwayat==1){
 // $link = 'form_input_lokasi.php';//membuka form input menara
 // $link2= "../aksi/user/aksi_kirim_menara.php";// aksi kirim menara
 // $link3="../aksi/user/aksi_delete_menara.php";// aksi delete menara
 // $link4 ="edit_menara.php";
 // $link5 = "menara";
 //  }elseif($riwayat==2){
 //  $link = 'form_input_fo.php';//membuka form input menara
 //  $link2= "../aksi/user/aksi_kirim_fiber.php";//aksi kirim fiber
 //   $link3="../aksi/user/aksi_delete_menara.php";// aksi delete fiber
 //  $link4 ="edit_fo.php";
 //  $link5 = "fiber";
 //  }
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
    <style type="text/css">
      .nonaktiv{
        pointer-events: none;
      }
    </style>
</head>
<body>
   
    <?php include 'menu_user.php'; ?>

<br /><br />



 <!-- Breadcrumbs-->
<div class="container-fluid">
        <ol class="breadcrumb" style="font-size: 20px">
          <li class="breadcrumb-item">
            <a href="riwayat_pengajuan_fo.php">Riwayat Fiber Optik</a>
          </li>
          <li class="breadcrumb-item">
            <a href="riwayat_pengajuan_menara.php">Riwayat Menara</a>
          </li>
          
        </ol>
 </div>
  <div class="container-fluid">

    <div class="card mb-3">
          <div class="card-header"><h4>
            <i class="fas fa-table"></i>
            Riwayat Pengajuan Menara</h4></div>
          <div class="card-body">

         <div class="table-responsive">
              
               <table class="table table-bordered" style="text-align: center;">
        <tr>
            <th width="5%">No</th>
            <th>Nomor Surat</th>
            <th>Tanggal Pengajuan</th>
            <th>Tanggal Expired</th>
            <th>Status Surat</th>
            <th>Aksi</th>
        </tr>
        <tr>
          <?php
        $no = 1;
        $query = mysqli_query($config,"SELECT * FROM tb_tempat_menara JOIN tb_form_menara ON tb_tempat_menara.id_form=tb_form_menara.id_form JOIN tb_perusahaan ON tb_form_menara.id_perusahaan=tb_perusahaan.id_perusahaan JOIN tb_akun ON tb_perusahaan.id_akun=tb_akun.id_akun JOIN tb_rekomendasi ON tb_tempat_menara.id_tempat=tb_rekomendasi.id_tempat WHERE tb_akun.username='$username' AND tb_perusahaan.nm_perusahaan='$perusahaan' AND tb_tempat_menara.status_tempat='rekom_expired'");
        while($data = mysqli_fetch_assoc($query)){
        ?>
                <tr>
                  <td><p><?php echo $no++ ?></p></td>
                  <td><p><?php echo $data['no_surat'] ?></p></td>
                  <td><p><?php echo date("d-m-Y", strtotime($data['tgl_pengajuan']))?></p></td>
                  <td><p><?php echo date("d-m-Y", strtotime('+30 days', strtotime($data['tgl_rekomendasi'])))?></p></td>
                  <?php if($data['status_tempat']=='rekom_expired'){ ?>
                  <td><b><p class="text-danger">Surat Rekomendasi Expired !</p></b></td>
                  <td><a class="btn btn-primary" href="riwayat_pengajuan_menara.php?id=<?php echo $data['id_tempat'] ?>">Ajukan Ulang</a></td>
                  
                <?php } ?>
                </tr>
        <?php
            //include 'modal/modal_info_menara.php';
            }
        ?>
        <tr>
    </table>
  
             </div>
          </div>
        </div>

         <!-- Sticky Footer -->

    </div>
    <!-- /.content-wrapper -->


 <?php include '../modal/logoutmodal.php'; ?>

<!-- partial -->
  <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script><script  src="./script.js"></script>
   <script src="..admin/boostrap/vendor/jquery/jquery.min.js"></script>
  <script src="../admin/boostrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>