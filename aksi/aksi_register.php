<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require ('../koneksi/koneksi.php');

if(isset($_POST['submit'])){
//form tb_akun
$email 		= $_POST['email'];
$password 	= md5($_POST['password']);
$namapt 	= $_POST['namapt'];
$nm 		= $_POST['name'];
$nohp  		= $_POST['no_telepon'];
$nohp2      = '62'.$nohp;
//chek validasi
$akun 		= mysqli_query($config,"SELECT * FROM tb_akun WHERE username='$email'");
$perusahaan = mysqli_query($config,"SELECT * FROM tb_perusahaan WHERE nm_perusahaan='$namapt'");
$count  	= mysqli_num_rows($akun);
$count2  	= mysqli_num_rows($perusahaan);
$status 	= $_POST['optradio'];


if($count > 0 || $count2 > 0){
	echo '<script>alert("Email atau perusahaan telah terafdatar");history.go(-1);</script>';
}else{
	$query 		= mysqli_query($config,"INSERT INTO tb_akun VALUES('','$email','$email','$password','pengajuan','user','','$status','$nm','$nohp2')");
	$perusahaan = mysqli_query($config,"SELECT * FROM tb_akun WHERE username='$email'");
	$akun 		= mysqli_fetch_array($perusahaan);
	$id 		= $akun['id_akun'];
	$alamat 	= $_POST['alamat'];
	if($query){
		$query2 = mysqli_query($config,"INSERT INTO tb_perusahaan VALUES('','$id','$namapt','$alamat','terkirim')");
			if($query2){
				echo '<script>alert("Registrasi Berhasil !"); window.location.href="../login.php"; </script>';
			}else{
				echo '<script>alert("Registrasi  !"); history.go(-1); </script>'.mysql_error();	
			}
	}else{
		mysqli_error();
	}
}

//insert data tb _akun

}
/*$validemail= "/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i";
$password = md5($_POST['password']);
if(!preg_match($validemail, $email)){
    // Return Error - Invalid Email
    echo "<script>alert('Invalid Email')</script>";
}else{
    // Return Success - Valid Email
    if(!empty($nama) && !empty($nmperusahaan) && !empty($email) && !empty($alamat) && !empty($password)){
	$query=mysqli_query($config,"SELECT * FROM tb_user WHERE nm_perusahaan='$nmperusahaan'");
	$validate=mysqli_num_rows($query);

	//verifikasi kesediaan email pada database
		if($validate<1){ 
		mysqli_query($config,"INSERT INTO tb_user(username,nama,nm_perusahaan,alamat,email,password,level) VALUES ('$email','$nama','$nmperusahaan','$alamat','$email','$password',2)") or die(mysqli_error());

			// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

//Load composer's autoloader

$admin=mysqli_query($config,"SELECT * FROM tb_user WHERE username='admin'");
$server=mysqli_fetch_array($admin);
$serveremail=$server['email'];
$serverpw=$server['password'];

/*require("phpmail/_lib/class.phpmailer.php"); // path to the PHPMailer class
$mail = new PHPMailer();
$mail->IsSMTP(); // telling the class to use SMTP
$mail->Mailer = "smtp";
$mail->SMTPSecure = "tsl";
$mail->Host = "ssl://smtp.gmail.com";
$mail->Port = 465;
$mail->SMTPAuth = true; // turn on SMTP authentication
$mail->Username = $serveremail; // SMTP username
$mail->Password = $serverpw; // SMTP password
$mail->From = $serveremail;
$mail->AddAddress($email);
$mail->Subject = "Konfirmasi Registrasi Akun";
$mail->Body = "klik link berikut untuk validasi Akun http://localhost/cleo/verify.php?id=".$hash;
$mail->Send();

			echo '<script>alert("register berhasil"); window.location.href="../login.php";</script>';

		}else{
			echo '<script>alert("Perusahaan telah terdaftar"); history.go(-1); </script>';
		}

	}else{
		echo 'gagal input';
	}
}
?>*/
?>