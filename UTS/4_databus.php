<?php
//Faiz Nur Budi
//21081010113 
include "conn.php";

$query = "SELECT b.id_bus, b.plat, b.status, SUM(t.jumlah_km) AS total_km
        FROM bus b JOIN trans_upn t ON b.id_bus = t.id_bus";

if (isset($_GET['status'])) {
  $status = $_GET['status'];
  if($status !== '') {
  $query .= " WHERE b.status = '$status'";}
}

$query .= " GROUP BY b.id_bus, b.plat, b.status
          ORDER BY b.id_bus ASC";
$result = mysqli_query(connection(), $query);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="uts.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Data Bus</title>
</head>
<body>
	<form method="get">
    <a href="index.php" class="back">kembali</a>
    <h1>Data Bus</h1>
		<label for="status">Filter berdasarkan status:</label>
		<select id="status" name="status">
			<option value="">Semua</option>
			<option value="1">Aktif</option>
			<option value="2">Cadangan</option>
			<option value="0">Rusak</option>
		</select>
		<button type="submit">Filter</button>
	</form>
    <div class="data">
	<table border="1">
		<thead>
			<tr>
				<th>ID Bus</th>
				<th>Nomor Plat</th>
				<th>Status</th>
				<th>Jumlah KM Total</th>
			</tr>
		</thead>
		<tbody>
			<?php
			while ($data = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>".$data['id_bus']."</td>";
				echo "<td>".$data['plat']."</td>";
				if ($data['status'] == 1) {
					echo "<td style=\"background-color:green\">Aktif</td>";
				} elseif ($data['status'] == 2) {
					echo "<td style=\"background-color:yellow\">Cadangan</td>";
				} elseif ($data['status'] == 0) {
					echo "<td style=\"background-color:red\">Rusak</td>";
				} else {
					echo "Tidak diketahui";
				}
				echo "<td>".$data['total_km']."</td>";
				echo "</tr>";
			}
			?>
		</tbody>
	</table>
    </div>
</body>
</html>

<?php
?>
