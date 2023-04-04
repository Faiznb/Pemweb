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
    <h2>Pendapatan Kondektur</h2>
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

		$query = "SELECT k.nama AS nama_kondektur, SUM(t.jumlah_km) AS total_km
		          FROM trans_upn t
		          JOIN kondektur k ON t.id_kondektur = k.id_kondektur
		          WHERE MONTH(t.tanggal) = $bulan
		          AND YEAR(t.tanggal) = $tahun
		          GROUP BY t.id_kondektur";
		$result = mysqli_query(connection(), $query);
	?>
    <div class="data">
    <table>
    <?php while (@$row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['nama_kondektur'];  ?></td>
            <td><?php echo "Total KM: " . $row['total_km'] . " km";  ?></td>
            <?php $pendapatan = $row['total_km'] * 1500; ?>
            <td><?php echo "Pendapatan: Rp. " . number_format($pendapatan, 0, ',', '.');  ?></td>
        </tr>
	<?php	}?>
    </table>
    </div>
    <?php } ?>
</body>
</html>
