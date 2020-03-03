<!DOCTYPE html>
<html lang="en">
<head>
	
  	<title>OpenStreetMap &amp; OpenLayers - Marker Example</title>
	<link rel="stylesheet" href="leaflet/leaflet.css">
   <!-- Make sure you put this AFTER Leaflet's CSS -->
 	<script src="leaflet/leaflet.js"></script>
  	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  	<?php
  		include "koneksi.php";
  		$id = $_GET['id'];
  		$sql = "SELECT * FROM `tb_tempat` where id='$id'";
  		$result=mysql_query($sql);
  		$rows=mysql_fetch_array($result);
  		$sql2 = "SELECT * FROM `tb_tempat`";
  		$result2=mysql_query($sql2);
  		$rows2=mysql_fetch_array($result2);
		$nomor=1;
		$count = mysql_num_rows($result2);
		$id1=$rows2['id'];
  	?>
  	<style>
		#mapid{
		width: 600px;
		height: 400px;
		}
	</style>
</head>
<body>
	<h1><?php echo $rows['nama_tempat']; ?></h1>
	<div id="mapid"></div>
	<script>
		var map = L.map('mapid').setView([<?php echo $rows['lat']; ?>, <?php echo $rows['lng']; ?>], 13);
		L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
			attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
			maxZoom: 18,
			id: 'mapbox.streets',
			accessToken: 'pk.eyJ1IjoicnJhYWlzcyIsImEiOiJjanpqcTJiNnUwYmpmM2xxbTRvcDh4MHp6In0.dU85N2s7PoKfLpUSARQUYQ'
		}).addTo(map);
		var marker = L.marker([<?php echo $rows['lat']; ?>, <?php echo $rows['lng']; ?>]).addTo(map);
		marker.bindPopup("<?php echo $rows['nama_tempat']; ?>").openPopup();
		var circle = L.circle([<?php echo $rows['lat']; ?>, <?php echo $rows['lng']; ?>], {
		color: 'red',
		fillColor: '#f03',
		fillOpacity: 0.5,
		radius: 5000
		}).addTo(map);
	</script>
		<table width="500" border="1" cellspacing="0" cellpadding="3">
<?php
	
	for ($i=0; $i < $count; $i++) {
		$bersinggungan=0;
		$id2=$rows2['id'];
		$perulangan1=mysql_query("SELECT * FROM `tb_tempat` where id='$id1'");
		$rowsPer1=mysql_fetch_array($perulangan1);
		$lokasi1_lat=$rowsPer1['lat'];
		$lokasi1_long=$rowsPer1['lng'];
		for ($j=0; $j < $count; $j++) { 
			$perulangan2=mysql_query("SELECT * FROM `tb_tempat` where id='$id2'");
			$rowsPer2=mysql_fetch_array($perulangan2);
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
		}
?>
		<tr>
			<td><?php echo $nomor++; ?></td>
			<td width="30%"><?php echo $rowsPer1['nama_tempat']; ?></td>
			<td width="30%"><?php echo $rowsPer1['lat']; ?></td>
			<td width="30%"><?php echo $rowsPer1['lng']; ?></td>
			<td width="30%">
				<?php if ($bersinggungan==0)  { ?> <p>Tidak Bersinggungan</p> <?php }  else  { ?> <b style='color: red;'>Bersinggungan</b> <?php } ?>
			</td>
		</tr>
		<script>
			var marker = L.marker([<?php echo $rowsPer1['lat']; ?>, <?php echo $rowsPer1['lng']; ?>]).addTo(map);
			var circle = L.circle([<?php echo $rowsPer1['lat']; ?>, <?php echo $rowsPer1['lng']; ?>], {
				color: 'red',
				fillColor: '#f03',
				fillOpacity: 0.5,
				radius: 5000
				}).addTo(map);
			marker.bindPopup("<b><?php echo $rowsPer1['nama_tempat']; ?></b><p>Jarak <?php echo $jarak; ?> KM</p> <?php if ($jarak > 5)  { ?> <p>Diatas 5KM</p> <?php }  else  { ?> <b style='color: red;'>Dibawah 5KM</b> <?php } ?>");
		</script>
<?php
	$id1++;
// close while loop
	}
?>
</table> 
</body>
</html>