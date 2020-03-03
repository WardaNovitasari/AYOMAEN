<?php
$id=$menara['id_user'];

?>
<div class="modal fade" id="Mymodal<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Submit Masukan Paket </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <table class="table">
          <thead class="thead-light">
            <tr>
              <th>No</th>
              <th>Nama Tempat</th>
              <th>Latitude</th>
              <th>Longtitude</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
         <?php 
              $result=mysqli_query($config,"SELECT * FROM tb_form_menara JOIN tb_tempat ON tb_form_menara.id_form=tb_tempat.id_form WHERE tb_form_menara.id_user='$id'");
              $rows=mysqli_fetch_array($result); 
              $nomor=1;
              $count = mysqli_num_rows($result);
              $id1=$rows['id'];
              for ($i=0; $i < $count; $i++) {
                $bersinggungan=0;
                $id2=$rows['id'];
                $perulangan1=mysqli_query($config,"SELECT * FROM `tb_tempat` where id='$id1'");
                $rowsPer1=mysqli_fetch_array($perulangan1);
                $lokasi1_lat=$rowsPer1['lat'];
                $lokasi1_long=$rowsPer1['lng'];
                for ($j=0; $j < $count; $j++) { 
                  $perulangan2=mysqli_query($config,"SELECT * FROM `tb_tempat` where id='$id2'");
                  $rowsPer2=mysqli_fetch_array($perulangan2);
                  $lokasi2_lat=$rowsPer2['lat'];
                  $lokasi2_long=$rowsPer2['lng'];
                  $jarak=0;
                  if ($rowsPer1['id']!=$rowsPer2['id']) {
                    $jarak = (rad2deg(acos((sin(deg2rad($lokasi1_lat))*sin(deg2rad($lokasi2_lat))) + (cos(deg2rad($lokasi1_lat))*cos(deg2rad($lokasi2_lat))*cos(deg2rad($lokasi1_long-$lokasi2_long))))))*111.13384;
                    if($jarak<10)
                    {
                      $bersinggungan=1;
                    }
                  } 
                $id2++;
                }?>
                <tr>
              <td><?php echo $nomor++; ?></td>
              <td><?php echo $rowsPer1['nama_tempat']; ?></td>
              <td><?php echo $rowsPer1['lat']; ?></td>
              <td><?php echo $rowsPer1['lng']; ?></td>
              <td><?php if ($bersinggungan==0)  { ?> <p>Tidak Bersinggungan</p> <?php }  else  { ?> <b style='color: red;'>Bersinggungan </b><?php echo $rowsPer2['nama_tempat'] ?> <?php } ?></td>
              <td><a href="index.php?halaman=home?id=<?php echo $rowsPer1['id']; ?>">Open Maps</a></td>
            </tr>
                 <?php
            $id1++;
            // close while loop
            }
          ?>
          </tbody>
        </table>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="modal/accform.php?id=<?php echo $quisioner['id_form'] ?>"><button type="button" class="btn btn-primary" >Terima</button></a>
      </div>
    </div>
  </div>
</div>