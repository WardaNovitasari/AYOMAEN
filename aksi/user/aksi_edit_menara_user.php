<?php
require '../../koneksi/koneksi.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if(isset($_POST['button'])){
    $id=$_POST['id'];
    $site_id=$_POST['site_id'];
    $alamat=$_POST['alamat'];
    $kelurahan=$_POST['kelurahan'];
    $kecamatan=$_POST['kecamatan'];
    $lat=$_POST['lat'];
    $lng=$_POST['lng'];
    $tipe_menara=$_POST['tipe_menara'];
    $tinggi=$_POST['tinggi'];
	$query1=mysqli_query($config,"UPDATE tb_tempat_menara SET site_id='$site_id', alamat='$alamat', kelurahan='$kelurahan', kecamatan='$kecamatan', lat='$lat', lng='$lng', tipe_menara='$tipe_menara', tinggi='$tinggi' WHERE id_tempat = '$id'");
	$update = mysqli_fetch_array($query1);
    if($update){
        echo '<script>alert("Data berhasil diupdate");history.go(-1);</script>';
    }else{
        echo '<script>alert("Data gagal diupdate");history.go(-1);</script>';
    }
}
?>