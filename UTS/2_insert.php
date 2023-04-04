<?php
//Faiz Nur Budi
//21081010113 
include "conn.php";

$status = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['bus'])) {
    $plat = $_POST['plat'];
    $status = $_POST['status'];

    $query = "INSERT INTO bus (id_bus,plat,status) VALUES('','$plat','$status')";

    $result = mysqli_query(connection(), $query);
    if ($result) {
      $status = 'insb-ok';
    } else {
      $status = 'insb-err';
    }
    header('Location: index.php?status=' . $status);
  }
  if (isset($_POST['driver'])) {
    $nama = $_POST['nama'];
    $no_sim = $_POST['no_sim'];
    $alamat = $_POST['alamat'];
    $query = "INSERT INTO driver (id_driver,nama,no_sim,alamat) VALUES('','$nama','$no_sim','$alamat')";

    $result = mysqli_query(connection(), $query);
    if ($result) {
      $status = 'insd-ok';
    } else {
      $status = 'insd-err';
    }
    header('Location: index.php?status=' . $status . '#driver');
  }
  if (isset($_POST['kondektur'])) {
    $nama = $_POST['nama'];

    $query = "INSERT INTO kondektur (id_kondektur,nama) VALUES('','$nama')";

    $result = mysqli_query(connection(), $query);
    if ($result) {
      $status = 'insk-ok';
    } else {
      $status = 'insk-err';
    }
    header('Location: index.php?status=' . $status . '#kondektur');
  }
  if (isset($_POST['trans_upn'])) {
    $id_kondektur = $_POST['id_kondektur'];
    $id_bus = $_POST['id_bus'];
    $id_driver = $_POST['id_driver'];
    $jumlh_km = $_POST['jumlh_km'];
    $tgl = $_POST['tgl'];
    $query = "INSERT INTO trans_upn (id_trans_upn,id_kondektur,id_bus,id_driver,jumlah_km,tanggal) VALUES('','$id_kondektur','$id_bus','$id_driver','$jumlh_km','$tgl')";

    $result = mysqli_query(connection(), $query);
    if ($result) {
      $status = 'inst-ok';
    } else {
      $status = 'inst-err';
    }
    header('Location: index.php?status=' . $status . '#trans_upn');
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Data</title>
    <link rel="stylesheet" href="uts.css">
</head>

<body>

    <?php if (isset($_GET['bus'])) { ?>
    <form action="2_insert.php" method="POST">
    <a href="index.php" class="back">kembali</a>
        <h2>Insert Data Bus</h2>
        <div class="form-group">
            <label>Plat :</label>
            <input type="text" name="plat" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Status :</label>
            <input type="number" name="status" required="required" autocomplete="off">
        </div>
        <button type="submit" name="bus">Simpan</button>
    </form>
    <?php } ?>

    <?php if (isset($_GET['driver'])) { ?>
    <form action="2_insert.php" method="POST">
    <a href="index.php" class="back">kembali</a>
        <h2>Insert Data Driver</h2>
        <div class="form-group">
            <label>Nama :</label>
            <input type="text" name="nama" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <label>No Sim :</label>
            <input type="text" name="no_sim" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Alamat :</label>
            <input type="text" name="alamat" required="required" autocomplete="off">
        </div>
        <button type="submit" name="driver">Simpan</button>
    </form>
    <?php } ?>

    <?php if (isset($_GET['kondektur'])) { ?>
    <form action="2_insert.php" method="POST">
    <a href="index.php" class="back">kembali</a>
        <h2>Insert Data Kondektur</h2>
        <div class="form-group">
            <label>Nama :</label>
            <input type="text" name="nama" required="required" autocomplete="off">
        </div>
        <button type="submit" name="kondektur">Simpan</button>
    </form>
    <?php } ?>

    <?php if (isset($_GET['trans'])) { ?>
    <form action="2_insert.php" method="POST">
    <a href="index.php" class="back">kembali</a>
        <h2>Insert Data Trans UPN</h2>
        <div class="form-group">
            <label>ID kondektur :</label>
            <select name="id_kondektur">
                <option value=''>Select</option>
                <?php
                $query = "SELECT id_kondektur FROM kondektur";
                $result = mysqli_query(connection(), $query);
                ?>
                <?php while ($data = mysqli_fetch_assoc($result)): ?>
                <?php echo "<option value=" . "'" . $data['id_kondektur'] . "'" . ">" . $data['id_kondektur'] . "</option>"; ?>
                <?php endwhile ?>
            </select>
        </div>
        <div class="form-group">
            <label>ID Bus :</label>
            <select name="id_bus">
                <option value=''>Select</option>
                <?php
                $query = "SELECT id_bus FROM bus";
                $result = mysqli_query(connection(), $query);
                ?>
                <?php while ($data = mysqli_fetch_assoc($result)): ?>
                <?php echo "<option value=" . "'" . $data['id_bus'] . "'" . ">" . $data['id_bus'] . "</option>"; ?>
                <?php endwhile ?>
            </select>
        </div>
        <div class="form-group">
            <label>ID Driver :</label>
            <select name="id_driver">
                <option value=''>Select</option>
                <?php
                $query = "SELECT id_driver FROM driver";
                $result = mysqli_query(connection(), $query);
                ?>
                <?php while ($data = mysqli_fetch_assoc($result)): ?>
                <?php echo "<option value=" . "'" . $data['id_driver'] . "'" . ">" . $data['id_driver'] . "</option>"; ?>
                <?php endwhile ?>
            </select>
        </div>
        <div class="form-group">
            <label>Jumlah KM :</label>
            <input type="number" name="jumlh_km" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Tanggal :</label>
            <input type="date" name="tgl" required="required">
        </div>
        <button type="submit" name="trans_upn">Simpan</button>
    </form>
    <?php } ?>
</body>

</html>