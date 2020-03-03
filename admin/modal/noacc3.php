<?php
include '../../koneksi/koneksi.php';
if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $ket=$_POST['catatan'];
    $query=mysqli_query($config,"UPDATE tb_tempat_fo SET status='ditolak', keterangan='$ket' WHERE id='$id'")or die(mysqli_error());
    if($query){
    echo '<script>alert("Data berhasil ditolak"); history.go(-1);</script>';
}else{
	echo '<script>alert("Data gagal ditolak"); history.go(-1);</script>';
}
}
?>