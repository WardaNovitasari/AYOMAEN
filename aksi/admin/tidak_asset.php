<?php
include "../../koneksi/koneksi.php";
if(isset($_POST['submit'])){
	$nama = $_GET['id_tempat1'];
	$query2 = mysqli_query($config, "UPDATE tb_tempat_menara SET aset_lokasi='revisi' WHERE id_tempat='$nama'");
	echo '<script>alert("data berhasil direcord");</script>';
}
?>