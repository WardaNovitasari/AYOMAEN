  
 <div id="content-wrapper">

      <div class="container-fluid">
 <br>
        <div class="f">
                <a href="<?php echo $link ?>" class="btn btn-primary "> Tambahkan</a>
              </div>
                <div class="clr"></div>
                <br>
       
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Menara yang Belum dilakukan Tindakan</div>
          <div class="card-body">
            <div class="table-responsive">
              
               <table class="table table-bordered">
        <tr>
            <th>Nomor</th>
            <th>Site Id</th>
            <th>Alamat</th>
            <th>Kelurahan</th>
            <th>Kecamatan</th>
            <th>Lat</th>
            <th>Lng</th>
            <th>Tipe Menara</th>
            <th>Tinggi</th>
            <th>Status</th>
        </tr>

        <?php
        while($data = mysqli_fetch_assoc($step4)){
        ?>
                <tr>
                  <td><p><?php echo $data['nomor'] ?></p></td>
                  <td><p><?php echo $data['site_id'] ?></p></td>
                  <td><p><?php echo $data['alamat'] ?></p></td>
                  <td><p><?php echo $data['kelurahan'] ?></p></td>
                  <td><p><?php echo $data['kecamatan'] ?></p></td>
                  <td><p><?php echo $data['lat'] ?></p></td>
                  <td><p><?php echo $data['lng'] ?></p></td>
                  <td><p><?php echo $data['tipe_menara'] ?></p></td>
                  <td><p><?php echo $data['tinggi'] ?></p></td>
                  <td><p class="text-danger"><b><?php echo $data['status_tempat'] ?></b><p></td>
                </tr>
        <?php
            //include 'modal/modal_info_menara.php';
            }
        ?>
    </table>
  
            </div>
          </div>
        </div>

         <!-- Sticky Footer -->

    </div>
    <!-- /.content-wrapper -->

  </div>
