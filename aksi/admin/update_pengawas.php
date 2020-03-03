<?php
require_once('../../koneksi/koneksi.php');
if($_POST['id']){
	$id=mysqli_escape_String($config,$_POST['id']);
	$nip=mysqli_escape_String($config,$_POST['nip']);
	$nama = mysqli_escape_string($config,$_POST['nama']);
	$jabatan = mysqli_escape_string($config,$_POST['jabatan']);
	$sql = "UPDATE tb_pegawai set nip='$nip', nama='$nama', jabatan='$jabatan' WHERE id_pegawai='$id'";
mysqli_query($config,$sql);
}
?>