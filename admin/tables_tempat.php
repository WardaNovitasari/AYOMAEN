<?php include '../koneksi/koneksi.php';
session_start();
  if(empty($_SESSION['username'])){
    header("location:../login.php");
  }elseif($_SESSION['status']!='admin'){
    header("location:../404.html");
  }
  $id    = $_GET['id'];
 $step  = $_GET['step'];
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'view/head.php'; ?>
<body id="page-top">

<?php include 'view/navbar.php'; ?>

  <div id="wrapper">

    <?php include 'view/sidebar.php'; ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Beranda</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Menara yang Belum dilakukan Tindakan</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
               <tr>
            <th>id form</th>
            <th>Nomor</th>
            <th>Site Id</th>
            <th>Alamat</th>
            <th>Kecamatan</th>
            <th>Kelurahan</th>
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
            $sql = "SELECT * FROM tb_tempat_menara JOIN tb_form_menara ON tb_tempat_menara.id_form=tb_form_menara.id_form WHERE tb_tempat_menara.id_form='$id' AND tb_tempat_menara.status_tempat='pengajuan'";
        }elseif($step==2){
            $sql = "SELECT * FROM tb_tempat_menara JOIN tb_form_menara ON tb_tempat_menara.id_form=tb_form_menara.id_form WHERE tb_tempat_menara.id_form='$id' AND tb_tempat_menara.status_tempat='hasil_survey'";
        }elseif($step==3){
            $sql = "SELECT * FROM tb_tempat_menara JOIN tb_form_menara ON tb_tempat_menara.id_form=tb_form_menara.id_form WHERE tb_tempat_menara.id_form='$id' AND tb_tempat_menara.status_tempat='proses_rekom'";
        }elseif($step==4){
            $sql = "SELECT * FROM tb_tempat_menara JOIN tb_form_menara ON tb_tempat_menara.id_form=tb_form_menara.id_form WHERE tb_tempat_menara.id_form='$id' AND tb_tempat_menara.status_tempat='cetak_rekom'";
        }
        $menara = mysqli_query($config,$sql);
        while($data = mysqli_fetch_assoc($menara)){
        ?>
            <tr class="edit_tr" id="<?php echo $data['id_tempat'] ?>">
                <td><?php echo $data['id_form'] ?></td>
                <td><?php echo $data['nomor'] ?></td>
                <td><?php echo $data['site_id'] ?></td>
                <td class="edit_td">
                	<span id="alamat_<?php echo $data['id_tempat']; ?>" class="text"><?php echo $data['alamat'] ?></span>
					<input type="text" name="lat" class="editbox" id="alamat_input_<?php echo $data['id_tempat'];?>" value="<?php echo $data['alamat'] ?>">
                </td>
                <td class="edit_td">
                  <span id="kecamatan_<?php echo $data['id_tempat']; ?>" class="text"><?php echo $data['kecamatan'] ?></span>
          <select class="editbox" id="kecamatan_input_<?php echo $data['id_tempat'];?>" onchange="pilih_kelurahan()">
                <?php
                  $kecamatan = mysqli_query($config,"SELECT * FROM tb_kecamatan");
                  while($dtkecamatan=mysqli_fetch_array($kecamatan)){
                ?>
                <option value="<?php echo $dtkecamatan['kecamatan']; ?>"><?php echo $dtkecamatan['kecamatan']; ?></option>
                <?php
                  }
                ?>
              </select>
            </td>
                <td class="edit_td">
                  <span id="kelurahan_<?php echo $data['id_tempat']; ?>" class="text"><?php echo $data['kelurahan'] ?></span>
							    <select class="editbox" id="kelurahan_input_<?php echo $data['id_tempat'];?>"></select>
                </td>
                <td class="edit_td">
                	<span id="lat_<?php echo $data['id_tempat']; ?>" class="text"><?php echo $data['lat'] ?></span>
					<input type="text" name="lat" class="editbox" id="lat_input_<?php echo $data['id_tempat'];?>" value="<?php echo $data['lat'] ?>">
                </td>
                <td class="edit_td">
                	<span id="lng_<?php echo $data['id_tempat']; ?>" class="text"><?php echo $data['lat'] ?></span>
					<input type="text" name="lat" class="editbox" id="lng_input_<?php echo $data['id_tempat'];?>" value="<?php echo $data['lng'] ?>">
                </td>
                <td class="edit_td"><?php echo $data['tipe_menara'] ?></td>
                <td class="edit_td">
                	<span id="tinggi_<?php echo $data['id_tempat']; ?>" class="text"><?php echo $data['tinggi'] ?></span>
					<input type="text" name="tinggi" class="editbox" id="tinggi_input_<?php echo $data['id_tempat'];?>" value="<?php echo $data['tinggi'] ?>">
                </td>
                <td class="edit_td"><?php echo $data['status_tempat'] ?></td>
                <td class="edit_td"><a href="" id="tolakuy" class="tolak"data-type="text" data-pk="<?php echo $data['id_tempat'] ?>" data-name="alasan"><?php echo $data['alasan'] ?></a></td>

                <?php if($data['status_tempat']=='cetak_rekom'){ ?>
                    <td colspan="3"><a href="print_rekom.php?id=<?php echo $data['id_tempat'] ?>&form=<?php echo $data['id_form'] ?>" class="btn btn-primary btn-sm"><i class="fas fa-print"></i></td>
                <?php }else{ ?>
                <td><a href="" class="btn btn-primary btn-sm tolak"  data-toggle="modal" data-target="#myModal<?php echo $data['id_tempat'] ?>">Cek</a></td>
                <?php if($data['status_tempat']!='cetak_rekom'){?>
                <td><a href="../aksi/admin/acc_tempat_menara.php?id=<?php echo $data['id_tempat']; ?>&status=<?php echo $data['status_tempat'] ?>&id_form=<?php echo $data['id_form']?>" class="btn btn-success btn-sm" onclick="return confirm('Anda yakin mau menerima lokasi ini ?')"><i class="fas fa-check"></i></a></td>
                <?php } else {?>
                <td><a href="../aksi/admin/acc_tempat_menara.php?id=<?php echo $data['id_tempat']; ?>&status=<?php echo $data['status_tempat'] ?>&id_form=<?php echo $data['id_form']?>" class="btn btn-success btn-sm disabled" onclick="return confirm('Anda yakin mau menerima lokasi ini ?')"><i class="fas fa-check"></i></a></td>
                <?php } ?>
                <?php if($data['status_tempat']=='pengajuan' || $data['status_tempat']=='hasil_survey'){ ?>
                <td><a href="../aksi/admin/revisi.php?kode_brg=<?php echo $data['id_tempat'] ?>" class="btn btn-danger btn-sm delete-menara" title="Tolak" data-id="<?php echo $data['id_tempat'] ?>" data-status="<?php echo $data['status_tempat'] ?>" data-form="<?php echo $data['id_form'] ?>"><i class="fas fa-times"></i></a></td>
                <?php } else { ?>
                    <td><a href="../aksi/admin/revisi.php?kode_brg=<?php echo $data['id_tempat'] ?>" class="btn btn-danger btn-sm disabled delete-menara" title="Tolak" onclick="return confirm('Anda yakin mau menolak lokasi ini ?')" data-id="<?php echo $data['id_tempat'] ?>"><i class="fas fa-times"></i></a></td>
                <?php }
            }
                ?>
            </tr>

        <?php
            include 'modal/modal_info_menara.php';
            }
        ?>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

         <!-- Sticky Footer -->
      <?php include 'view/footer.php'; ?>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <?php include 'view/scroll.php'; ?>

  <!-- Logout Modal-->
  <?php include 'modal/logoutmodal.php' ?>


  <!-- Bootstrap core JavaScript-->
 <?php include 'view/script.php'; ?>
 <!--<script>
     $('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var recipient = button.data('isi')
    var modal = $(this)
    modal.find('.modal-title').text('Submit Masukan Paket  ' + recipient)
    modal.find('<?php //echo $id ?>').val(recipient)
  })
  </script>-->
  <?php
 include 'modal/modal_tolak_menara.php';
