<?php
if(isset($_GET['id'])){
include "../../koneksi/koneksi.php";
$id = $_GET['id'];
$sql = mysqli_query($config,"UPDATE tb_tempat_menara SET status_tempat='proses_rekom' WHERE aset_lokasi='pemkot yogya' AND id_form ='$id' OR aset_lokasi='persil warga' AND id_form='$id'");
header("location:../../admin/cetak.php?id=".$id);
}
?>
