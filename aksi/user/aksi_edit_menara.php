<?php
require '../../koneksi/koneksi.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if(isset($_POST['submit'])){
	$id=$_POST['id'];
	$query1=mysqli_query($config,"SELECT * FROM download WHERE id_form = '$id' AND id_tipe=1");
	$file = mysqli_fetch_array($query1);
	$nama = $file['nama_file'];

	if(isset($_FILES['files1']['tmp_name'])){
		$allowed_ext    = array('xls', 'xlsx');
    	$file_name      = $_FILES['files1']['name'];
    	@$file_ext       = strtolower(end(explode('.', $file_name)));
    	$file_size      = $_FILES['files1']['size'];
    	$file_tmp       = $_FILES['files1']['tmp_name'];
    	if(in_array($file_ext, $allowed_ext)===true){
    		if($file_size < 1044070000){
    			$lokasi  = '../../file/menara/excel/'.$nama.'.'.$file_ext;
    			move_uploaded_file($file_tmp, $lokasi);
    			echo '<script>alert("Data excel berhasil di update");window.location="../../user/home2.php?riwayat=1";</script>';
    		}else{
    			 echo '<div class="error">ERROR: Besar ukuran file (file size) maksimal 1 Mb!</div>';
    		}
    	}else{
    		echo '<div class="error">ERROR: Ekstensi file tidak di izinkan!</div>';
    	}

	}
	if(isset($_FILES['files2']['tmp_name'])){
		$allowed_ext2   = array('kmz','kml');
    	$file_name2     = $_FILES['files2']['name'];
    	@$file_ext2      = strtolower(end(explode('.', $file_name2)));
    	$file_size2     = $_FILES['files2']['size'];
    	$file_tmp2      = $_FILES['files2']['tmp_name'];
    	if(in_array($file_ext2, $allowed_ext2)===true){
    		if($file_size2 < 1044070000){
    			$lokasi2 = '../../file/fiber_optik/KMS/'.$nama.'.'.$file_ext2;
    			move_uploaded_file($file_tmp2, $lokasi2);
    			echo '<script>alert("Data KMZ berhasil di update");window.location="../../user/home2.php?riwayat=1";</script>';
    		}else{
    			 echo '<div class="error">ERROR: Besar ukuran file (file size) maksimal 1 Mb!</div>';
    		}
    	}else{
    		echo '<div class="error">ERROR: Ekstensi file tidak di izinkan!</div>';
    	}

	}else{
	echo '<script>alert("Data tidak ada yang berubah ");history.go(-1);</script>';
}

	/*
	$allowed_ext    = array('xls', 'xlsx');
    $file_name      = $_FILES['files1']['name'];
    @$file_ext       = strtolower(end(explode('.', $file_name)));
    $file_size      = $_FILES['files1']['size'];
    $file_tmp       = $_FILES['files1']['tmp_name'];

    $allowed_ext2   = array('kmz','kml');
    $file_name2     = $_FILES['files2']['name'];
    @$file_ext2      = strtolower(end(explode('.', $file_name2)));
    $file_size2     = $_FILES['files2']['size'];
    $file_tmp2      = $_FILES['files2']['tmp_name'];*/


/*
     if(in_array($file_ext, $allowed_ext) === true && in_array($file_ext2, $allowed_ext2)=== true){
        if($file_size < 1044070000 && $file_size2 < 1044070000){
          $lokasi  = '../../file/fiber_optik/excel/'.$nama.'.'.$file_ext;
          $lokasi2 = '../../file/fiber_optik/KMS/'.$nama.'.'.$file_ext2;
          move_uploaded_file($file_tmp2, $lokasi2);
          move_uploaded_file($file_tmp, $lokasi);
          echo '<script>alert("Data berhasil di kirim");history.go(-1);</script>';

        }else{
          echo '<div class="error">ERROR: Besar ukuran file (file size) maksimal 1 Mb!</div>';
        }
      }else{
        echo '<div class="error">ERROR: Ekstensi file tidak di izinkan!</div>';
      }*/
}
?>