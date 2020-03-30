<?php
include "../../koneksi/koneksi.php";
$query = mysqli_query($config, "UPDATE tb_tempat_menara SET status_tempat='revisi' WHERE id_tempat='$_GET[id]'");
echo '<script>alert("Data telah dikonfirmasi");history.go(-1);</script>'
?>