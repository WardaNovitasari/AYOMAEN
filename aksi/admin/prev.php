<?php
require_once('../../koneksi/koneksi.php');
$id = $_GET['id'];
$form = $_GET['form'];
$prev = $id - 1;
$query = mysqli_query($config,"SELECT * FROM tb_tempat_menara WHERE id_tempat='$prev' AND status_tempat='cetak_rekom' AND id_form='$form'");
$count = mysqli_num_rows($query);
if($count==0){
	echo '<script>window.location.href="prev.php?id='.$prev.'";</script>';
}else{
	echo '<script>window.location.href="../../admin/print_rekom.php?id='.$prev.'&form='.$form.'";</script>';
}

?>