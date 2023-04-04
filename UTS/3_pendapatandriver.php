<?php 
//Faiz Nur Budi
//21081010113 
 ?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="uts.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pendapatan Kondektur</title>
</head>
<body>
	<form method="post">
	<a href="index.php" class="back">kembali</a>
    <h2>Pendapatan Driver</h2>
        <div class="form-group">
        <label>Bulan:</label>
		<select name="bulan">
			<option value="1">Januari</option>
			<option value="2">Februari</option>
			<option value="3">Maret</option>
			<option value="4">April</option>
			<option value="5">Mei</option>
			<option value="6">Juni</option>
			<option value="7">Juli</option>
			<option value="8">Agustus</option>
			<option value="9">September</option>
			<option value="10">Oktober</option>
			<option value="11">November</option>
			<option value="12">Desember</option>
		</select>
        </div>
        <div class="form-group">
		<label>Tahun:</label>
		<input type="text" name="tahun">
        </div>
		<input type="submit" value="Cari">
	</form>

	<?php
    include "conn.php";
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$bulan = $_POST['bulan'];
		$tahun = $_POST['tahun'];

		$query = "SELECT d.nama AS nama_driver, SUM(t.jumlah_km) AS total_km
		          FROM trans_upn t
		          JOIN driver d ON t.id_driver = d.id_driver
		          WHERE MONTH(t.tanggal) = $bulan
		          AND YEAR(t.tanggal) = $tahun
		          GROUP BY t.id_driver";
		$result = mysqli_query(connection(), $query);
	?>
    <div class="data">
    <table>
    <?php while (@$data = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $data['nama_driver'];  ?></td>
            <td><?php echo "Total KM: " . $data['total_km'] . " km";  ?></td>
            <?php $pendapatan = $data['total_km'] * 3000; ?>
            <td><?php echo "Pendapatan: Rp. " . number_format($pendapatan, 0, ',', '.');  ?></td>
        </tr>
	<?php	}?>
    </table>
    </div>
    <?php } ?>
</body>
</html>
