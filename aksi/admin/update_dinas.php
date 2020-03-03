<?php
require_once('../../koneksi/koneksi.php');
if($_POST['id']){
	$id_dinas=mysqli_escape_String($config,$_POST['id']);
	$nama_dinas = mysqli_escape_string($config,$_POST['nama_dinas']);
	$pimpinan = mysqli_escape_string($config,$_POST['pimpinan']);
	$phone = mysqli_escape_string($config,$_POST['phone']);
	$email = mysqli_escape_string($config,$_POST['email']);
	$keterangan_penugasan = mysqli_escape_string($config,$_POST['keterangan_penugasan']);
	$sql = "UPDATE tb_dinas set nama_dinas='$nama_dinas', pimpinan='$pimpinan', phone='$phone', email='$email', keterangan_penugasan='$keterangan_penugasan' WHERE id_dinas='$id_dinas'";
mysqli_query($config,$sql);
}
?>