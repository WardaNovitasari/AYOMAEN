<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table width="500" border="1" cellspacing="0" cellpadding="3">
<?php
	include "koneksi.php";
	$sql = "SELECT * FROM `tb_tempat`";
	$result=mysql_query($sql); 
	$result2=mysql_query($sql);
	$rows=mysql_fetch_array($result); 
	$rows2=mysql_fetch_array($result2);
	$nomor=1;
	$count = mysql_num_rows($result);
	$count2 = mysql_num_rows($result2);
	$id1=$rows['id'];
	for ($i=0; $i < $count; $i++) {
		$bersinggungan=0;
		$id2=$rows2['id'];
		$perulangan1=mysql_query("SELECT * FROM `tb_tempat` where id='$id1'");
		$rowsPer1=mysql_fetch_array($perulangan1);
		$lokasi1_lat=$rowsPer1['lat'];
		$lokasi1_long=$rowsPer1['lng'];
		for ($j=0; $j < $count2; $j++) { 
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
			<td width="40%"><a href="openmap.php?id=<?php echo $rowsPer1['id']; ?>">Open Maps</a></td>
		</tr>

<?php
	$id1++;
// close while loop
	}
?>
</table> 
</body>
</html>