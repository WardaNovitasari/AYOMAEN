<?php
require_once('../../koneksi/koneksi.php');
$id = $_GET['id'];

$query = mysqli_query($config,"UPDATE tb_tempat_menara SET aset_lokasi='', alasan='' , status_tempat='proses_survey' WHERE id_tempat='$id'");
echo '<script>history.go(-1);</script>';
?>