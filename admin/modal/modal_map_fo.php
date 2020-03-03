<div class="modal fade" id="exampleModal1<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo $jenis; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <form action="modal/noacc2.php" method="post" name="myform">
          <label>Status Tempat</label>
        <div class="form-label-group">
              <input type="text" id="place" class="form-control" placeholder="Email address" required="required" autofocus="autofocus" name="nm_tempat" readonly="" value="<?php echo $quisioner['status_tempat'] ?>">
              <label for="place">Status Tempat</label>
        </div>
        <label>Lattitude</label>
        <div class="form-label-group">
              <input type="text" id="lattitude" class="form-control" placeholder="Email address" required="required" autofocus="autofocus" name="nm_tempat" readonly="" value="<?php echo $quisioner['lat'] ?>">
              <label for="lattitude">Lattitude</label>
        </div>
        <label>Longitude</label>
       <div class="form-label-group">
              <input type="text" id="lng" class="form-control" placeholder="Email address" required="required" autofocus="autofocus" name="nm_tempat" readonly="" value="<?php echo $quisioner['lng'] ?>">
              <label for="lng">Longitude</label>
        </div>
        </form> 
      </div>
      </div>
      </div>
  </div>
</div>