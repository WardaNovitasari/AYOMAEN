<?php
session_start();
$level=$_SESSION['status'];
if($level=='admin'){
	header("location:admin/index.php");
}else{
	header("location:user/index.php");
}

?>