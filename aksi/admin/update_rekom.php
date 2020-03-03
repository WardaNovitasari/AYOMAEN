<?php
require('../../koneksi/koneksi.php');
	$tb_berita_acara = mysqli_query($config,"SELECT * FROM tb_rekomendasi WHERE id_tempat='$_GET[id_form]'");
	$count = mysqli_num_rows($tb_berita_acara);
	if($count > 0){
		$sql = "UPDATE tb_rekomendasi SET $_GET[kolom] ='$_GET[kode_brg]' WHERE id_tempat='$_GET[id_form]'";
		$query = mysqli_query($config,$sql);
	echo 'Update Data Berhasil';
	}else{
		$sql = "INSERT INTO tb_rekomendasi (id_tempat,$_GET[kolom]) VALUES('$_GET[id_form]','$_GET[kode_brg]')";
		$query = mysqli_query($config,$sql);
	echo 'Update Data Berhasil';
	}
	
?>