<?php


$id=$rowsPer1['id'];
$soal=mysqli_query($config,"SELECT * FROM tb_tempat WHERE id='$id'");
while($quisioner=mysqli_fetch_array($soal)){
?>
<div class="modal fade" id="exampleModal<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Masukkan Komentar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <form action="modal/noacc2.php" method="post" name="myform">
        <input type="hidden" name="id" id="id" value="<?php echo $quisioner['id']; ?>">
        <div class="form-label-group">
              <input type="text" id="nm_tempat" class="form-control" placeholder="Email address" required="required" autofocus="autofocus" name="nm_tempat" readonly="" value="<?php echo $quisioner['nama_tempat'] ?>">
              <label for="nm_tempat">Nama Tempat</label>
         </div>
        <div class="form-group">
        <label for="comment">Catatan:</label>
          <textarea class="form-control" rows="5" id="comment" name="catatan"></textarea>
        </div>
        <input type="submit" name="submit" class="btn btn-primary" value="Submit" onclick="return confirm('Anda yakin mau menolak data ini ?')">
        </form> 
      </div>
      </div>
      </div>
  </div>
</div>
<?php
        }
        

      ?>