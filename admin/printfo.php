<?php
$id=$_GET['id'];
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../koneksi/koneksi.php';
$query=mysqli_query($config,"SELECT * FROM tb_tempat_fiber WHERE id_tempat='$id'");


/*while($data=mysqli_fetch_array($query)){
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Form Menara</title>
	<?php include 'view/head.php'; ?>
</head>
<body>
	<h3 id='judul'>Form Menara</h3>
	<p>a. SiteID : <?php echo $data['nama_tempat'];?></p>
	<p>b. Titik Koordinat : <?php echo $data['lat'] ?> Latitude; Longitude <?php echo $data['lng']; ?></p>
	<p>c. Alamat : kecamatan : <?php echo $data['kecamatan'] ?>; kelurahan <?php echo $data['kelurahan'] ?></p>
	<p>d. Jl. Kenari, semak, Yogyakarta</p>
	<button class="btn btn-primary">Cetak</button>	
</body>
</html>
	

<?php
	}*/
?>
<html>
<head>
	<title>Admin - Cleon</title>
</head>
<body>
 
	<center>
		PEMERINTAH KOTA YOGYAKARTA<br>
		<b>DINAS KOMUNIKASI INFORMATIKA DAN PERSANDIAN</b><br>
		Jl. Kenari No. 56 Yogyakarta Kode Pos 55165 Telp. (0274)551230. 615865, 562682 Fax. (0274) 520332<br>
		EMAIL : kominfosandi@jogjakota.go.id<br>
		HOTLINE SMS : 081 2278 0001, HOTLINE EMAIL : upik@jogjakota.go.id<br>
		WEBSITE : www.jogjakota.go.id<br>
		<hr /><br>
		<u><b>REKOMENDASI TITIK LOKASI MENARA TELEKOMUNIKASI</b></u><br>
		Nomor : 555 / 204
	</center>
 
	<br/>
	<?php
 	while($data=mysqli_fetch_array($query)){
 		$date = $data['tgl_disetujui'];
 		$tgl = date('d F Y', strtotime($date));
 	?>
	Menindaklanjuti Permohonan Rekomendasi Titik Lokasi Menara Telekomunikasi Nomor 087/BFI/XI/2018 dari PT. Borobudur Fiber Indonesia tertanggal <?php echo $tgl ?>, serta berdasarkan :
	<ol>
		<li>Peraturan Daerah Kota Yogyakarta Nomor 7 Tahun 2017 tentang Penataan dan Pengendalian Menara Telekomunikasi dan Fiber Optik.</li>
		<li>Peraturan Walikota Yogyakarta Nomor 66 Tahun 2018 tentang Petunjuk Pelaksanaan Peraturan Daerah Kota Yogyakarta Nomor 7 Tahun 2017 tentang Penataan dan Pengendalian Menara Telekomunikasi dan Fiber Optik.</li>
		<li>Keputusan Walikota Yogyakarta Nomor 384 Tahun 2017 tentang Penetapan Lokasi Pendirian MenaraMicrocell.</li>
		<li>Berita Acara Peninjauan Titik Lokasi Penempatan Menara Telekomunikasi Nomor 490/2289 Tanggal 21 Desember 2018.</li>
	</ol>
	<br>
	Dinas Komunikasi Informatika dan Persandian Kota Yogyakarta memberikan rekomendasi titik lokasi menara telekomunikasi kepada PT. Borobudur Fiber Indonesia yang beralamatkan Gd. Menara Satrio Lt. 6 Unit 1, Jl.Prof. Dr. Satrio Kav. C4, Kuningan Timur, Setiabudi, Jakarta Selatan untuk pembangunan menara telekomunikasi bersama dengan data berikut :
	<table border="0">
 	
	<tr><td>a. SiteID</td><td>:</td><td><?php echo $data['site_id'];?></td></tr>
	<tr><td>b. Titik Koordinat</td><td>:</td><td> Latitude <?php echo $data['lat'] ?> ; Longitude <?php echo $data['lng']; ?></td></tr>
	<tr><td>c. Alamat</td><td>:</td><td>Kecamatan<?php echo $data['kecamatan'] ?> ; Kelurahan <?php echo $data['kelurahan'] ?> Jl. Kenari, semak, Yogyakarta</td></tr>
	<?php
}
	?>
 	</table>
	<p>
		Dengan ketentuan sebagai berikut :
		<ol><li>Rekomendasi Titik Lokasi Menara Telekomunikasi adalah keterangan bahwa koordinat tersebut diatas dapat ditempatkan menara telekomunikasi dan <b><u>bukan</u></b> merupakan izin pendirian menara telekomunikasi;</li>
		<li>Rekomendasi ini berlaku 30 hari kerja sejak diterbitkan;</li>
		<li>Penyedia menara wajib melaporkan penggunaan menaranya 1 (satu) kali dalam setahun meliputi nama dan jumlah pengguna menara, kapasitas yang tersisa, masa kontrak pengguna menara, rencana penempatan antena dan daftar calon pengguna menara kepada Dinas Komunikasi Informatika dan Persandian Kota Yogyakarta;</li></ol>
		Demikian untuk menjadi periksa.
	</p>
 	<br>
 	Yogyakarta,
 	KEPALA
 	SEKRETARIS
 	<br>
 	<br><br>
 	<br><br>
 	<u>IGNATUS TRIHASTONO, S.Sos, MM</u>
 	<br>
 	NIP. 19690723 199603 1 005<br>
 	Tembusan :
 	<ol><li>Dinas Pekerja Umum Perusahaan dan Kawasan Pemukiman Kota Yogyakarta;</li>
 	<li>Dinas Penanaman Modal dan Perizinan Kota Yogyakarta;</li>
 	<li>Kantor Satuan Polisi Pamong Praja Kota Yogyakarta.</li></ol>
	<script>
		window.print();
	</script>
	
</body>
</html>