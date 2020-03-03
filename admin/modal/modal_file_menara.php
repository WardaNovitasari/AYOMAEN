<?php
$id=$menara['id_form'];
$kmz=mysqli_query($config,"SELECT * FROM download WHERE id_form ='$id' AND id_tipe=1");
$excel = mysqli_query($config,"SELECT * FROM download WHERE id_form = '$id' AND id_tipe=2");
?>
<div class="modal fade" id="reupload<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Lampiran</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <?php
          while($excel2=mysqli_fetch_array($excel)){
          ?>
          <a href="<?php echo $excel2['file'] ?>"><i class="fas fa-file-excel"></i> file.excel</a><br>
          <?php
          }
          ?>

          <?php
          while($kmz2=mysqli_fetch_array($kmz)){
          ?>
          <a href="<?php echo $kmz2['file'] ?>"><i class="fas fa-file-signature"></i> file.kmz</a>
          <?php
        }
          ?>
          <form action="../aksi/user/aksi_edit_fo.php" method="post" name="myform" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id?>">
             <label for="excel">File Excel</label>
            
              <input type="file" name="files1" id="excel">
          <br>

            <label for="kmz">File KMZ</label>
            
              <input type="file" name="files2" id="kmz">
           
          </br>
        </div>
        <div class="modal-footer">
          <input type="submit" name="submit" class="btn btn-primary" value="Submit"  onclick="return confirm('Apakah data sudah benar ?')">
        </form> 
          <!-- <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../aksi/action_logout.php">Logout</a> -->
        </div>
      </div>
    </div>
  </div>