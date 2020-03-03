<div class="modal fade" id="tambahperusahaan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Tambah Perusahaan</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="../aksi/user/aksi_perusahaan.php" method="post" name="myform">
          </br>
          <label for="nm_perusahaan">Nama Perusahaan</label>
            <div class="form-label-group">
              <input type="text" id="nm_perusahaan" class="form-control" placeholder="Nama Perusahaan" required="required" autofocus="autofocus" name="nm_perusahaan">
            </div>
          </br>
           <label for="alamat">Alamat Perusahaan</label>
            <div class="form-label-group">
              <input type="text" id="alamat" class="form-control" placeholder="Latitude" required="required" autofocus="autofocus" name="alamat" >
            </div>
          </br>   
        </div>
        <div class="modal-footer">
          <input type="submit" name="submit" class="btn btn-primary" value="Tambah">
        </form> 
          <!-- <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../aksi/action_logout.php">Logout</a> -->
        </div>
      </div>
    </div>
  </div>