<?php
include "../../koneksi/koneksi.php";
$query = mysqli_query($config, "UPDATE tb_tempat_menara SET $_GET[kolom]='$_GET[kode_brg]' WHERE id_tempat='$_GET[id_form]'");
?>