  
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
                <form action="<?php echo $link2; ?>" method="POST">
        <tr>
            <th><i class="fas fa-check"></i></th>
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
            <th>Keterangan</th>
            <th colspan="2"><center>Action</center></th>
            <th colspan="2"><center>Kirim</center></th>
        </tr>

        <?php
        while($data = mysqli_fetch_assoc($step3)){
        ?>
           
              <?php if($data['status_tempat']=='revisi'){ ?>
                <tr>
                  <td></td>
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
                  <td><?php echo $data['alasan'] ?></td>
                  <td><a href="<?php echo $link4 ?>?id=<?php echo $data['id_tempat']?>" class="btn btn-primary btn-sm"><i class="fas fa-pen"></i></a></td>
                  <td><a href="../aksi/user/delete.php?id=<?php echo $data['id_tempat']?>&tipe=<?php echo $link5 ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"  onclick="return confirm('Anda yakin mau menghapus tempat ini ?')"></i></a></td>
                  <td><a href="<?php echo $link2 ?>?id=<?php echo $data['id_tempat'] ?>" class="btn btn-success btn-sm nonaktiv disabled"><i class="fas fa-check"></i></a></td>
                </tr>

              <?php }else if($data['status_tempat']=='pengajuan'){ ?>
                <tr>
                  <td></td>
                  <td><p><?php echo $data['nomor'] ?></p></td>
                  <td><p><?php echo $data['site_id'] ?></p></td>
                  <td><p><?php echo $data['alamat'] ?></p></td>
                  <td><p><?php echo $data['kelurahan'] ?></p></td>
                  <td><p><?php echo $data['kecamatan'] ?></p></td>
                  <td><p><?php echo $data['lat'] ?></p></td>
                  <td><p><?php echo $data['lng'] ?></p></td>
                  <td><p><?php echo $data['tipe_menara'] ?></p></td>
                  <td><p><?php echo $data['tinggi'] ?></p></td>
                  <td><p><?php echo $data['status_tempat'] ?></p></td>
                  <td><p><?php echo $data['alasan'] ?></p></td>
                  <td><a href="#" class="btn btn-primary btn-sm disabled"><i class="fas fa-pen"></i></a></td>
                  <td><a href="../aksi/user/delete.php?id=<?php echo $data['id_tempat']?>&tipe=<?php echo $link5 ?>" class="btn btn-danger btn-sm nonaktiv disabled"><i class="fas fa-trash"></i></a></td>
                  <td><a href="<?php echo $link2 ?>?id=<?php echo $data['id_tempat'] ?>?id=<?php echo $data['id_tempat'] ?>" class="btn btn-success btn-sm nonaktiv disabled"><i class="fas fa-check"></i></a></td>
                </tr>
              <?php } else if($data['status_tempat']=='belum_dikirim'){?>
                <tr>
                  <td><input type="checkbox" name="cek[]" value="<?php echo $data['id_tempat'] ?>"></td>
                  <td><?php echo $data['nomor'] ?></td>
                  <td><?php echo $data['site_id'] ?></td>
                  <td><?php echo $data['alamat'] ?> </td>
                  <td><?php echo $data['kelurahan'] ?></td>
                  <td><?php echo $data['kecamatan'] ?></td>
                  <td><?php echo $data['lat'] ?></td>
                  <td><?php echo $data['lng'] ?></td>
                  <td><?php echo $data['tipe_menara'] ?></td>
                  <td><?php echo $data['tinggi'] ?></td>
                  <td class="text-danger"><b><?php echo $data['status_tempat'] ?></b></td>
                  <td><?php echo $data['alasan'] ?></td>
                  <td><a href="<?php echo $link4 ?>?id=<?php echo $data['id_tempat']?>" class="btn btn-primary btn-sm"><i class="fas fa-pen"></i></a></td>
                  <td><a href="../aksi/user/delete.php?id=<?php echo $data['id_tempat']?>&tipe=<?php echo $link5 ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin mau menghapus tempat ini ?')"><i class="fas fa-trash"></i></a></td>
                  <td><a href="<?php echo $link2 ?>?id=<?php echo $data['id_tempat'] ?>?id=<?php echo $data['id_tempat'] ?>" class="btn btn-success btn-sm" onclick="return confirm('Anda yakin mau mengajukan tempat ini ?')"><i class="fas fa-check"></i></a></td>
                </tr>
              <?php
                }
              }
              ?>
        <tfoot>
          <tr>
            <th colspan="16"><input type="checkbox" name="checkall" onclick="pilih(this)"> Cek semua</th>
          </tr>
        </tfoot>
    </table>
    <input type="submit" name="submit" value="Kirim" class="btn btn-success" id="submit">
    <input type="submit" name="hapus" value="Hapus" class="btn btn-danger" id="delete">
    </form>
  
            </div>
          </div>
        </div>

         <!-- Sticky Footer -->

    </div>
    <!-- /.content-wrapper -->

  </div>
