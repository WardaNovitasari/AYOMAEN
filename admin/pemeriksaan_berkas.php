<?php include '../koneksi/koneksi.php';
session_start();
  if(empty($_SESSION['username'])){
    header("location:../login.php");
  }elseif($_SESSION['status']!='admin'){
    header("location:../404.html");
  }
  $id=$_REQUEST['id'];
    $idform=$_REQUEST['id'];
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'view/head.php'; ?>
<body id="page-top">

<?php include 'view/navbar.php'; ?>

  <div id="wrapper">

    <?php include 'view/sidebar.php'; ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Beranda</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>
        <div class="card mb-3" id="list_tempat">
          <div class="card-header">
            <i class="fas fa-table"></i>
            List Tempat Pengajuan</div>
          <div class="card-body">
            <div class="table-responsive">

            	<?php
    				$kmz = mysqli_query($config,"SELECT * FROM download WHERE id_form='$id' AND id_tipe=1");
    				$xls = mysqli_query($config,"SELECT * FROM download WHERE id_form='$id' AND id_tipe=2");
            $pdf = mysqli_query($config,"SELECT * FROM download WHERE id_form='$id' ORDER BY id_tipe ASC");
            $check = array();
            while($ini = mysqli_fetch_array($pdf)){
              array_push($check, $ini);
            }
            echo $check[2]['file'];
        			while($excel2=mysqli_fetch_array($xls)){
    			?>
            	<a href="<?php echo $excel2['file'] ?>"><i class="fas fa-file-excel"></i> file.excel</a><br>
   		 		<?php
        		}
    			?>
         <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
               <tr>
            <th>Nomor</th>
            <th>Site Id</th>
            <th>Alamat</th>
            <th>Kelurahan</th>
            <th>Kecamatan</th>
            <th>Lattitude</th>
            <th>Longtitude</th>
            <th>Tipe Menara</th>
            <th>Tinggi</th>
            <th>Status</th>
            <th>Keterangan</th>
        </tr>

        <?php
        $sql = "SELECT * FROM tb_tempat_menara WHERE id_form='$id'";
        $menara = mysqli_query($config,$sql);
        while($data = mysqli_fetch_assoc($menara)){
        ?>
            <tr>
                <td><?php echo $data['nomor'] ?></td>
                <td><?php echo $data['site_id'] ?></td>
                <td><?php echo $data['alamat'] ?></td>
                <td><?php echo $data['kelurahan'] ?></td>
                <td><?php echo $data['kecamatan'] ?></td>
                <td><?php echo $data['lat'] ?></td>
                <td><?php echo $data['lng'] ?></td>
                <td><?php echo $data['tipe_menara'] ?></td>
                <td><?php echo $data['tinggi'] ?></td>
                <td><?php echo $data['status_tempat'] ?></td>
                <td><?php echo $data['alasan'] ?></td>
            </tr>

        <?php
            include 'modal/modal_info_menara.php';
            }
            
            //print_r($data_pdf[2]['id_tipe']);
        ?>
              </table>
               <button class="btn btn-danger" id="close">Close</button>
            </div>
          </div>
        </div>
      </div>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Menara yang Belum dilakukan Tindakan</div>
          <div class="card-body">
            <div class="table-responsive">
              <button class="btn btn-primary" id="lihat">Lihat Tempat</button>
              <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
               <tr>
            <th><center>No.</center></th>
            <th><center>Syarat</center></th>
            <th><center>Ada/Tidak</center></th>
        </tr>
        <form method="POST" action="../aksi/admin/aksi.php">
          <input type="hidden" name="id_form" value="<?php echo $idform ?>">
            <tr>
                <td><center>1</center></td>
                <td>Surat permohonan rekomendasi kepada Kepala Dinas Komunikasi Informatika dan Persandian (ttd Pimpinan Perusahaan)<br>catatan : memuat no surat, tanggal surat, data perusahaan dan lampiran data titik lokasi menara/fo<br>Download surat pernyataan <a href="<?php echo $check[5]['file'] ?>">Disini</a></td>
                <td><center><input type="checkbox" name="cek[]" value="soal_1"></center></td>
            </tr>
                <td><center>2</center></td>
                <td>FC bukti pembayaran PBB tahun berjalan, sertifikat dan surat perjanjian/pernyataan persetujuan penggunaan tanah<br>catatan : untuk persil warga/masyarakat &amp; dijadikan satu per lokasi menara.</td>
                <td><center><input type="checkbox" name="cek[]" value="soal_2"></center></td>
            </tr>
                <td><center>3</center></td>
                <td>Surat pernyataan yang menyatakan bahwa Menara Telekomunikasi akan beroperasional paling lambat 18 (delapan belas) bulan sejak Rekomendasi diterbitkan (ttd Pimpinan Perusahaan)<br>catatan : lampiran data titik lokasi menara sesuai pengajuan<br>Download surat pernyataan <a href="<?php echo $check[2]['file'] ?>">Disini</a></td>
                <td><center><input type="checkbox" name="cek[]" value="soal_3"></center></td>
            </tr>
                <td><center>4</center></td>
                <td>Rekomendasi titik lokasi Menara Telekomunikasi, melampirkan srat pernyataan kesanggupan untuk menjadi Menara bersama (ttd Pimpinan Perusahaan)<br>catatan : lampiran data titik lokasi menara sesuai pengajuanDownload surat pernyataan <a href="<?php echo $check[3]['file'] ?>">Disini</a></td>
                <td><center><input type="checkbox" name="cek[]" value="soal_4"></center></td>
            </tr>
                <td><center>5</center></td>
                <td>Peta lokasi titik lokasi Menara Telekomunikasi atau pergelaran jaringan Fiber Optik dan titik tiang Fiber Optik<br>catatan : persebaran menara/fo dalam 1 peta kota Yogyakarta sesuai pengajuan</td>
                <td><center><input type="checkbox" name="cek[]" value="soal_5"></center></td>
            </tr>
                <td><center>6</center></td>
                <td>FC Dokumen legalitas perusahaan<br>catatan : fc akta pendirian, fc ktp pimpinan, fc npwp perusahaan, fc tanda daftar perusahaan &amp; fc perizinan lain yang dimiliki</td>
                <td><center><input type="checkbox" name="cek[]" value="soal_6"></center></td>
            </tr>
                <td><center>7</center></td>
                <td>Surat pernyataan yang berisi bahwa fotocopy dokumen yang dilampirkan sesuai dengan aslinya (ttd Pimpinan Perusahaan)<br>Download surat pernyataan <a href="<?php echo $check[4]['file'] ?>">Disini</a></td>
                <td><center><input type="checkbox" name="cek[]" value="soal_7"></center></td>
            </tr>
                <td><center>8</center></td>
                <td>Surat kuasa atau surat penunjukan untuk mengurus Rekomendasi titik lokasi Menara Telekomunikasi atau jaringan Fiber Optik<br>catatan : apabila dikuasakan pihak lain bukan dari perusahaan &amp; bermatrai Rp 6.000,-</td>
                <td><center><input type="checkbox" name="cek[]" value="soal_8"></center></td>
            </tr>
                <td><center>9</center></td>
                <td>Data/file softcopy titik lokasi Menara Telekomunikasi atau pergelaran jaringan Fiber Optik<br>catatan : data menara/fo selengkap mungkin sesuai pengajuan</td>
                <td><center><input type="checkbox" name="cek[]" value="soal_9"></center></td>
            </tr>
                <td><center>10</center></td>
                <td>Surat keterangan kelaikan konstruksi bangunan untuk pendirian Menara Telekomunikasi dari penyedia jasa pengawasan yang memiliki sertifikat keahlian atau lembaga yang berkompeten di bidang bangunan gedung<br>catatan : sejumlah bangunan yang ada menara ketinggian s/d 6 meter (bukan sejumlah menara)</td>
                <td><center><input type="checkbox" name="cek[]" value="soal_10"></center></td>
            </tr>
                <td><center>11</center></td>
                <td>Surat pernyataan kesanggupan pemohon untuk bertanggung jawab dan menanggungjawab segala resiko/kerusakan/kerugian pihak lain termasuk pembiayaannya akibat bangunan Menara Telekomunikasi roboh (ttd Pimpinan Perusahaan)<br>catatan : lampiran data menara/fo sesuai pengajuan<br>Download surat pernyataan <a href="<?php echo $check[6]['file'] ?>">Disini</a></td>
                <td><center><input type="checkbox" name="cek[]" value="soal_11"></center></td>
            </tr>
        <?php
            // include 'modal/modal_info_menara.php';
            // }
            $querypenerima = mysqli_query($config, "SELECT nm_user, email FROM tb_akun JOIN tb_perusahaan JOIN tb_form_menara JOIN tb_tempat_menara ON tb_akun.id_akun = tb_perusahaan.id_akun AND tb_perusahaan.id_perusahaan = tb_form_menara.id_perusahaan AND tb_form_menara.id_form=tb_tempat_menara.id_form WHERE tb_tempat_menara.id_form='$idform'");
            $penerima = mysqli_fetch_assoc($querypenerima);
        ?>  

          
              </table>
              <label>Penerima</label><br>
              <input type="text" name="penerima" value="<?php echo $penerima['nm_user'] ?>"><br>
              <label>Kelengkapan Berkas</label><br>
              <select name ="berkas">
                <option value="lengkap">Berkas Lengkap</option>
                <option value="belum">Berkas Belum Lengkap</option>
              </select>

                <input type="submit" name="submit" class="btn btn-primary" value="submit" id="submit"> 
              </form>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

         <!-- Sticky Footer -->
      <?php include 'view/footer.php'; ?>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <?php include 'view/scroll.php'; ?>

  <!-- Logout Modal-->
  <?php include 'modal/logoutmodal.php' ?>


  <!-- Bootstrap core JavaScript-->
 <?php include 'view/script.php'; ?>
 <script type="text/javascript">
    $(document).ready(function(){

      $("#lihat").click(function(){
        $("#list_tempat").show("slow");
      });
      $("#list_tempat").hide();

      $("#close").click(function(){
        $("#list_tempat").hide("slow");
      });

    });
  </script>
</body>


</html>

 

      



