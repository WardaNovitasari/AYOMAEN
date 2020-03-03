<?php
$id=$menara['id_form'];
$soal=mysqli_query($config,"SELECT * FROM tb_form_fiber WHERE id_form='$id'");
while($quisioner=mysqli_fetch_array($soal)){
$soal4=$quisioner['soal_4'];
$soal5=$quisioner['soal_5'];
$soal6=$quisioner['soal_6'];
$soal7=$quisioner['soal_7'];
$soal8=$quisioner['soal_8'];
$soal9=$quisioner['soal_9'];
$soal10=$quisioner['soal_10'];
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
            <input type="hidden" name="soal_1" value="<?php echo $quisioner['soal_1'];?>" readonly>
            <?php if($quisioner['soal_1']=='Ada'){?><p class="btn btn-primary"><?php echo  $quisioner['soal_1'];?></p><?php } else {?>
                <p class="btn btn-danger"><?php echo $quisioner['soal_1'];?></p>
            <?php } ?>
          </div>
          <div class="form-group">
            <label for="name">2. Rekomendasi jaringan <b>Fiber Optik</b> harus melampirkan FC izin penyelenggaraan jaringan tetap tertutup atau FC izin prinsip penyelenggaraan jaringan tetap tertutup dari Kementerian Komunikasi dan Informatika yang <b>dilegalisir</b></label><br>
             <input type="hidden" name="soal_2" value="<?php echo  $quisioner['soal_2'];?>" readonly>
            <?php if( $quisioner['soal_2']=='Ada'){?><p class="btn btn-primary"><?php echo  $quisioner['soal_2'];?></p><?php } else {?>
                <p class="btn btn-danger"><?php echo  $quisioner['soal_2'];?></p>
            <?php } ?>
          </div>
          <div class="form-group">
            <label for="name">3. Surat pernyataan kesanggupan sewa aset Pemerintah Daerah</label><br>
             <input type="hidden" name="soal_3" value="<?php echo $quisioner['soal_3'];?>" readonly>
            <?php if($quisioner['soal_3']=='Ada'){?><p class="btn btn-primary"><?php echo $quisioner['soal_3'];?></p><?php } else {?>
                <p class="btn btn-danger"><?php echo $quisioner['soal_3'];?></p>
            <?php } ?>
          </div>
          <div class="form-group">
            <label for="name">4. Kesanggupan berpartisipasi untuk peningkatan sarana prasarana pelayanan publik kepada Pemerintah Daerah (ttd Pimpinan Perusahaan)<br>
              <b>catatan</b> : apabila menggunakan aset pemkot &amp; lampiran data titik lokasi menara/fo sesuai pengajuan</label><br>
             <input type="hidden" name="soal_4" value="<?php echo $soal4;?>" readonly>
            <?php if($soal4=='Ada'){?><p class="btn btn-primary"><?php echo $soal4;?></p><?php } else {?>
                <p class="btn btn-danger"><?php echo $soal4;?></p>
            <?php } ?>
          </div>
          <div class="form-group">
            <label for="name">5. Rekomendasi jaringan Fiber Optik, melampirkan surat pernyataan kesanggupan untuk menjadi tiang Fiber Optik bersama (ttd Pimpinan Perusahaan)<br>
              <b>catatan</b> : lampiran data titik tiang fo sesuai pengajuan</label><br>
             <input type="hidden" name="soal_5" value="<?php echo $soal5;?>" readonly>
            <?php if($soal5=='Ada'){?><p class="btn btn-primary"><?php echo $soal5;?></p><?php } else {?>
                <p class="btn btn-danger"><?php echo $soal5;?></p>
            <?php } ?>
          </div>
          <div class="form-group">
            <label for="name">6. FPeta lokasi titik lokasi Menara Telekomunikasi atau pergelaran jaringan Fiber Optik dan titik tiang Fiber Optik<br>
              <b>catatan</b> : persebaran menara/fo dalam 1 peta kota Yogyakarta sesuai pengajuan</label><br>
             <input type="hidden" name="soal_6" value="<?php echo $soal6;?>" readonly>
            <?php if($soal6=='Ada'){?><p class="btn btn-primary"><?php echo $soal6;?></p><?php } else {?>
                <p class="btn btn-danger"><?php echo $soal6;?></p>
            <?php } ?>
          </div>
          <div class="form-group">
            <label for="name">7. FC Dokumen legalitas perusahaan<br>
              <b>catatan</b> : fc akta pendirian, fc ktp pimpinan, fc npwp perusahaan, fc tanda daftar perusahaan &amp; fc perizinan lain yang dimiliki</label><br>
            <input type="hidden" name="soal_7" value="<?php echo $soal7;?>" readonly>
            <?php if($soal7=='Ada'){?><p class="btn btn-primary"><?php echo $soal7;?></p><?php } else {?>
                <p class="btn btn-danger"><?php echo $soal7;?></p>
            <?php } ?>
          </div>
          <div class="form-group">
            <label for="name">8. SSurat pernyataan yang berisi bahwa fotocopy dokumen yang dilampirkan sesuai dengan aslinya (ttd Pimpinan Perusahaan)</label><br>
             <input type="hidden" name="soal_8" value="<?php echo $soal8;?>" readonly>
            <?php if($soal8=='Ada'){?><p class="btn btn-primary"><?php echo $soal8;?></p><?php } else {?>
                <p class="btn btn-danger"><?php echo $soal8;?></p>
            <?php } ?>
          </div>
          <div class="form-group">
            <label for="name">9. Surat kuasa atau surat penunjukan untuk mengurus Rekomendasi titik lokasi Menara Telekomunikasi atau jaringan Fiber Optik<br>
              <b>catatan</b> : apabila dikuasakan pihak lain bukan dari perusahaan &amp; bermatrai Rp 6.000,-</label><br>
            <input type="hidden" name="soal_9" value="<?php echo $soal9;?>" readonly>
            <?php if($soal9=='Ada'){?><p class="btn btn-primary"><?php echo $soal9;?></p><?php } else {?>
                <p class="btn btn-danger"><?php echo $soal9;?></p>
            <?php } ?>
          </div>
          <div class="form-group">
            <label for="name"><b>10. Data/file softcopy titik lokasi Menara Telekomunikasi atau pergelaran jaringan Fiber Optik
              <b>catatan</b> : data menara/fo selengkap mungkin sesuai pengajuan</label><br>
            <input type="hidden" name="soal_10" value="<?php echo $soal10;?>" readonly>
            <?php if($soal10=='Ada'){?><p class="btn btn-primary"><?php echo $soal10;?></p><?php } else {?>
                <p class="btn btn-danger"><?php echo $soal10;?></p>
            <?php } ?>
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
        <a href="modal/accformfo.php?id=<?php echo $quisioner['id_form'] ?>"><button type="button" class="btn btn-primary" title="terima" onclick="return confirm('Apakah data sudah sesuai ?')"><i class="fas fa-check" ></i></button></a>
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