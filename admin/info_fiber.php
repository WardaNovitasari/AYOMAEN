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
    <script src="boostrap/js/jquery.min.js"></script>
    <script src="boostrap/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    <link href="boostrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <script src="boostrap/js/bootstrap-editable.min.js"></script>
</head>
<body>

<div class="container">
    <h3>Silahkan klik untuk edit data pada table (hanya tipe menara yang bisa di edit)</h3>
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
            <th colspan="3"><center>Action</center></th>
        </tr>

        <?php
        if($step==1){
            $sql = "SELECT * FROM tb_tempat_fiber JOIN tb_form_fiber ON tb_tempat_fiber.id_form=tb_form_fiber.id_form WHERE tb_tempat_fiber.id_form='$id' AND tb_tempat_fiber.status_tempat='pengajuan'";
        }elseif($step==2){
            $sql = "SELECT * FROM tb_tempat_fiber JOIN tb_form_fiber ON tb_tempat_fiber.id_form=tb_form_fiber.id_form WHERE tb_tempat_fiber.id_form='$id' AND tb_tempat_fiber.status_tempat='hasil_survey'";
        }elseif($step==3){
            $sql = "SELECT * FROM tb_tempat_fiber JOIN tb_form_fiber ON tb_tempat_fiber.id_form=tb_form_fiber.id_form WHERE tb_tempat_fiber.id_form='$id' AND tb_tempat_fiber.status_tempat='proses_rekom'";
        }elseif($step==4){
            $sql = "SELECT * FROM tb_tempat_fiber JOIN tb_form_fiber ON tb_tempat_fiber.id_form=tb_form_fiber.id_form WHERE tb_tempat_fiber.id_form='$id' AND tb_tempat_fiber.status_tempat='cetak_rekom'";
        }
        $fiber = mysqli_query($config,$sql);
        while($data = mysqli_fetch_assoc($fiber)){
        ?>
            <tr>
                <td><?php echo $data['id_form'] ?></td>
                <td><?php echo $data['nomor'] ?></td>
                <td><?php echo $data['site_id'] ?></td>
                <td><?php echo $data['alamat'] ?></td>
                <td><?php echo $data['kelurahan'] ?></td>
                <td><?php echo $data['kecamatan'] ?></td>
                <td><?php echo $data['lat'] ?></td>
                <td><?php echo $data['lng'] ?></td>
                <td><a href="" class="update" data-name="tipe_menara" data-type="text" data-pk="<?php echo $data['id_tempat'] ?>" data-title="Edit Tipe Menara" title="Edit Tipe Menara"><?php echo $data['tipe_menara'] ?></a></td>
                <td><?php echo $data['tinggi'] ?></td>
                <td><?php echo $data['status_tempat'] ?></td>
                <td><a href="" id="tolakuy" class="tolak"data-type="text" data-pk="<?php echo $data['id_tempat'] ?>" data-name="alasan"><?php echo $data['alasan'] ?></a></td>

                 <?php if($data['status_tempat']=='cetak_rekom'){ ?>
                    <td colspan="3"><a href="print.php?id=<?php echo $data['id_tempat'] ?>" class="btn btn-primary btn-sm"><i class="fas fa-print"></i></td>
                <?php }else{ ?>
                <td><a href="" class="btn btn-primary btn-sm tolak"  data-toggle="modal" data-target="#myModal<?php echo $data['id_tempat'] ?>">Cek</a></td>
                <?php if($data['status_tempat']!='cetak_rekom'){?>
                <td><a href="../aksi/admin/acc_tempat_menara.php?id=<?php echo $data['id_tempat']; ?>&status=<?php echo $data['status_tempat'] ?>&id_form=<?php echo $data['id_form']?>" class="btn btn-success btn-sm" onclick="return confirm('Anda yakin mau menerima lokasi ini ?')"><i class="fas fa-check"></i></a></td>
                <?php } else {?>
                <td><a href="../aksi/admin/acc_tempat_menara.php?id=<?php echo $data['id_tempat']; ?>&status=<?php echo $data['status_tempat'] ?>&id_form=<?php echo $data['id_form']?>" class="btn btn-success btn-sm disabled" onclick="return confirm('Anda yakin mau menerima lokasi ini ?')"><i class="fas fa-check"></i></a></td>
                <?php } ?>
                <?php if($data['status_tempat']=='pengajuan' || $data['status_tempat']=='hasil_survey'){ ?>
                <td><a href="#" class="btn btn-danger btn-sm delete-menara" title="Tolak" data-id="<?php echo $data['id_tempat'] ?>" data-status="<?php echo $data['status_tempat'] ?>" data-form="<?php echo $data['id_form'] ?>"><i class="fas fa-times"></i></a></td>
                <?php } else { ?>
                    <td><a href="#" class="btn btn-danger btn-sm disabled delete-menara" title="Tolak" onclick="return confirm('Anda yakin mau menolak lokasi ini ?')" data-id="<?php echo $data['id_tempat'] ?>"><i class="fas fa-times"></i></a></td>
                <?php } 
            }
                ?>
            </tr>

        <?php
            include 'modal/modal_info_fiber.php';
            }
        ?>
    </table>
</div> 
<?php
 include 'modal/modal_tolak_fo.php';
?>
</body>
<script type="text/javascript">
    $('.update').editable({
           url: '../aksi/admin/edit_fo.php',
           type: 'text',
           pk: 1,
           name: 'tipe_menara',
           title: 'Edit Tipe Menara'
    });
    $(function(){
            $(document).on('click','.delete-fiber',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('hasil2.php',
                    {id:$(this).attr('data-id') }
                );
            });
    });
</script>
</html>