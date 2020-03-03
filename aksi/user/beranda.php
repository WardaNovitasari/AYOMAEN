<?php
session_start();
if(isset($_POST['submit'])){
	$nmperusahaan = $_POST['nmperusahaan'];
	$_SESSION['perusahaan']=$nmperusahaan;
	echo $_SESSION['perusahaan'];
	header('location:../../user/home.php');
}
?>