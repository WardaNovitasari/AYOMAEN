<?php
include '../koneksi/koneksi.php';
$id=$_GET['id'];
$query=mysqli_query($config,"UPDATE tb_form_menara SET status='ditolak' WHERE id_form='$id'");

if($query){
	echo '<script>alert("Data berhasil ditolak ! ");window.location.href="tables_tempat2.php";</script>';
}else{
	echo 'eror';
}

?>