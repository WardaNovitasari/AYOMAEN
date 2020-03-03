<?php
if(isset($_POST['submit'])){
	require_once('../../koneksi/koneksi.php');
	$nama		= $_POST['nama'];
	$nip		= $_POST['nip'];
	$jabatan	= $_POST['jabatan'];

	$query = mysqli_query($config,"SELECT * FROM tb_pegawai WHERE nip='$nip'");
	$count = mysqli_num_rows($query);

	if($count > 0){
		echo "<script>alert('Nip yang anda masukkan telah terdaftar ! '); history.go(-1);</script>";
	}else{
		$query2 = mysqli_query($config,"INSERT INTO tb_pegawai (nama, nip, jabatan, posisi) VALUES ('$nama','$nip','$jabatan','pengawas')");
		if($query2){
			echo '<script>alert("Data berhasil di inputkan");window.location.href="../../admin/tambah_pengawas.php";</script>';
		}else{
			echo '<script>alert("Data gagal ditambahkan !");history.go(-1);</script>';
		}
	}
}
?>