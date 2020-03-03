<?php
$id=$_GET['id'];
$tipe=$_GET['tipe'];
echo $id,$tipe;
require('../../koneksi/koneksi.php');

if($tipe=='menara'){
	$query = mysqli_query($config,"DELETE FROM tb_tempat_menara WHERE id_tempat='$id'");
	echo '<script>alert("Data berhasil diajukan");window.location.href="../../user/riwayat.php"</script>';
	//header("location=../../user/info_menara.php?id=".$id."&step=2");
}elseif($tipe=='fiber'){
	$query = mysqli_query($config,"DELETE FROM tb_tempat_fiber WHERE id_tempat='$id'");
	 echo '<script>alert("Data berhasil diajukan");window.location.href="../../user/riwayat_fo.php"</script>';
	//header("location=../../user/info_fiber.php?id=".$id."&step=2");
}
?>