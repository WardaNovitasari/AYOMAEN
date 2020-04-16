<div class="modal fade" id="inputpenerima" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Penerima</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="../aksi/user/aksi_perusahaan.php" method="post" name="myform">
          </br>
          <label for="nm_penerima">Nama Penerima</label>
            <div class="form-label-group">
              <input type="text" id="nm_penerima" class="form-control" placeholder="Nama Penerima" required="required" autofocus="autofocus" name="nm_penerima">
            </div>
          </br>
           <label for="tgl_terima">Tanggal Terima</label>
            <div class="form-label-group">
              <input type="date" id="tgl_terima" class="form-control" placeholder="Tanggal Terima" required="required" autofocus="autofocus" name="tgl_terima" >
            </div>
          </br>   
        </div>
        <div class="modal-footer">
          <input type="submit" name="submit" class="btn btn-primary" value="Submit">
        </form> 
          <!-- <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../aksi/action_logout.php">Logout</a> -->
        </div>
      </div>
    </div>
  </div>