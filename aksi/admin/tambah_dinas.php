<?php
if(isset($_POST['submit'])){
	require_once('../../koneksi/koneksi.php');
	$nama_dinas		= $_POST['nama_dinas'];
	$pimpinan		= $_POST['pimpinan'];
	$phone			= $_POST['phone'];
	$email			= $_POST['email'];
	$keterangan_penugasan = $_POST['keterangan_penugasan'];

	$query = mysqli_query($config,"SELECT * FROM tb_dinas WHERE id_dinas='$id_dinas'");
	$count = mysqli_num_rows($query);

	if($count > 0){
		echo "<script>alert('ID yang anda masukkan telah terdaftar ! '); history.go(-1);</script>";
	}else{
		$query2 = mysqli_query($config,"INSERT INTO tb_dinas (nama_dinas, pimpinan, phone, email, keterangan_penugasan) VALUES ('$nama_dinas', '$pimpinan', '$phone','$email','$keterangan_penugasan')");
		if($query2){
			echo '<script>alert("Data berhasil di inputkan");window.location.href="../../admin/tambah_dinas.php";</script>';
		}else{
			echo '<script>alert("Data gagal ditambahkan !");history.go(-1);</script>';
		}
	}
}
?>