<?php
include '../koneksi/koneksi.php';
session_start();
  if(empty($_SESSION['username'])){
    header("location:../login.php");
  }elseif($_SESSION['status']!='admin'){
    header("location:../404.html");
  }
$id=$_GET['id'];

$tb_formmenara = mysqli_query($config,"SELECT * FROM tb_form_menara ORDER BY id_form DESC");
$prev = mysqli_fetch_array($tb_formmenara);
$id2 = $prev['id_form'];

$tb_formmenara2 = mysqli_query($config,"SELECT * FROM tb_form_menara ORDER BY id_form ASC");
$ttl = mysqli_num_rows($tb_formmenara2);
$next = mysqli_fetch_array($tb_formmenara2);
$id3 = $next['id_form'];

$tb_berita = mysqli_query($config,"SELECT * FROM tb_form_menara JOIN tb_berita_acara ON tb_form_menara.id_form = tb_berita_acara.id_form WHERE tb_form_menara.id_form='$id'");
$count = mysqli_num_rows($tb_berita);
$data_berita=mysqli_fetch_array($tb_berita);

$tb_perusahaan = mysqli_query($config,"SELECT * FROM tb_form_menara JOIN tb_perusahaan ON tb_form_menara.id_perusahaan=tb_perusahaan.id_perusahaan WHERE tb_form_menara.id_form='$id'");
$tb_tempat = mysqli_query($config,"SELECT * FROM tb_tempat_menara JOIN tb_form_menara ON tb_tempat_menara.id_form = tb_form_menara.id_form WHERE tb_form_menara.id_form='$id'");
$count_lokasi = mysqli_num_rows($tb_tempat);
$data_perusahaan = mysqli_fetch_array($tb_perusahaan);
$validate = mysqli_query($config,"SELECT * FROM tb_tempat_menara WHERE aset_lokasi='' AND id_form='$id' AND status_tempat='proses_survey'");
$nums = mysqli_num_rows($validate);
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

  return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Berita Acara</title>
	<link rel="stylesheet" type="text/css" href="view/style.css">
	<script src="view/js/jquery.js"></script>
	<link href="boostrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<script src="view/js/bootstrap-editable.min.js"></script>
	<script src="view/js/bootstrap.min.js"></script>

