<?php
require '../../koneksi/koneksi.php';
if(isset($_POST['submit'])){
$id = $_POST['cek'];
$jumlah = count($id);
	if($jumlah > 0){
		for($i=0;$i<$jumlah;$i++){
      	$sql = mysqli_query($config,"UPDATE tb_tempat_fiber SET status_tempat='pengajuan' WHERE id_tempat='$id[$i]'");    
	}
		echo '<script>alert("Data berhasil diajukan");window.location.href="../../user/riwayat_fo.php"</script>';
	}else{
		echo '<script>alert("Tidak ada data yangv diajukan");window.location.href="../../user/riwayat_fo.php"</script>';
	}
}else{
      $id=$_GET['id'];
       $sql = mysqli_query($config,"UPDATE tb_tempat_fiber SET status_tempat='pengajuan' WHERE id_tempat='$id'"); 
       echo '<script>alert("Data berhasil diajukan");window.location.href="../../user/riwayat_fo.php"</script>';
}
?>