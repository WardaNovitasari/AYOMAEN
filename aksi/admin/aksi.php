<?php
require_once('../../koneksi/koneksi.php');
// ini_set('display_error',1);
// error_reporting('_all');

if(isset($_POST['submit'])){
$cek = $_POST['cek'];
$id  = $_POST['id_form'];
$email = $_POST['penerima'];
$jumlah = count($cek);

for($i=0;$i<$jumlah;$i++){
	$query = mysqli_query($config,"UPDATE tb_form_menara SET $cek[$i]='Ada' WHERE id_form = '$id'");
	if($query){
		if($jumlah==11){
			$query2="UPDATE tb_form_menara SET status_form='lengkap' WHERE id_form='$id'";
			$query5= mysqli_query($config, "UPDATE tb_tempat_menara SET status_tempat='pengajuan' WHERE id_form='$id'");
			$query3=mysqli_query($config,$query2) or die(mysqli_error($config));
			echo '<script>alert("Data berhasil di periksa");window.location.href="../../admin/pengajuan_menara.php#step-1";</script>';
		}elseif(in_array('soal_10', $cek)==false && in_array('soal_11', $cek)==false){
			$query4 = mysqli_query($config,"UPDATE tb_form_menara SET Soal_10='Kosong',Soal_11='Kosong' WHERE id_form = '$id'");
			$query5= mysqli_query($config, "UPDATE tb_tempat_menara SET status_tempat='pengajuan' WHERE id_form='$id'");
			$query2="UPDATE tb_form_menara SET status_form='lengkap' WHERE id_form='$id'";
			$query3=mysqli_query($config,$query2) or die(mysqli_error($config));
			echo '<script>alert("Data berhasil di periksa");window.location.href="../../admin/pengajuan_menara.php#step-1";</script>';
		}else{
			$query2="UPDATE tb_form_menara SET status_form='tidak_lengkap' WHERE id_form='$id'";
			$query3=mysqli_query($config,$query2) or die(mysqli_error($config));
			$query4=mysqli_query($config, "UPDATE tb_tempat_menara SET status_tempat='berkas tidak lengkap' WHERE id_form='$id'");
			echo '<script>alert("Data berhasil di periksa");history.go(-1);</script>';
		}
		
	}else{
		echo "eror";
	}
}
}
else{
	echo "eror";
}

?>