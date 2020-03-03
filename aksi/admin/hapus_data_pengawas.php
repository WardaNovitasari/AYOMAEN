<?php
require_once('../../koneksi/koneksi.php');
$id=$_GET['id'];

	$query=mysqli_query($config,"DELETE FROM tb_pengawas WHERE id_pengawas='$id'");
	if($query){
		echo '<script>alert("Data Pengawas Berhasil Dihapus");window.location.href="../../admin/tambah_pengawas.php";</script>';
		//header("location=../../admin/pengajuan_akun.php");
	}else{
		echo 'gagal';
	}
?>