<?php
require_once('../../koneksi/koneksi.php');

$kecamatan = $_POST['kecamatan'];
$query= mysqli_query($config,"SELECT * FROM tb_kecamatan WHERE kecamatan='$kecamatan'");
$data = mysqli_fetch_array($query);
$id = $data['digit_awal'];

$query2 = mysqli_query($config,"SELECT * FROM tb_kelurahan WHERE digit_awal='$id'");
while($data2=mysqli_fetch_array($query2)){
	echo '<option value="'.$data2['kelurahan'].'">'.$data2['kelurahan'].'</option>';
}
?>
