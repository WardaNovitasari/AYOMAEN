<?php
include "../../koneksi/koneksi.php";
$query = mysqli_query($config, "UPDATE tb_tempat_menara SET aset_lokasi='Aset Pemkot Yogyakarta' WHERE id_tempat='$_GET[kode_brg]'");
?>
