<?php
//memanggil file excel_reader
require "excel_reader.php";
require "koneksi.php";

//jika tombol import ditekan
if(isset($_POST['submit'])){

    $target = basename($_FILES['filepegawaiall']['name']) ;
    move_uploaded_file($_FILES['filepegawaiall']['tmp_name'], $target);
    
    $data = new Spreadsheet_Excel_Reader($_FILES['filepegawaiall']['name'],false);
    
//    menghitung jumlah baris file xls
    $baris = $data->rowcount($sheet_index=0);
    
//    import data excel mulai baris ke-2 (karena tabel xls ada header pada baris 1)
    for ($i=2; $i<=$baris; $i++)
    {
//       membaca data (kolom ke-1 sd terakhir)
      $nama_tempat  = $data->val($i, 1);
      $lat          = $data->val($i, 2);
      $lng          = $data->val($i, 3);

//      setelah data dibaca, masukkan ke tabel pegawai sql
      $query = "INSERT into `tb_tempat` (nama_tempat,lat,lng)values('$nama_tempat','$lat','$lng')";
      $hasil = mysql_query($query);
    }
    
    if(!$hasil){
//          jika import gagal
          die(mysql_error());
      }else{
//          jika impor berhasil
          echo "Data berhasil diimpor.";
    }
    
}

?>