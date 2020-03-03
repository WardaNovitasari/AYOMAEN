<?php
session_start();

@$riwayat = $_GET['riwayat'];

$_SESSION['riwayat']=$riwayat;

if($_SESSION['riwayat']==1){
	header("location:riwayat.php");
}elseif($_SESSION['riwayat']==2){
	header("location:riwayat_fo.php");
}
?>