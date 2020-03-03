<?php
$id = $data['id_tempat'];
$query2=mysqli_query($config,"SELECT * FROM tb_tempat_menara WHERE id_tempat='$id'");
$tempat2= mysqli_fetch_array($query2);
$tipe_menara = $tempat2['tipe_menara'];
$lat = $tempat2['lat'];
$lng = $tempat2['lng'];
?>
<!-- The Modal -->
<div class="modal fade" id="myModal<?php echo $id ?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Informasi Bersingungan</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      	<?php
        $query=mysqli_query($config,"SELECT * FROM tb_tempat_menara WHERE tipe_menara = '$tipe_menara' AND status_tempat='cetak_rekom'");
        $count = mysqli_num_rows($query);
        if($count>0){
        	while($tempat = mysqli_fetch_array($query)){
        		if($id != $tempat['id_tempat']){
        			$lokasi2_lat = $tempat['lat'];
        			$lokasi2_long = $tempat['lng'];
        			$jarak = (rad2deg(acos((sin(deg2rad($lat))*sin(deg2rad($lokasi2_lat))) + (cos(deg2rad($lat))*cos(deg2rad($lokasi2_lat))*cos(deg2rad($lng-$lokasi2_long))))))*111.13384;
                    if($jarak<0.25)
                    {
                      $jaraktempat=$jarak;
                      $bersinggungan=1;
                      $lokasi2_nama=$tempat['alamat'];
                      ?>
                    <ul>
                    <li>
                      <p>Bersinggungan dengan <b class="text-danger"><?php echo $lokasi2_nama ?></b> <a href="map.php?id1=<?php echo $tempat['id_tempat'] ?>&id2=<?php echo $id ?>" class="text-primary" target='_blank'>Open Maps</a></p><br>
                    </li>
                  </ul>
                      <?php
                    }
        		}
        	}

        }else{

        }
		?>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>