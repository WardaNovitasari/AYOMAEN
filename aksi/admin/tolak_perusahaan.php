<?php
$id=$_GET['id'];
require_once('../../koneksi/koneksi.php');

	$query=mysqli_query($config,"UPDATE tb_perusahaan SET status_aktif='ditolak' WHERE id_perusahaan='$id'");
	if($query){
		echo '<script>alert("Pengajuan perusahaan berhasil ditolak");window.location.href="../../admin/pengajuan_akun.php";</script>';
		//header("location=../../admin/pengajuan_akun.php");
	}else{
		echo 'gagal';
	}
?>