<?php
require_once('../../koneksi/koneksi.php');
if($_POST['id']){
	$id 		= mysqli_escape_String($config,$_POST['id']);
	$firstname	= mysqli_escape_String($config,$_POST['firstname']);
	$lat 		= mysqli_escape_String($config,$_POST['lat']);
	$lng 		= mysqli_escape_String($config,$_POST['lng']);
	$kecamatan 	= mysqli_escape_String($config,$_POST['kec']);
	$kelurahan  = mysqli_escape_string($config,$_POST['kel']);
	$sql 		= "UPDATE tb_tempat_menara set alasan='$firstname', lat_hasil='$lat', lng_hasil='$lng', kecamatan='$kecamatan', kelurahan='$kelurahan' WHERE id_tempat='$id'";
	mysqli_query($config,$sql);
}
?>