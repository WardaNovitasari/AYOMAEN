<?php
include "../../koneksi/koneksi.php";
$query2 = mysqli_query($config, "UPDATE tb_tempat_menara SET aset_lokasi='persil warga' WHERE id_tempat='$_GET[kode_brg]'");
?>