?>

</body>
<script>
$(document).ready(function(){

$(".editbox").hide();
$(".edit_tr").click(function(){

var ID=$(this).attr('id');
function pilih_kelurahan(){
  var kecamatan = $('#kecamatan_input_'+ID).val();
  $.ajax({
        url: '../aksi/admin/pilih_kelurahan.php',
        data : 'kecamatan='+kecamatan,
    type: "post",
        dataType: "html",
    timeout: 10000,
        success: function(response){
      $('#kelurahan_input_'+ID).html(response);
        }
    });
}
$("#first_"+ID).hide();
$("#first_input_"+ID).show();

$("#lat_"+ID).hide();
$("#lat_input_"+ID).show();

$("#lng_"+ID).hide();
$("#lng_input_"+ID).show();

$("#kecamatan_"+ID).hide();
$("#kecamatan_input_"+ID).show();
$("#kecamatan_input_"+ID).change(function(){
  pilih_kelurahan();
});

$("#kelurahan_"+ID).hide();
$("#kelurahan_input_"+ID).show();
}).change(function(){
var ID=$(this).attr('id');
var first=$("#first_input_"+ID).val();
var second=$("#lat_input_"+ID).val();
var third=$("#lng_input_"+ID).val();
var fourth = $("#kecamatan_input_"+ID).val();
var five  = $("#kelurahan_input_"+ID).val();
//var last=$("#last_input_"+ID).val();
var dataString = 'id='+ ID +'&firstname='+first+'&lat='+second+'&lng='+third+'&kec='+fourth+'&kel='+five;
//$("#first_"+ID).html('<img src="load.gif" />'); // Loading image
  $.ajax({
  type: "POST",
  url: "../aksi/admin/udpate_alasan.php",
  data: dataString,
  cache: false,
  success: function(html){
    $("#first_"+ID).html(first);
    $("#lat_"+ID).html(second);
    $("#lng_"+ID).html(third);
    $("#kecamatan_"+ID).html(fourth);
    $("#kelurahan_"+ID).html(five);
    //$("#last_"+ID).html(last);
  }
  });
});

// Edit input box click action
$(".editbox").mouseup(function(){
return false
});

// Outside click action
$(document).mouseup(function(){
$(".editbox").hide();
$(".text").show();
});

$()
});
</script>


</html>
