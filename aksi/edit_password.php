<?php 
require_once('../koneksi/koneksi.php');
session_start();
$pw =md5($_POST['pw_baru']);
$username = $_SESSION['username'];

$query = mysqli_query($config,"UPDATE tb_akun SET password = '$pw' WHERE username='$username'");
if($query){
	echo '<script>alert("Data berhasil di update ! ");history.go(-1);</script>';
}
?>