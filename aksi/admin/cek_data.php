<?php
include "../../koneksi/koneksi.php";
$query = mysqli_query($config, "UPDATE tb_tempat_menara SET aset_lokasi='pemkot_yogya' where id_tempat='$_GET[kode_brg]'");
?>