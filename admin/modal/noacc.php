<?php
include'../../koneksi/koneksi.php';
$var=$_GET['id'];
mysqli_query($config,"UPDATE tb_form_menara SET status=0 WHERE id_form='$var'");
echo '<script>alert("Data berhasil diterima");window.location="../index.php?halaman=formmenara";</script>'
?>