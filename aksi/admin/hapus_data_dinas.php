<?php
require_once('../../koneksi/koneksi.php');
$id=$_GET['id'];

	$query=mysqli_query($config,"DELETE FROM tb_dinas WHERE id_dinas='$id'");
	if($query){
		echo '<script>alert("Data Dinas Berhasil Dihapus");window.location.href="../../admin/tambah_dinas.php";</script>';
		//header("location=../../admin/pengajuan_akun.php");
	}else{
		echo 'gagal';
	}
?>