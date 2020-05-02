<?php
include '../koneksi/koneksi.php';
require 'vendor/autoload.php';
session_start();
  if(empty($_SESSION['username'])){
    header("location:../login.php");
  }elseif($_SESSION['status']!='admin'){
    header("location:../404.html");
  }
  require_once 'dompdf/autoload.inc.php';
  require_once '../koneksi/koneksi.php';

  use Dompdf\Dompdf;
  $dompdf = new Dompdf();
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  $id= $_GET['id'];

  // BARCODE GENERATOR
  $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
  
  $update = mysqli_query($config, "UPDATE `tb_tempat_menara` SET `status_tempat`='rekom_terbit' WHERE id_tempat='$id'");
  $rekomendasi = mysqli_query($config,"SELECT * FROM tb_rekomendasi, tb_dinas  WHERE tb_rekomendasi.id_dinas=tb_dinas.id_dinas AND tb_rekomendasi.id_tempat='$id'");
  $data_rekom = mysqli_fetch_array($rekomendasi);
  $perusahaan = mysqli_query($config,"SELECT * FROM tb_tempat_menara JOIN tb_kecamatan JOIN tb_kelurahan JOIN tb_perusahaan JOIN  tb_form_menara ON tb_tempat_menara.kelurahan=tb_kelurahan.kelurahan AND tb_tempat_menara.kecamatan=tb_kecamatan.kecamatan AND tb_tempat_menara.id_form = tb_form_menara.id_form  AND tb_form_menara.id_perusahaan=tb_perusahaan.id_perusahaan WHERE tb_tempat_menara.id_tempat = '$id'");
  $data_pt = mysqli_fetch_array($perusahaan);
  $cek = mysqli_query($config,"SELECT * FROM tb_tempat_menara WHERE id_tempat='$id'");
   $hslcek = mysqli_fetch_assoc($cek);
   if ($hslcek['site_id_hasil']==NULL) {
     $querysite = mysqli_query($config,"SELECT max(site_id_hasil) as maxSite FROM tb_tempat_menara");
    $datasite = mysqli_fetch_array($querysite);
    $sitebaru = $datasite['maxSite'];
    $nourut = substr($sitebaru, 3, 4);
    $nourut++; 
    $siteidhasil = sprintf("%04s", $nourut) ;
    $siteupdate = mysqli_query($config, "UPDATE tb_tempat_menara SET site_id_hasil='$siteidhasil' WHERE id_tempat='$id'");
   }
  $query = mysqli_query($config,"SELECT * FROM tb_tempat_menara WHERE id_tempat='$id'");
  $data = mysqli_fetch_array($query);

  $pegawai = mysqli_query($config,"SELECT * FROM tb_pegawai WHERE jabatan='KEPALA'");
  $dt_pegawai = mysqli_fetch_array($pegawai);


  function tgl_indo($tanggal){
  $bulan = array (
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $pecahkan = explode('-', $tanggal);

  // variabel pecahkan 0 = tanggal
  // variabel pecahkan 1 = bulan
  // variabel pecahkan 2 = tahun

  return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
  
}

 $html = '<!DOCTYPE html>
<html>
<head>
	<title>Berita Acara</title>
  <link rel="shortcut icon" href="../dashboard/images/ico/ico.png">
	<link rel="stylesheet" type="text/css" href="view/style.css">
	<link href="boostrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<script src="view/js/jquery.js"></script>
</head>
<body>
	<div class="kopsurat">
			<img src="view/logo.png">
			<p style="font-size: 22px;">PEMERINTAH KOTA YOGYAKARTA</p>
			<b><h3>DINAS KOMUNIKASI INFORMATIKA DAN PERSANDIAN</h3></b>
			<p>Jl. Kenari No. 56 Yogyakarta Kode Pos 55165 Telp.(0274)551230, 515865, 562682 Fax. (0274)520332</p>
			<p>EMAIL : <u>kominfosandi@jogjakota.go.id:</u></p>
			<p>HOTLINE SMS: 081 2278 0001; HOTLINE EMAIL : <u>upik@jogjakota.go.id</u></p>
			<p>WEBSITE: www.jogjakota.go.id</p>
			<hr style="border-width: 3px;">
			<hr>
	</div>
	<div class="bodysurat">
		<h3><u>REKOMENDASI TITIK LOKASI MENARA TELEKOMUNIKASI</u></h3>
		<center><p>Nomor 555 / '.$id.' </p></center><p>&nbsp;</p>
		<p>Menindaklanjuti Permohonan Rekomendasi Titik Lokasi Menara Telekomunikasi Nomor '.$data_pt['no_surat'].' dari '.$data_pt['nm_perusahaan'].'tertanggal '.tgl_indo($data_pt['tgl_pengajuan']).' , serta berdasarkan :
    <table border="0" class="tbcontainer">
    <tr><td>1.</td> 
    <td>Peraturan Daerah Kota Yogyakarta Nomor 7 Tahun 2017 tentang Penataan dan Pengendalian Menara Telekomunikasi dan Fiber Optik.<br>
    </td></tr>
     <tr><td>2.</td>
     <td>Peraturan Walikota Yogyakarta Nomor 66 Tahun 2018 tentang Petunjuk Pelaksanaan Peraturan Daerah Kota Yogyakarta Nomor 7 Tahun 2017 tentang Penataan dan Pengendalian Menara Telekomunikasi dan Fiber Optik.<br>
     </td></tr>
     <tr><td>3.</td>
     <td>Keputusan Walikota Yogyakarta Nomor 384 Tahun 2017 tentang Penetapan Lokasi Pendirian MenaraMicrocell.<br>
     </td></tr>
	   <tr><td>4.</td>
     <td>Berita Acara Peninjauan Titik Lokasi Penempatan Menara Telekomunikasi Nomor 490/'.$data_pt['id_form'].' Tanggal '.tgl_indo($data_pt['tgl_surat']).'.<br>
     </td></tr>
     </table>
     </p>
	   <p>Dinas Komunikasi Informatika dan Persandian Kota Yogyakarta memberikan rekomendasi titik lokasi menara telekomunikasi kepada '.$data_pt['nm_perusahaan'].' yang beralamatkan '.$data_pt['alamat_perusahaan'].' untuk pembangunan menara telekomunikasi bersama dengan data berikut :
     </p>
									<table border="0" class="tbcontainer">
											<tr><td><p>a. Site ID</p></td><td>:</td><td>'.$data_pt['digit_awal'].$data_pt['digit_akhir'].'.'.$data['site_id_hasil'].'</td></tr>
											<tr><td><p>b. Titik Koordinat</p></td><td>:</td><td> <p>Latitude '.$data['lat'].' Longitude '.$data['lng'].'</p></td></tr>
											<tr><td><p>c. Tinggi</p></td><td><p>:</p></td><td> <p> '.$data['tinggi'].' meter</p></td></tr>
											<tr><td><p>d. Alamat</p></td><td><p>:</td><td><p>'.$data['alamat'].','.$data['kelurahan'].','.$data['kecamatan'].'</p></td></tr>
											<tr><td><p>e. Zona</p></td><td><p>:</p></td><td><p> Menara Kamuflase</p></td></tr>
											<tr><td><p>f. Status Tanah</p></td><td><p>:</p></td><td><p>'.$data['aset_lokasi'].'</p></td></tr>
											<tr><td><p>g. Penggunaan Aset</p></td><td><p>:</p></td><td><p>'.$data_rekom['nama_dinas'].'</p></td></tr>
											<tr><td><p>h. Tipe Site</p></td><td><p>:</p></td><td><p>'.$data['tipe_menara'].'</p></td></tr>
											<tr><td><p>i. Tipe Menara</p></td><td><p>:</p></td><td><p>'.$data['tipe_site'].' Kaki</p></td></tr>
											<tr><td><p>j. Keterangan</p></td><td><p>:</p></td><td><p id="tipe-menara">'.$data_rekom['keterangan_rekomendasi'].'</p></td></tr>
									</table>
									<p>
                  Dengan ketentuan sebagai berikut :
                  </p>
									<table border="0" class="tbcontainer">
                  <tr><td>1.</td> 
                  <td>Rekomendasi Titik Lokasi Menara Telekomunikasi adalah keterangan bahwa koordinat tersebut diatas dapat ditempatkan menara telekomunikasi dan <b><u>bukan</u></b> merupakan izin pendirian menara telekomunikasi;</td></tr>
									<tr><td>2.</td> 
                  <td>Rekomendasi ini berlaku 30 hari kerja sejak diterbitkan;</td></tr>
									<tr><td>3.</td>
                  <td>Penyedia menara wajib melaporkan penggunaan menaranya 1 (satu) kali dalam setahun meliputi nama dan jumlah pengguna menara, kapasitas yang tersisa, masa kontrak pengguna menara, rencana penempatan antena dan daftar calon pengguna menara kepada Dinas Komunikasi Informatika dan Persandian Kota Yogyakarta;</td></tr>
                  </table>
                <p>
									Demikian untuk menjadi periksa.
								</p>
 								<br>
 									<table border="0" align="right" class="tbcontainer">
 										<tr><td><center><p>Yogyakarta, '.tgl_indo($data_rekom['tgl_rekomendasi']).'</p></center></td></tr>
 										<tr><td><center><p>KEPALA</p></center></td></tr>
 										<tr><td>&nbsp;</td></tr>
 										<tr><td>&nbsp;</td></tr>
 										<tr><td>&nbsp;</td></tr>
                    <tr><td>&nbsp;</td></tr>
 										<tr><td><u><center><p>'.$dt_pegawai['nama'].'</p></center></u></td></tr>
 										<tr><td><center><p>NIP.'.$dt_pegawai['nip'].'</p>
                    <br>
                    <br>
                    <p><img src="data:image/png;base64,' . base64_encode($generator->getBarcode($data_pt['digit_awal'].$data_pt['digit_akhir'].'.'.$data['site_id_hasil'], $generator::TYPE_CODE_128, 2, 20)) . '"></p>

                    </center></td></tr>';
                    

                    
$html .='
                    </p><br>
                    </center></td></tr>
 									</table>
 									<br>
 									<br>
 									<br>
 									<br>
 									<br>
 									<br>
                  <ol>
								 	Tembusan :
								 	';
                    if($data_rekom['id_dinas']==''){
                  $html .='
 										<li><p>Dinas Penanaman Modal dan Perizinan Kota Yogyakarta;</p></li>
 										<li><p>Kantor Satuan Polisi Pamong Praja Kota Yogyakarta.</p></li>';
                  }else{
                  $html .='
                  <li><p>'.$data_rekom['nama_dinas'].'</p></li>
                  <li><p>Dinas Penanaman Modal dan Perizinan Kota Yogyakarta;</p></li>
                  <li><p>Kantor Satuan Polisi Pamong Praja Kota Yogyakarta.</p></li>';
                }
                $html .='
 									</ol>
                  
								</div>
						</div>
					</body>
				</html>';

   $dompdf->loadHtml($html);
    // (Opsional) Mengatur ukuran kertas dan orientasi kertas
    $dompdf->setPaper('f4', 'potrait');
    // Menjadikan HTML sebagai PDF
    $dompdf->render();
    // Output akan menghasilkan PDF ke Browser
    $dompdf->stream("Surat_Rekom",array("Attachment"=>0));
  ?>