</head>
<body>
	<div id="contoh">
	<div class="kopsurat">
			<img src="view/logo.png">
			<p style="font-size: 22px;">PEMERINTAH KOTA YOGYAKARTA</p>
			<b><h2>DINAS KOMUNIKASI INFORMATIKA DAN PERSANDIAN</h2></b>
			<p>Jl. Kenari No. 56 Yogyakarta Kode Pos 55165 Telp.(0274)551230, 515865, 562682 Fax. (0274)520332</p>
			<p>EMAIL : <u>kominfosandi@jogjakota.go.id:</u></p>
			<p>HOTLINE SMS: 081 2278 0001; HOTLINE EMAIL : <u>upik@jogjakota.go.id</u></p>
			<p>WEBSITE: www.jogjakota.go.id</p>
			<hr style="border-width: 3px;">
			<hr>
	</div>
	<div class="bodysurat">
		<h3>BERITA ACARA PENINJAUAN</h3>
		<h3><u>TITIK LOKASI PENEMPATAN MENARA TELEKOMUNIKASI</u></h3>
		<center><p>Nomor 490 / <?php echo $id ?></p></center></br></br>

		<div class="justify">
			<p>Yang bertanda-tangan dibawah ini bertindak selaku Tim Pengawasan dan Pengendalian Penyelenggaraan Komunikasi dan Informatika
			Kota Yogyakarta Tahun 2019.</p></br>
			<p>Berdasarkan Pada : </p></br><input type="hidden" name="id_form" value="<?php echo $id ?>" id="form">
			<p>1. Surat dari PT. <?php echo $data_perusahaan['nm_perusahaan'] ?> Nomor <?php echo $data_perusahaan['no_surat'] ?> tanggal <?php echo tgl_indo($data_berita['tgl_pengajuan']) ?> tentang Permohonan Rekomendasi Dinas Komunikasi Informatika dan Persandian.</p>
			<p>2. Laporan hasil peninjauan bersama (survey) titik lokasi penempatan menara telekomunikasi yang dilaksanakan oleh Tim Pengawasan dan Pengendalian Penyelanggaraan Komunikasi dan Informatika Kota Yogyakarta Tahun <input type="text" name="tahun" id="tahun" onchange="updatethn()"value="<?php echo $data_berita['tahun'] ?>"> pada tanggal <input type="date" name="tgl_survey" id="tgl" onchange="updatetgl()" value="<?php echo $data_berita['tgl_survey'] ?>"> sejumlah <?php echo $count_lokasi ?> titik lokasi.</p></br>

			<p>Dari hasil peninjauan bersama (survey), didapatkan hasil sebagai berikut : </p></br>
			<p>1. Titik lokasi penempatan menara telekomunikasi yang menggunakan <b><u>aset Pemkot Yogyakarta : </u></b></p>
			<?php
				if($nums > 0){
			 ?>
			<select id="nip" onchange="isi_otomatis()" name="nip">
								<option value='' selected>- Pilih -</option>
								<?php
								$pegawai = mysqli_query($config,"SELECT * FROM tb_tempat_menara WHERE aset_lokasi='' AND id_form='$id' AND status_tempat='proses_survey'");
								while ($row = mysqli_fetch_array($pegawai)) {
								echo "<option value='$row[id_tempat]'>$row[site_id]</option>";
							}?>
							</select>
			<?php
				}
			?>
			<table class="table" id="example">
				<thead>
					<tr>
						<td>No.</td>
						<td>Nama Site</td>
						<td>Koordinat Pengajuan</td>
						<td>Koordinat Hasil Survey</td>
						<td>Kec-Kelurahan</td>
						<td>Keterangan</td>
					</tr>
				</thead>
				<tbody id="table">
					<?php
					$no=1;
					$query = mysqli_query($config,"SELECT * FROM tb_tempat_menara WHERE aset_lokasi='Aset Pemkot Yogyakarta' AND id_form='$id'");
					$number=mysqli_num_rows($query);
						if($number > 0){
							while($data = mysqli_fetch_array($query)){
					?>
					<tr id="<?php echo $data['id_tempat'] ?>" class="edit_tr">
						<td><?php echo $no++ ?></td>
						<td><?php echo $data['site_id']?></td>
						<td><?php echo $data['lat'] ?>, <?php echo $data['lng']?></td>

						<td class="edit_td">
							<span id="lat_<?php echo $data['id_tempat']; ?>" class="text"><?php echo $data['lat_hasil'] ?></span>
							<input type="text" name="lat" class="editbox" id="lat_input_<?php echo $data['id_tempat'];?>" value="<?php echo $data['lat_hasil'] ?>">,
							<span id="lng_<?php echo $data['id_tempat'] ?>" class="text"><?php echo $data['lng_hasil'] ?></span>
							<input type="text" name="lat" class="editbox" id="lng_input_<?php echo $data['id_tempat'];?>" value="<?php echo $data['lng_hasil'] ?>">
						</td>

						<td class="edit_td">
							<span id="kecamatan_<?php echo $data['id_tempat']; ?>" class="text"><?php echo $data['kecamatan'] ?></span> -
							<select class="editbox" id="kecamatan_input_<?php echo $data['id_tempat'];?>" onchange="pilih_kelurahan()">
								<?php
									$kecamatan = mysqli_query($config,"SELECT * FROM tb_kecamatan");
									while($dtkecamatan=mysqli_fetch_array($kecamatan)){
								?>
								<option value="<?php echo $dtkecamatan['kecamatan']; ?>"><?php echo $dtkecamatan['digit_awal'] ?> - <?php echo $dtkecamatan['kecamatan']; ?></option>
								<?php
									}
								?>
							</select>
							<span id="kelurahan_<?php echo $data['id_tempat']; ?>" class="text"><?php echo $data['kelurahan'] ?></span>
							<select class="editbox" id="kelurahan_input_<?php echo $data['id_tempat'];?>">

							</select>
						</td>

						<td class="edit_td">
							<span id="first_<?php echo $data['id_tempat']; ?>" class="text"><?php echo $data['alasan']; ?></span>
							<a href="../aksi/admin/update_asset.php?id=<?php echo $data['id_tempat'] ?>" class="fas fa-minus-circle" style="color:#dc3545;text-decoration: none;"></a>
							<textarea class="editbox" id="first_input_<?php echo $data['id_tempat'];?>"><?php echo $data['alasan'] ?></textarea>
						</td>

					</tr>
					<?php
							}
						}else{
					?>
					<tr id="kosong1">
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<?php
					}
					?>

				</tbody>
			</table>

			<p>2. Titik lokasi penempatan menara telekomunikasi yang menggunakan <b><u>persil warga : </u></b></p>
			<?php
				if($nums > 0){
			 ?>
			<select id="id_tempat" onchange="isi_otomatis2()" name="id_tempat">
								<option value='' selected>- Pilih -</option>
								<?php
								$pegawai = mysqli_query($config,"SELECT * FROM tb_tempat_menara WHERE aset_lokasi='' AND id_form='$id' AND status_tempat='proses_survey'");
								while ($row = mysqli_fetch_array($pegawai)) {
								echo "<option value='$row[id_tempat]'>$row[id_tempat]</option>";
							}?>
							</select>
			<?php
				}
			?>
			<table class="table">
				<thead>
					<tr>
						<td>No.</td>
						<td>Nama Site</td>
						<td>Koordinat Pengajuan</td>
						<td>Koordinat Hasil Survey</td>
						<td>Kec-Kelurahan</td>
						<td>Keterangan</td>
					</tr>
				</thead>
				<tbody>
					<?php
					$no=1;
					$query2 = mysqli_query($config,"SELECT * FROM tb_tempat_menara WHERE aset_lokasi='persil warga' AND id_form='$id'");
					$number2 = mysqli_num_rows($query2);
						if($number2 > 0){
							while($data = mysqli_fetch_array($query2)){
					?>
					<tr id="<?php echo $data['id_tempat'] ?>" class="edit_tr">
						<td><?php echo $no++ ?></td>
						<td><?php echo $data['site_id']?></td>
						<td><?php echo $data['lat'] ?>, <?php echo $data['lng']?></td>

						<td class="edit_td">
							<span id="lat_<?php echo $data['id_tempat']; ?>" class="text"><?php echo $data['lat_hasil'] ?></span><input type="text" name="lat" class="editbox" id="lat_input_<?php echo $data['id_tempat'];?>" value="<?php echo $data['lat_hasil'] ?>">, <span id="lng_<?php echo $data['id_tempat'] ?>" class="text"><?php echo $data['lng_hasil'] ?></span><input type="text" name="lat" class="editbox" id="lng_input_<?php echo $data['id_tempat'];?>" value="<?php echo $data['lng_hasil'] ?>">
						</td>

						</td>

							<td class="edit_td">
							<span id="kecamatan_<?php echo $data['id_tempat']; ?>" class="text"><?php echo $data['kecamatan'] ?></span> -
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
							<span id="kelurahan_<?php echo $data['id_tempat']; ?>" class="text"><?php echo $data['kelurahan'] ?></span>
							<select class="editbox" id="kelurahan_input_<?php echo $data['id_tempat'];?>"></select>
						</td>

						<td class="edit_td">
							<span id="first_<?php echo $data['id_tempat']; ?>" class="text"><?php echo $data['alasan']; ?></span> <a href="../aksi/admin/update_asset.php?id=<?php echo $data['id_tempat'] ?>" class="fas fa-minus-circle" style="color:#dc3545;text-decoration: none;"></a>
							<textarea class="editbox" id="first_input_<?php echo $data['id_tempat'];?>"><?php echo $data['alasan'] ?></textarea>
						</td>

					</tr>
					<?php
					 		}
					 	}else{
					?>
					<tr id="kosong2">
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>

					<?php
						}
					?>
				</tbody>
			</table>

			<p>3. Titik lokasi penempatan menara yang <b><u>tidak dapat </u></b> dilanjutkan untuk proses permohonan rekomendasi : </p>
			<?php
					if($nums > 0){
			 ?>
			<select id="id_tempat1" onchange="isi_otomatis3()" name="id_tempat1">
							<option value='' selected>- Pilih -</option>
								<?php
								$pegawai = mysqli_query($config,"SELECT * FROM tb_tempat_menara WHERE aset_lokasi='' AND id_form='$id' AND status_tempat='proses_survey'");
								while ($row = mysqli_fetch_array($pegawai)) {
								echo "<option value='$row[id_tempat]'>$row[id_tempat]</option>";
							}?>
			</select>
			<?php
					}
			 ?>
			<table class="table">
				<thead>
					<tr>
						<td>No.</td>
						<td>Nama Site</td>
						<td>Koordinat Pengajuan</td>
						<td>Keterangan</td>
					</tr>
				</thead>
				<tbody>
					<?php
					$no=1;
					$query3 = mysqli_query($config,"SELECT * FROM tb_tempat_menara WHERE status_tempat='revisi' AND id_form='$id'");
					$number3 = mysqli_num_rows($query3);
						if($number3 > 0){
							while($data = mysqli_fetch_array($query3)){
					?>
					<tr id="<?php echo $data['id_tempat'] ?>" class="edit_tr">
						<td><?php echo $no++ ?></td>
						<td><?php echo $data['site_id']?></td>
						<td><?php echo $data['lat'] ?>, <?php echo $data['lng']?></td>
						<td class="edit_td">
							<span id="first_<?php echo $data['id_tempat']; ?>" class="text"><?php echo $data['alasan']; ?></span> <a href="../aksi/admin/update_asset.php?id=<?php echo $data['id_tempat'] ?>" class="fas fa-minus-circle" style="color:#dc3545;text-decoration: none;"></a>
							<textarea class="editbox" id="first_input_<?php echo $data['id_tempat'];?>"><?php echo $data['alasan'] ?></textarea>
						</td>
					</tr>
					<?php
							}
						}else{
					?>
					<tr id="kosong3">
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<?php
						}
					?>
					</tbody>
			</table>
			<a href="cetak.php?id=<?php echo $id ?>" class="btn btn-primary" target='_blank'><i class="fas fa-print"></i></a>
			<p>4. Berita Acara Peninjauan Titik Lokasi Penempatan Menara Telekomunikasi ini berfungsi sebagai laporan hasil peninjauan lapangan atas pengajuan dari pemohon rekomendasi menara telekomunikasi dan <b><u>bukan</u></b> merupakan rekomendasi atau ijin pendirian menara telekomunikasi.</p>
			<p>5. Rekomendasi Menara Telekomunikasi akan diterbitkan apabila dokumen persyaratan sudah dinyatakan benar dan lengkap.</p></br>
			<p>Demikian Berita Acara ini dibuat sebagai bahan untuk kelengkapan administrasi permohonan rekomendasi titik lokasi penempatan menara telekomunikasi dan agar dapat dipergunakan sebagaimana mestinya.</p>

		</div>
		<div id="kiri">
			<center>
				<p>Mengetahui</p>
			<?php
			$query4 = mysqli_query($config,"SELECT * FROM tb_pegawai WHERE posisi='KA'");
			$data2 = mysqli_fetch_array($query4);
			 ?>
				<p><?php echo $data2['jabatan']?></p>
				<br><br><br><br>
				<p><u><?php echo $data2['nama'] ?></u></p>
				<p><?php echo $data2['nip'] ?></p>
			</center>
		</div>
		<div id="kanan">
			<center>
				<p>Yogyakarta, <input type="date" name="tgl_berita" id="tgl_berita" onchange="updatetglberita()" value="<?php echo $data_berita['tgl_berita'] ?>"></p><br>
				<p>Tim Pengawasan dan Pengendalian Penyelenggaraan</p>
				<p> Komunikasi dan Informatika Kota Yogyakarta Tahun 2019</p><br>
			</center>
			<ol>
			<?php
			$query7 = mysqli_query($config,"SELECT * FROM tb_pegawai WHERE posisi='pengawas'");
			while($data=mysqli_fetch_array($query7)){
		echo '<li><p>'.$data['nama'].'</p>
					 <p>'.$data['nip'].'</p>
					 <p>'.$data['jabatan'].'</p>
				</li>';
		}
		?>
			</ol>
		</div>

	</div>

	</div>

