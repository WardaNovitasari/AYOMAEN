<?php
$id=$_GET['id'];
$status=$_GET['acc'];
require_once('../../koneksi/koneksi.php');
/*
	$query=mysqli_query($config,"UPDATE tb_form_menara SET status='hasil_survey' WHERE id_form='$id'");
	if($query){
		header("location=../../admin/pengajuan_menara.php");
	}else{
		echo 'gagal';
	}
	*/
if($status=='pengajuan'){
	$query=mysqli_query($config,"UPDATE tb_form_menara SET status='diterima' WHERE id_form='$id'");
}
?>