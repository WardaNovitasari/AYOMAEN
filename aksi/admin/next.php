<?php
require_once('../../koneksi/koneksi.php');
$id = $_GET['id'];
$form = $_GET['form'];
$next = $id + 1;
$query = mysqli_query($config,"SELECT * FROM tb_tempat_menara WHERE id_tempat='$next' AND status_tempat='cetak_rekom' AND id_form='$form'");
$count = mysqli_num_rows($query);
if($count==0){
	echo '<script>window.location.href="next.php?id='.$next.'";</script>';
}else{
	echo '<script>window.location.href="../../admin/print_rekom.php?id='.$next.'&form='.$form.'";</script>';
}

?>