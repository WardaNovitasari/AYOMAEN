<?php
require_once('../../koneksi/koneksi.php');
$id = $_GET['id'];
$next = $id + 1;
$query = mysqli_query($config,"SELECT * FROM tb_form_menara WHERE id_form='$next'");
$count = mysqli_num_rows($query);
if($count==0){
	echo '<script>window.location.href="next2.php?id='.$next.'";</script>';
}else{
	echo '<script>window.location.href="../../admin/format_berita_menara.php?id='.$next.'&form='.$form.'";</script>';
}

?>