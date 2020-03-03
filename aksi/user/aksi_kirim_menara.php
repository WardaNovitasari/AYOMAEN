<?php
require '../../koneksi/koneksi.php';
if(isset($_POST['submit'])){
$id = $_POST['cek'];
$jumlah = count($id);
	if($jumlah > 0){
		for($i=0;$i<$jumlah;$i++){
      		$sql = mysqli_query($config,"UPDATE tb_tempat_menara SET status_tempat='pengajuan' WHERE id_tempat='$id[$i]'");    
		}
		echo '<script>alert("Data berhasil diajukan");window.location.href="../../user/riwayat.php"</script>';
	}else{
		echo '<script>alert("Tidak ada data yang diajukan");window.location.href="../../user/riwayat.php"</script>';
	}
}elseif($_POST['hapus']){
	$id = $_POST['cek'];
	$jumlah = count($id);
	if($jumlah > 0){
		for($i=0;$i<$jumlah;$i++){
      		$sql = mysqli_query($config,"DELETE FROM tb_tempat_menara  WHERE id_tempat='$id[$i]'");    
		}
		echo '<script>alert("Data berhasil diHAPUS");window.location.href="../../user/riwayat.php"</script>';
	}else{
		echo '<script>alert("Tidak ada data yang dihapus");window.location.href="../../user/riwayat.php"</script>';
	}
}
else{
      $id=$_GET['id'];
      $sql = mysqli_query($config,"UPDATE tb_tempat_menara SET status_tempat='pengajuan' WHERE id_tempat='$id'"); 
      echo '<script>alert("Data berhasil diajukan");window.location.href="../../user/riwayat.php"</script>';
}
?>