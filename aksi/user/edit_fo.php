<?php
require('../../koneksi/koneksi.php');
if(isset($_POST)){
	$sql = "UPDATE tb_tempat_fiber SET ".$_POST['name']."='".$_POST['value']."',alasan='', status_tempat='pengajuan' WHERE id_tempat=".$_POST['pk'];
	$query = mysqli_query($config,$sql);
	header("location=../../user/info_fiber.php?id=".$_POST['pk']."&step=2");
}
?>