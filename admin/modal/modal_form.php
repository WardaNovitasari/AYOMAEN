<?php
$id=$menara['id_form'];
$soal=mysqli_query($config,"SELECT * FROM tb_form_menara WHERE id_form='$id'");
while($quisioner=mysqli_fetch_array($soal)){
?>
<div class="modal fade" id="exampleModal<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Submit Masukan Paket </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="form-group">
            <label for="name">1. Surat permohonan rekomendasi kepada Kepala Dinas Komunikasi Informatika dan Persandian (ttd Pimpinan Perusahaan)<br>
              <b>catatan</b> : memuat no surat, tanggal surat, data perusahaan dan lampiran data titik lokasi menara/fo</label><br>
              <?php if($quisioner['soal_1']=='Ada'){?><p class="btn btn-primary"><?php echo $quisioner['soal_1'];?></p><?php } else {?>
                <p class="btn btn-danger"><?php echo $quisioner['soal_1'];?></p>
                <?php
                }
                  ?>
          </div>
          <div class="form-group">
            <label for="name">2. FC bukti pembayaran PBB tahun berjalan, sertifikat dan surat perjanjian/pernyataan persetujuan penggunaan tanah<br>
              <b>catatan</b> : untuk persil warga/masyarakat &amp; dijadikan satu per lokasi menara</label><br>
              <?php if($quisioner['soal_2']=='Ada'){?><p class="btn btn-primary"><?php echo $quisioner['soal_2'];?></p><?php } else {?>
                <p class="btn btn-danger"><?php echo $quisioner['soal_2'];?></p>
                <?php
                }
                  ?>
          </div>
          <div class="form-group">
            <label for="name">3. Surat pernyataan yang menyatakan bahwa Menara Telekomunikasi akan beroperasional paling lambat 18 (delapan belas) bulan sejak Rekomendasi diterbitkan (ttd Pimpinan Perusahaan)<br>
              <b>catatan</b> : lampiran data titik lokasi menara sesuai pengajuan</label><br>
             <?php if($quisioner['soal_3']=='Ada'){?><p class="btn btn-primary"><?php echo $quisioner['soal_3'];?></p><?php } else {?>
                <p class="btn btn-danger"><?php echo $quisioner['soal_3'];?></p>
                <?php
                }
                  ?>
          </div>
          <div class="form-group">
            <label for="name">4. Rekomendasi titik lokasi Menara Telekomunikasi, melampirkan srat pernyataan kesanggupan untuk menjadi Menara bersama (ttd Pimpinan Perusahaan)<br>
              <b>catatan</b> : lampiran data titik lokasi menara sesuai pengajuan</label><br>
              <?php if($quisioner['soal_4']=='Ada'){?><p class="btn btn-primary"><?php echo $quisioner['soal_4'];?></p><?php } else {?>
                <p class="btn btn-danger"><?php echo $quisioner['soal_4'];?></p>
                <?php
                }
                  ?>
          </div>
          <div class="form-group">
            <label for="name">5. Peta lokasi titik lokasi Menara Telekomunikasi atau pergelaran jaringan Fiber Optik dan titik tiang Fiber Optik<br>
              <b>catatan</b> : persebaran menara/fo dalam 1 peta kota Yogyakarta sesuai pengajuan</label><br>
              <?php if($quisioner['soal_5']=='Ada'){?><p class="btn btn-primary"><?php echo $quisioner['soal_5'];?></p><?php } else {?>
                <p class="btn btn-danger"><?php echo $quisioner['soal_5'];?></p>
                <?php
                }
                  ?>
          </div>
          <div class="form-group">
            <label for="name">6. FC Dokumen legalitas perusahaan<br>
              <b>catatan</b> : fc akta pendirian, fc ktp pimpinan, fc npwp perusahaan, fc tanda daftar perusahaan &amp; fc perizinan lain yang dimiliki</label><br>
              <?php if($quisioner['soal_6']=='Ada'){?><p class="btn btn-primary"><?php echo $quisioner['soal_6'];?></p><?php } else {?>
                <p class="btn btn-danger"><?php echo $quisioner['soal_6'];?></p>
                <?php
                }
                  ?>
          </div>
          <div class="form-group">
            <label for="name">7. Surat pernyataan yang berisi bahwa fotocopy dokumen yang dilampirkan sesuai dengan aslinya (ttd Pimpinan Perusahaan)<br>
              <?php if($quisioner['soal_7']=='Ada'){?><p class="btn btn-primary"><?php echo $quisioner['soal_7'];?></p><?php } else {?>
                <p class="btn btn-danger"><?php echo $quisioner['soal_7'];?></p>
                <?php
                }
                  ?>
          </div>
          <div class="form-group">
            <label for="name">8. Surat kuasa atau surat penunjukan untuk mengurus Rekomendasi titik lokasi Menara Telekomunikasi atau jaringan Fiber Optik<br>
              <b>catatan</b> : apabila dikuasakan pihak lain bukan dari perusahaan &amp; bermatrai Rp 6.000,-</label><br>
              <?php if($quisioner['soal_8']=='Ada'){?><p class="btn btn-primary"><?php echo $quisioner['soal_8'];?></p><?php } else {?>
                <p class="btn btn-danger"><?php echo $quisioner['soal_8'];?></p>
                <?php
                }
                  ?>
          </div>
          <div class="form-group">
            <label for="name">9. Data/file softcopy titik lokasi Menara Telekomunikasi atau pergelaran jaringan Fiber Optik<br>
              <b>catatan</b> : data menara/fo selengkap mungkin sesuai pengajuan</label><br>
              <?php if($quisioner['soal_9']=='Ada'){?><p class="btn btn-primary"><?php echo $quisioner['soal_9'];?></p><?php } else {?>
                <p class="btn btn-danger"><?php echo $quisioner['soal_9'];?></p>
                <?php
                }
                  ?>
          </div>
          <div class="form-group">
            <label for="name"><b>Tambahan setelah survey untuk menara ketinggian s/d 6 meter :</b><br>
            10. Surat keterangan kelaikan konstruksi bangunan untuk pendirian Menara Telekomunikasi dari penyedia jasa pengawasan yang memiliki sertifikat keahlian atau lembaga yang berkompeten di bidang bangunan gedung
              <b>catatan</b> : sejumlah bangunan yang ada menara ketinggian s/d 6 meter (bukan sejumlah menara)</label><br>
              <?php if($quisioner['soal_10']=='Ada'){?><p class="btn btn-primary"><?php echo $quisioner['soal_10'];?></p><?php } else {?>
                <p class="btn btn-danger"><?php echo $quisioner['soal_10'];?></p>
                <?php
                }
                  ?>
          </div>
          <div class="form-group">
            <label for="name">11. Surat pernyataan kesanggupan pemohon untuk bertanggung jawab dan menanggungjawab segala resiko/kerusakan/kerugian pihak lain termasuk pembiayaannya akibat bangunan Menara Telekomunikasi roboh (ttd Pimpinan Perusahaan)<br>
              <b>catatan</b> : lampiran data menara/fo sesuai pengajuan</label><br>
              <?php if($quisioner['soal_11']=='Ada'){?><p class="btn btn-primary"><?php echo $quisioner['soal_11'];?></p><?php } else {?>
                <p class="btn btn-danger"><?php echo $quisioner['soal_11'];?></p>
                <?php
                }
                  ?>
          </div>
        <br>
      </div>
      </div>
      <div class="modal-footer">
        <?php
        if($quisioner['status']=='disetujui'){
          ?>
          <a href="#"><button type="button" class="btn btn-danger" title="tolak"><i class="fas fa-times"></i></button></a>
        <?php
        }else{
        ?>
        <a href="modal/accform.php?id=<?php echo $quisioner['id_form'] ?>"><button type="button" class="btn btn-primary" title="terima" onclick="return confirm('Apakah data sudah sesuai ?')"><i class="fas fa-check" ></i></button></a>
        <a href="tolak_menara.php?id=<?php echo $quisioner['id_form'] ?>"><button type="button" class="btn btn-danger" title="tolak"><i class="fas fa-times"></i></button></a>
        <?php
          }
        ?>
      </div>
    </div>
  </div>
</div>
<?php
        }
      ?>