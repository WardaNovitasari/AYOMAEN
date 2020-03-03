<?php
require_once('../../koneksi/koneksi.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$id = $_GET['id'];
$status = $_GET['status'];
$tgl = date("Y-m-d");

	if($status=='pengajuan'){
		$sql = mysqli_query($config,"UPDATE tb_tempat_menara SET status_tempat='proses_survey' WHERE id_tempat='$id'");
		echo '<script>alert("Data berhasil di update");history.go(-1);</script>';
	}elseif($status=='hasil_survey'){
		$sql = mysqli_query($config,"UPDATE tb_tempat_menara SET status_tempat='proses_rekom', tgl_disetujui='$tgl' WHERE id_tempat='$id'");
		echo '<script>alert("Data berhasil di update");history.go(-1);</script>';
	}elseif($status == 'proses_rekom'){
		$sql = mysqli_query($config,"UPDATE tb_tempat_menara SET status_tempat='cetak_rekom' WHERE id_tempat='$id'");
		echo '<script>alert("Data berhasil di update");history.go(-1);</script>';
		
	}
?>