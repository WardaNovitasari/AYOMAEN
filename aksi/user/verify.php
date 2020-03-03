<?php
include '../../koneksi/koneksi.php';
$hint=$_GET['id'];
$id=$_GET['id2'];

$query = mysqli_query($config,"SELECT * FROM tb_akun WHERE id_akun='$id'");
$data = mysqli_fetch_array($query);

if($data['tipe_akun']=='mitra'){
mysqli_query($config,"UPDATE tb_akun SET status_akun='terverifikasi' WHERE hint='$hint' AND id_akun='$id'");
header('location:../../login.php');
}
elseif($data['tipe_akun']=='perusahaan'){
	$query2 = mysqli_query($config,"UPDATE tb_akun SET status_akun='terverifikasi' WHERE hint='$hint' AND id_akun='$id'");
	$query3 = mysqli_query($config,"UPDATE tb_perusahaan SET status_aktif='diterima' WHERE id_akun='$id'");
	header('location:../../login.php');
}
?>