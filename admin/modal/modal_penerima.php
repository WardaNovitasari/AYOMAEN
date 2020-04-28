<?php 
$id = $data['id_tempat'];
$idform = $_GET['id'];
$query2=mysqli_query($config,"SELECT * FROM tb_tempat_menara WHERE id_tempat='$id'");
$tempat2= mysqli_fetch_array($query2);
$tipe_menara = $tempat2['tipe_menara'];
$lat = $tempat2['lat'];
$lng = $tempat2['lng'];
if (isset($_POST['submit'])) {
  $namaPenerima = $_POST['nama_penerima'];
  $tglTerima = $_POST['tgl_terima'];
   $queryupdate = mysqli_query($config, "UPDATE `tb_tempat_menara` SET `nama_penerima`='$namaPenerima',`tgl_terima`='$tglTerima' WHERE `id_form`='$id'");

  }
  // header("Refresh:0; url=");
?>

<div class="modal fade" id="inputpenerima" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Penerima</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <?php
        $queryterima=mysqli_query($config,"SELECT nm_user FROM tb_akun JOIN tb_perusahaan JOIN tb_form_menara JOIN tb_tempat_menara ON tb_akun.id_akun = tb_perusahaan.id_akun AND tb_perusahaan.id_perusahaan = tb_form_menara.id_perusahaan AND tb_form_menara.id_form=tb_tempat_menara.id_form WHERE tb_tempat_menara.id_form='$idform'");
        $datatrima = mysqli_fetch_assoc($queryterima);
    ?>
        <div class="modal-body">
          <form action="tables_tempat.php?id=<?php echo$idform ?>&step=4" method="post" name="myform">
          </br>
          <label for="nm_penerima">Nama Penerima</label>
            <div class="form-label-group">
              <input type="text" id="nm_penerima" class="form-control" placeholder="Nama Penerima" required="required" autofocus="autofocus" name="nama_penerima" value="<?php echo $datatrima['nm_user'] ?>">
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