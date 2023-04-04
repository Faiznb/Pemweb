<?php
//Faiz Nur Budi
//21081010113 
include "conn.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="uts.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTS</title>

</head>

<body>
    <nav class="navbar">
        <ul class="navi">
        <li><h3>List Tabel :</h3> </li>
          <li><a href="#bus" class="nav">Bus</a></li>
          <li><a href="#driver" class="nav">Driver</a></li>
          <li><a href="#kondektur" class="nav">Kondektur</a></li>
          <li><a href="#trans_upn" class="nav">Trans UPN</a></li>
        </ul>
        <ul class="navi">
          <li><a href="3_pendapatankondektur.php" class="nav" >Pendapatan Kondektur</a></li>
          <li><a href="3_pendapatandriver.php" class="nav">Pendapatan Driver</a></li>
        </ul>
        <ul class="navi">
          <li><a href="4_databus.php" class="nav" >Data Bus</a></li>
        </ul>
    </nav>
    <div class="container">
        <div class="header" id="bus">
            <div class="text">Tabel Bus : </div>
            <?php
              if (@$_GET['status']!==NULL) {
              $status = $_GET['status'];
              if ($status=='ok1') {
                echo '<div class="sukses">Data Bus berhasil di-update</div>';
              }
              elseif($status=='err1'){
                echo '<div class="danger">Data Bus gagal di-update</div>';
              }
              elseif($status=='insb-ok'){
                echo '<div class="sukses">Data Bus berhasil di-tambahkan</div>';
              }
              elseif($status=='insb-err'){
                echo '<div class="danger">Data Bus gagal di-tambahkan</div>';
              }
            }
          
           ?>
            <a href="2_insert.php?bus=1" class="tambah">Tambah Data</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>id bus</th>
                    <th>Plat</th>
                    <th>Status</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $query = "SELECT * FROM bus";
                $result = mysqli_query(connection(),$query);
                ?>
                <?php while($data = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $data['id_bus'];  ?></td>
                    <td><?php echo $data['plat'];  ?></td>
                    <td><?php echo $data['status'];  ?></td>
                    <td> <a href=<?php echo "2_update.php?id_bus=" . $data['id_bus']; ?>
                            class="update">UPDATE</a></td>
                    <td> <a href=<?php echo "2_delete.php?id_bus=" . $data['id_bus']; ?>
                            class="delete">DELETE</a></td>
                </tr>
                <?php endwhile ?>
            </tbody>
        </table>
       

        <div class="header" id="driver">
            <div class="text">Tabel Driver : </div>
            <?php 
            if (@$_GET['status']!==NULL) {
              $status = $_GET['status'];
              if ($status=='ok2') {
                echo '<div class="sukses">Data Driver berhasil di-update</div>';
              }
              elseif($status=='err2'){
                echo '<div class="danger">Data Driver gagal di-update</div>';
              }
              elseif($status=='insd-ok'){
                echo '<div class="sukses">Data Driver berhasil di-tambahkan</div>';
              }
              elseif($status=='insd-err'){
                echo '<div class="danger">Data Driver gagal di-tambahkan</div>';
              }
            }
           ?>
            <a href="2_insert.php?driver=1" class="tambah">Tambah Data</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>id driver</th>
                    <th>Nama</th>
                    <th>No. Sim</th>
                    <th>Alamat</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $query = "SELECT * FROM driver";
                $result = mysqli_query(connection(),$query);
                ?>
                <?php while($data = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $data['id_driver'];  ?></td>
                    <td><?php echo $data['nama'];  ?></td>
                    <td><?php echo $data['no_sim'];  ?></td>
                    <td><?php echo $data['alamat'];  ?></td>
                    <td> <a href=<?php echo "2_update.php?id_driver=" . $data['id_driver']; ?>
                            class="update">UPDATE</a></td>
                    <td> <a href=<?php echo "2_delete.php?id_driver=" . $data['id_driver']; ?>
                            class="delete">DELETE</a></td>
                </tr>
                <?php endwhile ?>
            </tbody>
        </table>
        <div class="header" id="kondektur">
            <div class="text">Tabel Kondektur : </div>
            <?php 
            if (@$_GET['status']!==NULL) {
              $status = $_GET['status'];
              if ($status=='ok3') {
                echo '<div class="sukses">Data Kondektur berhasil di-update</div>';
              }
              elseif($status=='err3'){
                echo '<div class="danger">Data Kondektur gagal di-update</div>';
              }
              elseif($status=='insk-ok'){
                echo '<div class="sukses">Data Kondektur berhasil di-tambahkan</div>';
              }
              elseif($status=='insk-err'){
                echo '<div class="danger">Data Kondektur gagal di-tambahkan</div>';
              }
            }
           ?>
            <a href="2_insert.php?kondektur=1" class="tambah">Tambah Data</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>id kondektur</th>
                    <th>Nama</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $query = "SELECT * FROM kondektur";
                $result = mysqli_query(connection(),$query);
                ?>
                <?php while($data = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $data['id_kondektur'];  ?></td>
                    <td><?php echo $data['nama'];  ?></td>
                    <td> <a href=<?php echo "2_update.php?id_kondektur=" . $data['id_kondektur']; ?>
                            class="update">UPDATE</a></td>
                    <td> <a href=<?php echo "2_delete.php?id_kondektur=" . $data['id_kondektur']; ?>
                            class="delete">DELETE</a></td>
                </tr>
                <?php endwhile ?>
            </tbody>
        </table>
        <div class="header" id="trans_upn">
            <div class="text">Tabel Trans UPN: </div>
            <?php 
            if (@$_GET['status']!==NULL) {
              $status = $_GET['status'];
              if ($status=='ok4') {
                echo '<div class="sukses">Data Trans UPN berhasil di-update</div>';
              }
              elseif($status=='err4'){
                echo '<div class="danger">Data Trans UPN gagal di-update</div>';
              }
              elseif($status=='inst-ok'){
                echo '<div class="sukses">Data Trans UPN berhasil di-tambahkan</div>';
              }
              elseif($status=='inst-err'){
                echo '<div class="danger">Data Trans UPN gagal di-tambahkan</div>';
              }
            }
           ?>
            <a href="2_insert.php?trans=1" class="tambah">Tambah Data</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>id Trans UPN</th>
                    <th>id Kondektur</th>
                    <th>id Bus</th>
                    <th>id Driver</th>
                    <th>Jumlah KM</th>
                    <th>Tanggal</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $query = "SELECT * FROM trans_upn";
                $result = mysqli_query(connection(),$query);
                ?>
                <?php while($data = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $data['id_trans_upn'];  ?></td>
                    <td><?php echo $data['id_kondektur'];  ?></td>
                    <td><?php echo $data['id_bus'];  ?></td>
                    <td><?php echo $data['id_driver'];  ?></td>
                    <td><?php echo $data['jumlah_km'];  ?></td>
                    <td><?php echo $data['tanggal'];  ?></td>
                    <td> <a href=<?php echo "2_update.php?id_trans_upn=" . $data['id_trans_upn']; ?>
                            class="update">UPDATE</a></td>
                    <td> <a href=<?php echo "2_delete.php?id_trans_upn=" . $data['id_trans_upn']; ?>
                            class="delete">DELETE</a></td>
                </tr>
                <?php endwhile ?>
            </tbody>
        </table>
    </div>
</body>

</html>