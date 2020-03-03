    <?php
    session_start();
 		 if(empty($_SESSION['username'])){
    		header("location:../login.php");
  		}elseif($_SESSION['status']!='admin'){
    		header("location:../404.html");
  		}
	require_once 'dompdf/autoload.inc.php';
	require_once '../koneksi/koneksi.php';
	use Dompdf\Dompdf;
	

	$id = $_GET['id'];

	$query1 = mysqli_query($config,"SELECT * FROM tb_berita_acara WHERE id_form='$id'");
	$data1  = mysqli_fetch_array($query1);//menampilkan data tb_berita acara

	$query2 = mysqli_query($config,"SELECT * FROM tb_perusahaan JOIN tb_form_menara ON tb_perusahaan.id_perusahaan=tb_form_menara.id_perusahaan WHERE tb_form_menara.id_form='$id'");
	$data2 = mysqli_fetch_array($query2);//menampilkan data tb_tempat_menara

	$query3 = mysqli_query($config, "SELECT * FROM tb_tempat_menara WHERE id_form='$id'");
	$count_lokasi = mysqli_num_rows($query3);

	$query8 = mysqli_query($config,"SELECT * FROM tb_pegawai WHERE posisi='KA'");
	$data5 = mysqli_fetch_array($query8);

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

	$html = '<!DOCTYPE html>
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
			<div class="kopsurat">
				<img src="view/logo.png">
				<p style="font-size: 15px;">PEMERINTAH KOTA YOGYAKARTA</p>
				<b><h4>DINAS KOMUNIKASI INFORMATIKA DAN PERSANDIAN</h4></b>
				<p>Jl. Kenari No. 56 Yogyakarta Kode Pos 55165 Telp.(0274)551230, 515865, 562682 Fax. (0274)520332</p>
				<p>EMAIL : <u>kominfosandi@jogjakota.go.id:</u></p>
				<p>HOTLINE SMS: 081 2278 0001; HOTLINE EMAIL : <u>upik@jogjakota.go.id</u></p>
				<p>WEBSITE: www.jogjakota.go.id</p>
				<hr style="border-width: 3px;">
				<hr>
			</div>

			<div class="bodysurat">
				<div class="justify">
					<h4>BERITA ACARA PENINJAUAN</h4>
					<h4><u>TITIK LOKASI PENEMPATAN MENARA TELEKOMUNIKASI</u></h4>
					<center><p>Nomor 490 / '.$data2["id_form"].'</p><br><br></center>
					<p>Yang bertanda-tangan dibawah ini bertindak selaku Tim Pengawasan dan Pengendalian Penyelenggaraan Komunikasi dan Informatika
					Kota Yogyakarta Tahun 2019.</p><br>
					<p>Berdasarkan Pada : </p>
					<ol>
						<li> <p>Surat dari PT. '.$data2["nm_perusahaan"].' Nomor '.$data2['no_surat'].' tanggal '.tgl_indo($data2["tgl_pengajuan"]).' tentang Permohonan Rekomendasi Dinas Komunikasi Informatika dan Persandian.</p></li>
						<li> <p>Laporan hasil peninjauan bersama (survey) titik lokasi penempatan menara telekomunikasi yang dilaksanakan oleh Tim Pengawasan dan Pengendalian Penyelanggaraan Komunikasi dan Informatika Kota Yogyakarta Tahun '.$data1['tahun'].' pada tanggal '.tgl_indo($data1['tgl_survey']).' sejumlah '.$count_lokasi.' titik lokasi.</p></li>
						<ol><br>
						<p>Dari hasil peninjauan bersama (survey), didapatkan hasil sebagai berikut : </p><br>
							<li>Titik lokasi penempatan menara telekomunikasi yang menggunakan <b><u>aset Pemkot Yogyakarta : </u></b></p>
							<table class="print">
								<thead>
									<tr>
										<td><p>No.</p></td>
										<td><p>Nama Site</p></td>
										<td><p>Koordinat Pengajuan</p></td>
										<td><p>Koordinat Hasil Survey</p></td>
										<td><p>Kec-Kelurahan</p></td>
										<td><p>Keterangan</p></td>
									</tr>
								</thead>
								<tbody>';
	$no=1;
	$query4 = mysqli_query($config,"SELECT * FROM tb_tempat_menara WHERE aset_lokasi='pemkot yogya' AND id_form='$id'");
	$number=mysqli_num_rows($query4);
	if($number > 0){
	while($data4=mysqli_fetch_array($query4)){
					$html .='	<tr>
									<td><p>'.$no++.'</p></td>
									<td><p>'.$data4["site_id"].'</p></td>
									<td><p>'.$data4['lat'].', '.$data4['lng'].'</p></td>
									<td><p>'.$data4['lat_hasil'].', '.$data4['lng_hasil'].'</p></td>
									<td><p>'.$data4['kecamatan'].' - '.$data4['kelurahan'].'</p></td>
									<td><p>'.$data4['alasan'].'</p></td>
								</tr>';
					}
				}else{
					$html .='	<tr>
									<td><p></p></td>
									<td><p></p></td>
									<td><p></p></td>
									<td><p></p></td>
									<td><p></p></td>
									<td><p></p></td>
								</tr>';
				}
					$html .='		</tbody>
							</table>
						</li>
						<li><p>Titik lokasi penempatan menara telekomunikasi yang menggunakan <b><u>persil warga : </u></b></p>
						<table class="print">
							<thead>
							<tr>
								<td><p>No.</p></td>
								<td><p>Nama Site</p></td>
								<td><p>Koordinat Pengajuan</p></td>
								<td><p>Koordinat Hasil Survey</p></td>
								<td><p>Kec-Kelurahan</p></td>
								<td><p>Keterangan</p></td>
							</tr>
							</thead>
						<tbody>
						';
	$no=1;
	$query5 = mysqli_query($config,"SELECT * FROM tb_tempat_menara WHERE aset_lokasi='persil warga' AND id_form='$id'");
	$number2 = mysqli_num_rows($query5);
		if($number2 > 0){
			while($data = mysqli_fetch_array($query5)){
				$html .='		<tr>
									<td><p>'.$no++.'</p></p></td>
									<td><p>'.$data["site_id"].'</p></td>
									<td><p>'.$data['lat'].', '.$data['lng'].'</p></td>
									<td><p>'.$data['lat_hasil'].', '.$data['lng_hasil'].'</p></td>
									<td><p>'.$data['kecamatan'].' - '.$data['kelurahan'].'</p></td>
									<td><p>'.$data['alasan'].'</p></td>
								</tr>';
			}
		}else{
					$html .='	<tr>
									<td><p></p></td>
									<td><p></p></td>
									<td><p></p></td>
									<td><p></p></td>
									<td><p></p></td>
									<td><p></p></td>
								</tr>';
		}
		$html .='		</tbody>
						</table>
					</li>
						<li><p>Titik lokasi penempatan menara yang <b><u>tidak dapat </u></b> dilanjutkan untuk proses permohonan rekomendasi : </p>
						<table class="print">
							<thead>
							<tr>
								<td><p>No.</p></td>
								<td><p>Nama Site</p></td>
								<td><p>Koordinat Pengajuan</p></td>
								<td><p>Keterangan</p></td>
							</tr>
							</thead>
							<tbody>';
	$no=1;
	$query6 = mysqli_query($config,"SELECT * FROM tb_tempat_menara WHERE status_tempat='revisi' AND id_form='$id'");
	$number3 = mysqli_num_rows($query6);
	if($number3 > 0){
		while($data = mysqli_fetch_array($query6)){

		$html .='	<tr>
						<td><p>'.$no++.'</p></td>
						<td><p>'.$data['site_id'].'</p></td>
						<td><p>'.$data['lat'].', '.$data['lng'].'</p></td>
						<td><p>'.$data['alasan'].'</p></td>
					</tr>';
		}
	}else{
		$html .='	<tr>
						<td><p></p></td>
						<td><p></p></td>
						<td><p></p></td>
						<td><p></p></td>
					</tr>';
		}
		$html .='	</tbody>
				</table>
			</li>
			<li><p>Berita Acara Peninjauan Titik Lokasi Penempatan Menara Telekomunikasi ini berfungsi sebagai laporan hasil peninjauan lapangan atas pengajuan dari pemohon rekomendasi menara telekomunikasi dan <b><u>bukan</u></b> merupakan rekomendasi atau ijin pendirian menara telekomunikasi.</p></li>
			<li><p>Rekomendasi Menara Telekomunikasi akan diterbitkan apabila dokumen persyaratan sudah dinyatakan benar dan lengkap.</p><br>
			</li>
			<p>Demikian Berita Acara ini dibuat sebagai bahan untuk kelengkapan administrasi permohonan rekomendasi titik lokasi penempatan menara telekomunikasi dan agar dapat dipergunakan sebagaimana mestinya.</p>
			</ol>
		</ol>
		</div>
		</div>
		<div id="kiri">
			<center>
				<p>Mengetahui</p>
				<p>'.$data5['jabatan'].'</p>
				<br><br><br>
				<p><u>'.$data5['nama'].'</u></p>
				<p>NIP. '.$data5['nip'].'</p>
			</center>
		</div>
		<div id="kanan">
			<center>
				<p>Yogyakarta, '.tgl_indo($data1['tgl_berita']).'</p><br>
				<p>Tim Pengawasan dan Pengendalian Penyelenggaraan</p>
				<p> Komunikasi dan Informatika Kota Yogyakarta Tahun 2019</p><br>
			</center>
			<ol>';
			$query7 = mysqli_query($config,"SELECT * FROM tb_pegawai WHERE posisi='pengawas'");
			while($data=mysqli_fetch_array($query7)){
		$html .='<li><p>'.$data['nama'].'</p>
					 <p>'.$data['nip'].'</p>
					 <p>'.$data['jabatan'].'</p>
				</li>';
		}
		$html .='
			</ol>
		</div>
		</body>
	</html>';


	$dompdf = new Dompdf();
	
    $dompdf->loadHtml($html);
    // (Opsional) Mengatur ukuran kertas dan orientasi kertas
    $dompdf->setPaper('f4', 'potrait');
    // Menjadikan HTML sebagai PDF
    $dompdf->render();
    // Output akan menghasilkan PDF ke Browser
	$dompdf->stream('berita_acara.pdf',array("Attachment" => 0));
	exit(0);
    ?>