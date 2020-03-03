<?php
 require('../koneksi/koneksi.php');
 $id    = $_GET['id'];
 $step  = $_GET['step'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Tempat Pengajuan</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="../admin/boostrap/js/jquery.min.js"></script>
    <script src="../admin/boostrap/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    <link href="../admin/boostrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <script src="../admin/boostrap/js/bootstrap-editable.min.js"></script>
    <style type="text/css">
    	.nonaktiv{
    		pointer-events: none;
    	}
    </style>
</head>
<body>

<div class="container">
    <h3>Silahkan klik untuk edit data pada table</h3>
    <p>(hanya tempat yang ditolak dan setelah editing selesai maka harus di refresh halamannya agar status berubah menjadi pengajuan)</p>
    <?php
    $kmz = mysqli_query($config,"SELECT * FROM tb_file_fiber WHERE id_form='$id' AND id_tipe=1");
    $xls = mysqli_query($config,"SELECT * FROM tb_file_fiber WHERE id_form='$id' AND id_tipe=2");
        while($excel2=mysqli_fetch_array($xls)){
    ?>
            <a href="<?php echo $excel2['file'] ?>"><i class="fas fa-file-excel"></i> file.excel</a><br>
    <?php
        }
        while($kmz2=mysqli_fetch_array($kmz)){
    ?>
            <a href="<?php echo $kmz2['file'] ?>"><i class="fas fa-file-signature"></i> file.kmz</a>
    <?php
        }
    ?>
    <table class="table table-bordered">
        <tr>
            <th>id form</th>
            <th>Nomor</th>
            <th>Site Id</th>
            <th>Alamat</th>
            <th>Kelurahan</th>
            <th>Kecamatan</th>
            <th>Lattitude</th>
            <th>Longtitude</th>
            <th>Tipe Menara</th>
            <th>Tinggi</th>
            <th>Status</th>
            <th>Keterangan</th>
            <th colspan="2"><center>Action</center></th>
        </tr>

        <?php
        if($step==1){
            $sql = "SELECT * FROM tb_tempat_fiber JOIN tb_form_fiber ON tb_tempat_fiber.id_form=tb_form_fiber.id_form WHERE tb_tempat_fiber.id_form='$id'";
        }elseif($step==2){
            $sql = "SELECT * FROM tb_tempat_fiber JOIN tb_form_fiber ON tb_tempat_fiber.id_form=tb_form_fiber.id_form WHERE tb_tempat_fiber.id_form='$id' AND tb_tempat_fiber.status_tempat='pengajuan' OR tb_tempat_fiber.status_tempat='ditolak' ORDER BY tb_tempat_fiber.status_tempat DESC";
        }elseif($step==3){
            $sql = "SELECT * FROM tb_tempat_fiber JOIN tb_form_fiber ON tb_tempat_fiber.id_form=tb_form_fiber.id_form WHERE tb_tempat_fiber.id_form='$id' AND tb_tempat_fiber.status_tempat='hasil_survey'";
        }elseif($step==4){
            $sql = "SELECT * FROM tb_tempat_fiber JOIN tb_form_fiber ON tb_tempat_fiber.id_form=tb_form_fiber.id_form WHERE tb_tempat_fiber.id_form='$id' AND tb_tempat_fiber.status_tempat='proses_rekom'";
        }elseif($step==5){
             $sql = "SELECT * FROM tb_tempat_fiber JOIN tb_form_fiber ON tb_tempat_fiber.id_form=tb_form_fiber.id_form WHERE tb_tempat_fiber.id_form='$id' AND tb_tempat_fiber.status_tempat='cetak_rekom'";
        }
        $fiber = mysqli_query($config,$sql);
        while($data = mysqli_fetch_assoc($fiber)){
        ?>
            <tr>
            	<?php if($data['status_tempat']=='ditolak'){ ?>
                	<td><?php echo $data['id_form'] ?></td>
                	<td><a href="" class="update" data-name="nomor" data-type="text" data-pk="<?php echo $data['id_tempat'] ?>" data-title="Edit Nomor fiber" title="Edit Nomor Tempat"><?php echo $data['nomor'] ?></a></td>

                	<td><a href="" class="update" data-name="site_id" data-type="text" data-pk="<?php echo $data['id_tempat'] ?>" data-title="Edit Tipe fiber" title="Edit Tipe fiber"><?php echo $data['site_id'] ?></a></td>
                	<td><a href="" class="update" data-name="alamat" data-type="text" data-pk="<?php echo $data['id_tempat'] ?>" data-title="Edit Tipe fiber" title="Edit Tipe fiber"><?php echo $data['alamat'] ?></a></td>
                	<td><a href="" class="update" data-name="kelurahan" data-type="text" data-pk="<?php echo $data['id_tempat'] ?>" data-title="Edit Tipe fiber" title="Edit Tipe fiber"><?php echo $data['kelurahan'] ?></a></td>
                	<td><a href="" class="update" data-name="kecamatan" data-type="text" data-pk="<?php echo $data['id_tempat'] ?>" data-title="Edit Tipe fiber" title="Edit Tipe fiber"><?php echo $data['kecamatan'] ?></a></td>
                	<td><a href="" class="update" data-name="lat" data-type="text" data-pk="<?php echo $data['id_tempat'] ?>" data-title="Edit Tipe fiber" title="Edit Tipe fiber"><?php echo $data['lat'] ?></a></td>
                	<td><a href="" class="update" data-name="lng" data-type="text" data-pk="<?php echo $data['id_tempat'] ?>" data-title="Edit Tipe fiber" title="Edit Tipe fiber"><?php echo $data['lng'] ?></a></td>
                	<td><?php echo $data['tipe_menara'] ?></td>
                	<td><a href="" class="update" data-name="tinggi" data-type="text" data-pk="<?php echo $data['id_tempat'] ?>" data-title="Edit Tipe fiber" title="Edit Tipe fiber"><?php echo $data['tinggi'] ?></a></td>
                	<td class="text-danger"><b><?php echo $data['status_tempat'] ?></b></td>
                	<td><?php echo $data['alasan'] ?></td>
                	<?php if($data['status_tempat']=='cetak_rekom'){?>
                		<td><a href="akadskokads.php" class="btn btn-primary btn-sm"><i class="fas fa-print"></i></a></td>
            		<?php }else{?>
                		<td><a href="akadskokads.php" class="btn btn-primary btn-sm nonaktiv" disabled><i class="fas fa-print"></i></a></td>
                	<?php } ?>
                	<td><a href="../aksi/user/delete.php?id=<?php echo $data['id_tempat']?>&tipe=fiber" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a></td>
            	<?php }else{ ?>
            		<td><?php echo $data['id_form'] ?></td>
                	<td><?php echo $data['nomor'] ?></td>
                	<td><?php echo $data['site_id'] ?></td>
                	<td><?php echo $data['alamat'] ?></td>
                	<td><?php echo $data['kelurahan'] ?></td>
                	<td><?php echo $data['kecamatan'] ?></td>
                	<td><?php echo $data['lat'] ?></td>
                	<td><?php echo $data['lng'] ?></td>
                	<td><?php echo $data['tipe_menara'] ?></td>
                	<td><?php echo $data['tinggi'] ?></td>
                	<td><?php echo $data['status_tempat'] ?></td>
                	<td><?php echo $data['alasan'] ?></td>
                	<?php if($data['status_tempat']=='cetak_rekom'){?>
                		<td><a href="akadskokads.php" class="btn btn-primary btn-sm"><i class="fas fa-print"></i></a></td>
            		<?php }else{?>
                		<td><a href="akadskokads.php" class="btn btn-primary btn-sm nonaktiv" disabled><i class="fas fa-print"></i></a></td>
                	<?php } ?>
                	<?php if($data['status_tempat']=='ditolak'){?>
                		<td><a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a></td>
                	<?php }else{ ?>
                		<td><a href="../aksi/user/delete.php?id<?php echo $data['id_tempat']?>&tipe=fiber" class="btn btn-danger btn-sm nonaktiv" disabled><i class="fas fa-trash"></i></a></td>
                	<?php } ?>
            	<?php } ?>
            </tr>

        <?php
            include 'modal/modal_info_fiber.php';
            }
        ?>
        <tfoot>
        	<tr>
        		<th colspan="12"><center>Submit</center></th>
        		<th colspan="2"><center><a href="info_fiber.php?id=<?php echo $id ?>&step=2" class="btn btn-success">Submit</a></center></th>
        	</tr>
        </tfoot>
    </table>
</div> 
</body>
<script type="text/javascript">
    $('.update').editable({
           url: '../aksi/user/edit.php',
           type: 'text',
           pk: 1,
           name: 'tipe_fiber',
           title: 'Edit Tipe fiber'
    });
</script>
</html>