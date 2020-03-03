<?php
require('../../koneksi/koneksi.php');
if(isset($_POST)){
	$sql = "UPDATE tb_tempat_fiber SET ".$_POST['name']."='".$_POST['value']."' WHERE id_tempat=".$_POST['pk'];
	$query = mysqli_query($config,$sql);
	echo 'Update Data Berhasil.';
}
?>