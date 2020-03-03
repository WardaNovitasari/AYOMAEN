<?php
require_once('../../koneksi/koneksi.php');
if($_POST['id']){
	$id=mysqli_escape_String($config,$_POST['id']);
	$nip=mysqli_escape_String($config,$_POST['nip']);
	$nama = mysqli_escape_string($config,$_POST['nama']);
	$jabatan = mysqli_escape_string($config,$_POST['jabatan']);
	$sql = "UPDATE tb_apisms set username_api='$nip', password_api='$nama', url_api='$jabatan' WHERE id_api='$id'";
mysqli_query($config,$sql);
}
?>