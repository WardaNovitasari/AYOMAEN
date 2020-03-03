<?php
$id=$_GET['id'];
require_once('../../koneksi/koneksi.php');

	$query=mysqli_query($config,"DELETE FROM tb_akun WHERE id_akun='$id'");
	if($query){
		$query2 = mysqli_query($config,"DELETE FROM tb_perusahaan WHERE id_akun='$id'");
		echo '<script>alert("Akun Berhasil Dihapus");window.location.href="../../admin/pengajuan_akun.php";</script>';
		//header("location=../../admin/pengajuan_akun.php");
	}else{
		echo 'gagal';
	}
?>