<?php
require('../../koneksi/koneksi.php');
	$id_form=$_POST['id_form'];
	$id = $_POST['id_tempat'];
	$status = $_POST['status_tempat'];
	$keterangan = $_POST['keterangan'];
	$sql = "UPDATE tb_tempat_fiber SET status_tempat='ditolak', alasan='$keterangan' WHERE id_tempat='$id'";
	$query = mysqli_query($config,$sql);

	echo '<script>alert("Data berhasil di tolak");window.location.href="../../admin/info_fiber.php?id='.$id_form.'&step=1";</script>';
?>