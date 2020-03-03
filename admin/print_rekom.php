<?php
include '../koneksi/koneksi.php';
session_start();
  if(empty($_SESSION['username'])){
    header("location:../login.php");
  }elseif($_SESSION['status']!='admin'){
    header("location:../404.html");
  }
  $id= $_GET['id'];
  $iform = $_GET['form'];
  $rekomendasi = mysqli_query($config,"SELECT * FROM tb_rekomendasi, tb_dinas  WHERE tb_rekomendasi.id_dinas=tb_dinas.id_dinas AND tb_rekomendasi.id_tempat='$id'");
  $data_rekom = mysqli_fetch_array($rekomendasi);
  $perusahaan = mysqli_query($config,"SELECT * FROM tb_tempat_menara JOIN tb_form_menara ON tb_tempat_menara.id_form = tb_form_menara.id_form JOIN tb_perusahaan ON tb_form_menara.id_perusahaan=tb_perusahaan.id_perusahaan WHERE tb_tempat_menara.id_tempat = '$id'");
  $data_pt = mysqli_fetch_array($perusahaan);

  $desc = mysqli_query($config,"SELECT * FROM tb_tempat_menara WHERE status_tempat='cetak_rekom' AND id_form='$iform' ORDER BY id_tempat DESC");
    $desc1 = mysqli_fetch_array($desc);
    $ttl = mysqli_num_rows($desc);
    $asc = mysqli_query($config,"SELECT * FROM tb_tempat_menara WHERE status_tempat='cetak_rekom' AND id_form='$iform' ORDER BY id_tempat ASC");
    $asc1 = mysqli_fetch_array($asc);
    $id2 = $desc1['id_tempat'];
    $id3 = $asc1['id_tempat'];