<?php
if($ttl > 1){
  if($id >= $id2){
?>
    <a href="../aksi/admin/proses_rekom.php?id=<?php echo $id ?>" class="btn btn-primary" target='_blank'><i class="fas fa-print"></i></a>
    <a href="../aksi/admin/prev2.php?id=<?php echo $id ?>&form=<?php echo $iform ?>" class="btn btn-prev"><i class="fas fa-chevron-left"></i></a>

<?php
  }elseif($id <= $id3){
?>
    <a href="../aksi/admin/proses_rekom.php?id=<?php echo $id ?>" class="btn btn-primary" target='_blank'><i class="fas fa-print"></i></a>
 	  <a href="../aksi/admin/next2.php?id=<?php echo $id ?>&form=<?php echo $iform ?>" class="btn btn-next"><i class="fas fa-chevron-right"></i></a>
<?php
  }else{
?>
    <a href="../aksi/admin/proses_rekom.php?id=<?php echo $id ?>" class="btn btn-primary" target='_blank'><i class="fas fa-print"></i></a>
 	  <a href="../aksi/admin/next2.php?id=<?php echo $id ?>&form=<?php echo $iform ?>" class="btn btn-next"><i class="fas fa-chevron-right"></i></a>
 	  <a href="../aksi/admin/prev2.php?id=<?php echo $id ?>&form=<?php echo $iform ?>" class="btn btn-prev"><i class="fas fa-chevron-left"></i></a>
<?php
  }
}elseif($ttl==1){
?>
    <a href="../aksi/admin/proses_rekom.php?id=<?php echo $id ?>" class="btn btn-primary" target='_blank'><i class="fas fa-print"></i></a>
<?php
}
?>
    <a href="pengajuan_menara.php#step-3" class="btn btn-back"><i class="fas fa-long-arrow-alt-left"></i> Back</a>
