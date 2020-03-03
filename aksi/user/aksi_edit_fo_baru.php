<?php
require '../../koneksi/koneksi.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if(isset($_POST['update'])){
	$id_tempat="id_tempat = ".$_POST['id_tempat'];
	$nositeid="site_id = ".$_POST['nositeid'];
	$alamat="alamat = '".$_POST['alamat']."'";
	$kelurahan="kelurahan = '".$_POST['kelurahan']."'";
	$kecamatan="kecamatan = '".$_POST['kecamatan']."'";
	$lat="lat = ".$_POST['lat'];
	$lng="lng = ".$_POST['long'];
	$tipe_menara="tipe_menara = '".$_POST['tipe_menara']."'";
	$tinggi="tinggi = ".$_POST['tinggi'];
	$status="status_tempat = 'belum_dikirim'";
 	$keterangan="alasan = ''";
	/*$data = array(
		'site_id'=>'site_id = '.$nositeid,
		'alamat'=>'alamat = '.$alamat,
		'kelurahan'=>'kelurahan = '.$kelurahan,
		'kecamatan'=>'kecamatan = '.$kecamatan,
		'lat'=>'lat = '.$lat,
		'lng'=>'lng = '.$lng,
		'tipe_menara'=>'tipe_menara = '.$tipe_menara,
		'tinggi'=>'tinggi = '.$tinggi,
		'status_tempat'=>'status_tempat=pengajuan'
	);*/
	$query1=mysqli_query($config,"UPDATE tb_tempat_fiber SET $alamat,$kelurahan,$kecamatan,$lat,$lng,$tipe_menara,$tinggi,$status,$keterangan WHERE $id_tempat");
	if($query1){
		echo "berhasil";
		echo '<script>alert("Data berhasil diupdate");window.location.href="../../user/riwayat_fo.php";</script>';
	}else{
		echo "gagal";
	}
}
?>