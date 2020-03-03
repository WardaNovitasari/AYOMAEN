<?php
include'../../koneksi/koneksi.php';
$var=$_GET['id'];
$tgl_disetujui=date("Y-m-d H:i:s");
mysqli_query($config,"UPDATE tb_form_menara SET status='disetujui', tgl_disetujui='$tgl_disetujui' WHERE id_form=$var");
echo '<script>alert("Data berhasil diterima");window.location="../index.php?halaman=formmenara";</script>'
?>