</div>


</body>
<script type="text/javascript" src="view/js/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">


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

function isi_otomatis(){
  var kode_brg = $("#nip").val();
  //document.write(kode_brg);
    $.ajax({
    url: '../aksi/admin/update.php',
    data:"kode_brg="+kode_brg ,
    })
    .success(function (data) {
    	window.location.reload(true);
    });
}

function isi_otomatis2(){
  var kode_brg = $("#id_tempat").val();
  //document.write(kode_brg);
    $.ajax({
    url: '../aksi/admin/persil_warga.php',
    data:"kode_brg="+kode_brg ,
    })
    .success(function (data) {
   	window.location.reload(true);
    });
}
function isi_otomatis3(){
  var kode_brg = $("#id_tempat1").val();
  //document.write(kode_brg);
    $.ajax({
    url: '../aksi/admin/revisi.php',
    data:"kode_brg="+kode_brg ,
    })
    .success(function (data) {
    	window.location.reload(true);
    });
}

function updatetglberita(){
	var kode_brg = $("#tgl_berita").val();
			var id_form = $("#form").val();
			var kolom = "tgl_berita";
  			//document.write(kode_brg);
    		$.ajax({
    			url: '../aksi/admin/update_berita.php',
    			data:'kode_brg='+kode_brg+'&id_form='+id_form+'&kolom='+kolom
    		})
    		.success(function (data) {
    			$("#tgl_berita").html(kode_brg);
   			});

}
function updatethn(){
	var kode_brg = $("#tahun").val();
			var id_form = $("#form").val();
			var kolom = "tahun";
  			//document.write(kode_brg);
    		$.ajax({
    			url: '../aksi/admin/update_berita.php',
    			data:'kode_brg='+kode_brg+'&id_form='+id_form+'&kolom='+kolom
    		})
    		.success(function (data) {
    			$("#tahun").html(kode_brg);
   			});

}
function updatetgl(){
	var kode_brg = $("#tgl").val();
			var id_form = $("#form").val();
			var kolom = "tgl_survey";
  			//document.write(kode_brg);
    		$.ajax({
    			url: '../aksi/admin/update_berita.php',
    			data:'kode_brg='+kode_brg+'&id_form='+id_form+'&kolom='+kolom
    		})
    		.success(function (data) {
    			$("#tgl").html(kode_brg);
   			});

}
</script>
</html>
