<?php
include_once('../koneksi/koneksi.php');
//menampilkan error
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


session_start();
if(isset($_POST['submit'])){
$username=mysqli_real_escape_string($config,trim($_POST['username']));
$pw=mysqli_real_escape_string($config,trim($_POST['password']));
$password=md5($pw);
$query=mysqli_query($config,"SELECT * FROM tb_akun WHERE username='$username' AND password='$password'");
$count=mysqli_num_rows($query);

if($count < 1){
	echo '<script>alert("User tidak ditemukan"); window.location.href="../login.php"</script>';
}else{
	$result=mysqli_fetch_array($query);
	$status=$result['status_akun'];
	$level=$result['level'];
	$id_user=$result['id_akun'];
	$tipe = $result['tipe_akun'];

	if($status=='belum_verifikasi'){
		echo "<script>alert('Silahkan lakukan verifikasi dengan mengecek gmail anda !'); history.go(-1);</script>";
	}elseif($status=='terkirim'){
		echo "<script>alert('Silahkan tunggu, bila tidak ada perubahan silahkan hubungi admin'); history.go(-1);</script>";
	}else{

		if($level=='admin'){
			$_SESSION['username']=$username;
			$_SESSION['status']=$level;
			header("location:../multi.php", true, 301);
			exit();
		}else{
			if($tipe=='mitra'){
				echo 'hai user';
				$_SESSION['username']=$username;
				$_SESSION['status']=$level;
				$_SESSION['id_user']=$id_user;
				header("location:../multi.php", true, 301);
				exit();
			}else if($tipe='perusahaan'){
				$query2=mysqli_query($config,"SELECT * FROM tb_akun JOIN tb_perusahaan ON tb_akun.id_akun=tb_perusahaan.id_akun WHERE username='$username' AND password='$password'");
				$result2 = mysqli_fetch_array($query2);
				$nmperusahaan = $result2['nm_perusahaan'];
				$_SESSION['username']=$username;
				$_SESSION['status']=$level;
				$_SESSION['id_user'];
				$_SESSION['perusahaan']=$nmperusahaan;
				echo $_SESSION['perusahaan'];
				header('location:../user/home.php');
			}
		}
	}
}
}
?>
