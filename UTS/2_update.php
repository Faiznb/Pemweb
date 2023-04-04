<?php
//Faiz Nur Budi
//21081010113 
include('conn.php');

$status = '';
$result = '';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  if (isset($_GET['id_bus'])) {
    $id_bus_upd = $_GET['id_bus'];
    $query = "SELECT * FROM bus WHERE id_bus = '$id_bus_upd'";

    $result = mysqli_query(connection(), $query);
  }
  if (isset($_GET['id_driver'])) {
    $id_driver_upd = $_GET['id_driver'];
    $query = "SELECT * FROM driver WHERE id_driver = '$id_driver_upd'";

    $result = mysqli_query(connection(), $query);
  }
  if (isset($_GET['id_kondektur'])) {
    $id_kondektur_upd = $_GET['id_kondektur'];
    $query = "SELECT * FROM kondektur WHERE id_kondektur = '$id_kondektur_upd'";

    $result = mysqli_query(connection(), $query);
  }

  if (isset($_GET['id_trans_upn'])) {
    $id_trans_upn_upd = $_GET['id_trans_upn'];
    $query = "SELECT * FROM trans_upn WHERE id_trans_upn = '$id_trans_upn_upd'";

    $result = mysqli_query(connection(), $query);
  }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['bus'])) {
        $id = $_POST['id'];
        $plat = $_POST['plat'];
        $status = $_POST['status'];
        
        $query = "UPDATE bus SET plat = '$plat', status = '$status' WHERE id_bus = '$id'";
    $result = mysqli_query(connection(), $query);
    if ($result) {
      $status = 'ok1';
    } else {
      $status = 'err1';
    }
    header('Location: index.php?status=' . $status);
    }
    if (isset($_POST['driver'])) {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $no_sim = $_POST['no_sim'];
        $alamat = $_POST['alamat'];
        
        $query = "UPDATE driver SET nama = '$nama', no_sim = '$no_sim', alamat= '$alamat' WHERE id_driver = '$id'";
    
    $result = mysqli_query(connection(), $query);
    if ($result) {
      $status = 'ok2';
    } else {
      $status = 'err2';
    }
    header('Location: index.php?status=' . $status . '#driver');
    }
    if (isset($_POST['kondektur'])) {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
    
        $query = "UPDATE kondektur SET nama = '$nama' WHERE id_driver = '$id'";
    
        $result = mysqli_query(connection(), $query);
        if ($result) {
          $status = 'ok3';
        } else {
          $status = 'ok3';
        }
        header('Location: index.php?status=' . $status . '#kondektur');
      }
    
    if (isset($_POST['trans_upn'])) {
        $id = $_POST['id'];
        $id_kondektur = $_POST['id_kondektur'];
        $id_bus = $_POST['id_bus'];
        $id_driver = $_POST['id_driver'];
        $jumlh_km = $_POST['jumlh_km'];
        $tgl = $_POST['tgl'];
        $query = "UPDATE trans_upn set id_kondektur = '$id_kondektur',id_bus = '$id_bus', id_driver= '$id_driver' ,jumlah_km = '$jumlh_km',tanggal = '$tgl' WHERE id_trans_upn = '$id'";
    
        $result = mysqli_query(connection(), $query);
        if ($result) {
          $status = 'ok4';
        } else {
          $status = 'ok4';
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
    <title>Update Data</title>
    <link rel="stylesheet" href="uts.css">
</head>

<body>
    <?php if (isset($_GET['id_bus'])) { ?>
    <form action="2_update.php" method="POST">
        <a href="index.php" class="back">kembali</a>
        <h2>Update Data Bus</h2>
        <?php while ($data = mysqli_fetch_assoc($result)) { ?>
        <div class="form-group">
            <label>ID :</label>
            <input type="number" value="<?php echo $data['id_bus']; ?>" name="id" required="required" readonly>
        </div>
        <div class="form-group">
            <label>Plat :</label>
            <input type="text" name="plat" value="<?php echo $data['plat']; ?>" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Status :</label>
            <input type="number" name="status" value="<?php echo $data['status']; ?>" required="required" autocomplete="off">
        </div>
        <?php } ?>
        <button type="submit" name="bus">Simpan</button>
    </form>
    <?php } ?>

    <?php if (isset($_GET['id_driver'])) { ?>
    <form action="2_update.php" method="POST">
        <a href="index.php" class="back">kembali</a>
        <h2>update Data Driver</h2>
        <?php while ($data = mysqli_fetch_assoc($result)) { ?>
        <div class="form-group">
            <label>ID driver :</label>
            <input type="number" name="id" value="<?php echo $data['id_driver']; ?>" required="required" readonly>
        </div>
        <div class="form-group">
            <label>Nama :</label>
            <input type="text" name="nama" value="<?php echo $data['nama']; ?>" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <label>No Sim :</label>
            <input type="text" name="no_sim" value="<?php echo $data['no_sim']; ?>" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Alamat :</label>
            <input type="text" name="alamat" value="<?php echo $data['alamat']; ?>" required="required" autocomplete="off">
        </div>
        <?php } ?>
        <button type="submit" name="driver">Simpan</button>
    </form>
    <?php } ?>

    <?php if (isset($_GET['id_kondektur'])) { ?>
    <form action="2_update.php" method="POST">
        <a href="index.php" class="back">kembali</a>
        <h2>Update Data Kondektur</h2>
        <?php while ($data = mysqli_fetch_assoc($result)) { ?>
        <div class="form-group">
            <label>ID Kondektur :</label>
            <input type="number" name="id" value="<?php echo $data['id_kondektur']; ?>" required="required" readonly>
        </div>
        <div class="form-group">
            <label>Nama :</label>
            <input type="text" name="nama" value="<?php echo $data['nama']; ?>" required="required" autocomplete="off">
        </div>
        <button type="submit" name="kondektur">Simpan</button>
        <?php } ?>
    </form>
    <?php } ?>

    <?php if (isset($_GET['id_trans_upn'])) { ?>
    <form action="2_update.php" method="POST">
        <a href="index.php" class="back">kembali</a>
        <h2>Update Data Trans UPN</h2>
        <?php while ($data = mysqli_fetch_assoc($result)) { ?>
        <div class="form-group">
            <label>ID Trans UPN :</label>
            <input type="text" name="id" value="<?php echo $data['id_trans_upn']; ?>" required="required" readonly>
        </div>
        <div class="form-group">
            <label>ID kondektur :</label>
            <select name="id_kondektur">
                <?php echo "<option value=" . $data['id_kondektur'] . ">" . $data['id_kondektur'] . "</option>";
                $queryf = "SELECT id_kondektur FROM kondektur";
                $resultf = mysqli_query(connection(), $queryf);
                ?>
                <?php while ($dataf = mysqli_fetch_assoc($resultf)): ?>
                <?php echo "<option value=" . "'" . $dataf['id_kondektur'] . "'" . ">" . $dataf['id_kondektur'] . "</option>"; ?>
                <?php endwhile ?>
            </select>
        </div>
        <div class="form-group">
            <label>ID Bus :</label>
            <select name="id_bus">
                <?php
                echo "<option value=" . $data['id_bus'] . ">" . $data['id_bus'] . "</option>";
                $queryf = "SELECT id_bus FROM bus";
                $resultf = mysqli_query(connection(), $queryf);
                ?>
                <?php while ($dataf = mysqli_fetch_assoc($resultf)): ?>
                <?php echo "<option value=" . "'" . $dataf['id_bus'] . "'" . ">" . $dataf['id_bus'] . "</option>"; ?>
                <?php endwhile ?>
            </select>
        </div>
        <div class="form-group">
            <label>ID Driver :</label>
            <select name="id_driver">
                <?php
                echo "<option value=" . $data['id_driver'] . ">" . $data['id_driver'] . "</option>";
                $queryf = "SELECT id_driver FROM driver";
                $resultf = mysqli_query(connection(), $queryf);
                ?>
                <?php while ($dataf = mysqli_fetch_assoc($resultf)): ?>
                <?php echo "<option value=" . "'" . $dataf['id_driver'] . "'" . ">" . $dataf['id_driver'] . "</option>"; ?>
                <?php endwhile ?>
            </select>
        </div>
        <div class="form-group">
            <label>Jumlah KM :</label>
            <input type="number" name="jumlh_km" value="<?php echo $data['jumlah_km']; ?>" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Tanggal :</label>
            <input type="date" name="tgl" value="<?php echo $data['tanggal']; ?>" required="required">
        </div>
        <button type="submit" name="trans_upn">Simpan</button>
        <?php } ?>
    </form>
    <?php } ?>
</body>

</html>