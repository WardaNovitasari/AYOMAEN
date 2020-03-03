<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require ('../../koneksi/koneksi.php');
$username=$_SESSION['username'];
if(isset($_POST['submit'])){
	$nmperusahaan	= $_POST['nm_perusahaan'];
	$alamat 		= $_POST['alamat'];

	$query1=mysqli_query($config,"SELECT * FROM tb_akun WHERE username='$username'");
	$result1=mysqli_fetch_array($query1);
	$id=$result1['id_akun'];
	
	$query2=mysqli_query($config,"INSERT INTO tb_perusahaan VALUES('','$id','$nmperusahaan','$alamat','terkirim')");
	if($query2){
		echo '<script>alert("data berhasil ditambahkan");history.go(-1);</script>';
	}
}
?>