$pegawai = mysqli_query($config,"SELECT * FROM tb_pegawai WHERE jabatan='KEPALA'");
  $dt_pegawai = mysqli_fetch_array($pegawai);

  function tgl_indo($tanggal){
  $bulan = array (
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $pecahkan = explode('-', $tanggal);

  // variabel pecahkan 0 = tanggal
  // variabel pecahkan 1 = bulan
  // variabel pecahkan 2 = tahun
 
  return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Berita Acara</title>
	<link rel="stylesheet" type="text/css" href="view/style.css">
	<link href="boostrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<script src="view/js/jquery.js"></script>
</head>
<body>
	<div class="kopsurat">
			<img src="view/logo.png">
			<p style="font-size: 22px;">PEMERINTAH KOTA YOGYAKARTA</p>
			<b><h2>DINAS KOMUNIKASI INFORMATIKA DAN PERSANDIAN</h2></b>
			<p>Jl. Kenari No. 56 Yogyakarta Kode Pos 55165 Telp.(0274)551230, 515865, 562682 Fax. (0274)520332</p>
			<p>EMAIL : <u>kominfosandi@jogjakota.go.id:</u></p>
			<p>HOTLINE SMS: 081 2278 0001; HOTLINE EMAIL : <u>upik@jogjakota.go.id</u></p>
			<p>WEBSITE: www.jogjakota.go.id</p>
			<input type="hidden" name="id_tempat" id="id_tempat" value="<?php echo $id ?>">
			<hr style="border-width: 3px;">
			<hr>
	</div>
	<div class="bodysurat">
		<h3><u>REKOMENDASI TITIK LOKASI MENARA TELEKOMUNIKASI</u></h3>
		<center><p>Nomor 555 / <?php echo $id ?> </p></center></br>
		<p>Menindaklanjuti Permohonan Rekomendasi Titik Lokasi Menara Telekomunikasi Nomor <?php echo $data_pt['no_surat'] ?> dari <?php echo $data_pt['nm_perusahaan'] ?> tertanggal <?php echo tgl_indo($data_pt['tgl_pengajuan']) ?> , serta berdasarkan :<br>
	1. Peraturan Daerah Kota Yogyakarta Nomor 7 Tahun 2017 tentang Penataan dan Pengendalian Menara Telekomunikasi dan Fiber Optik.<br>
	2. Peraturan Walikota Yogyakarta Nomor 66 Tahun 2018 tentang Petunjuk Pelaksanaan Peraturan Daerah Kota Yogyakarta Nomor 7 Tahun 2017 tentang Penataan dan Pengendalian Menara Telekomunikasi dan Fiber Optik.<br>
	3. Keputusan Walikota Yogyakarta Nomor 384 Tahun 2017 tentang Penetapan Lokasi Pendirian MenaraMicrocell.<br>
	4. Berita Acara Peninjauan Titik Lokasi Penempatan Menara Telekomunikasi Nomor 490/<?php echo $data_pt['id_form'] ?> Tanggal <?php echo tgl_indo($data_pt['tgl_surat']) ?>.<br>
	Dinas Komunikasi Informatika dan Persandian Kota Yogyakarta memberikan rekomendasi titik lokasi menara telekomunikasi kepada <?php echo $data_pt['nm_perusahaan']?> yang beralamatkan <?php echo $data_pt['alamat_perusahaan'] ?> untuk pembangunan menara telekomunikasi bersama dengan data berikut :
	<table border="0" class="tbcontainer">
 	<?php
 		$query = mysqli_query($config,"SELECT * FROM tb_tempat_menara WHERE id_tempat='$id'");
 		$data = mysqli_fetch_array($query);
 	?>
	<tr><td><p>a. Site ID</p></td><td>:</td><td><p><input type="text" name="site_id" id="site_id" onchange="update_siteid()" value="<?php echo $data['site_id_hasil'] ?>"></p></td></tr>
	<tr><td><p>b. Titik Koordinat</p></td><td>:</td><td> <p>Latitude <?php echo $data['lat_hasil'] ?>  ; Longitude <?php echo $data['lng_hasil']; ?></p></td></tr>
	<tr><td><p>c. Tinggi</p></td><td><p>:</p></td><td> <p> <?php echo $data['tinggi'] ?> meter</p></td></tr>
	<tr><td><p>d. Alamat</p></td><td><p>:</td><td><p>Kecamatan <?php echo $data['kecamatan'] ?> ; Kelurahan <?php echo $data['kelurahan'] ?>  <?php echo $data['alamat'] ?></p></td></tr>
	<tr><td><p>e. Zona</p></td><td><p>:</p></td><td><p> Menara Kamuflase</p></td></tr>
	<tr><td><p>f. Status Tanah</p></td><td><p>:</p></td><td><p><?php echo $data['aset_lokasi'] ?></p></td></tr>
	<tr><td><p>g. Penggunaan Aset</p></td><td><p>:</p></td><td><?php if($data['aset_lokasi']=="Aset Pemkot Yogyakarta"){ ?>
			<select id="dinas"  name="id_dinas" onchange="update_dinas()">
        <?php
          $dinas = mysqli_query($config,"SELECT * FROM tb_dinas");
          while($dt = mysqli_fetch_array($dinas)){
        ?>
              <option value='<?php echo $dt['id_dinas'] ?>'><?php echo $dt['nama_dinas']?></option>
        <?php
          }
        ?>
      </select>
		<?php }else{ ?>
			<p> - </p>
		<?php } ?>
	</td></tr>
	<tr><td><p>h. Tipe Site</p></td><td><p>:</p></td><td><p><?php echo $data['tipe_menara'] ?></p></td></tr>
	<tr><td><p>i. Tipe Menara</p></td><td><p>:</td><td> <select id="pilihan" onchange="update_otomatis()" name="id_tempat1">
							<option value='' selected>-pilih-</option>
							<option value='1' selected>1</option>
							<option value='3' selected>3  </option>
							<option value='4' selected>4  </option>
			</select><p><?php echo $data['tipe_site'] ?> Kaki</p></td></tr>
	<tr><td><p>j. Keterangan</p></td><td><p>:</p></td><td><p id="tipe-menara"><select id="keterangan" onchange="update_keterangan()" name="id_tempat1">
							<option value='' selected>-pilih-</option>
							<option value='existing perda' selected>Existing Perda</option>
							<option value='existing non perda' selected>Existing Non Perda  </option>
							<option value='baru' selected>Baru  </option>
			</select></p></td></tr>

 	</table>
		<p>Dengan ketentuan sebagai berikut :<br>
		1. Rekomendasi Titik Lokasi Menara Telekomunikasi adalah keterangan bahwa koordinat tersebut diatas dapat ditempatkan menara telekomunikasi dan <b><u>bukan</u></b> merupakan izin pendirian menara telekomunikasi;<br>
		2. Rekomendasi ini berlaku 30 hari kerja sejak diterbitkan;<br>
		3. Penyedia menara wajib melaporkan penggunaan menaranya 1 (satu) kali dalam setahun meliputi nama dan jumlah pengguna menara, kapasitas yang tersisa, masa kontrak pengguna menara, rencana penempatan antena dan daftar calon pengguna menara kepada Dinas Komunikasi Informatika dan Persandian Kota Yogyakarta;<br>
		Demikian untuk menjadi periksa.</p>
 	<br>
 	<table border="0" align="right" class="tbcontainer">
 		<tr><td><center><p>Yogyakarta, <input type="date" value="<?php echo $data_rekom['tgl_rekomendasi']?>" id="tgl" onchange="updatetgl()"></p></center></td></tr>
 		<tr><td><center><p>KEPALA</p></center></td></tr>
 		<tr><td>&nbsp;</td></tr>
 		<tr><td>&nbsp;</td></tr>
 		<tr><td>&nbsp;</td></tr>
 		<tr><td><u><center><p><?php echo $dt_pegawai['nama'] ?></p></center></u></td></tr>
 		<tr><td><center><p>NIP.<?php echo $dt_pegawai['nip'] ?>'</p></center></td></tr>
 	</table>
 	<br>
 	<br>
 	<br>
 	<br>
 	<br>
 	<br>
 	<br>
 	<p>Tembusan :</p><br>
  <?php
    if($data_rekom['id_dinas']==''){
  ?>
 	<p>1. Dinas Penanaman Modal dan Perizinan Kota Yogyakarta;</p><br>
 	<p>2. Kantor Satuan Polisi Pamong Praja Kota Yogyakarta.</p><br>
    <?php
    }else{
      ?>
  <p>1. <?php echo $data_rekom['nama_dinas'] ?></p><br>
  <p>2. Dinas Penanaman Modal dan Perizinan Kota Yogyakarta;</p><br>
  <p>3. Kantor Satuan Polisi Pamong Praja Kota Yogyakarta.</p><br>
      <?php
    }
    ?>

<?php
if($ttl > 1){
    if($id >= $id2){
?>
          <a href="print_rekom2.php?id=<?php echo $id ?>" class="btn btn-primary" target="_blank"><i class="fas fa-print"></i></a>
          <a href="../aksi/admin/prev.php?id=<?php echo $id ?>&form=<?php echo $iform ?>" class="btn btn-prev"><i class="fas fa-chevron-left"></i></a>
<?php
    }elseif($id <= $id3){
?>
          <a href="print_rekom2.php?id=<?php echo $id ?>" class="btn btn-primary" target="_blank"><i class="fas fa-print"></i></a>
 	        <a href="../aksi/admin/next.php?id=<?php echo $id ?>&form=<?php echo $iform ?>" class="btn btn-next"><i class="fas fa-chevron-right"></i></a>
<?php
    }else{
?>
          <a href="print_rekom2.php?id=<?php echo $id ?>" class="btn btn-primary"target="_blank"><i class="fas fa-print"></i></a>
 	        <a href="../aksi/admin/next.php?id=<?php echo $id ?>&form=<?php echo $iform ?>" class="btn btn-next"><i class="fas fa-chevron-right"></i></a>
 	        <a href="../aksi/admin/prev.php?id=<?php echo $id ?>&form=<?php echo $iform ?>" class="btn btn-prev"><i class="fas fa-chevron-left"></i></a>
<?php
    }
}elseif($ttl==1){
?>
    <a href="print_rekom2.php?id=<?php echo $id ?>" class="btn btn-primary" target="_blank"><i class="fas fa-print"></i></a>
<?php
}
?>
<a href="tables_tempat.php?id=<?php echo $iform ?>&step=4" class="btn btn-back"><i class="fas fa-long-arrow-alt-left"></i> Back</a>
</div>

</body>
<script type="text/javascript" src="view/js/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">

  $(document).ready(function(){
    $("#tgl_rekom").click(function(){
      $("#tgl_rekom").hide();
      $("#tgl").show();
    })
  });
	function updatenomor(){
	var kode_brg = $("#nomor2").val();
	var id_form = $("#id_tempat").val();
	var kolom = "no";
  			//document.write(kode_brg);
    		$.ajax({
    			url: '../aksi/admin/update_rekom.php',
    			data:'kode_brg='+kode_brg+'&id_form='+id_form+'&kolom='+kolom
    		})
    		.success(function (html) {
    			$("#nomor2").val(kode_brg);
   			});

}
function update_dinas(){
  var id_dinas = $("#dinas").val();
  var id_form  = $("#id_tempat").val();
  var kolom    = "id_dinas";
  $.ajax({
    url: '../aksi/admin/update_rekom.php',
    data:'kode_brg='+id_dinas+'&id_form='+id_form+'&kolom='+kolom
  })
  .success(function(data){
    window.location.reload(true);
  })
}
function updatetgl(){
	var kode_brg = $("#tgl").val();
	var id_form = $("#id_tempat").val();
	var kolom = "tgl_rekomendasi";
  			//document.write(kode_brg);
    		$.ajax({
    			url: '../aksi/admin/update_rekom.php',
    			data:'kode_brg='+kode_brg+'&id_form='+id_form+'&kolom='+kolom
    		})
    		.success(function (html) {

   			});

}

function update_otomatis(){
  var tipe = $("#pilihan").val();
  var id_tempat = $("#id_tempat").val();
  var kolom = "tipe_site";
  //document.write(kode_brg);
    $.ajax({
    url: '../aksi/admin/tipe_menara.php',
    data:'kode_brg='+tipe+'&id_form='+id_tempat+'&kolom='+kolom
    })
    .success(function (data) {
    	window.location.reload(true);
    });
}
function update_siteid(){
  var tipe = $("#site_id").val();
  var id_tempat = $("#id_tempat").val();
  var kolom = "site_id_hasil";
  //document.write(kode_brg);
    $.ajax({
    url: '../aksi/admin/tipe_menara.php',
    data:'kode_brg='+tipe+'&id_form='+id_tempat+'&kolom='+kolom
    })
    .success(function (data) {
      window.location.reload(true);
    });
}
function update_keterangan(){
   var tipe = $("#keterangan").val();
  var id_tempat = $("#id_tempat").val();
  var kolom = "keterangan_rekomendasi";
  //document.write(kode_brg);
    $.ajax({
    url: '../aksi/admin/update_rekom.php',
    data:'kode_brg='+tipe+'&id_form='+id_tempat+'&kolom='+kolom
    })
    .success(function (data) {

    });
}
</script>
</html>
