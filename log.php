<?php
error_reporting(0);
include "koneksi.php";
$query=mysqli_query($koneksi, "select * from log");
	?>
	<table border="1">
	<tr>
	<th>Nomor</th><th>Nama</th>
	<th>Waktu Akses</th>
	</tr>
	<?php
	while($row=mysqli_fetch_array($query)){
	?>
		<tr>
		<td><?php echo $c=$c+1;?></td>
		<td><?php echo $row['username'];?></td>
		<td><?php echo $row['time'];?></td>
	<?php
	}
?>
