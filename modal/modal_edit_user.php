<?php
$id=$data['id_tempat'];
//$kmz=mysqli_query($config,"SELECT * FROM tb_file_fiber WHERE id_form ='$id' AND id_tipe=1");
//$excel = mysqli_query($config,"SELECT * FROM tb_file_fiber WHERE id_form = '$id' AND id_tipe=2");
?>
<div class="modal fade" id="reupload<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Edit Menara</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="#" method="post" name="myform" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id?>">
           <label for="site">Site Id</label>
            <div class="form-label-group">
              <input type="text" id="site" class="form-control" required="required" autofocus="autofocus" name=site" value="<?php echo $data['site_id'] ?>">
            </div>
          </br>
          <label for="alamat">Alamat</label>
            <div class="form-label-group">
              <input type="text" id="alamat" class="form-control" required="required" autofocus="autofocus" name="alamat" value="<?php echo $data['alamat'] ?>">
            </div>
          </br>
           <label for="kelurahan">Kelurahan</label>
            <div class="form-label-group">
              <input type="text" id="kelurahan" class="form-control" required="required" autofocus="autofocus" name="kelurahan" value="<?php echo $data['kelurahan'] ?>n">
            </div>
          </br>
          <label for="kecamatan">Kecamatan</label>
            <div class="form-label-group">
              <input type="text" id="kecamatan" class="form-control" placeholder="Latitude" required="required" autofocus="autofocus" name="kecamatan" value="<?php echo $data['kecamatan'] ?>" >
            </div>
          </br>
          <label for="lat">Lattitude</label>
            <div class="form-label-group">
              <input type="text" id="lat" class="form-control" required="required" autofocus="autofocus" name="lat" value="<?php echo $data['lat'] ?>" >
            </div>
        </br>
         <label for="lng">Longtitude</label>
            <div class="form-label-group">
              <input type="text" id="lng" class="form-control" required="required" autofocus="autofocus" name="lng" value="<?php echo $data['lng'] ?>" >
            </div>
        </br>
         <label for="tipe_menara">Tipe Menara</label>
            <div class="form-label-group">
              <input type="text" id="tipe_menara" class="form-control" required="required" autofocus="autofocus" name="tipe_menara" value="<?php echo $data['tipe_menara'] ?>" >
            </div>
        </br>
         <label for="tinggi">Tinggi</label>
            <div class="form-label-group">
              <input type="text" id="tinggi" class="form-control" placeholder="Latitude" required="required" autofocus="autofocus" name="tinggi" value="<?php echo $data['tinggi'] ?>" >
            </div>
        </br>
        <div class="modal-footer">
          <input type="submit" name="kirim" class="btn btn-primary" value="Submit">
        </form> 
          <!-- <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../aksi/action_logout.php">Logout</a> -->
        </div>
      </div>
    </div>
  </div>