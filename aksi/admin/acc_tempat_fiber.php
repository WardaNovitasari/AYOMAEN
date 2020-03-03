<?php
require_once('../../koneksi/koneksi.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$id_form=$_GET['id_form'];
var_dump($id_form);
$id = $_GET['id'];
$status = $_GET['status'];
$tgl = date("Y-m-d");

	if($status=='pengajuan'){
		$sql = mysqli_query($config,"UPDATE tb_tempat_fiber SET status_tempat='hasil_survey' WHERE id_tempat='$id'");
		echo '<script>alert("Data berhasil di update");window.location.href="../../admin/info_fiber.php?id='.$id_form.'&step=1";</script>';
	}elseif($status=='hasil_survey'){
		$sql = mysqli_query($config,"UPDATE tb_tempat_fiber SET status_tempat='proses_rekom', tgl_disetujui='$tgl' WHERE id_tempat='$id'");
		echo '<script>alert("Data berhasil di update");window.location.href="../../admin/info_fiber.php?id='.$id_form.'&step=2";</script>';
	}elseif($status == 'proses_rekom'){
		$sql = mysqli_query($config,"UPDATE tb_tempat_fiber SET status_tempat='cetak_rekom' WHERE id_tempat='$id'");
		echo '<script>alert("Data berhasil di update");window.location.href="../../admin/info_fiber.php?id='.$id_form.'&step=3";</script>';
	}
?>