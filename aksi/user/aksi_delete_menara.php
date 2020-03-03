<?php
require '../../koneksi/koneksi.php';
require '../../file/excel_reader.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$id 	= $_GET['id'];
$query     = mysqli_query($config,"SELECT * FROM tb_form_menara JOIN download ON tb_form_menara.id_form=download.id_form WHERE download.id_form='$id' AND download.id_tipe=2");
$menara 	= mysqli_fetch_array($query);
$directori 	= '../'.$menara['file'];
$nm_file   	= $menara['nama_file'];

$query1     = mysqli_query($config,"SELECT * FROM tb_form_menara JOIN download ON tb_form_menara.id_form=download.id_form WHERE download.id_form='$id' AND download.id_tipe=1");
$menara1    = mysqli_fetch_array($query1);
$directori2 = '../'.$menara1['file'];
$nm_file2   = $menara1['nama_file'];

@chmod($directori, 0777);
@chmod($directori, 0777);
unlink($directori);
unlink($directori2);
$query2 = mysqli_query($config,"DELETE FROM download WHERE id_form='$id'");
$query3 = mysqli_query($config,"DELETE FROM tb_form_menara WHERE id_form='$id'");
if($query2 && $query3){
      echo 'hapus berhasil';
}else{
      echo 'hapus gagal';
}
?>